<?php

require __DIR__ . '/../vendor/autoload.php'; // Charger PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $_SESSION['newsletter_error'] = $footer_translations['security_error'] ?? "❌ Erreur de sécurité. Veuillez réessayer.";
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '#newsletter');
        exit;
    }

    $email = trim($_POST['email'] ?? '');

    // ✅ Vérification de l'email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . '/../subscribers.xlsx';

        // ✅ Créer un nouveau fichier Excel ou ouvrir l'existant
        if (file_exists($file)) {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
        } else {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            // ✅ Ajouter un en-tête clair
            $sheet->setCellValue('A1', 'Email');
            $sheet->setCellValue('B1', 'Date d\'inscription');
        }

        $emails = $sheet->rangeToArray('A2:A' . $sheet->getHighestRow(), null, true, true, true);
        $existingEmails = array_column($emails, 'A');

        if (!in_array($email, $existingEmails)) {
            // ✅ Ajouter les nouvelles données
            $nextRow = $sheet->getHighestRow() + 1;
            $sheet->setCellValue('A' . $nextRow, $email);
            $sheet->setCellValue('B' . $nextRow, date('Y-m-d H:i:s'));

            // ✅ Enregistrer le fichier Excel
            $writer = new Xlsx($spreadsheet);
            $writer->save($file);

            $_SESSION['newsletter_success'] = $footer_translations['success_message'] ?? "✅ Vous êtes inscrit à la newsletter.";
        } else {
            $_SESSION['newsletter_error'] = $footer_translations['already_subscribed'] ?? "⚠️ Cet email est déjà inscrit.";
        }
    } else {
        $_SESSION['newsletter_error'] = $footer_translations['invalid_email'] ?? "❌ Veuillez entrer une adresse e-mail valide.";
    }

    // ✅ Redirection vers la section newsletter après soumission
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '#newsletter');
    exit;
}
?>
