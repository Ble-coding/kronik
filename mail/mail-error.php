<?php
$pageTitle = 'Erreur lors de l’envoi du mail - Kronik-X Health';
ob_start();
?>

<section class="position-relative overflow-hidden box-latest-blog-3 box-latest-blog-12">
    <div class="container">
        <div class="text-center">
            <!-- <img src="/assets/imgs/pages/error/error_mail.png" alt="Erreur d'envoi" class="mb-30" /> -->
            <h3 class="heading-inter-44 secondery-500 mb-4">Une erreur est survenue lors de l’envoi du mail.</h3>
            <p class="mb-4">Veuillez vérifier les informations fournies et réessayer.</p>
            <a href="/contact" class="btn btn-primary-home btn-inter">Retour au formulaire de contact</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/base.php';
