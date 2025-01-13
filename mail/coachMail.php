<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(300);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// Initialiser la session
session_start();

// Charger la langue sélectionnée
$lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr');
$lang_path = "../languages/{$lang}/contribute/coachForm.php";

// Charger les traductions ou utiliser une langue par défaut
if (file_exists($lang_path)) {
    $translations = include $lang_path;
} else {
    $translations = include "../languages/fr/contribute/coachForm.php"; // Langue par défaut
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
    $errors['full_name'] = $translations['errors']['full_name'] ?? 'Full name is required.';
}
if (empty($address)) {
    $errors['address'] = $translations['errors']['address'] ?? 'Address is required.';
}
if (empty($phone)) {
    $errors['phone'] = $translations['errors']['phone'] ?? 'Phone number is required.';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = $translations['errors']['email'] ?? 'Invalid email address.';
}
if (empty($profile_photo) || $profile_photo['error'] !== UPLOAD_ERR_OK) {
    $errors['profile_photo'] = $translations['errors']['profile_photo'] ?? 'Profile photo is required.';
}
if (empty($current_position)) {
    $errors['current_position'] = $translations['errors']['current_position'] ?? 'Current position is required.';
}
if (empty($organization)) {
    $errors['organization'] = $translations['errors']['organization'] ?? 'Organization is required.';
}
if (empty($industry)) {
    $errors['industry'] = $translations['errors']['industry'] ?? 'Industry is required.';
}
if (empty($motivation)) {
    $errors['motivation'] = $translations['errors']['motivation'] ?? 'Motivation is required.';
}
if (empty($signatory_name)) {
    $errors['signatory_name'] = $translations['errors']['signatory_name'] ?? 'Signatory name is required.';
}
if (empty($signature_date)) {
    $errors['signature_date'] = $translations['errors']['signature_date'] ?? 'Signature date is required.';
}
if (empty($confirmation)) {
    $errors['confirmation'] = $translations['errors']['confirmation'] ?? 'You must certify that the information is accurate.';
}

// Validation des fichiers multiples
if (!empty($additional_docs['tmp_name'][0])) {
    foreach ($additional_docs['tmp_name'] as $key => $tmp_name) {
        if ($additional_docs['error'][$key] !== UPLOAD_ERR_OK) {
            $errors['additional_docs'][$key] = $translations['errors']['additional_docs'] ?? "Error uploading file: " . $additional_docs['name'][$key];
        }
    }
} else {
    $errors['additional_docs'] = $translations['errors']['additional_docs'] ?? 'Please attach at least one relevant document.';
}

// En cas d'erreurs
if (!empty($errors)) {
    $_SESSION['coach_form_errors'] = $errors;
    $_SESSION['coach_form_old'] = $_POST;
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

<h3>" . ($section_titles['personal_info'] ?? '1. Personal Information') . "</h3>
<strong>" . ($labels['full_name'] ?? 'Full Name') . " :</strong> $full_name<br>
<strong>" . ($labels['address'] ?? 'Address') . " :</strong> $address<br>
<strong>" . ($labels['phone'] ?? 'Phone Number') . " :</strong> $phone<br>
<strong>" . ($labels['email'] ?? 'Email Address') . " :</strong> $email<br><br>

<h3>" . ($section_titles['professional_info'] ?? '2. Professional Information') . "</h3>
<strong>" . ($labels['current_position'] ?? 'Current Position') . " :</strong> $current_position<br>
<strong>" . ($labels['organization'] ?? 'Organization') . " :</strong> $organization<br>
<strong>" . ($labels['industry'] ?? 'Industry') . " :</strong> $industry<br>
<strong>" . ($labels['linkedin'] ?? 'LinkedIn') . " :</strong> " . (!empty($linkedin) ? $linkedin : ($translations['defaults']['not_specified'] ?? 'Not specified')) . "<br><br>

<h3>" . ($section_titles['expertise_and_skills'] ?? '3. Areas of Expertise') . "</h3>
<strong>" . ($labels['expertise_label'] ?? 'Areas') . " :</strong> $expertise_list<br>
" . (!empty($other_expertise) ? "<strong>" . ($labels['other_expertise_label'] ?? 'Other') . " :</strong> $other_expertise<br>" : "") . "<br>

<h3>" . ($section_titles['motivation'] ?? '4. Motivation') . "</h3>
<strong>" . ($labels['motivation'] ?? 'Motivation') . " :</strong> $motivation<br>
<strong>" . ($translations['placeholders']['availability'] ?? 'Availability') . " :</strong> " . (!empty($availability) ? $availability : ($translations['defaults']['not_specified'] ?? 'Not specified')) . "<br><br>

<h3>" . ($section_titles['declaration_and_signature'] ?? '5. Declaration and Signature') . "</h3>
<strong>" . ($labels['signatory_name'] ?? 'Signatory Name') . " :</strong> $signatory_name<br>
<strong>" . ($translations['placeholders']['signature_date'] ?? 'Signature Date') . " :</strong> $signature_date<br>
";

// Envoi de l'email via PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.kxhealth.org';
    $mail->SMTPAuth = true;
    $mail->Username = 'coach@kxhealth.org';
    $mail->Password = 'C0@ch3r$'; // Remplacez par votre mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Informations d'expéditeur et de destinataire
    $mail->setFrom('coach@kxhealth.org', $translations['from_name'] ?? 'Kronik-X Health');
    $mail->addReplyTo('support@kxhealth.org', $translations['reply_to_name'] ?? 'Support Kronik-X Health');
    $mail->addAddress('support@kxhealth.org');
    $mail->addReplyTo($email, $full_name);

    // Contenu de l'email
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true);
    $mail->Subject = $translations['email_subject'] ?? 'New Coach Application';
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
    error_log("Error sending email: {$mail->ErrorInfo}");
    $_SESSION['mail_error'] = $translations['email_error'] ?? "An error occurred while sending the email.";
    header("Location: ../contribute?lang=" . htmlspecialchars($lang) . "#pills-coach");
    exit;
}
?>








