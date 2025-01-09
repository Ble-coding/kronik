<?php
$lang = $_SESSION['lang'] ?? 'fr'; // Récupérer la langue actuelle
$translations = include __DIR__ . "./../languages/{$lang}/mail/mail.php";

$pageTitle = htmlspecialchars($translations['error']['title']);
ob_start();
?>

<section class="position-relative overflow-hidden box-latest-blog-3 box-latest-blog-12">
    <div class="container">
        <div class="text-center">
            <h3 class="heading-inter-44 secondery-500 mb-4"><?= htmlspecialchars($translations['error']['heading']) ?></h3>
            <p class="mb-4"><?= htmlspecialchars($translations['error']['description']) ?></p>
            <a href="/" class="btn btn-primary-home btn-inter"><?= htmlspecialchars($translations['error']['button']) ?></a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/base.php';
?>
