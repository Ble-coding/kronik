<section class="box-faq-single-banner-terms box-blog-single-banner">
            <div class="box-faq-single-banner-inner">
                <div class="container">
                <?php
$terms_translations = include __DIR__ . "/../../languages/{$lang}/terms/slide.php";
?>
                <h1 class="display-ag-2xl color-white"><?= htmlspecialchars($terms_translations['title']) ?></h1>
<div class="box-breadcrumb">
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/"><?= $terms_translations['breadcrumb']['home'] ?></a>
        </li>
        <li class="breadcrumb-item">
            <span>
            <?= $terms_translations['breadcrumb']['current'] ?></span>
        </li>
    </ul>
</div>
                </div>
            </div>
        </section>