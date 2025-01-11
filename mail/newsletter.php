<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// ✅ Charger les traductions selon la langue active
$default_language = 'fr';
$lang = $_SESSION['lang'] ?? $default_language;
$lang_path = __DIR__ . "/../languages/{$lang}/footer.php";

if (file_exists($lang_path)) {
    $footer_translations = include $lang_path;
} else {
    $footer_translations = include __DIR__ . "/../languages/{$default_language}/footer.php";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ✅ Vérification du token CSRF
    if (!isset($_POST['csrf_token'], $_SESSION['csrf_token']) || 
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $_SESSION['newsletter_error'] = $footer_translations['security_error'];
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '#newsletter');
        exit;
    }

    $email = trim($_POST['email'] ?? '');

    // ✅ Vérification de la validité de l'email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . '/../subscribers.csv';

        // ✅ Vérifier si l'email est déjà inscrit
        $existingEmails = [];
        if (file_exists($file)) {
            $existingEmails = array_map('str_getcsv', file($file));
            $existingEmails = array_column($existingEmails, 0); // Récupérer les emails
        }

        if (!in_array($email, $existingEmails)) {
            // ✅ Ajouter l'email avec la date dans le fichier CSV
            $handle = fopen($file, 'a');
            if ($handle) {
                fputcsv($handle, [$email, date('Y-m-d H:i:s')]);
                fclose($handle);
                $_SESSION['newsletter_success'] = $footer_translations['success_message'];
            } else {
                $_SESSION['newsletter_error'] = "❌ Erreur lors de l'enregistrement. Veuillez réessayer.";
            }
        } else {
            $_SESSION['newsletter_error'] = $footer_translations['already_subscribed'];
        }
    } else {
        $_SESSION['newsletter_error'] = $footer_translations['invalid_email'];
    }

    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?lang=' . htmlspecialchars($lang) . '#newsletter');
    exit;
}
