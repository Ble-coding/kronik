<footer class="footer-2 footer-style-14">

    <div class="container-fluid ft-bgr section-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                <?php
// Détection de la langue courante
$lang = $_SESSION['lang'] ?? 'en'; // Exemple : utiliser une session pour gérer la langue
$footer_translations = include __DIR__ . "/../languages/{$lang}/footer.php";

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Générer un token sécurisé
}
?>
                    <a class="navbar-brand pe-4" href="  <?= generate_url('./', $lang) ?>"><img src="assets/imgs/template/kronik_resized.png" alt /></a>
    
                    <p class="paragraph-base color-white pt-4 pb-2">
    <?= htmlspecialchars($footer_translations['message']) ?>
</p>
                    <div class="box-social-profile pt-2">
                        <div class="list-socials">
                            <a href="#" class="share fb"></a>
                            <a href="#" class="share tw"></a>
                            <a href="#" class="share instagram"></a>
                            <a href="#" class="share printest"></a>
                        </div>
                    </div>

                    <div class="pt-4">
    <p class="paragraph-base color-white"><?= htmlspecialchars($footer_translations['message_newsletter']) ?></p>
</div>
<!-- ✅ Formulaire d'inscription -->
<div class="pt-3" id="newsletter">
    <div class="form-newsletter">
        <form action="mail/newsletter.php?lang=<?= htmlspecialchars($lang) ?>" method="POST">
            <input 
                type="email" 
                name="email"
                class="form-control"  
                required
                placeholder="<?= htmlspecialchars($footer_translations['email_placeholder']) ?>" 
            />
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
            <input 
                type="submit" 
                class="btn btn-newsletter" 
                value="<?= htmlspecialchars($footer_translations['submit_button']) ?>" 
            />
        </form>

        <!-- ✅ Messages de confirmation ou d'erreur -->
        <?php if (isset($_SESSION['newsletter_success'])): ?>
            <p class="text-success"><?= htmlspecialchars($footer_translations['success_message']) ?></p>
            <?php unset($_SESSION['newsletter_success']); ?>
        <?php elseif (isset($_SESSION['newsletter_error'])): ?>
            <p class="text-danger"><?= htmlspecialchars($_SESSION['newsletter_error']) ?></p>
            <?php unset($_SESSION['newsletter_error']); ?>
        <?php endif; ?>
    </div>
