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
$lang_path = "../languages/{$lang}/contact/contact.php";

// Charger les traductions ou utiliser une langue par défaut
if (file_exists($lang_path)) {
    $translations = include $lang_path;
} else {
    $translations = include "../languages/fr/contact/contact.php"; // Langue par défaut
}

// Initialiser un tableau pour les erreurs
$errors = [];

// Récupération des données du formulaire et validation
$name = htmlspecialchars(isset($_POST['user']) ? $_POST['user'] : '');
$email = htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : '');
$phone = htmlspecialchars(isset($_POST['phone']) ? $_POST['phone'] : '');
$subject = htmlspecialchars(isset($_POST['note']) ? $_POST['note'] : (isset($translations['defaults']['subject']) ? $translations['defaults']['subject'] : 'Objet non spécifié'));
$message = htmlspecialchars(isset($_POST['message']) ? $_POST['message'] : '');

// Vérification des champs obligatoires
if (empty($name)) {
    $errors['user'] = isset($translations['errors']['user']) ? $translations['errors']['user'] : 'Veuillez entrer votre nom.';
}
if (empty($email)) {
    $errors['email'] = isset($translations['errors']['email_required']) ? $translations['errors']['email_required'] : 'Veuillez entrer une adresse e-mail.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = isset($translations['errors']['email_invalid']) ? $translations['errors']['email_invalid'] : 'Adresse e-mail invalide.';
}
if (empty($phone)) {
    $errors['phone'] = isset($translations['errors']['phone']) ? $translations['errors']['phone'] : 'Veuillez entrer votre numéro de téléphone.';
}
if (empty($message)) {
    $errors['message'] = isset($translations['errors']['message']) ? $translations['errors']['message'] : 'Veuillez entrer votre message.';
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("location: ../contact?lang=" . htmlspecialchars($lang));
    exit;
}

// Charger les traductions des libellés
$labels = isset($translations['labels']) ? $translations['labels'] : [];

// Construire le message de l'email
$email_message = "
<strong>" . (isset($labels['name']) ? $labels['name'] : 'Nom') . " :</strong> $name<br>
<strong>" . (isset($labels['email']) ? $labels['email'] : 'Email') . " :</strong> $email<br>
<strong>" . (isset($labels['phone']) ? $labels['phone'] : 'Téléphone') . " :</strong> $phone<br>
<strong>" . (isset($labels['subject']) ? $labels['subject'] : 'Objet') . " :</strong> $subject<br><br>
<strong>" . (isset($labels['message']) ? $labels['message'] : 'Message') . " :</strong><br>$message
";

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'kxhealth.org';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@kxhealth.org';
    $mail->Password = '4d+5A98raIEh'; // Mot de passe Gmail ou mot de passe d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Utilisation de SSL/TLS
    $mail->Port       = 465;     

    $mail->setFrom('info@kxhealth.org', (isset($translations['from_name']) ? $translations['from_name'] : 'Kronik-X Health'));
    $mail->addReplyTo('support@kxhealth.org', (isset($translations['reply_to_name']) ? $translations['reply_to_name'] : 'Support Kronik-X Health'));
    $mail->addAddress('support@kxhealth.org');
    $mail->addReplyTo($email, $name);

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true);
    $mail->Subject = isset($translations['email_subject']) ? $translations['email_subject'] : 'Nouvelle demande de contact';
    $mail->Body = nl2br($email_message);
    $mail->AltBody = strip_tags($email_message);

    $mail->send();
    header("location: ../mail-success?lang=" . htmlspecialchars($lang));
    exit;
} catch (Exception $e) {
    $_SESSION['mail_error'] = $mail->ErrorInfo;
    header("location: ../contact?lang=" . htmlspecialchars($lang));
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