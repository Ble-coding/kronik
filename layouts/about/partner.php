<?php
// Définir le chemin de la racine du projet
$base_path = dirname(__DIR__, 2); // Remonte de deux niveaux pour atteindre la racine
$lang = $lang ?? 'en'; // Définit une langue par défaut si $lang n'est pas défini

// Charger les traductions spécifiques à la page "partner"
$partner_translations = include "{$base_path}/languages/{$lang}/about/partner.php"; 
?>
<section class="box-section overflow-hidden ">
  <div class="text-center">
    <p class="title-line-both neutral-1200">   <?= $partner_translations['supported_and_accompanied_by'] ?? 'SOUTENUE ET ACCOMPAGNÉE PAR'; ?></p>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="box-logos-partner box-logos-partner-4-col">
      <div class="item-partner text-end">
        <img src="/assets/imgs/pages/home5/ministere_sante.png" alt="kronik" />
      </div>
      <div class="item-partner text-end">
        <img src="/assets/imgs/pages/home5/ministere_transition.png" alt="kronik" />
      </div>
      <div class="item-partner text-end">
        <img src="/assets/imgs/pages/home5/pnud.png" alt="kronik" />
      </div>
      <div class="item-partner text-end">
        <img src="/assets/imgs/pages/home5/snci.png" alt="kronik" />
      </div>
    </div>
  </div>
  <div class="text-center">
    <p class="title-line-both neutral-1200">  <?= $partner_translations['our_partners'] ?? 'NOS PARTENAIRES'; ?></p>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="box-logos-partner box-logos-partner-5-col">
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/disd_logo.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/pape.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/roche.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/ordre_medecin.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/innov_keneya.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/snci.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/ci20.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/psp_ci.png" alt="kronik" />
      </div>
  
    
  


      <!-- <div class="item-partner">
        <img src="/assets/imgs/pages/home5/pro_paiement.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/perfom.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/see_logo.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/amiral_logo.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/interaction.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/gombo_hive.png" alt="kronik" />
      </div> -->
    </div>
  </div>

  <div class="text-center">
    <p class="title-line-both neutral-1200">     <?= $partner_translations['founding_members'] ?? 'MEMBRES FONDATEURS'; ?></p>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="box-logos-partner box-logos-partner-4-col">
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/pass_mousso.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/carein.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/skanned.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/care_digi.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/waba.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/blue_hand.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/opism_logo.png" alt="kronik" />
      </div>
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/kimbocar.png" alt="kronik" />
      </div>
    </div>
  </div>

  <div class="mt-3 text-center">
    <p class="title-line-both neutral-1200">     <?= $partner_translations['members'] ?? 'MEMBRES'; ?></p>
  </div>

  <div class="container" data-aos="fade-up">
  <div class="box-logos-partner box-logos-partner-5-col">
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/pass_mousso.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/carein.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/ewimin.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/skanned.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/opism_logo.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/zen.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/docaya.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/waba.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/care_digi.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/kimbocar.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/coursier.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/yodan.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/waspito.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/tech_care.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/cliniko.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/blue_hand.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/altea.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/sgci.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/pps.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/inps.png" alt="kronik" />
    </div>
    <div class="item-partner">
      <img src="/assets/imgs/pages/home5/chap.png" alt="kronik" />
    </div>
  </div>
</div>

</section>

<!-- <section class="box-section overflow-hidden ">
  <div class="text-center">
    <p class="title-line-both neutral-1200"> SOUTENUE ET ACCOMPAGNÉE PAR</p>
  </div>
  <div class="container" data-aos="fade-up">
    <div class="box-logos-partner box-logos-partner-5-col">
      <div class="item-partner">
        <img src="/assets/imgs/pages/home5/ordre_medecin.png" alt="kronik" />
      </div>
      <div class="item-partner text-center">
        <img src="/assets/imgs/pages/home5/pass_mousso.png" alt="kronik" />
      </div>
 
      <div class="item-partner text-center">
        <img src="/assets/imgs/pages/home5/pnud.png" alt="kronik" />
      </div>
      <div class="item-partner text-end">
        <img src="/assets/imgs/pages/home5/roche.png" alt="kronik" />
      </div>
      <div class="item-partner text-end">
        <img src="/assets/imgs/pages/home5/ministere_sante.png" alt="kronik" />
      </div>
    </div>
  </div>
</section> -->