
<?php
$pageTitle = $title_translations['faq']['title'];
$pageDescription = $title_translations['faq']['description'];
ob_start();
?>
<!-- Section Slide (Bannière FAQ) -->
<?php require __DIR__ . '/layouts/faq/slide.php'; ?>

<!-- Section FAQ (Questions fréquentes) -->
<?php require __DIR__ . '/layouts/faq/faq.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
