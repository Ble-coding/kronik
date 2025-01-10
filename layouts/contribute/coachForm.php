
<?php
      // Charger les traductions pour le formulaire
$form_translations = include __DIR__ . "/../../languages/{$lang}/contribute/coachForm.php";

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
<section class="box-section box-contact-section-2">
  <div class="container" data-aos="fade-up">
    <h1 class="heading-jakarta-55 dark-950 mb-5">
    <?= htmlspecialchars($form_translations['title']) ?>
</h1>
<p class="p-classik mb-4">
    <?= htmlspecialchars($form_translations['description']) ?>
</p>

    <div class="col-lg-12">
      <div class="form-contact-us">
 

<form action="mail/coachMail.php?lang=<?= htmlspecialchars($lang) ?>" method="post" enctype="multipart/form-data">
  <!-- Section 1: Informations Personnelles -->
  <h4 class="mb-3">1. Informations Personnelles</h4>
  <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" name="full_name" 
                   placeholder="<?= htmlspecialchars($form_translations['placeholders']['full_name']) ?>" 
                   value="<?= htmlspecialchars($old_coach['full_name'] ?? '') ?>" />
            <?php if (isset($errors_coach['full_name'])): ?>
                <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['full_name']) ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" name="address" 
                   placeholder="<?= htmlspecialchars($form_translations['placeholders']['address']) ?>" 
                   value="<?= htmlspecialchars($old_coach['address'] ?? '') ?>" />
            <?php if (isset($errors_coach['address'])): ?>
                <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['address']) ?></small>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="tel" class="form-control" name="phone" 
                   placeholder="<?= htmlspecialchars($form_translations['placeholders']['phone']) ?>" 
                   value="<?= htmlspecialchars($old_coach['phone'] ?? '') ?>" />
            <?php if (isset($errors_coach['phone'])): ?>
                <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['phone']) ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="email" class="form-control" name="email" 
                   placeholder="<?= htmlspecialchars($form_translations['placeholders']['email']) ?>" 
                   value="<?= htmlspecialchars($old_coach['email'] ?? '') ?>" />
            <?php if (isset($errors_coach['email'])): ?>
                <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['email']) ?></small>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="profilePhoto"><?= htmlspecialchars($form_translations['labels']['profile_photo']) ?></label>
    <input type="file" class="form-control" name="profile_photo" id="profilePhoto" accept=".png, .jpg, .jpeg" />
    <?php if (isset($errors_coach['profile_photo'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['profile_photo']) ?></small>
    <?php endif; ?>
</div>

 <!-- Section 2: Informations Professionnelles -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['professional_info']) ?></h4>

<div class="form-group">
    <input type="text" class="form-control" name="current_position" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['current_position_placeholder']) ?>" 
           value="<?= htmlspecialchars($old_coach['current_position'] ?? '') ?>" />
    <?php if (isset($errors_coach['current_position'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['current_position']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <input type="text" class="form-control" name="organization" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_placeholder']) ?>" 
           value="<?= htmlspecialchars($old_coach['organization'] ?? '') ?>" />
    <?php if (isset($errors_coach['organization'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <input type="text" class="form-control" name="industry" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['industry_placeholder']) ?>" 
           value="<?= htmlspecialchars($old_coach['industry'] ?? '') ?>" />
    <?php if (isset($errors_coach['industry'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['industry']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="logoUpload"><?= htmlspecialchars($form_translations['labels']['organization_logo']) ?></label>
    <input type="file" class="form-control" name="organization_logo" id="logoUpload" accept=".png, .jpg, .svg" />
    <?php if (isset($errors_coach['organization_logo'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_logo']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <input type="url" class="form-control" name="linkedin" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['linkedin_placeholder']) ?>" 
           value="<?= htmlspecialchars($old_coach['linkedin'] ?? '') ?>" />
    <?php if (isset($errors_coach['linkedin'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['linkedin']) ?></small>
    <?php endif; ?>
</div>


<!-- Section 3: Domaines d’Expertise et Compétences -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['expertise_and_skills']) ?></h4>

<div class="form-group">
    <label><?= htmlspecialchars($form_translations['labels']['expertise_label']) ?></label>
    <div>
        <?php
        foreach ($form_translations['expertise_options'] as $value => $label):
            $checked = in_array($value, $old_coach['expertise'] ?? []) ? "checked" : "";
        ?>
            <label>
                <input type="checkbox" name="expertise[]" value="<?= htmlspecialchars($value) ?>" <?= $checked ?> />
                <?= htmlspecialchars($label) ?>
            </label><br />
        <?php endforeach; ?>
        
        <!-- Autres (avec champ texte) -->
        <label>
            <input type="checkbox" name="expertise[]" value="Other" <?= in_array("Other", $old_coach['expertise'] ?? []) ? "checked" : "" ?> />
            <?= htmlspecialchars($form_translations['labels']['other_expertise_label']) ?> :
        </label>
        <input type="text" name="other_expertise" class="form-control d-inline-block w-auto"
               placeholder="<?= htmlspecialchars($form_translations['placeholders']['other_expertise_placeholder']) ?>"
               value="<?= htmlspecialchars($old_coach['other_expertise'] ?? '') ?>" />
    </div>
    <?php if (isset($errors_coach['expertise'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['expertise']) ?></small>
    <?php endif; ?>
</div>

 <!-- Section 4: Motivations -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['motivation']) ?></h4>
<div class="form-group">
    <textarea class="form-control" name="motivation" rows="4"
              placeholder="<?= htmlspecialchars($form_translations['placeholders']['motivation_placeholder']) ?>"><?= htmlspecialchars($old_coach['motivation'] ?? '') ?></textarea>
    <?php if (isset($errors_coach['motivation'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['motivation']) ?></small>
    <?php endif; ?>
</div>

 <!-- Section 5: Documents -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['documents']) ?></h4>
<div class="form-group">
    <label for="cvUpload"><?= htmlspecialchars($form_translations['labels']['cv_upload']) ?></label>
    <input type="file" class="form-control" name="cv" id="cvUpload" accept=".pdf, .doc" />
    <?php if (isset($errors_coach['cv'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['cv']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="additionalDocs"><?= htmlspecialchars($form_translations['labels']['additional_docs']) ?></label>
    <input type="file" class="form-control" name="additional_docs[]" id="additionalDocs" multiple />
    <?php if (isset($errors_coach['additional_docs'])): ?>
        <small class="text-danger"><?= is_array($errors_coach['additional_docs']) ? implode('<br>', array_map('htmlspecialchars', $errors_coach['additional_docs'])) : htmlspecialchars($errors_coach['additional_docs']) ?></small>
    <?php endif; ?>
</div>


<!-- Section 6: Déclaration et Signature -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['declaration_and_signature']) ?></h4>
<div class="form-group">
    <input type="text" class="form-control" name="signatory_name" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['signatory_name_placeholder']) ?>" 
           value="<?= htmlspecialchars($old_coach['signatory_name'] ?? '') ?>" />
    <?php if (isset($errors_coach['signatory_name'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['signatory_name']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <input type="date" class="form-control" name="signature_date" 
           value="<?= htmlspecialchars($old_coach['signature_date'] ?? '') ?>" />
    <?php if (isset($errors_coach['signature_date'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['signature_date']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group"> 
    <label>
        <input type="checkbox" name="confirmation" <?= !empty($old_coach['confirmation']) ? "checked" : "" ?> />
        <?= htmlspecialchars($form_translations['labels']['confirmation_label']) ?>
    </label>
    <?php if (isset($errors_coach['confirmation'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['confirmation']) ?></small>
    <?php endif; ?>
</div>

<!-- Bouton de soumission -->
<div class="form-group mt-5">
    <button type="submit" class="btn btn-primary-home-square w-100">
        <?= htmlspecialchars($form_translations['buttons']['submit_form']) ?>
    </button>
</div>

</form>

      </div>
    </div>
  </div>
</section>