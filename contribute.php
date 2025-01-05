<?php
$pageTitle = 'Contribuer - Kronik-X Health';
ob_start(); // Capture le contenu pour l'injecter dans le layout
?>

<?php require __DIR__ . '/layouts/contribute/slide.php'; ?>

<?php require __DIR__ . '/layouts/contribute/contribute.php'; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layouts/base.php';
