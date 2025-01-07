<?php
$pageTitle = 'Mail envoyé avec succès - Kronik-X Health';
ob_start();
?>

<section class="position-relative overflow-hidden box-latest-blog-3 box-latest-blog-12">
    <div class="container">
        <div class="text-center">
            <!-- <img src="/assets/imgs/pages/success/success_mail.png" alt="Envoi réussi" class="mb-30" /> -->
            <h3 class="heading-inter-44 primary-500 mb-4">Votre message a été envoyé avec succès !</h3>
            <p class="mb-4">Merci de nous avoir contactés. Nous vous répondrons dans les plus brefs délais.</p>
            <a href="/" class="btn btn-primary-home btn-inter">Retour à la page d'accueil</a>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/base.php';
