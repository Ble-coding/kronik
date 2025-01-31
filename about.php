<?php
$pageTitle = $title_translations['about']['title'];
$pageDescription = $title_translations['about']['description'];
ob_start();
?>


<!-- Section Slide -->
<?php require __DIR__ . '/layouts/about/slide.php'; ?>

<!-- Section About -->
<?php require __DIR__ . '/layouts/about/about.php'; ?>

<!-- Section Partner -->
<?php require __DIR__ . '/layouts/about/partner.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
