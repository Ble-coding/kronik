<?php

// Charger les traductions pour le formulaire
$form_translations = include __DIR__ . "/../../languages/{$lang}/contribute/partnerForm.php";
if (!isset($_SESSION)) {
session_start();
} 

$errors_partner = $_SESSION['partner_form_errors'] ?? [];
$old_partner = $_SESSION['partner_form_old'] ?? [];

// Supprime uniquement les erreurs et anciennes données après récupération
unset($_SESSION['partner_form_errors']);
unset($_SESSION['partner_form_old']);

error_log("errors_partner on form display: " . print_r($errors_partner, true));
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

<form action="mail/partnerMail.php?lang=<?= htmlspecialchars($lang) ?>" method="post" enctype="multipart/form-data">
    <!-- Section 1: Informations Générales sur l’Organisation -->
    <h4 class="mb-3"><?= htmlspecialchars($form_translations['section_titles']['general_info']) ?></h4>

<div class="form-group">
  <input type="text" class="form-control" name="organization_name" 
         placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_name']) ?>"
         value="<?= htmlspecialchars($old_partner['organization_name'] ?? '') ?>" />
  <?php if (isset($errors_partner['organization_name'])): ?>
    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_name']) ?></small>
  <?php endif; ?>
</div>

<div class="form-group">
  <input type="text" class="form-control" name="organization_address" 
         placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_address']) ?>"
         value="<?= htmlspecialchars($old_partner['organization_address'] ?? '') ?>" />
  <?php if (isset($errors_partner['organization_address'])): ?>
    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_address']) ?></small>
  <?php endif; ?>
</div>

<div class="form-group">
  <input type="tel" class="form-control" name="organization_phone" 
         placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_phone']) ?>"
         value="<?= htmlspecialchars($old_partner['organization_phone'] ?? '') ?>" />
  <?php if (isset($errors_partner['organization_phone'])): ?>
    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_phone']) ?></small>
  <?php endif; ?>
</div>

<div class="form-group">
  <input type="email" class="form-control" name="organization_email" 
         placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_email']) ?>"
         value="<?= htmlspecialchars($old_partner['organization_email'] ?? '') ?>" />
  <?php if (isset($errors_partner['organization_email'])): ?>
    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_email']) ?></small>
  <?php endif; ?>
</div>

<div class="form-group">
  <input type="url" class="form-control" name="organization_website" 
         placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_website']) ?>"
         value="<?= htmlspecialchars($old_partner['organization_website'] ?? '') ?>" />
</div>
<h4 class="mt-4 mb-3">
    <?= htmlspecialchars($form_translations['section_titles']['contact_details']) ?>
</h4>

