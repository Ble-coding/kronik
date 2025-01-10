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
$lang_path = "../languages/{$lang}/contribute/coachForm.php";

// Charger les traductions ou utiliser une langue par défaut
if (file_exists($lang_path)) {
    $translations = include $lang_path;
} else {
    $translations = include "../languages/fr/contribute/coachForm.php"; // Langue par défaut
}

if (!isset($_SESSION)) {
    session_start();
}

$errors = [];
// Récupération des données du formulaire
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
$motivation = htmlspecialchars($_POST['motivation'] ?? '');
$cv = $_FILES['cv'] ?? null;
$additional_docs = $_FILES['additional_docs'] ?? [];
$signatory_name = htmlspecialchars($_POST['signatory_name'] ?? '');
$signature_date = htmlspecialchars($_POST['signature_date'] ?? '');
$confirmation = $_POST['confirmation'] ?? '';

// Validation des champs obligatoires
if (empty($full_name)) {
    $errors['full_name'] = $translations['errors']['full_name'] ?? 'Le nom complet est requis.';
}
if (empty($address)) {
    $errors['address'] = $translations['errors']['address'] ?? 'L\'adresse est requise.';
}
if (empty($phone)) {
    $errors['phone'] = $translations['errors']['phone'] ?? 'Le numéro de téléphone est requis.';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = $translations['errors']['email'] ?? 'Adresse e-mail invalide.';
}
if (empty($profile_photo) || $profile_photo['error'] !== UPLOAD_ERR_OK) {
    $errors['profile_photo'] = $translations['errors']['profile_photo'] ?? 'La photo de profil est requise.';
}
if (empty($current_position)) {
    $errors['current_position'] = $translations['errors']['current_position'] ?? 'Le poste actuel est requis.';
}
if (empty($organization)) {
    $errors['organization'] = $translations['errors']['organization'] ?? 'L\'organisation est requise.';
}
if (empty($industry)) {
    $errors['industry'] = $translations['errors']['industry'] ?? 'Le secteur d\'activité est requis.';
}
if (empty($motivation)) {
    $errors['motivation'] = $translations['errors']['motivation'] ?? 'Veuillez indiquer votre motivation.';
}
if (empty($signatory_name)) {
    $errors['signatory_name'] = $translations['errors']['signatory_name'] ?? 'Le nom du signataire est requis.';
}
if (empty($signature_date)) {
    $errors['signature_date'] = $translations['errors']['signature_date'] ?? 'La date de signature est requise.';
}

// Validation des fichiers multiples
if (!empty($additional_docs['tmp_name'][0])) {
    foreach ($additional_docs['tmp_name'] as $key => $tmp_name) {
        if ($additional_docs['error'][$key] !== UPLOAD_ERR_OK) {
            $errors['additional_docs'][$key] = $translations['errors']['additional_docs'] ?? "Erreur lors du téléchargement du fichier : " . $additional_docs['name'][$key];
        }
    }
} else {
    $errors['additional_docs'] = $translations['errors']['additional_docs'] ?? 'Veuillez joindre au moins un document pertinent.';
}

if (empty($confirmation)) {
    $errors['confirmation'] = $translations['errors']['confirmation'] ?? 'Vous devez confirmer que les informations sont exactes.';
}
 
// En cas d'erreurs
if (!empty($errors)) {
    $_SESSION['coach_form_errors'] = $errors;
    $_SESSION['coach_form_old'] = $_POST;
    error_log("Errors stored in session: " . print_r($errors, true));
    header("Location: ../contribute?lang=" . htmlspecialchars($lang) . "#pills-coach");
    exit;
}


// Charger les libellés traduits
$labels = isset($translations['labels']) ? $translations['labels'] : [];
$section_titles = isset($translations['section_titles']) ? $translations['section_titles'] : [];

// Préparer la liste des domaines d'expertise
$expertise_list = implode(", ", array_map(function($value) use ($translations) {
    return $translations['expertise_options'][$value] ?? $value;
}, $expertise));

$email_message = "
<h2>{$translations['title']}</h2>

<h3>" . ($section_titles['personal_info'] ?? '1. Informations Personnelles') . "</h3>
<strong>" . ($labels['full_name'] ?? 'Nom complet') . " :</strong> $full_name<br>
<strong>" . ($labels['address'] ?? 'Adresse') . " :</strong> $address<br>
<strong>" . ($labels['phone'] ?? 'Numéro de téléphone') . " :</strong> $phone<br>
<strong>" . ($labels['email'] ?? 'Adresse e-mail') . " :</strong> $email<br><br>

