
<section class="box-section box-contact-section-2">
  <div class="container" data-aos="fade-up">
    <h1 class="heading-jakarta-55 dark-950 mb-5">
      Devenir Coach
    </h1>
    <p class="p-classik mb-4">
      Merci de votre intérêt à rejoindre notre équipe en tant que coach pour Kronik X Health. Veuillez remplir ce formulaire pour nous permettre de mieux comprendre vos compétences et votre expertise.
    </p>

    <div class="col-lg-12">
      <div class="form-contact-us">
      <?php
if (!isset($_SESSION)) {
    session_start();
}

$errors_coach = $_SESSION['coach_form_errors'] ?? [];
$old_coach = $_SESSION['coach_form_old'] ?? [];

// Supprime uniquement les erreurs et anciennes données après récupération
unset($_SESSION['coach_form_errors']);
unset($_SESSION['coach_form_old']);

error_log("errors_coach on form display: " . print_r($errors_coach, true));
?>

<form action="mail/coachMail.php" method="post" enctype="multipart/form-data">
  <!-- Section 1: Informations Personnelles -->
  <h4 class="mb-3">1. Informations Personnelles</h4>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" name="full_name" placeholder="Nom complet" 
               value="<?= htmlspecialchars($old_coach['full_name'] ?? '') ?>" />
        <?php if (isset($errors_coach['full_name'])): ?>
          <small class="text-danger"><?= $errors_coach['full_name'] ?></small>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type="text" class="form-control" name="address" placeholder="Adresse (Ville, Pays)" 
               value="<?= htmlspecialchars($old_coach['address'] ?? '') ?>" />
        <?php if (isset($errors_coach['address'])): ?>
          <small class="text-danger"><?= $errors_coach['address'] ?></small>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type="tel" class="form-control" name="phone" placeholder="Numéro de téléphone" 
               value="<?= htmlspecialchars($old_coach['phone'] ?? '') ?>" />
        <?php if (isset($errors_coach['phone'])): ?>
          <small class="text-danger"><?= $errors_coach['phone'] ?></small>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="Adresse e-mail" 
               value="<?= htmlspecialchars($old_coach['email'] ?? '') ?>" />
        <?php if (isset($errors_coach['email'])): ?>
          <small class="text-danger"><?= $errors_coach['email'] ?></small>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="profilePhoto">Photo de profil (formats acceptés : .png, .jpg) :</label>
    <input type="file" class="form-control" name="profile_photo" id="profilePhoto" accept=".png, .jpg, .jpeg" />
    <?php if (isset($errors_coach['profile_photo'])): ?>
      <small class="text-danger"><?= $errors_coach['profile_photo'] ?></small>
    <?php endif; ?>
  </div>

  <!-- Section 2: Informations Professionnelles -->
  <h4 class="mt-4 mb-3">2. Informations Professionnelles</h4>
  <div class="form-group">
    <input type="text" class="form-control" name="current_position" placeholder="Poste actuel" 
           value="<?= htmlspecialchars($old_coach['current_position'] ?? '') ?>" />
    <?php if (isset($errors_coach['current_position'])): ?>
      <small class="text-danger"><?= $errors_coach['current_position'] ?></small>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="organization" placeholder="Organisation/Entreprise actuelle" 
           value="<?= htmlspecialchars($old_coach['organization'] ?? '') ?>" />
    <?php if (isset($errors_coach['organization'])): ?>
      <small class="text-danger"><?= $errors_coach['organization'] ?></small>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="industry" placeholder="Secteur d’activité" 
           value="<?= htmlspecialchars($old_coach['industry'] ?? '') ?>" />
    <?php if (isset($errors_coach['industry'])): ?>
      <small class="text-danger"><?= $errors_coach['industry'] ?></small>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="logoUpload">Logo de votre organisation (facultatif) :</label>
    <input type="file" class="form-control" name="organization_logo" id="logoUpload" accept=".png, .jpg, .svg" />
    <?php if (isset($errors_coach['organization_logo'])): ?>
      <small class="text-danger"><?= $errors_coach['organization_logo'] ?></small>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <input type="url" class="form-control" name="linkedin" placeholder="Site Web ou LinkedIn (facultatif)" 
           value="<?= htmlspecialchars($old_coach['linkedin'] ?? '') ?>" />
    <?php if (isset($errors_coach['linkedin'])): ?>
      <small class="text-danger"><?= $errors_coach['linkedin'] ?></small>
    <?php endif; ?>
  </div>

  <!-- Section 3: Domaines d’Expertise et Compétences -->
  <h4 class="mt-4 mb-3">3. Domaines d’Expertise et Compétences</h4>
  <div class="form-group">
    <label>Domaines d’expertise : (Cochez les domaines pertinents)</label>
    <div>
      <?php
      $expertise_options = [
        "Leadership" => "Leadership et développement personnel",
        "Gestion" => "Gestion de projet",
        "Tech Development" => "Développement de produits technologiques",
        "Data Analysis" => "Analyse de données et IA",
        "Marketing" => "Stratégies marketing et commerciales",
        "Communication" => "Communication et storytelling",
        "Business Models" => "Modèles économiques et planification financière",
        "Regulation" => "Réglementation en santé numérique"
      ];
      foreach ($expertise_options as $value => $label):
        $checked = in_array($value, $old_coach['expertise'] ?? []) ? "checked" : "";
      ?>
        <label><input type="checkbox" name="expertise[]" value="<?= $value ?>" <?= $checked ?> /> <?= $label ?></label><br />
      <?php endforeach; ?>
      <label><input type="checkbox" name="expertise[]" value="Other" <?= in_array("Other", $old_coach['expertise'] ?? []) ? "checked" : "" ?> /> Autres :</label>
      <input type="text" name="other_expertise" class="form-control d-inline-block w-auto" 
             placeholder="Précisez" value="<?= htmlspecialchars($old_coach['other_expertise'] ?? '') ?>" />
    </div>
    <?php if (isset($errors_coach['expertise'])): ?>
      <small class="text-danger"><?= $errors_coach['expertise'] ?></small>
    <?php endif; ?>
  </div>

  <!-- Section 4: Motivations -->
  <h4 class="mt-4 mb-3">4. Motivations pour Devenir Coach</h4>
  <div class="form-group">
    <textarea class="form-control" name="motivation" rows="4" placeholder="Pourquoi souhaitez-vous devenir coach ?" ><?= htmlspecialchars($old_coach['motivation'] ?? '') ?></textarea>
    <?php if (isset($errors_coach['motivation'])): ?>
      <small class="text-danger"><?= $errors_coach['motivation'] ?></small>
    <?php endif; ?>
  </div>

  <!-- Section 5: Documents -->
  <h4 class="mt-4 mb-3">5. Documents Complémentaires</h4>
  <div class="form-group">
    <label for="cvUpload">Joindre votre CV ou profil professionnel :</label>
    <input type="file" class="form-control" name="cv" id="cvUpload" accept=".pdf, .doc" />
    <?php if (isset($errors_coach['cv'])): ?>
      <small class="text-danger"><?= $errors_coach['cv'] ?></small>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="additionalDocs">Autres documents pertinents :</label>
    <input type="file" class="form-control" name="additional_docs[]" id="additionalDocs" multiple />
    <?php if (isset($errors_coach['additional_docs'])): ?>
      <small class="text-danger"><?= is_array($errors_coach['additional_docs']) ? implode('<br>', $errors_coach['additional_docs']) : $errors_coach['additional_docs'] ?></small>
    <?php endif; ?>
  </div>

  <!-- Section 6: Déclaration et Signature -->
  <h4 class="mt-4 mb-3">6. Déclaration et Signature</h4>
  <div class="form-group">
    <input type="text" class="form-control" name="signatory_name" placeholder="Nom du signataire" 
           value="<?= htmlspecialchars($old_coach['signatory_name'] ?? '') ?>" />
    <?php if (isset($errors_coach['signatory_name'])): ?>
      <small class="text-danger"><?= $errors_coach['signatory_name'] ?></small>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <input type="date" class="form-control" name="signature_date" value="<?= htmlspecialchars($old_coach['signature_date'] ?? '') ?>" />
    <?php if (isset($errors_coach['signature_date'])): ?>
      <small class="text-danger"><?= $errors_coach['signature_date'] ?></small>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label>
      <input type="checkbox" name="confirmation" <?= !empty($old_coach['confirmation']) ? "checked" : "" ?> />
      Je certifie que les informations fournies sont exactes et complètes.
    </label>
    <?php if (isset($errors_coach['confirmation'])): ?>
      <small class="text-danger"><?= $errors_coach['confirmation'] ?></small>
    <?php endif; ?>
  </div>

    <!-- Bouton de soumission -->
    <div class="form-group mt-5">
        <button type="submit" class="btn btn-primary-home-square w-100">Soumettre le Formulaire</button>
    </div>
</form>

      </div>
    </div>
  </div>
</section>
