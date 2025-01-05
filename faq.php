<?php
$pageTitle = 'FAQ - Kronik-X Health'; // Titre spécifique pour la page FAQ
ob_start(); // Capture le contenu de la page
?>

<!-- Section Slide (Bannière FAQ) -->
<?php require __DIR__ . '/layouts/faq/slide.php'; ?>

<!-- Section FAQ (Questions fréquentes) -->
<?php require __DIR__ . '/layouts/faq/faq.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