<h3>" . ($section_titles['professional_info'] ?? '2. Informations Professionnelles') . "</h3>
<strong>" . ($labels['current_position'] ?? 'Poste actuel') . " :</strong> $current_position<br>
<strong>" . ($labels['organization'] ?? 'Organisation') . " :</strong> $organization<br>
<strong>" . ($labels['industry'] ?? 'Secteur d\'activité') . " :</strong> $industry<br>
<strong>" . ($labels['linkedin'] ?? 'LinkedIn') . " :</strong> " . (!empty($linkedin) ? $linkedin : ($translations['defaults']['not_specified'] ?? 'Non spécifié')) . "<br><br>

<h3>" . ($section_titles['expertise_and_skills'] ?? '3. Domaines d’expertise') . "</h3>
<strong>" . ($labels['expertise_label'] ?? 'Domaines') . " :</strong> $expertise_list<br>
" . (!empty($other_expertise) ? "<strong>" . ($labels['other_expertise_label'] ?? 'Autres domaines') . " :</strong> $other_expertise<br>" : "") . "<br>

<h3>" . ($section_titles['motivation'] ?? '4. Motivations') . "</h3>
<strong>" . ($labels['motivation'] ?? 'Motivation') . " :</strong> $motivation<br>
<strong>" . ($translations['placeholders']['availability'] ?? 'Disponibilité') . " :</strong> " . (!empty($availability) ? $availability : ($translations['defaults']['not_specified'] ?? 'Non spécifié')) . "<br><br>

<h3>" . ($section_titles['declaration_and_signature'] ?? '5. Déclaration et Signature') . "</h3>
<strong>" . ($labels['signatory_name'] ?? 'Nom du signataire') . " :</strong> $signatory_name<br>
<strong>" . ($translations['placeholders']['signature_date'] ?? 'Date de signature') . " :</strong> $signature_date<br>
";

// Envoi de l'email via PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.kxhealth.org';
    $mail->SMTPAuth = true;
    $mail->Username = '...@kxhealth.org';
    $mail->Password = ''; // Utilisez un mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Informations d'expéditeur et de réponse
    $mail->setFrom('...@kxhealth.org', $translations['from_name'] ?? 'Kronik-X Health');
    $mail->addReplyTo('...@kxhealth.org', $translations['reply_to_name'] ?? 'Support Kronik-X Health');
    $mail->addAddress('...@kxhealth.org');
    $mail->addReplyTo($email, $full_name);
  
    // Contenu de l'email
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true);
    $mail->Subject = $translations['email_subject'] ?? 'Nouvelle candidature de coach';
    $mail->Body = nl2br($email_message);
    $mail->AltBody = strip_tags($email_message);

    // Gestion des pièces jointes
    if (!empty($profile_photo['tmp_name']) && $profile_photo['error'] === UPLOAD_ERR_OK) {
        $mail->addAttachment($profile_photo['tmp_name'], $profile_photo['name']);
    }
    if (!empty($organization_logo['tmp_name']) && $organization_logo['error'] === UPLOAD_ERR_OK) {
        $mail->addAttachment($organization_logo['tmp_name'], $organization_logo['name']);
    }
    if (!empty($cv['tmp_name']) && $cv['error'] === UPLOAD_ERR_OK) {
        $mail->addAttachment($cv['tmp_name'], $cv['name']);
    }
    if (!empty($additional_docs['tmp_name'][0])) {
        foreach ($additional_docs['tmp_name'] as $key => $tmp_name) {
            if ($additional_docs['error'][$key] === UPLOAD_ERR_OK) {
                $mail->addAttachment($tmp_name, $additional_docs['name'][$key]);
            }
        }
    }
  
    // Envoi de l'email
    $mail->send();
    header("location: ../mail-success?lang=" . htmlspecialchars($lang));
    exit;

} catch (Exception $e) {
    error_log("Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}");
    $_SESSION['mail_error'] = $translations['email_error'] ?? "Une erreur est survenue lors de l'envoi de l'email.";
    header("location: ../contribute?lang=" . htmlspecialchars($lang));
    exit;
}
