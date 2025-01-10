<?php
$pageTitle = 'À propos de nous - Kronik-X Health'; // Titre de la page
ob_start(); // Commence la capture de contenu
?>

<!-- Section Slide -->
<?php require __DIR__ . '/layouts/about/slide.php'; ?>

<!-- Section About -->
<?php require __DIR__ . '/layouts/about/about.php'; ?>

<!-- Section Team -->
<?php require __DIR__ . '/layouts/about/team.php'; ?>

<!-- Section Partner -->
<?php require __DIR__ . '/layouts/about/partner.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
