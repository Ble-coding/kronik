<?php
$pageTitle = $title_translations['contribute']['title'];
$pageDescription = $title_translations['contribute']['description'];
ob_start();
?>
<?php require __DIR__ . '/layouts/contribute/slide.php'; ?>

<?php require __DIR__ . '/layouts/contribute/contribute.php'; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/layouts/base.php';
