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
$lang_path = "../languages/{$lang}/contribute/mentorForm.php";

// Charger les traductions ou utiliser une langue par défaut
if (file_exists($lang_path)) {
    $translations = include $lang_path;
} else {
    $translations = include "../languages/fr/contribute/mentorForm.php"; // Langue par défaut
}

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

if (empty($expertise)) {
    $errors['expertise'] = $translations['errors']['expertise'] ?? 'Veuillez sélectionner un domaine d\'expertise.';
} elseif ($expertise === 'autre' && empty($other_expertise)) {
    $errors['other_expertise'] = $translations['errors']['other_expertise'] ?? 'Veuillez préciser votre expertise.';
}

if (empty($experience)) {
    $errors['experience'] = $translations['errors']['experience'] ?? 'Veuillez décrire votre expérience professionnelle.';
}

if (empty($motivation)) {
    $errors['motivation'] = $translations['errors']['motivation'] ?? 'Veuillez indiquer votre motivation.';
}

if (empty($signatory_name)) {
    $errors['signatory_name'] = $translations['errors']['signatory_name'] ?? 'Le nom du signataire est requis.';
}

if (empty($function)) {
    $errors['function'] = $translations['errors']['function'] ?? 'La fonction est requise.';
}

if (empty($date)) {
    $errors['date'] = $translations['errors']['date'] ?? 'La date est requise.';
}

if (empty($confirmation)) {
    $errors['confirmation'] = $translations['errors']['confirmation'] ?? 'Vous devez confirmer que les informations sont exactes.';
}

// Gestion des erreurs
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    error_log("Errors detected: " . print_r($errors, true));
    header("Location: ../contribute?lang=" . htmlspecialchars($lang) . "#pills-mentorat");
    exit;
}

// Construction du message de l'email
$labels = $translations['labels'] ?? [];
$section_titles = $translations['section_titles'] ?? [];

// Préparer la liste des contributions
$contribution_list = implode(", ", array_map(function ($value) use ($translations) {
    return $translations['contribution_options'][$value] ?? $value;
}, $contribution));

$title = $translations['title'] ?? 'Nouvelle candidature de mentor reçue';
$email_message = "
<h2>{$translations['title']}</h2>

<h3>" . ($section_titles['general_info'] ?? $translations['section_titles']['general_info']) . "</h3>
<strong>" . ($labels['full_name'] ?? $translations['placeholders']['full_name']) . " :</strong> $full_name<br>
<strong>" . ($labels['address'] ?? $translations['placeholders']['address']) . " :</strong> $address<br>
<strong>" . ($labels['phone'] ?? $translations['placeholders']['phone']) . " :</strong> $phone<br>
<strong>" . ($labels['email'] ?? $translations['placeholders']['email']) . " :</strong> $email<br>
<strong>" . ($labels['website'] ?? $translations['placeholders']['website']) . " :</strong> " . (!empty($website) ? $website : $translations['defaults']['not_specified']) . "<br><br>

<h3>" . ($section_titles['experience_and_skills'] ?? $translations['section_titles']['experience_and_skills']) . "</h3>
<strong>" . ($labels['expertise'] ?? $translations['placeholders']['expertise']) . " :</strong> $expertise<br>
" . (!empty($other_expertise) ? "<strong>" . ($labels['other'] ?? $translations['placeholders']['other_expertise']) . " :</strong> $other_expertise<br>" : "") . "
<strong>" . ($labels['experience'] ?? $translations['placeholders']['experience']) . " :</strong> $experience<br>
<strong>" . ($labels['projects'] ?? $translations['placeholders']['projects']) . " :</strong> " . (!empty($projects) ? $projects : $translations['defaults']['not_specified']) . "<br>
<strong>" . ($labels['certifications'] ?? $translations['placeholders']['certifications']) . " :</strong> " . (!empty($certifications) ? $certifications : $translations['defaults']['not_specified']) . "<br><br>

<h3>" . ($section_titles['motivations'] ?? $translations['section_titles']['motivations']) . "</h3>
<strong>" . ($labels['motivation'] ?? $translations['placeholders']['motivation']) . " :</strong> $motivation<br>
<strong>" . ($labels['contribution'] ?? $translations['placeholders']['contribution']) . " :</strong> $contribution_list<br>
" . (!empty($other_contribution) ? "<strong>" . ($labels['other'] ?? $translations['placeholders']['other_contribution']) . " :</strong> $other_contribution<br>" : "") . "<br>

<h3>" . ($section_titles['declaration_and_signature'] ?? $translations['section_titles']['declaration_and_signature']) . "</h3>
<strong>" . ($labels['signatory_name'] ?? $translations['placeholders']['signatory_name']) . " :</strong> $signatory_name<br>
<strong>" . ($labels['function'] ?? $translations['placeholders']['function']) . " :</strong> $function<br>
<strong>" . ($labels['date'] ?? $translations['placeholders']['date']) . " :</strong> $date<br>
";

// Envoi de l'email via PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'levisble@gmail.com';
    $mail->Password = ''; // Utilisez un mot de passe d'application
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
    $mail->Subject = $translations['email_subject'] ?? 'Nouvelle candidature de mentor';
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

    // Envoi de l'email
    $mail->send();
    header("location: ../mail-success?lang=" . htmlspecialchars($lang));
    exit;
} catch (Exception $e) {
    error_log("Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}");
    $_SESSION['mail_error'] = $translations['errors']['email_error'] ?? "Une erreur est survenue lors de l'envoi de l'email.";
    header("Location: ../contribute?lang=" . htmlspecialchars($lang) . "#pills-mentorat");
    exit;
}
