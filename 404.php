<?php
$pageTitle = 'Oops! Page Introuvable - Kronik-X Health'; // Titre spécifique pour la page 404
ob_start(); // Capture le contenu de la page
?>

<!-- Contenu spécifique à la page 404 -->
<section class="position-relative overflow-hidden box-latest-blog-3 box-latest-blog-12">
    <div class="container">
        <div class="text-center">
            <img src="assets/imgs/pages/404/404_resized.webp" alt="kronik" class="mb-30" />
            <h3 class="heading-inter-44 secondery-500 mb-4">Oops! Page Introuvable.</h3>
            <a href="/" class="btn btn-primary-home btn-inter">Retour à la page d'accueil</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean(); // Capture et stocke le contenu
require __DIR__ . '/layouts/base.php'; // Inclut le layout principal
