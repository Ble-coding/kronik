<?php
$pageTitle = 'Contactez-nous - Kronik-X Health';
ob_start(); // Capture le contenu pour l'injecter dans le layout
?>

<?php require __DIR__ . '/layouts/contact/slide.php'; ?>

<?php require __DIR__ . '/layouts/contact/contact.php'; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layouts/base.php';
