<?php
// Charger les traductions en fonction de la langue
$privacy_translations = include __DIR__ . "/../../languages/{$lang}/privacy/privacy.php";
?>

<section class="box-section box-project-detail">
    <div class="container" data-aos="fade-up">
        <div class="blog-detail">
        <h2><?= $privacy_translations['title'] ?></h2>
        <p><strong><?= $privacy_translations['last_update'] ?></strong></p>

        <?php foreach ($privacy_translations['sections'] as $section): ?>
        <h4><?= $section['title'] ?></h4>
        <p><?= $section['content'] ?></p>
        <ul>
            <?php foreach ($section['details'] as $detail): ?>
                <?php if (is_array($detail)): ?>
                    <ul>
                        <?php foreach ($detail as $subdetail): ?>
                            <li><?= $subdetail ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <li><?= $detail ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>


    </div>   
    </div>
</section>