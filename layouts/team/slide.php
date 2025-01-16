<?php
// Charger la traduction de la diapositive FAQ
$slide_translations = include __DIR__ . "/../../languages/{$lang}/about/slideTeam.php";
?>
<section class="box-faq-single-banner-team box-blog-single-banner">
            <div class="box-faq-single-banner-inner">
                <div class="container">
                    <h1 class="display-ag-2xl color-white"><?= $slide_translations['title'] ?></h1>
                    <div class="box-breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><?= $slide_translations['breadcrumb']['home'] ?></a>
                            </li>
                            <li class="breadcrumb-item">
                                <span><?= $slide_translations['breadcrumb']['current'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>