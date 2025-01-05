<?php
$pageTitle = 'LMICs : Transformer la Santé dans les Pays à Revenu Faible et Intermédiaire - Kronik-X Health'; // Titre de la page
ob_start(); // Commence la capture de contenu
?>

<!-- Section Slide -->
<?php require __DIR__ . '/layouts/lmic/slide.php'; ?>

<!-- Section About -->
<?php require __DIR__ . '/layouts/lmic/lmic.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
