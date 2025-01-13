<?php
// Charger la langue définie ou utiliser "en" par défaut
$lang = $_SESSION['lang'] ?? 'en';
$lang_path = __DIR__ . "/languages/{$lang}/program/program.php";

// Vérifier si le fichier existe
if (file_exists($lang_path)) {
    $title_translations = include $lang_path;
} else {
    die("Erreur : Fichier de traduction introuvable pour la langue '{$lang}'.");
}

// Accéder aux clés avec des valeurs par défaut pour éviter les erreurs
$pageTitle = $title_translations['program']['title'] ?? 'Default Title';
$pageDescription = $title_translations['program']['description'] ?? 'Default Description';

ob_start();
?>

<!-- Section Slide (Bannière des programmes) -->
<?php require __DIR__ . '/layouts/program/slide.php'; ?>

<!-- Section Programmes -->
<?php require __DIR__ . '/layouts/program/program.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
