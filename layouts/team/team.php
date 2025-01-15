<?php
// Définir le chemin de la racine du projet
$base_path = dirname(__DIR__, 2); // Remonte de deux niveaux pour atteindre la racine
$lang = $_GET['lang'] ?? 'en'; // Définit la langue par défaut si non défini dans l'URL

// Charger les traductions spécifiques à la page "team"
$team_translations = include "{$base_path}/languages/{$lang}/about/team.php"; 

// Fonction pour paginer un tableau
function paginateArray(array $items, int $perPage, int $currentPage): array {
    $start = ($currentPage - 1) * $perPage;
    return array_slice($items, $start, $perPage, true);
}

// Déterminer la page actuelle et les paramètres de pagination
$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1; // Par défaut : 1
$itemsPerPage = 6; // Nombre d'éléments par page
$totalItems = count($team_translations['team']); // Total des membres
$totalPages = ceil($totalItems / $itemsPerPage); // Nombre total de pages

// Paginer les membres
$pagedTeam = paginateArray($team_translations['team'], $itemsPerPage, $currentPage);

// Fonction pour générer les URLs avec des paramètres
function generateUrl($route, $params = []) {
    $params['lang'] = $_GET['lang'] ?? 'en'; // Inclure la langue courante
    return $route . '?' . http_build_query($params);
}
?>

<section class="position-relative overflow-hidden box-section box-meet-experts">
            <div class="container" data-aos="fade-up">
                <div class="row align-items-end">
                <div class="col-lg-7 mb-30" data-aos="fade-up">
    <div class="banner-small-title-black line-primary-home">  <?= htmlspecialchars($team_translations['meet_team']) ?></div>
    <h2 class="heading-ag-3xl dark-950">
    <?= htmlspecialchars($team_translations['build_solutions']) ?> <br class="d-none d-lg-block" />
    <?= htmlspecialchars($team_translations['together']) ?>
    </h2>
</div>
<div class="col-lg-5 mb-30" data-aos="fade-up">
    <p class="paragraph-rubik-r">
    <?= htmlspecialchars($team_translations['description']) ?>
    </p>
</div>

                </div>

                <div class="row align-items-center mt-60">
                <?php foreach ($pagedTeam as $id => $member): ?>
                    <div class="col-lg-4 col-md-6">
            
                            <div class="card-expert">
                                <div class="card-image">
                                    <a href="<?= generateUrl('./team-profile', ['id' => $id]) ?>"><img src="<?= htmlspecialchars($member['image']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" /></a>
                                </div>
                                <div class="card-info">
                                    <div class="card-socials">
                                        <a href="<?= htmlspecialchars($member['linkedin']) ?>" target="_blank" class="item-social">
                                            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.1875 0.8125C12.6855 0.8125 13.125 1.25195 13.125 1.7793V13C13.125 13.5273 12.6855 13.9375 12.1875 13.9375H0.908203C0.410156 13.9375 0 13.5273 0 13V1.7793C0 1.25195 0.410156 0.8125 0.908203 0.8125H12.1875ZM3.95508 12.0625V5.82227H2.02148V12.0625H3.95508ZM2.98828 4.94336C3.60352 4.94336 4.10156 4.44531 4.10156 3.83008C4.10156 3.21484 3.60352 2.6875 2.98828 2.6875C2.34375 2.6875 1.8457 3.21484 1.8457 3.83008C1.8457 4.44531 2.34375 4.94336 2.98828 4.94336ZM11.25 12.0625V8.63477C11.25 6.96484 10.8691 5.64648 8.90625 5.64648C7.96875 5.64648 7.32422 6.17383 7.06055 6.67188H7.03125V5.82227H5.18555V12.0625H7.11914V8.98633C7.11914 8.16602 7.26562 7.375 8.29102 7.375C9.28711 7.375 9.28711 8.3125 9.28711 9.01562V12.0625H11.25Z" fill="white" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="card-text-info">
                    <a href="<?= generateUrl('./team-profile', ['id' => $id]) ?>" class="sub-heading-ag-xl neutral-1200">
                        <?= htmlspecialchars($member['name']) ?>
                    </a>
                    <p class="paragraph-rubik-r grey-800">
                        <?= htmlspecialchars($member['role']) ?>
                    </p>
                </div>
                                </div>
                            </div>
                  
                    </div>
          
                    <?php endforeach; ?>   
                    <div class="pagination d-flex justify-content-center mt-4">
    <?php if ($currentPage > 1): ?>
        <a href="?page=<?= $currentPage - 1 ?>" class="pagi">Previous</a>
    <?php endif; ?>

    <?php for ($page = 1; $page <= $totalPages; $page++): ?>
        <a href="?page=<?= $page ?>" class="pagi <?= $page === $currentPage ? 'active' : '' ?>">
            <?= $page ?>
        </a>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages): ?>
        <a href="?page=<?= $currentPage + 1 ?>" class="pagi">Next</a>
    <?php endif; ?>
</div>


                </div>
            </div>
        </section>
  