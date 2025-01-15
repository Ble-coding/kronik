
<?php
$pageTitle = $title_translations['team']['title'];
$pageDescription = $title_translations['team']['description'];
ob_start();
?>
<!-- Section Slide (Bannière Team) -->
<?php require __DIR__ . '/layouts/team/slide.php'; ?>

<!-- Section Team (Questions fréquentes) -->
<?php require __DIR__ . '/layouts/team/team.php'; ?>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
