<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(300);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


// Charger la langue sélectionnée
session_start();
$lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr');
$lang_path = "../languages/{$lang}/contribute/partnerForm.php";

// Charger les traductions ou utiliser une langue par défaut
if (file_exists($lang_path)) {
    $translations = include $lang_path;
} else {
    $translations = include "../languages/fr/contribute/partnerForm.php"; // Langue par défaut
}


if (!isset($_SESSION)) {
    session_start();
}

$errors_partner = [];
// Récupération des données du formulaire
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
$organization_size = htmlspecialchars($_POST['organization_size'] ?? '');
$organization_expertise = htmlspecialchars($_POST['organization_expertise'] ?? '');
$organization_experience = htmlspecialchars($_POST['organization_experience'] ?? '');
$partnership_objectives = htmlspecialchars($_POST['partnership_objectives'] ?? '');
$support_types = $_POST['support_types'] ?? [];
$other_support = htmlspecialchars($_POST['other_support'] ?? '');
$organization_logo = $_FILES['organization_logo_5'] ?? null;
$additional_docs = $_FILES['additional_docs'] ?? [];
$signatory_name = htmlspecialchars($_POST['signatory_name'] ?? '');
$signatory_position = htmlspecialchars($_POST['signatory_position'] ?? '');
$signature_date = htmlspecialchars($_POST['signature_date'] ?? '');
$confirmation = $_POST['confirmation'] ?? '';

// Validation des champs obligatoires
$errors_partner = [];

if (empty($organization_name)) {
    $errors_partner['organization_name'] = "Le nom de l'organisation est requis.";
}
if (empty($organization_address)) {
    $errors_partner['organization_address'] = "L'adresse de l'organisation est requise.";
}
if (empty($organization_phone)) {
    $errors_partner['organization_phone'] = "Le numéro de téléphone de l'organisation est requis.";
}
if (empty($organization_email) || !filter_var($organization_email, FILTER_VALIDATE_EMAIL)) {
    $errors_partner['organization_email'] = "Adresse e-mail invalide.";
}
if (empty($contact_name)) {
    $errors_partner['contact_name'] = "Le nom du contact principal est requis.";
}
if (empty($contact_position)) {
    $errors_partner['contact_position'] = "La fonction du contact principal est requise.";
}
if (empty($contact_phone)) {
    $errors_partner['contact_phone'] = "Le téléphone du contact principal est requis.";
}
if (empty($contact_email) || !filter_var($contact_email, FILTER_VALIDATE_EMAIL)) {
    $errors_partner['contact_email'] = "Adresse e-mail du contact invalide.";
}
if (empty($organization_sector)) {
    $errors_partner['organization_sector'] = "Le secteur d'activité est requis.";
}
if (empty($organization_size)) {
    $errors_partner['organization_size'] = "La taille de l'organisation est requise.";
}
if (empty($organization_expertise)) {
    $errors_partner['organization_expertise'] = "Les domaines d'expertise sont requis.";
}
if (empty($organization_experience)) {
    $errors_partner['organization_experience'] = "L'expérience avec des initiatives similaires est requise.";
}
if (empty($partnership_objectives)) {
    $errors_partner['partnership_objectives'] = "Les objectifs du partenariat sont requis.";
}
if (empty($support_types)) {
    $errors_partner['support_types'] = "Veuillez sélectionner au moins un type de soutien.";
}
if (empty($signatory_name)) {
    $errors_partner['signatory_name'] = "Le nom du signataire est requis.";
}
if (empty($signatory_position)) {
    $errors_partner['signatory_position'] = "La fonction du signataire est requise.";
}
if (empty($signature_date)) {
    $errors_partner['signature_date'] = "La date de signature est requise.";
}
if (empty($confirmation)) {
    $errors_partner['confirmation'] = "Vous devez confirmer que les informations sont exactes.";
}

// Validation des fichiers multiples
if (!empty($additional_docs['tmp_name'][0])) {
    foreach ($additional_docs['tmp_name'] as $key => $tmp_name) {
        if ($additional_docs['error'][$key] !== UPLOAD_ERR_OK) {
            $errors_partner['additional_docs'][$key] = "Erreur lors du téléchargement du fichier : " . $additional_docs['name'][$key];
        }
    }
} else {
    $errors_partner['additional_docs'] = "Veuillez joindre au moins un document pertinent.";
}

// Gestion des erreurs
if (!empty($errors_partner)) {
    $_SESSION['partner_form_errors'] = $errors_partner;
    $_SESSION['partner_form_old'] = $_POST;
    error_log("Errors stored in session: " . print_r($errors_partner, true));
    header("Location: ../contribute?lang=" . htmlspecialchars($lang) . "#pills-partner");
    exit;
}
// Charger les libellés traduits
$labels = $translations['labels'] ?? [];
$section_titles = $translations['section_titles'] ?? [];
$placeholders = $translations['placeholders'] ?? [];
$defaults = $translations['defaults'] ?? ['not_specified' => 'Non spécifié'];

