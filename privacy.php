<?php
$pageTitle = $title_translations['privacy']['title'];
$pageDescription = $title_translations['privacy']['description'];
ob_start();
?>

<!-- Section Slide (Bannière de confidentialité) -->
<?php require __DIR__ . '/layouts/privacy/slide.php'; ?>

<!-- Section Politique de Confidentialité -->
<?php require __DIR__ . '/layouts/privacy/privacy.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
