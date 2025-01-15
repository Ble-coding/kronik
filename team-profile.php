<?php
$pageTitle = $title_translations['profile']['title'];
$pageDescription = $title_translations['profile']['description'];
ob_start();
?>
<!-- Section Slide (Bannière Profile) -->
<?php require __DIR__ . '/layouts/profile/slide.php'; ?>

<!-- Section Profile (Questions fréquentes) -->
<?php require __DIR__ . '/layouts/profile/profile.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
 