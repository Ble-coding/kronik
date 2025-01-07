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
$consent = $_POST['consent'] ?? '';

// Validation des champs obligatoires
if (empty($project_name)) $errors['project_name'] = "Le nom du projet est requis.";
if (empty($technologies)) $errors['technologies'] = "Veuillez sélectionner une technologie utilisée.";
if ($technologies === 'autre' && empty($other_technology)) $errors['other_technology'] = "Veuillez préciser les autres technologies.";
if (empty($project_summary)) $errors['project_summary'] = "Le résumé du projet est requis.";
if (empty($problem)) $errors['problem'] = "Veuillez décrire la problématique.";
if (empty($solution)) $errors['solution'] = "Veuillez proposer une solution.";
if (empty($current_stage)) $errors['current_stage'] = "Veuillez indiquer le stade actuel du projet.";
if (empty($team_lead)) $errors['team_lead'] = "Le nom du porteur de projet est requis.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Adresse e-mail invalide.";
if (empty($phone)) $errors['phone'] = "Veuillez entrer un numéro de téléphone.";
if (empty($team_presentation)) $errors['team_presentation'] = "Veuillez décrire votre équipe.";
if (empty($impact)) $errors['impact'] = "Veuillez indiquer l’impact attendu.";
if (empty($target_audience)) $errors['target_audience'] = "Veuillez indiquer le public cible.";
if (empty($business_model)) $errors['business_model'] = "Veuillez décrire le modèle économique.";
if (empty($consent)) $errors['consent'] = "Veuillez accepter les termes et conditions.";

// Gérer les erreurs
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("location: ../program.php");
    exit;
}


// Construction de l'email
$email_message = "
<h2>Nouvelle candidature reçue</h2>

<h3>1. Informations Générales sur le Projet</h3>
<strong>Nom du projet :</strong><br>$project_name<br><br>
<strong>Technologies utilisées :</strong><br>$technologies<br>
" . (!empty($other_technology) ? "<strong>Autres technologies :</strong><br>$other_technology<br>" : "") . "
<strong>Résumé :</strong><br>$project_summary<br><br>
<strong>Problématique ciblée :</strong><br>$problem<br><br>
<strong>Solution proposée :</strong><br>$solution<br><br>
<strong>Stade actuel :</strong><br>$current_stage<br><br>

<h3>2. Informations sur l’Équipe</h3>
<strong>Nom du porteur :</strong><br>$team_lead<br><br>
<strong>Email :</strong><br>$email<br><br>
<strong>Téléphone :</strong><br>$phone<br><br>
<strong>Organisation :</strong><br>$organization<br><br>
<strong>Présentation de l'équipe :</strong><br>$team_presentation<br><br>

<h3>3. Impact et Modèle Économique</h3>
<strong>Impact attendu :</strong><br>$impact<br><br>
<strong>Public cible :</strong><br>$target_audience<br><br>
<strong>Modèle économique :</strong><br>$business_model<br><br>

<h3>4. Partenariats et Ressources</h3>
<strong>Partenaires actuels :</strong><br>$partners<br><br>
<strong>Ressources nécessaires :</strong><br>$resources<br><br>

<h3>5. Prototype et Documents Complémentaires</h3>
<strong>Prototype ou démo :</strong><br>" . (!empty($prototype_demo) ? $prototype_demo : "Non spécifié") . "<br><br>

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

    // Expéditeur et destinataire
    $mail->setFrom('levisble@gmail.com', 'Kronik-X Health');
    $mail->addReplyTo('levisble@gmail.com', 'Support Kronik-X Health');
    $mail->addAddress('levisble@gmail.com');
    $mail->addReplyTo($email, $name);

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->isHTML(true);
    $mail->Subject = 'Nouvelle candidature Kronik-X Health';
    $mail->Body = $email_message;

    // Pièces jointes
    if (isset($_FILES['cv_files']) && count($_FILES['cv_files']['name']) > 0) {
        for ($i = 0; $i < count($_FILES['cv_files']['name']); $i++) {
            $tmp_name = $_FILES['cv_files']['tmp_name'][$i];
            $name = $_FILES['cv_files']['name'][$i];
            if (is_uploaded_file($tmp_name)) {
                $mail->addAttachment($tmp_name, $name);
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
    header("location: ../program");
    exit;
}
?>
