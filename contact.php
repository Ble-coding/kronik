
<?php
$pageTitle = $title_translations['contact']['title'];
$pageDescription = $title_translations['contact']['description'];
ob_start();
?>

<?php require __DIR__ . '/layouts/contact/slide.php'; ?>

<?php require __DIR__ . '/layouts/contact/contact.php'; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layouts/base.php';