<div class="form-group">
    <input type="text" class="form-control" name="contact_name" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['contact_name']) ?>"
           value="<?= htmlspecialchars($old_partner['contact_name'] ?? '') ?>" />
    <?php if (isset($errors_partner['contact_name'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['contact_name']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <input type="text" class="form-control" name="contact_position" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['contact_position']) ?>"
           value="<?= htmlspecialchars($old_partner['contact_position'] ?? '') ?>" />
    <?php if (isset($errors_partner['contact_position'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['contact_position']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <input type="tel" class="form-control" name="contact_phone" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['contact_phone']) ?>"
           value="<?= htmlspecialchars($old_partner['contact_phone'] ?? '') ?>" />
    <?php if (isset($errors_partner['contact_phone'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['contact_phone']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <input type="email" class="form-control" name="contact_email" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['contact_email']) ?>"
           value="<?= htmlspecialchars($old_partner['contact_email'] ?? '') ?>" />
    <?php if (isset($errors_partner['contact_email'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['contact_email']) ?></small>
    <?php endif; ?>
</div>

<h4 class="mt-4 mb-3">
    <?= htmlspecialchars($form_translations['section_titles']['organization_info']) ?>
</h4>

<div class="form-group">
    <input type="text" class="form-control" name="organization_sector"
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_sector']) ?>"
           value="<?= htmlspecialchars($old_partner['organization_sector'] ?? '') ?>" />
    <?php if (isset($errors_partner['organization_sector'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_sector']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <select class="form-control" name="organization_size">
        <option value="" disabled <?= empty($old_partner['organization_size']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($form_translations['placeholders']['organization_size']) ?>
        </option>
        <?php foreach (['Small Business', 'Medium Business', 'Large Enterprise', 'International NGO'] as $size): ?>
            <option value="<?= $size ?>" <?= ($old_partner['organization_size'] ?? '') === $size ? 'selected' : '' ?>>
                <?= $size ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?php if (isset($errors_partner['organization_size'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_size']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <textarea class="form-control" name="organization_expertise" rows="3"
              placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_expertise']) ?>"><?= htmlspecialchars($old_partner['organization_expertise'] ?? '') ?></textarea>
    <?php if (isset($errors_partner['organization_expertise'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_expertise']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <textarea class="form-control" name="organization_experience" rows="3"
              placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization_experience']) ?>"><?= htmlspecialchars($old_partner['organization_experience'] ?? '') ?></textarea>
    <?php if (isset($errors_partner['organization_experience'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_experience']) ?></small>
    <?php endif; ?>
</div>

<h4 class="mt-4 mb-3">
    <?= htmlspecialchars($form_translations['section_titles']['partnership_goals']) ?>
</h4>

<div class="form-group">
    <textarea class="form-control" name="partnership_objectives" rows="4"
              placeholder="<?= htmlspecialchars($form_translations['placeholders']['partnership_objectives']) ?>"><?= htmlspecialchars($old_partner['partnership_objectives'] ?? '') ?></textarea>
    <?php if (isset($errors_partner['partnership_objectives'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['partnership_objectives']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <label>
        <?= htmlspecialchars($form_translations['labels']['support_types']) ?>
    </label>
    <div>
        <?php foreach ($form_translations['support_types'] as $value => $label): ?>
            <?php $checked = in_array($value, $old_partner['support_types'] ?? []) ? 'checked' : ''; ?>
            <label>
                <input type="checkbox" name="support_types[]" value="<?= htmlspecialchars($value) ?>" <?= $checked ?> />
                <?= htmlspecialchars($label) ?>
            </label><br />
        <?php endforeach; ?>
        <input type="text" name="other_support" class="form-control d-inline-block w-auto mt-2"
               placeholder="<?= htmlspecialchars($form_translations['placeholders']['other_support']) ?>"
               value="<?= htmlspecialchars($old_partner['other_support'] ?? '') ?>" />
    </div>
    <?php if (isset($errors_partner['support_types'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['support_types']) ?></small>
    <?php endif; ?>
</div>

<!-- Section 5: Documents et Informations Complémentaires -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['documents']) ?></h4>
<div class="form-group">
    <label for="logoUpload"><?= htmlspecialchars($form_translations['labels']['organization_logo_5']) ?></label>
    <input type="file" class="form-control" name="organization_logo_5" id="logoUpload" accept=".png, .jpg, .svg" />
    <?php if (isset($errors_partner['organization_logo_5'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['organization_logo_5']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="additionalDocs"><?= htmlspecialchars($form_translations['labels']['additional_docs']) ?></label>
    <input type="file" class="form-control" name="additional_docs[]" id="additionalDocs" multiple />
    <?php if (isset($errors_partner['additional_docs'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['additional_docs']) ?></small>
    <?php endif; ?>
</div>

<!-- Section 6: Déclaration et Signature -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['declaration']) ?></h4>
<div class="form-group">
    <input type="text" class="form-control" name="signatory_name" placeholder="<?= htmlspecialchars($form_translations['placeholders']['signatory_name']) ?>"
           value="<?= htmlspecialchars($old_partner['signatory_name'] ?? '') ?>" />
    <?php if (isset($errors_partner['signatory_name'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['signatory_name']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <input type="text" class="form-control" name="signatory_position" placeholder="<?= htmlspecialchars($form_translations['placeholders']['signatory_position']) ?>"
           value="<?= htmlspecialchars($old_partner['signatory_position'] ?? '') ?>" />
    <?php if (isset($errors_partner['signatory_position'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['signatory_position']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <input type="date" class="form-control" name="signature_date"
           value="<?= htmlspecialchars($old_partner['signature_date'] ?? '') ?>" />
    <?php if (isset($errors_partner['signature_date'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['signature_date']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <label>
        <input type="checkbox" name="confirmation" <?= !empty($old_partner['confirmation']) ? 'checked' : '' ?> />
        <?= htmlspecialchars($form_translations['labels']['confirmation']) ?>
    </label>
    <?php if (isset($errors_partner['confirmation'])): ?>
        <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['confirmation']) ?></small>
    <?php endif; ?>
</div>

    <!-- Bouton de soumission -->
    <div class="form-group mt-5">
    <button type="submit" class="btn btn-primary-home-square">
          <?= htmlspecialchars($form_translations['buttons']['submit']) ?>
        </button>
    </div>

</form>

      </div>
    </div>
  </div>
</section>
