<?php
$pageTitle = $title_translations['lmic']['title'];
$pageDescription = $title_translations['lmic']['description'];
ob_start();
?>
<!-- Section Slide -->
<?php require __DIR__ . '/layouts/lmic/slide.php'; ?>

<!-- Section About -->
<?php require __DIR__ . '/layouts/lmic/lmic.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
