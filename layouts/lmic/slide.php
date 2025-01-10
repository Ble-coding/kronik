
<?php
// Charger les traductions pour la section "LMICs"
$lang = $_SESSION['lang'] ?? 'en'; // Langue définie via une session ou une méthode alternative
$slide_translations = include __DIR__ . "/../../languages/{$lang}/lmic/slide.php";
?>

<section class="box-faq-single-banner-lmics box-blog-single-banner">
    <div class="box-faq-single-banner-inner">
        <div class="container">
            <h1 class="display-ag-2xl color-white">
                <?= $slide_translations['title'] ?? 'LMICs'; ?>
            </h1>
            <div class="box-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"><?= $slide_translations['breadcrumb']['home'] ?? 'Home'; ?></a>
                    </li>
                    <li class="breadcrumb-item">
                        <span><?= $slide_translations['breadcrumb']['current'] ?? 'LMICs'; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
