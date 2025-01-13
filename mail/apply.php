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
$lang_path = "../languages/{$lang}/program/form.php";

// Charger les traductions ou utiliser une langue par défaut
if (file_exists($lang_path)) {
    $translations = include $lang_path;
} else {
    $translations = include "../languages/fr/program/form.php"; // Langue par défaut
}

$errors = [];

// Récupération et validation des données du formulaire
$project_name = htmlspecialchars($_POST['project_name'] ?? '');
$technologies = htmlspecialchars($_POST['technologies'] ?? '');
$other_technology = htmlspecialchars($_POST['other_technology'] ?? '');
$project_summary = htmlspecialchars($_POST['project_summary'] ?? '');
$problem = htmlspecialchars($_POST['problem'] ?? '');
$solution = htmlspecialchars($_POST['solution'] ?? '');
$current_stage = htmlspecialchars($_POST['current_stage'] ?? '');
$team_lead = htmlspecialchars($_POST['team_lead'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$phone = htmlspecialchars($_POST['phone'] ?? '');
$organization = htmlspecialchars($_POST['organization'] ?? '');
$team_presentation = htmlspecialchars($_POST['team_presentation'] ?? '');
$impact = htmlspecialchars($_POST['impact'] ?? '');
$target_audience = htmlspecialchars($_POST['target_audience'] ?? '');
$business_model = htmlspecialchars($_POST['business_model'] ?? '');
$partners = htmlspecialchars($_POST['partners'] ?? '');
$resources = htmlspecialchars($_POST['resources'] ?? '');
$prototype_demo = htmlspecialchars($_POST['prototype_demo'] ?? '');
$project_presentation = $_FILES['project_presentation'] ?? null;
$cv_files = $_FILES['cv_files'] ?? null;
$additional_documents = $_FILES['additional_documents'] ?? null;
$consent = $_POST['consent'] ?? '';

// Validation des champs obligatoires
if (empty($project_name)) $errors['project_name'] = $translations['errors']['project_name'] ?? "Le nom du projet est requis.";
if (empty($technologies)) $errors['technologies'] = $translations['errors']['technologies'] ?? "Veuillez sélectionner une technologie utilisée.";
if ($technologies === 'autre' && empty($other_technology)) $errors['other_technology'] = $translations['errors']['other_technology'] ?? "Veuillez préciser les autres technologies.";
if (empty($project_summary)) $errors['project_summary'] = $translations['errors']['project_summary'] ?? "Le résumé du projet est requis.";
if (empty($problem)) $errors['problem'] = $translations['errors']['problem'] ?? "Veuillez décrire la problématique.";
if (empty($solution)) $errors['solution'] = $translations['errors']['solution'] ?? "Veuillez proposer une solution.";
if (empty($current_stage)) $errors['current_stage'] = $translations['errors']['current_stage'] ?? "Veuillez indiquer le stade actuel du projet.";
if (empty($team_lead)) $errors['team_lead'] = $translations['errors']['team_lead'] ?? "Le nom du porteur de projet est requis.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = $translations['errors']['email'] ?? "Adresse e-mail invalide.";
if (empty($phone)) $errors['phone'] = $translations['errors']['phone'] ?? "Veuillez entrer un numéro de téléphone.";
if (empty($team_presentation)) $errors['team_presentation'] = $translations['errors']['team_presentation'] ?? "Veuillez décrire votre équipe.";
if (empty($impact)) $errors['impact'] = $translations['errors']['impact'] ?? "Veuillez indiquer l’impact attendu.";
if (empty($target_audience)) $errors['target_audience'] = $translations['errors']['target_audience'] ?? "Veuillez indiquer le public cible.";
if (empty($business_model)) $errors['business_model'] = $translations['errors']['business_model'] ?? "Veuillez décrire le modèle économique.";
if (!empty($prototype_demo) && !filter_var($prototype_demo, FILTER_VALIDATE_URL)) {
    $errors['prototype_demo'] = $translations['errors']['prototype_demo'] ?? "Le lien du prototype/démo est invalide.";
}
if (empty($consent)) $errors['consent'] = $translations['errors']['consent'] ?? "Veuillez accepter les termes et conditions.";

// Validation des fichiers téléversés
if (!empty($project_presentation) && $project_presentation['error'] !== UPLOAD_ERR_OK) {
    $errors['project_presentation'] = $translations['errors']['project_presentation'] ?? "Erreur lors du téléversement de la présentation.";
}

if (!empty($cv_files['tmp_name'][0])) {
    foreach ($cv_files['error'] as $key => $error) {
        if ($error !== UPLOAD_ERR_OK) {
            $errors['cv_files'][$key] = $translations['errors']['cv_files'] ?? "Erreur lors du téléversement d'un fichier CV.";
        }
    }
}

if (!empty($additional_documents['tmp_name'][0])) {
    foreach ($additional_documents['error'] as $key => $error) {
        if ($error !== UPLOAD_ERR_OK) {
            $errors['additional_documents'][$key] = $translations['errors']['additional_documents'] ?? "Erreur lors du téléversement d'un document supplémentaire.";
        }
    }
}

// Gestion des erreurs
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("location: ../programs?lang=" . htmlspecialchars($lang));
    exit;
}

// Charger les libellés traduits
$labels = $translations['labels'] ?? [];
$section_titles = $translations['section_titles'] ?? [];
$placeholders = $translations['placeholders'] ?? [];
$defaults = $translations['defaults'] ?? [];

// Construction du message de l'email
$email_message = "
<h2>{$translations['title']}</h2>

<h3>" . ($section_titles['project_info'] ?? '1. Informations Générales sur le Projet') . "</h3>
<strong>" . ($placeholders['project_name'] ?? 'Nom du projet') . " :</strong> $project_name<br>
<strong>" . ($placeholders['technologies'] ?? 'Technologies utilisées') . " :</strong> $technologies<br>
" . (!empty($other_technology) ? "<strong>" . ($placeholders['other_technology'] ?? 'Autres technologies') . " :</strong> $other_technology<br>" : "") . "
<strong>" . ($placeholders['project_summary'] ?? 'Résumé') . " :</strong> $project_summary<br>
<strong>" . ($placeholders['problem'] ?? 'Problématique ciblée') . " :</strong> $problem<br>
<strong>" . ($placeholders['solution'] ?? 'Solution proposée') . " :</strong> $solution<br>
<strong>" . ($placeholders['current_stage'] ?? 'Stade actuel') . " :</strong> $current_stage<br><br>

<h3>" . ($section_titles['team_info'] ?? '2. Informations sur l’Équipe') . "</h3>
<strong>" . ($placeholders['team_lead'] ?? 'Nom du porteur de projet') . " :</strong> $team_lead<br>
<strong>" . ($placeholders['email'] ?? 'Adresse e-mail') . " :</strong> $email<br>
<strong>" . ($placeholders['phone'] ?? 'Numéro de téléphone') . " :</strong> $phone<br>
<strong>" . ($placeholders['organization'] ?? 'Organisation') . " :</strong> $organization<br>
<strong>" . ($placeholders['team_presentation'] ?? 'Présentation de l\'équipe') . " :</strong> $team_presentation<br><br>

<h3>" . ($section_titles['impact_and_business_model'] ?? '3. Impact et Modèle Économique') . "</h3>
<strong>" . ($placeholders['impact'] ?? 'Impact attendu') . " :</strong> $impact<br>
<strong>" . ($placeholders['target_audience'] ?? 'Public cible') . " :</strong> $target_audience<br>
<strong>" . ($placeholders['business_model'] ?? 'Modèle économique') . " :</strong> $business_model<br><br>

<h3>" . ($section_titles['partnerships_and_resources'] ?? '4. Partenariats et Ressources') . "</h3>
<strong>" . ($placeholders['partners'] ?? 'Partenaires actuels') . " :</strong> $partners<br>
<strong>" . ($placeholders['resources'] ?? 'Ressources nécessaires') . " :</strong> $resources<br><br>

<h3>" . ($section_titles['additional_documents'] ?? '5. Prototype et Documents Complémentaires') . "</h3>
<strong>" . ($placeholders['prototype_demo'] ?? 'Prototype ou démo') . " :</strong> " . (!empty($prototype_demo) ? $prototype_demo : ($defaults['not_specified'] ?? 'Non spécifié')) . "<br>
";

// Ajouter les documents joints à l'email
if (!empty($_FILES['project_presentation']['tmp_name'])) {
    $email_message .= "<strong>" . ($labels['project_presentation'] ?? 'Présentation détaillée') . " :</strong> " . $_FILES['project_presentation']['name'] . "<br>";
}

if (!empty($_FILES['cv_files']['tmp_name'][0])) {
    $email_message .= "<strong>" . ($labels['cv_upload'] ?? 'CV joints') . " :</strong> " . implode(', ', $_FILES['cv_files']['name']) . "<br>";
}

if (!empty($_FILES['additional_documents']['tmp_name'][0])) {
    $email_message .= "<strong>" . ($labels['additional_documents'] ?? 'Autres documents') . " :</strong> " . implode(', ', $_FILES['additional_documents']['name']) . "<br>";
}

// Ajouter un message de consentement
$email_message .= "<h3>" . ($section_titles['consent'] ?? '6. Consentement') . "</h3>
<strong>" . ($labels['consent'] ?? 'Consentement') . " :</strong> " . (!empty($consent) ? $translations['confirmation_accepted'] ?? 'Accepté' : $translations['confirmation_declined'] ?? 'Non accepté') . "<br>
";



$mail = new PHPMailer(true);

try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.kxhealth.org';
    $mail->SMTPAuth = true;
    $mail->Username = '...@kxhealth.org';
    $mail->Password = ''; // Utilisez un mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Expéditeur et destinataire
    $mail->setFrom('...@kxhealth.org', 'Kronik-X Health');
    $mail->addReplyTo('support@kxhealth.org', 'Support Kronik-X Health');
    $mail->addAddress('support@kxhealth.org');
    $mail->addReplyTo($email, $name);

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true);
    $mail->Subject = $translations['email_subject'] ?? 'Nouvelle candidature Kronik-X Health';
    $mail->Body = $email_message;

 // Pièces jointes
 if (isset($_FILES['cv_files']) && count($_FILES['cv_files']['name']) > 0) {
    foreach ($_FILES['cv_files']['tmp_name'] as $i => $tmp_name) {
        if (is_uploaded_file($tmp_name)) {
            $mail->addAttachment($tmp_name, $_FILES['cv_files']['name'][$i]);
        }
    }
}

if (!empty($_FILES['project_presentation']['tmp_name'])) {
    $mail->addAttachment($_FILES['project_presentation']['tmp_name'], $_FILES['project_presentation']['name']);
}

if (isset($_FILES['additional_documents'])) {
    foreach ($_FILES['additional_documents']['tmp_name'] as $index => $tmp_name) {
        if (is_uploaded_file($tmp_name)) {
            $mail->addAttachment($tmp_name, $_FILES['additional_documents']['name'][$index]);
        }
    }
}


    $mail->send();
    header("location: ../mail-success");
    exit;
} catch (Exception $e) {
    error_log("Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}");
    $_SESSION['mail_error'] = "Une erreur est survenue lors de l'envoi de l'email.";
    header("location: ../programs");
    exit;
}
?>
