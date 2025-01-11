<header class="header-style-3 header-style-4 header-style-5">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
            <div class="container px-3">
                <div class="header-navar">
                    <a class="navbar-brand pe-4" href="/"><img src="/assets/imgs/template/kronik_resized.png" alt /></a>
                    <ul class="navbar-nav m-auto gap-1 align-items-lg-center">
                    <?php
// Détection de la langue courante
$lang = $_SESSION['lang'] ?? 'en'; // Exemple : définir la langue via une session (ou une autre méthode)

// Charger les traductions pour le header
$header_translations = include __DIR__ . "/../languages/{$lang}/header.php";
// Fonction pour générer des URLs avec le paramètre de langue
function generate_url($path, $lang) {
    return "{$path}?lang={$lang}";
}

?>
                     <li class="nav-item">  <a class="nav-link fw-medium" href="<?= generate_url('/', $lang) ?>"><?= htmlspecialchars($header_translations['home']) ?></a></li>
                    
                        <!-- <li class="nav-item dropdown menu-item-has-children">
                            <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Accueil</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="presentation.php">Présentation concise</a></li>
                                <li><a class="dropdown-item" href="statistiques.php">Statistiques Clés</a></li>
                                <li><a class="dropdown-item" href="programmes.php">Nos Programmes en un coup d'œil</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item">  <a class="nav-link fw-medium" href="
                        <?= generate_url('/about', $lang) ?>
                        "><?= htmlspecialchars($header_translations['about']) ?></a></li>

                        <!-- <li class="nav-item dropdown menu-item-has-children">
                            <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">À Propos</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./about/mission">Notre Mission</a></li>
                                <li><a class="dropdown-item" href="impact.php">Nos Statistiques d’Impact</a></li>
                                <li><a class="dropdown-item" href="valeurs.php">Nos Valeurs</a></li>
                                <li><a class="dropdown-item" href="equipe.php">Notre Équipe et Partenaires</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item">   <a class="nav-link fw-medium" href="
                        <?= generate_url('/lmic', $lang) ?>"><?= htmlspecialchars($header_translations['lmic']) ?></a></li>
                        <!-- <li class="nav-item dropdown menu-item-has-children">
                            <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">LMICs</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./lmics/lmics-definition">Qu’est-ce que les LMICs ?</a></li>
                                <li><a class="dropdown-item" href="lmics-statistiques.php">Statistiques Clés</a></li>
                                <li><a class="dropdown-item" href="lmics-importance.php">Pourquoi les LMICs ?</a></li>
                                <li><a class="dropdown-item" href="lmics-actions.php">Nos Actions dans les LMICs</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item">  <a class="nav-link fw-medium" href="
                         <?= generate_url('/programs', $lang) ?>"><?= htmlspecialchars($header_translations['programs']) ?></a></li>
                      
                        
                        <li class="nav-item">  <a class="nav-link fw-medium" href="<?= generate_url('/contact', $lang) ?>
                        "><?= htmlspecialchars($header_translations['contact']) ?></a></li>
                        <!-- <li class="nav-item dropdown menu-item-has-children">
                            <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contactez-Nous</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="contact.php">Formulaire de contact</a></li>
                                <li><a class="dropdown-item" href="localisation.php">Localisation et informations</a></li>
                            </ul>
                        </li> -->

                        <li class="nav-item dropdown menu-item-has-children">
    <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php if ($lang === 'fr'): ?>
            <img src="assets/imgs/template/fr.png" class="me-1" alt="Français"> Français
        <?php elseif ($lang === 'en'): ?>
            <img src="assets/imgs/template/us.png" class="me-1" alt="English"> English
        <?php endif; ?>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="?lang=fr">
                <img src="assets/imgs/template/fr.png" class="me-1" alt="Français"> 
                <?php echo $lang === 'fr' ? 'Français' : 'French'; ?>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="?lang=en">
                <img src="assets/imgs/template/us.png" class="me-1" alt="English"> 
                <?php echo $lang === 'fr' ? 'Anglais' : 'English'; ?>
            </a>
        </li>
    </ul>
