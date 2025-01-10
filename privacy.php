<?php
$pageTitle = 'Politique de Confidentialité - Kronik-X Health'; // Titre spécifique pour la page
ob_start(); // Capture le contenu de la page
?>

<!-- Section Slide (Bannière de confidentialité) -->
<?php require __DIR__ . '/layouts/privacy/slide.php'; ?>

<!-- Section Politique de Confidentialité -->
<?php require __DIR__ . '/layouts/privacy/privacy.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
