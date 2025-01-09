<?php
// Charger les traductions pour la section "about"
$lang = $_SESSION['lang'] ?? 'en'; // Exemple : définir la langue via une session (ou une autre méthode)
$about_translations = include __DIR__ . "/../../languages/{$lang}/home/about.php";
?>

<section class="position-relative overflow-hidden box-about-us">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6 mb-4">
                    
                    <div class="position-relative d-inline-block w-100">
                            <div class="image-faq-1">
                                <!-- <img class="wow img-custom-anim-left" src="assets/imgs/pages/home5/medecine_afro.jpg" alt="Kronik" /> -->
                                <img src="assets/imgs/pages/home5/kronx_resized_322x407.jpg" alt="Kronik" data-aos="fade-up" data-aos-duration="200" />
                            </div>
                            <div class="image-faq-2">
                                <!-- <img class="wow img-custom-anim-right" src="assets/imgs/pages/home5/medecine.jpg" alt="Kronik" /> -->
                                <img src="assets/imgs/pages/home5/test_kronik_resized.jpg" alt="Kronik" data-aos="fade-up" data-aos-duration="1000" />
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-6 mb-4">
    <div class="banner-small-title-black"> <?= htmlspecialchars($about_translations['small_title']) ?></div>
    <h2 class="heading-3xl mb-30">
    <?= $about_translations['heading'] ?>
        <!-- Investir dans l'innovation pour <span class="theme-primary underline">transformer la santé</span> -->
    </h2>
    <p class="mb-4">
    <?= htmlspecialchars($about_translations['paragraph']) ?>
</p>

    <div class="mb-5"></div>
    <a href="./about" class="btn btn-primary-square-2-md">
    <?= htmlspecialchars($about_translations['cta_button']) ?>
        <img src="assets/imgs/template/icons/plus-sm.svg" alt="Plus" />
    </a>
</div>

                </div>
            </div>
        </section>
