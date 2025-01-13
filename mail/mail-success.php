<?php
// Charger la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Définir la langue par défaut
$lang = $_SESSION['lang'] ?? 'fr';
$langPath = __DIR__ . "/../languages/{$lang}/mail/mail.php";

// Charger les traductions
if (file_exists($langPath)) {
    $translations = include $langPath;
} else {
    die("Erreur : Le fichier de langue n'existe pas à l'emplacement {$langPath}");
}

// Vérifier que les traductions sont valides
if (!is_array($translations)) {
    $translations = [];
}

// Récupérer les textes avec des valeurs par défaut
$pageTitle = htmlspecialchars($translations['success']['title'] ?? 'Titre par défaut');
$pageDescription = htmlspecialchars($translations['success']['description'] ?? 'Description par défaut');
$heading = htmlspecialchars($translations['success']['message'] ?? 'Message par défaut');
$details = htmlspecialchars($translations['success']['details'] ?? 'Détails par défaut');
$buttonText = htmlspecialchars($translations['success']['button'] ?? 'Retour à l’accueil');

// Générer le contenu HTML
ob_start();
?>

<section class="position-relative overflow-hidden box-latest-blog-3 box-latest-blog-12">
    <div class="container">
        <div class="text-center">
            <h3 class="heading-inter-44 primary-500 mb-4"><?= $heading ?></h3>
            <p class="mb-4"><?= $details ?></p>
            <a href="/" class="btn btn-primary-home btn-inter"><?= $buttonText ?></a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/base.php';
?>
