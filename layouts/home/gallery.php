<section class="position-relative overflow-hidden box-section box-project-16 bg-dark-950 box-pd-120">
            <div class="container" data-aos="fade-up">
                <div class="row position-relative align-items-end">
                    <div class="col-lg-9 mb-4 text-center text-lg-start">

                    <?php
// Charger les traductions pour la section "gallery"
$lang = $_SESSION['lang'] ?? 'en'; // Définir la langue via une session ou autre méthode
$gallery_translations = include __DIR__ . "/../../languages/{$lang}/home/gallery.php";
?><div class="paragraph-base-fitree-bold text-underline text-uppercase color-white mb-3">
<?php echo $gallery_translations['section_title']; ?>
</div>

<h2 class="heading-ag-3xl color-white" data-aos="fade-up" data-aos-delay="200">
<?php echo $gallery_translations['section_heading']; ?>
</h2></div>
                    <!-- <div class="col-lg-3 mb-4 text-center text-lg-end">
                        <a href="#" class="sub-heading-xl text-uppercase link-upper">
                            All Projects
                            <svg width="24" height="12" viewBox="0 0 24 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23 6L1 6" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M18 11C18 11 23 7.31756 23 5.99996C23 4.68237 18 1 18 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div> -->
                </div>
            </div>
            <div class="box-project-inner mt-4">
    <div class="box-swiper">
        <div class="swiper-container slider-group-4">
            <div class="swiper-wrapper">
                <?php foreach ($gallery_translations['projects'] as $project): ?>
                    <div class="swiper-slide">
                        <div class="card-project-2">
                            <div class="card-image">
                                <a href="#"><img src="<?php echo $project['image']; ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" /></a>
                            </div>
                            <div class="card-info">
                                <div class="card-info-inner">
                                    <div class="info-bottom">
                                        <a href="#" class="heading-lg"><?php echo $project['title']; ?></a>
                                        <p class="paragraph-base color-white"><?php echo $project['description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
        </section>