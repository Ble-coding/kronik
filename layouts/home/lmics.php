<?php
// Charger les traductions pour la section "lmic"
$lang = $_SESSION['lang'] ?? 'en'; // Définir la langue via une session ou autre méthode
$lmic_translations = include __DIR__ . "/../../languages/{$lang}/home/lmics.php";
?>
<section class="position-relative overflow-hidden box-section box-about-us-5">
            <div class="container" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4">
                        <img src="assets/imgs/pages/home5/kronik_health_resized_1024x1024.jpg" alt="Kronik" />
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="banner-small-title-black line-primary-home"><?= htmlspecialchars($lmic_translations['section_title']) ?></div>
                        <h2 class="heading-3xl mb-30">
                        <?= htmlspecialchars($lmic_translations['heading']) ?>
                        </h2>
                        <?php foreach ($lmic_translations['paragraphs'] as $index => $paragraph): ?>
    <p class="mb-<?= ($index === array_key_last($lmic_translations['paragraphs'])) ? '4' : '3' ?>">
        <?= htmlspecialchars($paragraph) ?>
    </p>
<?php endforeach; ?>

    <div class="mb-5"></div>
    <a href="./lmic" class="btn btn-primary-home">
        <?= htmlspecialchars($lmic_translations['button_text']) ?>
        <img src="assets/imgs/template/icons/plus-sm.svg" alt="<?= htmlspecialchars($lmic_translations['button_text']) ?>" />
    </a>
                    </div>
                </div>
            </div>
        </section>