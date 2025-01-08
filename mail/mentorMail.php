<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(300);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

session_start();
$errors = [];

// Récupération et validation des données du formulaire
$full_name = htmlspecialchars($_POST['full_name'] ?? '');
$address = htmlspecialchars($_POST['address'] ?? '');
$phone = htmlspecialchars($_POST['phone'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$website = htmlspecialchars($_POST['website'] ?? '');
$expertise = htmlspecialchars($_POST['expertise'] ?? '');
$other_expertise = htmlspecialchars($_POST['other_expertise'] ?? '');
$experience = htmlspecialchars($_POST['experience'] ?? '');
$projects = htmlspecialchars($_POST['projects'] ?? '');
$certifications = htmlspecialchars($_POST['certifications'] ?? '');
$motivation = htmlspecialchars($_POST['motivation'] ?? '');
$contribution = $_POST['contribution'] ?? [];
$other_contribution = htmlspecialchars($_POST['other_contribution'] ?? '');
$signatory_name = htmlspecialchars($_POST['signatory_name'] ?? '');
$function = htmlspecialchars($_POST['function'] ?? '');
$date = htmlspecialchars($_POST['date'] ?? '');
$confirmation = $_POST['confirmation'] ?? '';

// Validation des champs obligatoires
if (empty($full_name)) $errors['full_name'] = "Le nom complet est requis.";
if (empty($address)) $errors['address'] = "L'adresse est requise.";
if (empty($phone)) $errors['phone'] = "Le numéro de téléphone est requis.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Adresse e-mail invalide.";
if (empty($expertise)) $errors['expertise'] = "Veuillez sélectionner un domaine d'expertise.";
if ($expertise === 'autre' && empty($other_expertise)) $errors['other_expertise'] = "Veuillez préciser votre expertise.";
if (empty($experience)) $errors['experience'] = "Veuillez décrire votre expérience professionnelle.";
if (empty($motivation)) $errors['motivation'] = "Veuillez indiquer votre motivation.";
if (empty($signatory_name)) $errors['signatory_name'] = "Le nom du signataire est requis.";
if (empty($function)) $errors['function'] = "La fonction est requise.";
if (empty($date)) $errors['date'] = "La date est requise.";
if (empty($confirmation)) $errors['confirmation'] = "Vous devez confirmer que les informations sont exactes.";

// Gestion des erreurs
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("location: ../contribute#pills-mentorat");
    exit;
}

// Construction du message de l'email
$contribution_list = implode(", ", $contribution);
$email_message = "
<h2>Nouvelle candidature de mentor reçue</h2>

<h3>1. Informations Générales</h3>
<strong>Nom complet :</strong><br>$full_name<br><br>
<strong>Adresse :</strong><br>$address<br><br>
<strong>Numéro de téléphone :</strong><br>$phone<br><br>
<strong>Adresse e-mail :</strong><br>$email<br><br>
<strong>Site web ou LinkedIn :</strong><br>" . (!empty($website) ? $website : "Non spécifié") . "<br><br>

<h3>2. Expérience et Compétences</h3>
<strong>Domaines d'expertise :</strong><br>$expertise<br>
" . (!empty($other_expertise) ? "<strong>Autres domaines :</strong><br>$other_expertise<br>" : "") . "
<strong>Expérience professionnelle :</strong><br>$experience<br><br>
<strong>Projets ou startups accompagnés :</strong><br>" . (!empty($projects) ? $projects : "Non spécifié") . "<br><br>
<strong>Certifications :</strong><br>" . (!empty($certifications) ? $certifications : "Non spécifié") . "<br><br>

<h3>3. Motivations</h3>
<strong>Motivation :</strong><br>$motivation<br><br>
<strong>Contribution prévue :</strong><br>$contribution_list<br>
" . (!empty($other_contribution) ? "<strong>Autres contributions :</strong><br>$other_contribution<br>" : "") . "

<h3>4. Déclaration et Signature</h3>
<strong>Nom du signataire :</strong><br>$signatory_name<br><br>
<strong>Fonction :</strong><br>$function<br><br>
<strong>Date :</strong><br>$date<br><br>
";

// Envoi de l'email via PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'levisble@gmail.com';
    $mail->Password = 'iruallnurlzqvkto'; // Utilisez un mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('levisble@gmail.com', 'Kronik-X Health');
    $mail->addReplyTo('levisble@gmail.com', 'Support Kronik-X Health');
    $mail->addAddress('levisble@gmail.com');
    $mail->addReplyTo($email, $full_name);

    // Contenu de l'email
    
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true);
    $mail->Subject = 'Nouvelle candidature de mentor';
    $mail->Body = $email_message;

    // Pièces jointes
    if (!empty($_FILES['logo']['tmp_name'])) {
        $mail->addAttachment($_FILES['logo']['tmp_name'], $_FILES['logo']['name']);
    }
    if (!empty($_FILES['photo']['tmp_name'])) {
        $mail->addAttachment($_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
    }
    if (!empty($_FILES['cv']['tmp_name'])) {
        $mail->addAttachment($_FILES['cv']['tmp_name'], $_FILES['cv']['name']);
    }

    $mail->send();
    header("location: ../mail-success");
    exit;

} catch (Exception $e) {
    error_log("Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}");
    $_SESSION['mail_error'] = "Une erreur est survenue lors de l'envoi de l'email.";
    header("location: ../contribute");
    exit;
}
