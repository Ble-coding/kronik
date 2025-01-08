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

$errors_partner = [];

// Récupération et validation des données du formulaire
$organization_name = htmlspecialchars($_POST['organization_name'] ?? '');
$organization_address = htmlspecialchars($_POST['organization_address'] ?? '');
$organization_phone = htmlspecialchars($_POST['organization_phone'] ?? '');
$organization_email = htmlspecialchars($_POST['organization_email'] ?? '');
$organization_website = htmlspecialchars($_POST['organization_website'] ?? '');
$contact_name = htmlspecialchars($_POST['contact_name'] ?? '');
$contact_position = htmlspecialchars($_POST['contact_position'] ?? '');
$contact_phone = htmlspecialchars($_POST['contact_phone'] ?? '');
$contact_email = htmlspecialchars($_POST['contact_email'] ?? '');
$organization_sector = htmlspecialchars($_POST['organization_sector'] ?? '');
$organization_size = $_POST['organization_size'] ?? '';
$organization_expertise = htmlspecialchars($_POST['organization_expertise'] ?? '');
$organization_experience = htmlspecialchars($_POST['organization_experience'] ?? '');
$partnership_objectives = htmlspecialchars($_POST['partnership_objectives'] ?? '');
$support_types = $_POST['support_types'] ?? [];
$other_support = htmlspecialchars($_POST['other_support'] ?? '');
$organization_logo = $_FILES['organization_logo'] ?? null;
$additional_docs = $_FILES['additional_docs'] ?? [];
$signatory_name = htmlspecialchars($_POST['signatory_name'] ?? '');
$signatory_position = htmlspecialchars($_POST['signatory_position'] ?? '');
$signature_date = htmlspecialchars($_POST['signature_date'] ?? '');
$confirmation = $_POST['confirmation'] ?? '';

// Validation des champs obligatoires
if (empty($organization_name)) $errors_partner['organization_name'] = "Le nom de l'organisation est requis.";
if (empty($organization_address)) $errors_partner['organization_address'] = "L'adresse de l'organisation est requise.";
if (empty($organization_phone)) $errors_partner['organization_phone'] = "Le numéro de téléphone de l'organisation est requis.";
if (empty($organization_email) || !filter_var($organization_email, FILTER_VALIDATE_EMAIL)) {
    $errors_partner['organization_email'] = "Adresse e-mail invalide.";
}
if (empty($contact_name)) $errors_partner['contact_name'] = "Le nom du contact principal est requis.";
if (empty($contact_position)) $errors_partner['contact_position'] = "La fonction du contact principal est requise.";
if (empty($contact_phone)) $errors_partner['contact_phone'] = "Le téléphone du contact principal est requis.";
if (empty($contact_email) || !filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
    $errors_partner['contact_email'] = "Adresse e-mail du contact invalide.";
}
if (empty($organization_sector)) $errors_partner['organization_sector'] = "Le secteur d'activité est requis.";
if (empty($organization_size)) $errors_partner['organization_size'] = "La taille de l'organisation est requise.";
if (empty($organization_expertise)) $errors_partner['organization_expertise'] = "Les domaines d'expertise sont requis.";
if (empty($organization_experience)) $errors_partner['organization_experience'] = "L'expérience avec des initiatives similaires est requise.";
if (empty($partnership_objectives)) $errors_partner['partnership_objectives'] = "Les objectifs du partenariat sont requis.";
if (empty($support_types)) $errors_partner['support_types'] = "Veuillez sélectionner au moins un type de soutien.";
if (empty($signatory_name)) $errors_partner['signatory_name'] = "Le nom du signataire est requis.";
if (empty($signatory_position)) $errors_partner['signatory_position'] = "La fonction du signataire est requise.";
if (empty($signature_date)) $errors_partner['signature_date'] = "La date de signature est requise.";
if (empty($confirmation)) $errors_partner['confirmation'] = "Vous devez confirmer que les informations sont exactes.";

// Gestion des erreurs
if (!empty($errors_partner)) {
    $_SESSION['partner_form_errors'] = $errors_partner;
    $_SESSION['partner_form_old'] = $_POST;
    header("Location: ../contribute#pills-partner");
    exit;
}

// Construction du message de l'email
$support_list = implode(", ", $support_types);
$email_message = "
<h2>Nouvelle candidature de partenaire reçue</h2>

<h3>1. Informations Générales sur l’Organisation</h3>
<strong>Nom de l’Organisation :</strong> $organization_name<br>
<strong>Adresse :</strong> $organization_address<br>
<strong>Téléphone :</strong> $organization_phone<br>
<strong>E-mail :</strong> $organization_email<br>
<strong>Site Web :</strong> " . (!empty($organization_website) ? $organization_website : "Non spécifié") . "<br><br>

<h3>2. Détails du Contact Principal</h3>
<strong>Nom et Prénom :</strong> $contact_name<br>
<strong>Fonction :</strong> $contact_position<br>
<strong>Téléphone :</strong> $contact_phone<br>
<strong>E-mail :</strong> $contact_email<br><br>

<h3>3. Informations sur l’Organisation</h3>
<strong>Secteur d’activité :</strong> $organization_sector<br>
<strong>Taille de l’Organisation :</strong> $organization_size<br>
<strong>Domaines d’expertise :</strong> $organization_expertise<br>
<strong>Expérience :</strong> $organization_experience<br><br>

<h3>4. Objectifs du Partenariat</h3>
<strong>Objectifs :</strong> $partnership_objectives<br>
<strong>Types de soutien :</strong> $support_list<br>
<strong>Autres soutiens :</strong> " . (!empty($other_support) ? $other_support : "Non spécifié") . "<br><br>

<h3>5. Déclaration et Signature</h3>
<strong>Nom du signataire :</strong> $signatory_name<br>
<strong>Fonction :</strong> $signatory_position<br>
<strong>Date :</strong> $signature_date<br>
";

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
    $mail->addReplyTo($contact_email, $contact_name);

    // Contenu de l'email
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true);
    $mail->Subject = 'Nouvelle candidature de partenaire';
    $mail->Body = $email_message;

    // Pièces jointes
    if (!empty($organization_logo['tmp_name'])) {
        $mail->addAttachment($organization_logo['tmp_name'], $organization_logo['name']);
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
