<?php
$pageTitle = 'Termes et Conditions - Kronik-X Health'; // Titre spécifique pour la page des termes et conditions
ob_start(); // Capture le contenu de la page
?>

<!-- Section Slide (Bannière des termes et conditions) -->
<?php require __DIR__ . '/layouts/terms/slide.php'; ?>

<!-- Section Termes et Conditions -->
<?php require __DIR__ . '/layouts/terms/terms.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
