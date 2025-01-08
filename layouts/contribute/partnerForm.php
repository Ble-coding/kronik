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
    <h4 class="mb-3">1. Informations Générales sur l’Organisation</h4>
    <div class="form-group">
        <input type="text" class="form-control" name="organization_name" placeholder="Nom de l’Organisation"
               value="<?= htmlspecialchars($old_partner['organization_name'] ?? '') ?>" />
        <?php if (isset($errors_partner['organization_name'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_name'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="organization_address" placeholder="Adresse (Siège social ou bureau principal)"
               value="<?= htmlspecialchars($old_partner['organization_address'] ?? '') ?>" />
        <?php if (isset($errors_partner['organization_address'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_address'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="tel" class="form-control" name="organization_phone" placeholder="Téléphone"
               value="<?= htmlspecialchars($old_partner['organization_phone'] ?? '') ?>" />
        <?php if (isset($errors_partner['organization_phone'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_phone'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="organization_email" placeholder="Adresse e-mail"
               value="<?= htmlspecialchars($old_partner['organization_email'] ?? '') ?>" />
        <?php if (isset($errors_partner['organization_email'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_email'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="url" class="form-control" name="organization_website" placeholder="Site Web (url)"
               value="<?= htmlspecialchars($old_partner['organization_website'] ?? '') ?>" />
    </div>

    <!-- Section 2: Détails du Contact Principal -->
    <h4 class="mt-4 mb-3">2. Détails du Contact Principal</h4>
    <div class="form-group">
        <input type="text" class="form-control" name="contact_name" placeholder="Nom et Prénom"
               value="<?= htmlspecialchars($old_partner['contact_name'] ?? '') ?>" />
        <?php if (isset($errors_partner['contact_name'])): ?>
            <small class="text-danger"><?= $errors_partner['contact_name'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="contact_position" placeholder="Fonction/Poste"
               value="<?= htmlspecialchars($old_partner['contact_position'] ?? '') ?>" />
        <?php if (isset($errors_partner['contact_position'])): ?>
            <small class="text-danger"><?= $errors_partner['contact_position'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="tel" class="form-control" name="contact_phone" placeholder="Téléphone"
               value="<?= htmlspecialchars($old_partner['contact_phone'] ?? '') ?>" />
        <?php if (isset($errors_partner['contact_phone'])): ?>
            <small class="text-danger"><?= $errors_partner['contact_phone'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="email" class="form-control" name="contact_email" placeholder="E-mail"
               value="<?= htmlspecialchars($old_partner['contact_email'] ?? '') ?>" />
        <?php if (isset($errors_partner['contact_email'])): ?>
            <small class="text-danger"><?= $errors_partner['contact_email'] ?></small>
        <?php endif; ?>
    </div>
    <!-- Section 3: Informations sur l’Organisation -->
    <h4 class="mt-4 mb-3">3. Informations sur l’Organisation</h4>
    <div class="form-group">
        <input type="text" class="form-control" name="organization_sector" placeholder="Secteur d’activité"
               value="<?= htmlspecialchars($old_partner['organization_sector'] ?? '') ?>" />
        <?php if (isset($errors_partner['organization_sector'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_sector'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <select class="form-control" name="organization_size">
            <option value="" disabled <?= empty($old_partner['organization_size']) ? 'selected' : '' ?>>Taille de l’organisation</option>
            <option value="Petite entreprise" <?= ($old_partner['organization_size'] ?? '') === 'Petite entreprise' ? 'selected' : '' ?>>Petite entreprise</option>
            <option value="Moyenne entreprise" <?= ($old_partner['organization_size'] ?? '') === 'Moyenne entreprise' ? 'selected' : '' ?>>Moyenne entreprise</option>
            <option value="Grande entreprise" <?= ($old_partner['organization_size'] ?? '') === 'Grande entreprise' ? 'selected' : '' ?>>Grande entreprise</option>
            <option value="ONG internationale" <?= ($old_partner['organization_size'] ?? '') === 'ONG internationale' ? 'selected' : '' ?>>ONG internationale</option>
        </select>
        <?php if (isset($errors_partner['organization_size'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_size'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="organization_expertise" rows="3" placeholder="Domaines d’expertise pertinents"><?= htmlspecialchars($old_partner['organization_expertise'] ?? '') ?></textarea>
        <?php if (isset($errors_partner['organization_expertise'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_expertise'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="organization_experience" rows="3" placeholder="Expérience avec des initiatives similaires"><?= htmlspecialchars($old_partner['organization_experience'] ?? '') ?></textarea>
        <?php if (isset($errors_partner['organization_experience'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_experience'] ?></small>
        <?php endif; ?>
    </div>

    <!-- Section 4: Objectifs du Partenariat -->
    <h4 class="mt-4 mb-3">4. Objectifs du Partenariat</h4>
    <div class="form-group">
        <textarea class="form-control" name="partnership_objectives" rows="4" placeholder="Pourquoi souhaitez-vous devenir partenaire ?"><?= htmlspecialchars($old_partner['partnership_objectives'] ?? '') ?></textarea>
        <?php if (isset($errors_partner['partnership_objectives'])): ?>
            <small class="text-danger"><?= $errors_partner['partnership_objectives'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>Types de soutien proposés :</label>
        <div>
            <?php 
            $support_types = [
                "Financier" => "Financier",
                "Technique" => "Technique",
                "Formation" => "Formation et renforcement de capacités",
                "Communication" => "Communication et sensibilisation",
                "Accès aux réseaux" => "Accès aux réseaux ou aux ressources",
                "Autres" => "Autres"
            ];
            foreach ($support_types as $value => $label): 
                $checked = in_array($value, $old_partner['support_types'] ?? []) ? 'checked' : '';
            ?>
                <label>
                    <input type="checkbox" name="support_types[]" value="<?= $value ?>" <?= $checked ?> /> <?= $label ?>
                </label><br />
            <?php endforeach; ?>
            <input type="text" name="other_support" class="form-control d-inline-block w-auto mt-2" placeholder="Précisez" 
                   value="<?= htmlspecialchars($old_partner['other_support'] ?? '') ?>" />
        </div>
        <?php if (isset($errors_partner['support_types'])): ?>
            <small class="text-danger"><?= $errors_partner['support_types'] ?></small>
        <?php endif; ?>
    </div>

    <!-- Section 5: Documents et Informations Complémentaires -->
    <h4 class="mt-4 mb-3">5. Documents et Informations Complémentaires</h4>
    <div class="form-group">
        <label for="logoUpload">Joindre votre logo :</label>
        <input type="file" class="form-control" name="organization_logo" id="logoUpload" accept=".png, .jpg, .svg" />
        <?php if (isset($errors_partner['organization_logo'])): ?>
            <small class="text-danger"><?= $errors_partner['organization_logo'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="additionalDocs">Joindre des documents pertinents :</label>
        <input type="file" class="form-control" name="additional_docs[]" id="additionalDocs" multiple />
        <?php if (isset($errors_partner['additional_docs'])): ?>
            <small class="text-danger"><?= $errors_partner['additional_docs'] ?></small>
        <?php endif; ?>
    </div>

    <!-- Section 6: Déclaration et Signature -->
    <h4 class="mt-4 mb-3">6. Déclaration et Signature</h4>
    <div class="form-group">
        <input type="text" class="form-control" name="signatory_name" placeholder="Nom du signataire"
               value="<?= htmlspecialchars($old_partner['signatory_name'] ?? '') ?>" />
        <?php if (isset($errors_partner['signatory_name'])): ?>
            <small class="text-danger"><?= $errors_partner['signatory_name'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="signatory_position" placeholder="Fonction"
               value="<?= htmlspecialchars($old_partner['signatory_position'] ?? '') ?>" />
        <?php if (isset($errors_partner['signatory_position'])): ?>
            <small class="text-danger"><?= $errors_partner['signatory_position'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="date" class="form-control" name="signature_date"
               value="<?= htmlspecialchars($old_partner['signature_date'] ?? '') ?>" />
        <?php if (isset($errors_partner['signature_date'])): ?>
            <small class="text-danger"><?= $errors_partner['signature_date'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="confirmation" <?= !empty($old_partner['confirmation']) ? 'checked' : '' ?> />
            Je certifie que les informations fournies dans ce formulaire sont exactes et complètes.
        </label>
        <?php if (isset($errors_partner['confirmation'])): ?>
            <small class="text-danger"><?= $errors_partner['confirmation'] ?></small>
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