</li>

                    </ul>
                    <div class="d-flex align-items-center">
                        <a href="javascript:void(0)" class="menu-tigger btn-navbar px-2 d-flex align-items-center justify-content-center btn-menu">
                            <svg width="30" height="24" viewBox="0 0 30 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line y1="12" x2="30" y2="12" stroke="" stroke-width="3" />
                                <path d="M5 22H30" stroke="" stroke-width="3" />
                                <path d="M10 2H30" stroke="" stroke-width="3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- home5-menu -->
        <div class="offCanvas__info">
            <div class="offCanvas__close-icon menu-close">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                        <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"></path>
                    </svg>
                </button>
            </div>
            <div class="offCanvas__logo mb-20">
                <a href="/"><img src="/assets/imgs/template/kronik_resized.png" alt="Logo" /></a>
            </div>
            <div class="offCanvas__side-info mb-30">
                <ul class="navbar-nav navbar-nav-mobile">
                    <li class="nav-item"><a class="nav-link fw-medium" href="<?= generate_url('/', $lang) ?>"><?= htmlspecialchars($header_translations['home']) ?></a></li>
                    <!-- <li class="nav-item dropdown menu-item-has-children">
                        <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Accueil</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="presentation.php">Présentation concise</a></li>
                            <li><a class="dropdown-item" href="statistiques.php">Statistiques Clés</a></li>
                            <li><a class="dropdown-item" href="programmes.php">Nos Programmes en un coup d'œil</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item"><a class="nav-link fw-medium" href="<?= generate_url('/about', $lang) ?>"><a class="nav-link fw-medium" href="/"><?= htmlspecialchars($header_translations['about']) ?></a></a></li>
                    <!-- <li class="nav-item dropdown menu-item-has-children">
                        <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">À Propos</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./about/mission">Notre Mission</a></li>
                            <li><a class="dropdown-item" href="impact.php">Nos Statistiques d’Impact</a></li>
                            <li><a class="dropdown-item" href="valeurs.php">Nos Valeurs</a></li>
                            <li><a class="dropdown-item" href="equipe.php">Notre Équipe et Partenaires</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item"><a class="nav-link fw-medium" href="<?= generate_url('/lmic', $lang) ?>"><a class="nav-link fw-medium" href="/"><?= htmlspecialchars($header_translations['lmic']) ?></a></a></li>
                    <!-- <li class="nav-item dropdown menu-item-has-children">
                        <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">LMICs</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./lmics/lmics-definition">Qu’est-ce que les LMICs ?</a></li>
                            <li><a class="dropdown-item" href="statistiques-lmics.php">Statistiques Clés</a></li>
                            <li><a class="dropdown-item" href="pourquoi-lmics.php">Pourquoi les LMICs ?</a></li>
                            <li><a class="dropdown-item" href="actions-lmics.php">Nos Actions dans les LMICs</a></li>
                        </ul>
                    </li> -->
                    <!-- Programmes -->
                    <li class="nav-item"><a class="nav-link fw-medium" href="<?= generate_url('/programs', $lang) ?>"><a class="nav-link fw-medium" href="/"><?= htmlspecialchars($header_translations['programs']) ?></a></a></li>
                    <!-- <li class="nav-item dropdown menu-item-has-children">
                        <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Programmes</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="programme-education.php">Éducation</a></li>
                            <li><a class="dropdown-item" href="programme-sante.php">Santé</a></li>
                            <li><a class="dropdown-item" href="programme-environnement.php">Environnement</a></li>
                            <li><a class="dropdown-item" href="programme-technologie.php">Technologie</a></li>
                        </ul>
                    </li> -->

                    <!-- Formation -->
                    <!-- <li class="nav-item"><a class="nav-link fw-medium" href="/">Formation</a></li> -->
                    <!-- <li class="nav-item dropdown menu-item-has-children">
                        <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Formation</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/formation/formation-en-ligne">Formation en Ligne</a></li>
                            <li><a class="dropdown-item" href="atelier-pratique.php">Ateliers Pratiques</a></li>
                            <li><a class="dropdown-item" href="mentorat.php">Mentorat</a></li>
                        </ul>
                    </li> -->

                    <!-- Mentorat -->
                    <li class="nav-item">
                        <!-- <a class="nav-link fw-medium" href="./contribute"></a> -->
                      <a class="nav-link fw-medium" href="<?= generate_url('/contribute', $lang) ?>"><?= htmlspecialchars($header_translations['contribute']) ?></a>
                    </li>
                    <!-- <li class="nav-item dropdown menu-item-has-children">
                        <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mentorat</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="mentorat-jeunes.php">Mentorat pour les Jeunes</a></li>
                            <li><a class="dropdown-item" href="mentorat-professionnel.php">Mentorat Professionnel</a></li>
                        </ul>
                    </li> -->

                    <!-- News -->
                    <!-- <li class="nav-item"><a class="nav-link fw-medium" href="/">Actualités</a></li> -->
                    <!-- <li class="nav-item dropdown menu-item-has-children">
                        <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Actualités</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="news.php">Toutes les Actualités</a></li>
                            <li><a class="dropdown-item" href="articles.php">Articles et Publications</a></li>
                            <li><a class="dropdown-item" href="evenements.php">Événements</a></li>
                        </ul>
                    </li> -->

                    <!-- Contact -->
                    <li class="nav-item">
                    <a class="nav-link fw-medium" href="<?= generate_url('/contact', $lang) ?>"><?= htmlspecialchars($header_translations['contact']) ?></a>
                    </li>

                    <li class="nav-item dropdown menu-item-has-children">
    <a class="nav-link fw-medium" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php if ($lang === 'fr'): ?>
            <img src="/assets/imgs/template/fr.png" class="me-1" alt="Français" > Français
        <?php elseif ($lang === 'en'): ?>
            <img src="/assets/imgs/template/us.png" class="me-1" alt="Anglais" > Anglais
        <?php endif; ?>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="?lang=fr">
                <img src="/assets/imgs/template/fr.png" class="me-1" alt="Français" > Français
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="?lang=en">
                <img src="/assets/imgs/template/us.png" class="me-1" alt="Anglais" > Anglais
            </a>
        </li>
    </ul>
</li>

                </ul>
            </div>
            <!-- <div class="side-gallery mb-4">
                <div class="pt-1"></div>
                <h4 class="mt-3 mb-3">Galerie</h4>
                <div class="grid-items">
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-1.png" alt="kronik" />
                    </div>
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-2.png" alt="kronik" />
                    </div>
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-3.png" alt="kronik" />
                    </div>
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-4.png" alt="kronik" />
                    </div>
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-5.png" alt="kronik" />
                    </div>
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-6.png" alt="kronik" />
                    </div>
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-7.png" alt="kronik" />
                    </div>
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-8.png" alt="kronik" />
                    </div>
                    <div class="zoom-img rounded-3 d-inline-flex overflow-hidden">
                        <img class="g-col-4" src="/assets/imgs/pages/home5/gallery-9.png" alt="kronik" />
                    </div>
                </div>
            </div> -->
            <?php
                require __DIR__ . '/box-contactus.php';
            ?>
        </div>
        <div class="offCanvas__overly"></div>

    </header>