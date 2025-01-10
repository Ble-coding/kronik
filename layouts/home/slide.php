<section class="position-relative overflow-hidden box-banner-5">
            <div class="container" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6 mt-5">
                    <?php
// Définir la langue (par exemple via une session ou un paramètre d'URL)
$lang = $_SESSION['lang'] ?? 'en'; // Par défaut en anglais

// Charger les traductions pour la section "slide"
$slide_translations = include __DIR__ . "/../../languages/{$lang}/home/slide.php";
?>
                        <div class="banner-2">
    <div class="banner-small-title-black color-white line-primary-home">
        <?= htmlspecialchars($slide_translations['banner_small_title']) ?>
    </div>
    <h1 class="title-banner-black color-white mb-20">
        <?= $slide_translations['banner_title'] ?>
    </h1>
    <p class="paragraph-rubik-r color-white desc-banner mb-40">
        <?= htmlspecialchars($slide_translations['banner_description']) ?>
    </p>
    <div class="d-flex align-items-center flex-wrap">
        <a href="./about" class="btn btn-linear-01 mb-3">
            <?= htmlspecialchars($slide_translations['discover_mission']) ?>
            <img src="/assets/imgs/pages/home5/plus.png" alt="kronik" />
        </a>
        <span class="mr-20"></span>
        <div class="d-inline-block mb-3">
            <div class="box-need-help">
                <p><?= htmlspecialchars($slide_translations['need_help']) ?></p>
                <h6 class="heading-md">
                <a href="tel:+2250708289006">
                        <?= htmlspecialchars($slide_translations['phone_number']) ?>
                    </a>
                </h6>
            </div>
        </div>
    </div>
</div>
                    </div>
                    <div class="col-lg-6 mt-5"></div>
                </div>
            </div>
        </section>