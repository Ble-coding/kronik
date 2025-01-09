<!--Home 5 Section 5 -->
<section class="box-section overflow-hidden box-section bg-secondery-500 box-process-16">
  <div class="container" data-aos="fade-up">
  <?php
// Définir la langue (par exemple via une session ou un paramètre d'URL)
$lang = $_SESSION['lang'] ?? 'en'; // Par défaut en anglais

// Charger les traductions pour la section "stat"
$stat_translations = include __DIR__ . "/../../languages/{$lang}/home/stat.php";
?>

<div class="row align-items-center">
    <div class="col-lg-4 mb-30">
        <div class="paragraph-base-fitree-medium text-uppercase color-white mb-3">
            <?= htmlspecialchars($stat_translations['heading']) ?>
        </div>
        <h2 class="heading-ag-3xl color-white mb-3">
            <?= htmlspecialchars($stat_translations['subheading']) ?>
        </h2>
        <p class="paragraph-rubik-r color-white mb-40">
            <?= htmlspecialchars($stat_translations['description']) ?>
        </p>
        <a href="./about" class="btn btn-white-md mb-3">
            <?= htmlspecialchars($stat_translations['learn_more']) ?>
        </a>
    </div>
    <div class="col-lg-8 mb-30">
        <div class="row none-pd">
            <?php foreach ($stat_translations['cards'] as $index => $card): ?>
                <div class="col-md-6">
                    <div class="card-work-process-2 card-work-process-3">
                        <div class="card-icon">
                            <div class="icon-right"><?= sprintf('%02d', $index + 1) ?></div>
                            <div class="icon-left"></div>
                        </div>
                        <div class="card-info">
                            <h4><?= htmlspecialchars($card['title']) ?></h4>
                            <p><?= htmlspecialchars($card['content']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

  </div>
</section>