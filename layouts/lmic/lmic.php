<?php
// Charger les traductions pour la section "LMICs"
$lang = $_SESSION['lang'] ?? 'en'; // Langue définie via une session ou une méthode alternative
$lmic_translations = include __DIR__ . "/../../languages/{$lang}/lmic/lmic.php";
?> <section class="position-relative box-section box-faqs-12 style-green">
  <div class="container" data-aos="fade-up">
    <div class="row position-relative">
      <div class="col-lg-6 mb-4">
        <div class="position-relative d-inline-block w-100">
          <div class="image-faq-1">
            <img class="wow img-custom-anim-left" src="assets/imgs/pages/home5/medecine_afro.jpg" alt="Kronik" />
          </div>
          <div class="image-faq-2">
            <img class="wow img-custom-anim-right" src="assets/imgs/pages/home5/medecine.jpg" alt="Kronik" />
          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-4">
        <p class="sub-heading-ag-sm dark-950 text-uppercase text-line-up-down black letter-space-4 mb-3"> <?= $lmic_translations['sub_heading'] ?></p>
        <h3 class="heading-3xl secondery-500 mb-40">  <?= $lmic_translations['main_heading']?>
        </h3>
        <div class="block-faqs">
        <div class="accordion" id="accordionLMICs">
    <!-- Qu’est-ce que les LMICs ? -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingLMICs">
            <button class="accordion-button text-heading-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLMICs" aria-expanded="true" aria-controls="collapseLMICs">
                <?= $lmic_translations['accordion']['what_lmics']['title'] ?? 'Qu’est-ce que les LMICs ?'; ?>
            </button>
        </h5>
        <div class="accordion-collapse collapse show" id="collapseLMICs" aria-labelledby="headingLMICs" data-bs-parent="#accordionLMICs">
            <div class="accordion-body">
                <?= $lmic_translations['accordion']['what_lmics']['content'] ?? 'Texte par défaut'; ?>
            </div>
        </div>
    </div>
    <!-- Statistiques Clés -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingStats">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStats" aria-expanded="false" aria-controls="collapseStats">
                <?= $lmic_translations['accordion']['key_stats']['title'] ?? 'Statistiques Clés'; ?>
            </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapseStats" aria-labelledby="headingStats" data-bs-parent="#accordionLMICs">
            <div class="accordion-body">
                <ul>
                    <?php foreach ($lmic_translations['accordion']['key_stats']['content'] ?? [] as $stat): ?>
                        <li><?= $stat; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Pourquoi les LMICs ? -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingWhyLMICs">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWhyLMICs" aria-expanded="false" aria-controls="collapseWhyLMICs">
                <?= $lmic_translations['accordion']['why_lmics']['title'] ?? 'Pourquoi les LMICs ?'; ?>
            </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapseWhyLMICs" aria-labelledby="headingWhyLMICs" data-bs-parent="#accordionLMICs">
            <div class="accordion-body">
                <ul>
                    <?php foreach ($lmic_translations['accordion']['why_lmics']['content'] ?? [] as $reason): ?>
                        <li><strong><?= $reason['title']; ?></strong>: <?= $reason['description']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Exemples de LMICs -->
    <div class="accordion-item wow fadeInUp">
        <h5 class="accordion-header" id="headingExamples">
            <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExamples" aria-expanded="false" aria-controls="collapseExamples">
                <?= $lmic_translations['accordion']['examples']['title'] ?? 'Exemples de LMICs'; ?>
            </button>
        </h5>
        <div class="accordion-collapse collapse" id="collapseExamples" aria-labelledby="headingExamples" data-bs-parent="#accordionLMICs">
            <div class="accordion-body">
                <?= $lmic_translations['accordion']['examples']['content'] ?? 'Texte par défaut'; ?>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="position-relative overflow-hidden box-about-us-8 style-green-about-3">
  <div class="container" data-aos="fade-up">
    <div class="row align-items-center">
      <!-- Colonne Image -->
      <div class="col-lg-6 mb-4">
        <div class="box-image-about-8">
          <img src="assets/imgs/pages/home5/pourpalet.jpg" alt="Kronik" />
        </div>
      </div>
    <!-- Colonne Texte -->
<div class="col-lg-6 mb-4">
    <div class="banner-small-title-black sub-heading-ag-sm color-white line-gradient-01">
        <?= $lmic_translations['actions']['small_title']; ?>
    </div>
    <h1 class="heading-ag-3xl color-white mb-20">
        <?= $lmic_translations['actions']['main_title']; ?>
    </h1>
    <p class="paragraph-rubik-r color-white desc-banner mb-40">
        <?= $lmic_translations['actions']['description']; ?>
    </p>
    <ul class="list-unstyled color-white mb-60">
        <li><?= $lmic_translations['actions']['list']['incubating']; ?></li>
        <li><?= $lmic_translations['actions']['list']['piloting']; ?></li>
        <li><?= $lmic_translations['actions']['list']['capacity_building']; ?></li>
    </ul>
    <p class="paragraph-rubik-r color-white mb-30">
        <?= $lmic_translations['actions']['call_to_action']; ?>
    </p>
</div>

<div class="d-flex flex-wrap align-items-center justify-content-center gap-2">
    <a href="./programs" class="btn btn-linear-03 mb-1 me-3" title="<?= $lmic_translations['actions']['buttons']['startup']['title']; ?>">
        <?= $lmic_translations['actions']['buttons']['startup']['text']; ?>
        <img src="assets/imgs/pages/home5/arrow-right.png" alt="Kronik" />
    </a>
    <a href="./contribute#pills-mentorat" class="btn btn-outline-white me-3 mb-1" title="<?= $lmic_translations['actions']['buttons']['mentor']['title']; ?>">
        <?= $lmic_translations['actions']['buttons']['mentor']['text']; ?>
        <img src="assets/imgs/pages/home5/arrow-right.png" alt="Kronik" />
    </a>
    <a href="./contribute#pills-coach" class="btn btn-linear-04 me-3" title="<?= $lmic_translations['actions']['buttons']['coach']['title']; ?>">
        <?= $lmic_translations['actions']['buttons']['coach']['text']; ?>
        <img src="assets/imgs/pages/home5/arrow-right.png" alt="Kronik" />
    </a>
    <a href="./contribute#pills-partner" class="btn btn-linear-02 me-3" title="<?= $lmic_translations['actions']['buttons']['partner']['title']; ?>">
        <?= $lmic_translations['actions']['buttons']['partner']['text']; ?>
        <img src="assets/imgs/pages/home5/arrow-right.png" alt="Kronik" />
    </a>
</div>
    </div>
  </div>
</section>