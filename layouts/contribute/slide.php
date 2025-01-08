<?php
// Charger les traductions pour la section "slide"
$slide_translations = include dirname(__DIR__, 2) . "/languages/{$lang}/contribute/slide.php";
?>

<section class="box-faq-single-banner-contribute box-blog-single-banner">
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
