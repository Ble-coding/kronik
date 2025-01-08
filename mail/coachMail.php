<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(300);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if (!isset($_SESSION)) {
    session_start();
}
$errors = [];

// Récupération et validation des données du formulaire
$full_name = htmlspecialchars($_POST['full_name'] ?? '');
$address = htmlspecialchars($_POST['address'] ?? '');
$phone = htmlspecialchars($_POST['phone'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$profile_photo = $_FILES['profile_photo'] ?? null;
$current_position = htmlspecialchars($_POST['current_position'] ?? '');
$organization = htmlspecialchars($_POST['organization'] ?? '');
$industry = htmlspecialchars($_POST['industry'] ?? '');
$organization_logo = $_FILES['organization_logo'] ?? null;
$linkedin = htmlspecialchars($_POST['linkedin'] ?? '');
$expertise = $_POST['expertise'] ?? [];
$other_expertise = htmlspecialchars($_POST['other_expertise'] ?? '');
$coaching_experience = htmlspecialchars($_POST['coaching_experience'] ?? '');
$motivation = htmlspecialchars($_POST['motivation'] ?? '');
$availability = htmlspecialchars($_POST['availability'] ?? '');
$cv = $_FILES['cv'] ?? null;
$additional_docs = $_FILES['additional_docs'] ?? [];
$signatory_name = htmlspecialchars($_POST['signatory_name'] ?? '');
$signature_date = htmlspecialchars($_POST['signature_date'] ?? '');
$confirmation = $_POST['confirmation'] ?? '';

// Validation des champs obligatoires
if (empty($full_name)) $errors['full_name'] = "Le nom complet est requis.";
if (empty($address)) $errors['address'] = "L'adresse est requise.";
if (empty($phone)) $errors['phone'] = "Le numéro de téléphone est requis.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Adresse e-mail invalide.";
if (empty($profile_photo) || $profile_photo['error'] !== UPLOAD_ERR_OK) $errors['profile_photo'] = "La photo de profil est requise.";
if (empty($current_position)) $errors['current_position'] = "Le poste actuel est requis.";
if (empty($organization)) $errors['organization'] = "L'organisation est requise.";
if (empty($industry)) $errors['industry'] = "Le secteur d'activité est requis.";
if (empty($motivation)) $errors['motivation'] = "Veuillez indiquer votre motivation.";
if (empty($signatory_name)) $errors['signatory_name'] = "Le nom du signataire est requis.";
if (empty($signature_date)) $errors['signature_date'] = "La date de signature est requise.";

// Validation des fichiers multiples
if (!empty($additional_docs['tmp_name'][0])) {
    foreach ($additional_docs['tmp_name'] as $key => $tmp_name) {
        if ($additional_docs['error'][$key] !== UPLOAD_ERR_OK) {
            $errors['additional_docs'][$key] = "Erreur lors du téléchargement du fichier : " . $additional_docs['name'][$key];
        }
    }
} else {
    $errors['additional_docs'] = "Veuillez joindre au moins un document pertinent.";
}

if (empty($confirmation)) $errors['confirmation'] = "Vous devez confirmer que les informations sont exactes.";
if (!empty($errors)) {
    $_SESSION['coach_form_errors'] = $errors; // Stocke les erreurs
    $_SESSION['coach_form_old'] = $_POST;    // Stocke les données soumises
    error_log("Errors stored in session: " . print_r($_SESSION['coach_form_errors'], true));
    header("Location: ../contribute#pills-coach");
    exit;
}


// Construction du message de l'email
$expertise_list = implode(", ", $expertise);
$email_message = "
<h2>Nouvelle candidature de coach reçue</h2>

<h3>1. Informations Personnelles</h3>
<strong>Nom complet :</strong> $full_name<br>
<strong>Adresse :</strong> $address<br>
<strong>Numéro de téléphone :</strong> $phone<br>
<strong>Adresse e-mail :</strong> $email<br><br>

<h3>2. Informations Professionnelles</h3>
<strong>Poste actuel :</strong> $current_position<br>
<strong>Organisation :</strong> $organization<br>
<strong>Secteur d'activité :</strong> $industry<br>
<strong>LinkedIn :</strong> " . (!empty($linkedin) ? $linkedin : "Non spécifié") . "<br><br>

<h3>3. Domaines d’expertise</h3>
<strong>Domaines :</strong> $expertise_list<br>
" . (!empty($other_expertise) ? "<strong>Autres domaines :</strong> $other_expertise<br>" : "") . "<br>

<h3>4. Motivations</h3>
<strong>Motivation :</strong> $motivation<br>
<strong>Disponibilité :</strong> " . (!empty($availability) ? $availability : "Non spécifié") . "<br><br>

<h3>5. Déclaration et Signature</h3>
<strong>Nom du signataire :</strong> $signatory_name<br>
<strong>Date de signature :</strong> $signature_date<br>
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
    $mail->Subject = 'Nouvelle candidature de coach';
    $mail->Body = $email_message;

    // Pièces jointes
    if (!empty($profile_photo['tmp_name'])) {
        $mail->addAttachment($profile_photo['tmp_name'], $profile_photo['name']);
    }
    if (!empty($organization_logo['tmp_name'])) {
        $mail->addAttachment($organization_logo['tmp_name'], $organization_logo['name']);
    }
    if (!empty($cv['tmp_name'])) {
        $mail->addAttachment($cv['tmp_name'], $cv['name']);
    }
    if (!empty($additional_docs['tmp_name'][0])) {
        foreach ($additional_docs['tmp_name'] as $key => $tmp_name) {
            if ($additional_docs['error'][$key] === UPLOAD_ERR_OK) {
                $mail->addAttachment($tmp_name, $additional_docs['name'][$key]);
            }
        }
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