// Préparer la liste des types de soutien
$support_list = implode(", ", array_map(function ($value) use ($translations) {
    return $translations['support_types'][$value] ?? $value;
}, $support_types));

// Construction du message de l'email
$email_message = "
<h2>" . ($translations['title'] ?? 'Nouvelle candidature de partenaire reçue') . "</h2>

<h3>" . ($section_titles['general_info'] ?? '1. Informations Générales sur l’Organisation') . "</h3>
<strong>" . ($placeholders['organization_name'] ?? 'Nom de l’Organisation') . " :</strong> $organization_name<br>
<strong>" . ($placeholders['organization_address'] ?? 'Adresse') . " :</strong> $organization_address<br>
<strong>" . ($placeholders['organization_phone'] ?? 'Téléphone') . " :</strong> $organization_phone<br>
<strong>" . ($placeholders['organization_email'] ?? 'E-mail') . " :</strong> $organization_email<br>
<strong>" . ($placeholders['organization_website'] ?? 'Site Web') . " :</strong> " . (!empty($organization_website) ? $organization_website : $defaults['not_specified']) . "<br><br>

<h3>" . ($section_titles['contact_details'] ?? '2. Détails du Contact Principal') . "</h3>
<strong>" . ($placeholders['contact_name'] ?? 'Nom et Prénom') . " :</strong> $contact_name<br>  
<strong>" . ($placeholders['contact_position'] ?? 'Fonction') . " :</strong> $contact_position<br>
<strong>" . ($placeholders['contact_phone'] ?? 'Téléphone') . " :</strong> $contact_phone<br>
<strong>" . ($placeholders['contact_email'] ?? 'E-mail') . " :</strong> $contact_email<br><br>

<h3>" . ($section_titles['organization_info'] ?? '3. Informations sur l’Organisation') . "</h3>
<strong>" . ($placeholders['organization_sector'] ?? 'Secteur d’activité') . " :</strong> $organization_sector<br>
<strong>" . ($placeholders['organization_size'] ?? 'Taille de l’Organisation') . " :</strong> $organization_size<br>
<strong>" . ($placeholders['organization_expertise'] ?? 'Domaines d’expertise') . " :</strong> $organization_expertise<br>
<strong>" . ($placeholders['organization_experience'] ?? 'Expérience') . " :</strong> $organization_experience<br><br>

<h3>" . ($section_titles['partnership_goals'] ?? '4. Objectifs du Partenariat') . "</h3>
<strong>" . ($placeholders['partnership_objectives'] ?? 'Objectifs') . " :</strong> $partnership_objectives<br>
<strong>" . ($labels['support_types'] ?? 'Types de soutien') . " :</strong> $support_list<br>
<strong>" . ($placeholders['other_support'] ?? 'Autres soutiens') . " :</strong> " . (!empty($other_support) ? $other_support : $defaults['not_specified']) . "<br><br>

<h3>" . ($section_titles['declaration'] ?? '5. Déclaration et Signature') . "</h3>
<strong>" . ($placeholders['signatory_name'] ?? 'Nom du signataire') . " :</strong> $signatory_name<br>
<strong>" . ($placeholders['signatory_position'] ?? 'Fonction') . " :</strong> $signatory_position<br>
<strong>" . ($placeholders['signature_date'] ?? 'Date') . " :</strong> $signature_date<br>
";

$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.kxhealth.org';
    $mail->SMTPAuth = true;
    $mail->Username = 'partner@kxhealth.org';
    $mail->Password = 'P@rtn3r$'; // Utilisez un mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('partner@kxhealth.org', 'Kronik-X Health');
    $mail->addReplyTo('support@kxhealth.org', 'Support Kronik-X Health');
    $mail->addAddress('support@kxhealth.org');
    $mail->addReplyTo($contact_email, $contact_name);

    // Contenu de l'email
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true);
    $mail->Subject = $translations['email_subject'] ?? 'Nouvelle candidature de partenaire';
    $mail->Body = $email_message;

   // Envoi des fichiers joints avec PHPMailer
if ($organization_logo && $organization_logo['error'] === UPLOAD_ERR_OK) {
    $mail->addAttachment($organization_logo['tmp_name'], $organization_logo['name']);
}

if ($additional_docs && !empty($additional_docs['tmp_name'][0])) {
    foreach ($additional_docs['tmp_name'] as $key => $tmp_name) {
        if ($additional_docs['error'][$key] === UPLOAD_ERR_OK) {
            $mail->addAttachment($tmp_name, $additional_docs['name'][$key]);
        }
    }
}

    $mail->send();
    header("location: ../mail-success?lang=" . htmlspecialchars($lang));
    exit;

} catch (Exception $e) {
    error_log("Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}");
    $_SESSION['mail_error'] = "Une erreur est survenue lors de l'envoi de l'email.";
    header("Location: ../contribute?lang=" . htmlspecialchars($lang) . "#pills-partner");
    exit;
}
