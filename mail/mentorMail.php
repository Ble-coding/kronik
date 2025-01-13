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

if (!isset($_SESSION)) {
    session_start();
}

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

// Si aucune erreur, continuer avec le traitement

// Construction du message de l'email
$labels = $translations['labels'] ?? [];
$section_titles = $translations['section_titles'] ?? [];

// Préparer la liste des contributions
$contribution_list = implode(", ", array_map(function ($value) use ($translations) {
    return $translations['contribution_options'][$value] ?? $value;
}, $contribution));
$title = isset($translations['title']) ? $translations['title'] : 'Nouvelle candidature de mentor reçue';
// Construire le message de l'email
$email_message = "
<h2>{$title}</h2>
<h3>" . ($section_titles['personal_info'] ?? '1. Informations Générales') . "</h3>
<strong>" . ($labels['full_name'] ?? 'Nom complet') . " :</strong> $full_name<br>
<strong>" . ($labels['address'] ?? 'Adresse') . " :</strong> $address<br>
<strong>" . ($labels['phone'] ?? 'Numéro de téléphone') . " :</strong> $phone<br>
<strong>" . ($labels['email'] ?? 'Adresse e-mail') . " :</strong> $email<br>
<strong>" . ($labels['website'] ?? 'Site web ou LinkedIn') . " :</strong> " . (!empty($website) ? $website : ($translations['defaults']['not_specified'] ?? 'Non spécifié')) . "<br><br>

<h3>" . ($section_titles['experience_and_skills'] ?? '2. Expérience et Compétences') . "</h3>
<strong>" . ($labels['expertise_label'] ?? 'Domaines d\'expertise') . " :</strong> $expertise<br>
" . (!empty($other_expertise) ? "<strong>" . ($labels['other_expertise_label'] ?? 'Autres domaines') . " :</strong> $other_expertise<br>" : "") . "
<strong>" . ($labels['experience'] ?? 'Expérience professionnelle') . " :</strong> $experience<br>
<strong>" . ($labels['projects'] ?? 'Projets ou startups accompagnés') . " :</strong> " . (!empty($projects) ? $projects : ($translations['defaults']['not_specified'] ?? 'Non spécifié')) . "<br>
<strong>" . ($labels['certifications'] ?? 'Certifications') . " :</strong> " . (!empty($certifications) ? $certifications : ($translations['defaults']['not_specified'] ?? 'Non spécifié')) . "<br><br>

<h3>" . ($section_titles['motivation'] ?? '3. Motivations') . "</h3>
<strong>" . ($labels['motivation'] ?? 'Motivation') . " :</strong> $motivation<br>
<strong>" . ($labels['contribution'] ?? 'Contribution prévue') . " :</strong> $contribution_list<br>
" . (!empty($other_contribution) ? "<strong>" . ($labels['other_contribution'] ?? 'Autres contributions') . " :</strong> $other_contribution<br>" : "") . "<br>

<h3>" . ($section_titles['declaration_and_signature'] ?? '4. Déclaration et Signature') . "</h3>
<strong>" . ($labels['signatory_name'] ?? 'Nom du signataire') . " :</strong> $signatory_name<br>
<strong>" . ($labels['function'] ?? 'Fonction') . " :</strong> $function<br>
<strong>" . ($labels['date'] ?? 'Date') . " :</strong> $date<br>
";

// Envoi de l'email via PHPMailer
$mail = new PHPMailer(true);
 
try {
    // Configuration SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.kxhealth.org';
    $mail->SMTPAuth = true;
    $mail->Username = 'mentor@kxhealth.org';
    $mail->Password = 'IF6HntCi?.vn'; // Utilisez un mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('mentor@kxhealth.org', 'Kronik-X Health');
    $mail->addReplyTo('support@kxhealth.org', 'Support Kronik-X Health');
    $mail->addAddress('support@kxhealth.org');
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
  
