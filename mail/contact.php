<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(300);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Initialiser un tableau pour les erreurs
$errors = [];

// Récupération des données du formulaire et validation
$name = htmlspecialchars($_POST['user']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$subject = htmlspecialchars($_POST['note']) ?? 'Objet non spécifié';
$message = htmlspecialchars($_POST['message']);

// Vérification des champs obligatoires
if (empty($name)) {
    $errors['user'] = 'Veuillez entrer votre nom.';
}
if (empty($email)) {
    $errors['email'] = 'Veuillez entrer votre adresse e-mail.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Adresse e-mail invalide.';
}
if (empty($phone)) {
    $errors['phone'] = 'Veuillez entrer votre numéro de téléphone.';
}
if (empty($message)) {
    $errors['message'] = 'Veuillez entrer votre message.';
}

if (!empty($errors)) {
    session_start();
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("location: ../contact.php");
    exit;
}

// Construire le message de l'email
$email_message = "
Nom : $name
Email : $email
Téléphone : $phone
Objet : $subject

Message :
$message
";

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'levisble@gmail.com';
    $mail->Password = 'iruallnurlzqvkto'; // Mot de passe Gmail ou mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('levisble@gmail.com', 'Nom de l\'expéditeur');
    $mail->addAddress('levisble@gmail.com');
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Nouvelle demande de contact';
    $mail->Body = nl2br($email_message);
    $mail->AltBody = $email_message;

    $mail->send();
    header("location: ../mail-success");
    exit;
} catch (Exception $e) {
    session_start();
    $_SESSION['mail_error'] = $mail->ErrorInfo;
    header("location: ../contact.php");
    exit;
}
