
<?php
// Charger les traductions pour la section "slide"
$lang = $_SESSION['lang'] ?? 'en'; // Exemple : définir la langue via une session (ou une autre méthode)
$slide_translations = include __DIR__ . "/../../languages/{$lang}/program/slide.php";
?>

<section class="box-faq-single-banner-programs box-blog-single-banner">
            <div class="box-faq-single-banner-inner">
                <div class="container">
                <h1 class="display-ag-2xl color-white"><?= htmlspecialchars($slide_translations['title']) ?></h1>
<div class="box-breadcrumb">
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><?= htmlspecialchars($slide_translations['breadcrumb']['home']) ?></a>
        </li>
        <li class="breadcrumb-item">
            <span><?= htmlspecialchars($slide_translations['breadcrumb']['current']) ?></span>
        </li>
    </ul>
</div>
                </div>
            </div>
        </section>