<?php
$pageTitle = $title_translations['program']['title'];
$pageDescription = $title_translations['program']['description'];
ob_start();
?>
<!-- Section Slide (Bannière des programmes) -->
<?php require __DIR__ . '/layouts/program/slide.php'; ?>

<!-- Section Programmes -->
<?php require __DIR__ . '/layouts/program/program.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
