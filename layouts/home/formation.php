<!-- <section class="position-relative overflow-hidden box-section box-about-us-5">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="assets/imgs/pages/home5/img-training.webp" alt="Formation Santé Numérique" />
            </div>
            <div class="col-lg-6 mb-4">
                <div class="banner-small-title-black line-primary-home">Modules de Formation</div>
                <h2 class="heading-3xl mb-30">Équipez-vous pour Transformer la Santé</h2>
                <p class="mb-3">
                    Nos formations sont spécialement conçues pour fournir aux startups et aux innovateurs les compétences indispensables 
                    à la création de solutions impactantes dans le domaine de la santé numérique.
                </p>
                <p class="mb-4">
                    Apprenez à exploiter les outils numériques et l'innovation pour relever les défis complexes 
                    des systèmes de santé, notamment dans les pays à revenu faible et intermédiaire.
                </p>

                <div class="mb-5"></div>
                <a href="./formations/details" class="btn btn-primary-home">
                    Découvrir nos formations
                    <img src="assets/imgs/template/icons/plus-sm.svg" alt="Découvrir" />
                </a>
            </div>
        </div>
    </div>
</section> -->

<?php
// Charger les traductions pour la section "formation"
$lang = $_SESSION['lang'] ?? 'en'; // Définir la langue via une session ou autre méthode
$formation_translations = include __DIR__ . "/../../languages/{$lang}/home/formation.php";
?>

<section class="position-relative overflow-hidden box-services">
    <div class="container" data-aos="fade-up">
        <!-- Présentation Générale -->
        <div class="row align-items-end">
        <div class="col-lg-7 mb-30">
    <div class="banner-small-title-black">
        <?= htmlspecialchars($formation_translations['small_title']) ?>
    </div>
    <h2 class="heading-ag-3xl dark-950">
        <?= $formation_translations['heading'] ?>
    </h2>
</div>
<div class="col-lg-5 mb-30">
    <p class="mb-20 paragraph-rubik-r">
        <?= htmlspecialchars($formation_translations['description']) ?>
    </p>
</div>
        </div>

        <!-- Liste des Modules -->
        <div class="box-services-lists mt-3" data-aos="fade-up">
            <div class="service-left">
            <div class="service-item-list" role="tablist">
    <?php foreach ($formation_translations['modules'] as $index => $module): ?>
        <a href="#module-<?= $index + 1 ?>" 
           class="item-service" 
           data-bs-toggle="tab" 
           type="button" 
           role="tab" 
           aria-controls="module-<?= $index + 1 ?>" 
           aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
            <span class="title-service"><?= htmlspecialchars($module['title']) ?></span>
            <span class="link-read-more">
                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.55523 8C7.55523 7.576 7.90137 6.94286 8.25176 6.41143C8.70226 5.72571 9.24059 5.12743 9.85779 4.67086C10.3206 4.32857 10.8816 4 11.333 4M11.333 4C10.8816 4 10.3201 3.67143 9.85779 3.32914C9.24059 2.872 8.70226 2.27371 8.25176 1.58914C7.90137 1.05714 7.55523 0.422857 7.55523 3.11705e-07M11.333 4L-0.000324313 4" stroke="" />
                </svg>
            </span>
            <p class="sub-heading-md desc-tab-service"><?= htmlspecialchars($module['objective']) ?></p>
        </a>
    <?php endforeach; ?>
</div>
            </div>
            <div class="service-right">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-service-1" role="tabpanel" aria-labelledby="nav-service-1-tab" tabindex="0">
                                <img src="assets/imgs/pages/home5/x_h_kronik_resized_1024x1024.jpg" alt="kronik" />
                            </div>
                            <div class="tab-pane fade" id="tab-service-2" role="tabpanel" aria-labelledby="nav-service-2-tab" tabindex="0">
                                <img src="assets/imgs/pages/home5/x_h_kronik_resized_1024x1024.jpg" alt="kronik" />
                            </div>
                            <div class="tab-pane fade" id="tab-service-3" role="tabpanel" aria-labelledby="nav-service-3-tab" tabindex="0">
                                <img src="assets/imgs/pages/home5/x_h_kronik_resized_1024x1024.jpg" alt="kronik" />
                            </div>
                            <div class="tab-pane fade" id="tab-service-4" role="tabpanel" aria-labelledby="nav-service-4-tab" tabindex="0">
                                <img src="assets/imgs/pages/home5/x_h_kronik_resized_1024x1024.jpg" alt="kronik" />
                            </div>
                            <div class="tab-pane fade" id="tab-service-5" role="tabpanel" aria-labelledby="nav-service-5-tab" tabindex="0">
                                <img src="assets/imgs/pages/home5/x_h_kronik_resized_1024x1024.jpg" alt="kronik" />
                            </div>
                        </div>
                    </div>
        </div>

        <!-- CTA -->
        <!-- <div class="mt-5 text-center" data-aos="fade-up">
            <a href="#" class="btn btn-primary-square-2">
                En savoir plus
                <img src="assets/imgs/template/icons/plus-sm.svg" alt="En savoir plus" />
            </a>
        </div> -->
    </div>
</section>
