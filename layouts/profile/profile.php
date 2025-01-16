<?php
// Chargement de la langue et des données de l'équipe
$base_path = dirname(__DIR__, 2); // Remonte de deux niveaux pour atteindre la racine
$lang = $_SESSION['lang'] ?? 'en'; // Langue par défaut
$team_translations = include "{$base_path}/languages/{$lang}/about/team.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!isset($team_translations['team'][$id])) {
    echo "<h2>Membre introuvable.</h2>";
    exit;
}

// Récupérer le membre
$member = $team_translations['team'][$id];

?>

        <!-- Team Section 2 -->
        <section class="box-section box-contact-section-2">
            <div class="container" data-aos="fade-up">
                <div class="row mt-4">
                    
                        <div class="col-lg-5 col-md-4 mb-4">
                        <img src="<?= htmlspecialchars($member['image-profile']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" />
                        </div>
                        <div class="col-lg-7 col-md-8 mb-4">
                            <h1 class="heading-ag-8xl mb-3"><?= htmlspecialchars($member['name']) ?></h1>
                            <h3 class="neutral-2900 mb-4"><?= htmlspecialchars($member['role']) ?></h3>
                            <div class="team-socials">
                                <a href="<?= htmlspecialchars($member['linkedin']) ?>" target="_blank">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.92969 14H0.205078V5.24023H2.92969V14ZM1.58203 4.03906C1.13281 4.01953 0.761719 3.86328 0.46875 3.57031C0.175781 3.27734 0.0195313 2.90625 0 2.45703C0.0390625 1.83203 0.302734 1.37305 0.791016 1.08008C1.2793 0.806641 1.80664 0.806641 2.37305 1.08008C2.88086 1.39258 3.14453 1.85156 3.16406 2.45703C3.14453 2.90625 2.98828 3.27734 2.69531 3.57031C2.40234 3.86328 2.03125 4.01953 1.58203 4.03906ZM13.125 14H10.4004V9.72266C10.4395 9.19531 10.3809 8.6875 10.2246 8.19922C10.0684 7.71094 9.6582 7.44727 8.99414 7.4082C8.31055 7.42773 7.86133 7.66211 7.64648 8.11133C7.43164 8.56055 7.33398 9.07812 7.35352 9.66406V14H4.62891V5.24023H7.26562V6.44141H7.29492C7.4707 6.07031 7.77344 5.74805 8.20312 5.47461C8.65234 5.18164 9.20898 5.02539 9.87305 5.00586C11.2012 5.04492 12.0898 5.44531 12.5391 6.20703C12.9688 6.98828 13.1641 7.98438 13.125 9.19531V14Z" fill="" />
                                    </svg>
                                </a>
                            </div>
                            <div class="content-detail-team">
    <?php if (!empty($member['bio'])): ?>
        <?php foreach ($member['bio'] as $paragraph): ?>
            <p class="paragraph-rubik-r grey-800"><?= strip_tags($paragraph, '<strong><em><br>') ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


                        </div>
                   
                </div>
            </div>
        </section>