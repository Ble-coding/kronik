
<?php
$pageTitle = $title_translations['home']['title'];
$pageDescription = $title_translations['home']['description'];
ob_start();
?>

<!-- Section Slide (Bannière d'accueil) -->
<?php require __DIR__ . '/layouts/home/slide.php'; ?>

<!-- Section About -->
<?php require __DIR__ . '/layouts/home/about.php'; ?>

<!-- Section Formation -->
<?php require __DIR__ . '/layouts/home/formation.php'; ?>

<!-- Section LMICs -->
<?php require __DIR__ . '/layouts/home/lmics.php'; ?>

<!-- Section Programmes -->
<?php require __DIR__ . '/layouts/home/programmes.php'; ?>

<!-- Section Statistiques -->
<?php require __DIR__ . '/layouts/home/stat.php'; ?>

<!-- Section Galerie -->
<?php require __DIR__ . '/layouts/home/gallery.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