</div>
         </div>
                <div class="col-lg-2 col-md-6">
                <h3 class="text-footer pb-1"><?= htmlspecialchars($footer_translations['menu_title']) ?></h3>
                    <div class="d-flex flex-column align-items-start">
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-4" href="/">Accueil</a> -->
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-2" href="presentation.php">Présentation concise</a> -->
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-2" href="statistiques.php">Statistiques Clés</a> -->
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-2" href="programmes.php">Nos Programmes en un coup d'œil</a> -->
                        <a class="hover-effect paragraph-base grey-100 pt-2" href="  <?= generate_url('./about', $lang) ?>"><?= htmlspecialchars($footer_translations['about']) ?></a>
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-2" href="./about/mission">Notre Mission</a> -->
                        <a class="hover-effect paragraph-base grey-100 pt-2" href="
                          <?= generate_url('./contact', $lang) ?>"><?= htmlspecialchars($footer_translations['contact']) ?></a>
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-2" href="/">Actualités</a> -->
                        <a class="hover-effect paragraph-base grey-100 pt-2" href="  <?= generate_url('./programs', $lang) ?>"><?= htmlspecialchars($footer_translations['programs']) ?></a>
                        <a class="hover-effect paragraph-base grey-100 pt-2" href="  <?= generate_url('./lmic', $lang) ?>"><?= htmlspecialchars($footer_translations['lmic']) ?></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                <h3 class="text-footer pb-1"><?= htmlspecialchars($footer_translations['useful_links_title']) ?></h3>
                    <div class="d-flex flex-column align-items-start">
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-2" href="programme-education.php">Éducation</a> -->
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-2" href="programme-sante.php">Santé</a> -->
                        <!-- <a class="hover-effect paragraph-base grey-100 pt-2" href="/">Formation</a> <a class="hover-effect paragraph-base grey-100 pt-2" href="/formation/formation-en-ligne">Formation en Ligne</a> -->
                        <a class="hover-effect paragraph-base grey-100 pt-2" href="<?= generate_url('./contribute#pills-mentorat', $lang) ?>"><?= htmlspecialchars($footer_translations['mentor']) ?></a>
        <a class="hover-effect paragraph-base grey-100 pt-2" href="<?= generate_url('./contribute#pills-coach', $lang) ?>"><?= htmlspecialchars($footer_translations['coach']) ?></a>
        <a class="hover-effect paragraph-base grey-100 pt-2" href="<?= generate_url('./contribute#pills-partner', $lang) ?>"><?= htmlspecialchars($footer_translations['partner']) ?></a>
        <a class="hover-effect paragraph-base grey-100 pt-2" href="<?= generate_url('./faq', $lang) ?>"><?= htmlspecialchars($footer_translations['faq']) ?></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <h3 class="display-xl pb-1 color-white mb-2"><?= htmlspecialchars($footer_translations['stay_in_touch']) ?></h3>
                    <div class="box-contact-info">
                        <p class="sub-heading-md medium color-white mb-30">
                            <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.501579 25.014C0.501579 38.553 11.4705 49.528 25.0008 49.528C38.5311 49.528 49.5 38.553 49.5 25.014C49.5 11.475 38.5311 0.5 25.0008 0.5C11.4705 0.5 0.501579 11.475 0.501579 25.014Z" stroke="#EEEEEE" />
                                <path d="M16.0864 18.3372L18.6865 15.7381C19.0039 15.4205 19.4287 15.2422 19.8779 15.2422C20.3271 15.2422 20.752 15.4181 21.0693 15.7381L23.8696 18.535C24.187 18.8526 24.3652 19.2801 24.3652 19.7296C24.3652 20.1815 24.1895 20.6041 23.8696 20.9241L21.6821 23.1152C22.1805 24.277 22.8965 25.3325 23.7915 26.2249C24.6875 27.1263 25.7349 27.8371 26.897 28.3403L29.0845 26.1492C29.4019 25.8316 29.8267 25.6533 30.2759 25.6533C30.4975 25.6525 30.717 25.6959 30.9215 25.7811C31.1261 25.8662 31.3117 25.9914 31.4673 26.1492L34.27 28.9461C34.5874 29.2637 34.7656 29.6912 34.7656 30.1407C34.7656 30.5926 34.5898 31.0152 34.27 31.3352L31.6724 33.9343C31.1304 34.4766 30.3833 34.7868 29.6167 34.7868C29.458 34.7868 29.3042 34.7746 29.1479 34.7477C25.9155 34.2152 22.7075 32.4931 20.1172 29.9037C17.5293 27.3095 15.8105 24.0997 15.2734 20.863C15.1196 19.9445 15.4272 18.9992 16.0864 18.3372ZM17.0044 20.5723C17.4805 23.4524 19.0283 26.3251 21.3599 28.6579C23.6914 30.9908 26.5601 32.5395 29.4385 33.0158C29.7998 33.0769 30.1709 32.9547 30.4346 32.6934L32.9858 30.1407L30.2808 27.4316L27.356 30.363L27.334 30.3849L26.8066 30.1895C25.2077 29.6013 23.7557 28.6723 22.5513 27.4668C21.3469 26.2613 20.4189 24.8081 19.8315 23.2081L19.6362 22.6804L22.5854 19.732L19.8804 17.023L17.3291 19.5757C17.0654 19.8395 16.9434 20.2108 17.0044 20.5723Z"
                                fill="white" />
                            </svg>
                            <a href="tel:+2250708289006"><?= htmlspecialchars($footer_translations['phone']) ?></a>
                        </p>
                        <p class="sub-heading-md medium color-white mb-30">
                            <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.501579 25.3812C0.501579 38.9202 11.4705 49.8952 25.0008 49.8952C38.5311 49.8952 49.5 38.9202 49.5 25.3812C49.5 11.8422 38.5311 0.867188 25.0008 0.867188C11.4705 0.867188 0.501579 11.8422 0.501579 25.3812Z" stroke="#EEEEEE" />
                                <path d="M35.1562 16.7852H14.8438C14.4116 16.7852 14.0625 17.1345 14.0625 17.5668V33.2006C14.0625 33.633 14.4116 33.9823 14.8438 33.9823H35.1562C35.5884 33.9823 35.9375 33.633 35.9375 33.2006V17.5668C35.9375 17.1345 35.5884 16.7852 35.1562 16.7852ZM34.1797 19.4917V32.2235H15.8203V19.4917L15.1465 18.9666L16.106 17.733L17.1509 18.5464H32.8516L33.8965 17.733L34.856 18.9666L34.1797 19.4917ZM32.8516 18.544L25 24.6509L17.1484 18.544L16.1035 17.7305L15.144 18.9641L15.8179 19.4893L24.1577 25.9773C24.3976 26.1637 24.6926 26.265 24.9963 26.265C25.3001 26.265 25.5951 26.1637 25.835 25.9773L34.1797 19.4917L34.8535 18.9666L33.894 17.733L32.8516 18.544Z"
                                fill="white" />
                            </svg>
                            <a href="mailto:<?= htmlspecialchars($footer_translations['email']) ?>"><?= htmlspecialchars($footer_translations['email']) ?></a>
                        </p>
                        <p class="sub-heading-md medium color-white mb-30">
                            <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.501579 25.3734C0.501579 38.9124 11.4705 49.8874 25.0008 49.8874C38.5311 49.8874 49.5 38.9124 49.5 25.3734C49.5 11.8344 38.5311 0.859375 25.0008 0.859375C11.4705 0.859375 0.501579 11.8344 0.501579 25.3734Z" stroke="#EEEEEE" />
                                <path d="M32.8643 20.4293C32.4046 19.3689 31.7419 18.4087 30.9136 17.603C30.0825 16.7901 29.1027 16.1448 28.0278 15.7025C26.9097 15.2384 25.7231 15.0039 24.5 15.0039C23.2769 15.0039 22.0903 15.2384 20.9722 15.7001C19.8906 16.1471 18.9214 16.7871 18.0864 17.6006C17.2586 18.4067 16.596 19.3667 16.1357 20.4269C15.6597 21.5261 15.418 22.6938 15.418 23.8956C15.418 25.6202 15.8306 27.3375 16.6411 28.9937C17.293 30.325 18.2036 31.6221 19.3511 32.8557C21.3115 34.9614 23.3672 36.2487 23.9507 36.5931C24.1163 36.691 24.3052 36.7425 24.4976 36.7422C24.688 36.7422 24.876 36.6933 25.0444 36.5931C25.6279 36.2487 27.6836 34.9614 29.644 32.8557C30.7915 31.6245 31.7021 30.325 32.354 28.9937C33.1694 27.3399 33.582 25.6251 33.582 23.898C33.582 22.6962 33.3403 21.5286 32.8643 20.4293ZM24.5 34.8685C22.8911 33.845 17.1758 29.7925 17.1758 23.898C17.1758 21.9951 17.9351 20.207 19.3145 18.8586C20.6987 17.5077 22.5396 16.7627 24.5 16.7627C26.4604 16.7627 28.3013 17.5077 29.6855 18.861C31.0649 20.207 31.8242 21.9951 31.8242 23.898C31.8242 29.7925 26.1089 33.845 24.5 34.8685ZM24.5 19.7917C22.127 19.7917 20.2031 21.7166 20.2031 24.091C20.2031 26.4654 22.127 28.3903 24.5 28.3903C26.873 28.3903 28.7969 26.4654 28.7969 24.091C28.7969 21.7166 26.873 19.7917 24.5 19.7917ZM26.4336 26.0257C26.18 26.2802 25.8786 26.482 25.5468 26.6195C25.2149 26.757 24.8592 26.8275 24.5 26.8269C23.77 26.8269 23.084 26.5411 22.5664 26.0257C22.3121 25.772 22.1104 25.4704 21.973 25.1384C21.8355 24.8063 21.7651 24.4504 21.7656 24.091C21.7656 23.3606 22.0513 22.6742 22.5664 22.1563C23.084 21.6385 23.77 21.3551 24.5 21.3551C25.23 21.3551 25.916 21.6385 26.4336 22.1563C26.9512 22.6742 27.2344 23.3606 27.2344 24.091C27.2344 24.8214 26.9512 25.5078 26.4336 26.0257Z"
                                fill="white" />
                            </svg>
                            <?= htmlspecialchars($footer_translations['address']) ?>
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer-1 px-0">
                <div class="footer">
                    <div class="container py-4">
                        <div class="footer-bottom">
                        <div class="row paragraph-base">
    <div class="col">
        <div class="paragraph-rubik-r color-white">
            <?= htmlspecialchars($footer_translations['copyright']) ?>
            <?php echo date('Y'); ?> | <?= htmlspecialchars($footer_translations['all_rights_reserved']) ?>
            <a href="https://www.santemousso.net/" target="_blank">Sante 2.0</a>
        </div>
    </div>
    <div class="col d-flex justify-content-end">
        <ul class="menu-footer">
            <li><a href="<?= generate_url('./terms', $lang) ?>"><?= htmlspecialchars($footer_translations['conditions']) ?></a></li>
            <li><a href="<?= generate_url('./privacy', $lang) ?>"><?= htmlspecialchars($footer_translations['privacy']) ?></a></li>
        </ul>
    </div>
</div>
                        </div>
                    </div>
                </div>
     </div>
</footer>