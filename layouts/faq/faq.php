<?php
// Définir le chemin de la racine du projet
$base_path = dirname(__DIR__, 2); // Remonte de deux niveaux pour atteindre la racine
$lang = $lang ?? 'en'; // Définit une langue par défaut si $lang n'est pas défini

// Charger les traductions spécifiques à la page "faq"
$faq_translations = include "{$base_path}/languages/{$lang}/faq/faq.php";
?>
<!-- Faq Section 2 -->
<section class="position-relative overflow-hidden box-section box-faq-single-2">
    <div class="box-project-inner">
        <div class="container" data-aos="fade-up">
        <div class="text-center">
    <p class="title-line-both secondery-600 line-primary-1000"><?= $faq_translations['title'] ?></p>
    <h3 class="heading-3xl secondery-600">
        <?= $faq_translations['heading'] ?>
    </h3>
</div>

            <div class="row mt-5">
                <div class="col-md-7">
                    <div class="block-faqs">
                    <div class="accordion" id="accordionFAQ">
    <?php foreach ($faq_translations['sections'] as $index => $section): ?>
        <div class="accordion-item wow fadeInUp">
            <h5 class="accordion-header" id="heading<?= $index ?>">
                <button 
                    class="accordion-button text-heading-5 <?= $index !== 0 ? 'collapsed' : '' ?>" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapse<?= $index ?>" 
                    aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" 
                    aria-controls="collapse<?= $index ?>">
                    <p><?= $section['title'] ?></p>
                </button>
            </h5>
            <div 
                class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" 
                id="collapse<?= $index ?>" 
                aria-labelledby="heading<?= $index ?>" 
                data-bs-parent="#accordionFAQ">
                <div class="accordion-body">
                    <?= $section['content'] ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box-video-center ps-3">
                        <img src="/assets/imgs/pages/home5/about_section.webp" alt="Kronik-X Health FAQ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>