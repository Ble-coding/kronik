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
    $mail->Password = 'iruallnurlzqvkto'; //ce{Ne0#YQr2& Mot de passe Gmail ou mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('levisble@gmail.com', 'Nom de l\'expéditeur');
    // $mail->addAddress('levisble@gmail.com');
    $mail->addReplyTo('levisble@gmail.com', 'Support Kronik-X Health');
    $mail->addAddress('levisble@gmail.com');
    $mail->addReplyTo($email, $name);

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
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
    header("location: ../contact");
    exit;
}



    

// ~4V%nDt=e]P+(suppot) Adresses email génériques pour un projet
// Adresses générales pour contact :

// contact@kronik.a-car.ci
// info@kronik.a-car.ci
// support@kronik.a-car.ci
// Adresses pour des équipes spécifiques :

// team@kronik.a-car.ci
// sales@kronik.a-car.ci (pour les ventes)
// admin@kronik.a-car.ci (administration)
// marketing@kronik.a-car.ci
// Adresses pour des services spécifiques :

// coaching@kronik.a-car.ci (pour le service de coaching)
// mentors@kronik.a-car.ci (pour le programme des mentors)
// recruitment@kronik.a-car.ci (pour les recrutements)
// partnerships@kronik.a-car.ci (pour les partenariats)
// Adresses email pour des notifications
// Notifications automatiques :

// no-reply@kronik.a-car.ci (adresse utilisée pour les envois automatiques où les réponses ne sont pas traitées)
// notifications@kronik.a-car.ci
// alerts@kronik.a-car.ci
// Suivi d'activité ou rapports :

// reports@kronik.a-car.ci
// updates@kronik.a-car.ci
// Adresses personnalisées pour les utilisateurs
// Basé sur des rôles spécifiques :

// john.doe@kronik.a-car.ci (employé nommé John Doe)
// jane.smith@kronik.a-car.ci (employée Jane Smith)
// Basé sur les départements ou projets :

// project.manager@kronik.a-car.ci
// health.programs@kronik.a-car.ci
// Recommandations pour choisir des adresses :
// Clarté et simplicité : Les adresses doivent indiquer clairement leur rôle ou fonction (exemple : contact@ pour les demandes générales).
// Utilisation d'alias : Créez des alias pour rediriger plusieurs adresses vers une boîte principale (exemple : info@ et contact@ peuvent rediriger vers la même adresse).
// Domaine valide : Assurez-vous que votre domaine (kronik.a-car.ci) est configuré pour envoyer des e-mails via SMTP (SPF, DKIM, et DMARC correctement configurés).
// Si vous avez un serveur d'hébergement avec cPanel ou un autre outil, vous pouvez créer ces adresses directement via l'interface de gestio