<?php
 
// Charger les traductions pour le formulaire
$form_translations = include __DIR__ . "/../../languages/{$lang}/contribute/mentorForm.php";

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
session_destroy(); // Supprimer les erreurs après affichage
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
  

<form class="form" action="mail/mentorMail.php?lang=<?= htmlspecialchars($lang) ?>" method="POST" enctype="multipart/form-data">
  <!-- Section 1: Informations Générales -->
<h4 class="mb-3"><?= htmlspecialchars($form_translations['section_titles']['general_info']) ?></h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="full_name" class="form-control" 
                   placeholder="<?= htmlspecialchars($form_translations['placeholders']['full_name']) ?>" 
                   value="<?= htmlspecialchars($old['full_name'] ?? '') ?>" />
            <?php if (isset($errors['full_name'])): ?>
                <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['full_name']) ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="address" class="form-control" 
                   placeholder="<?= htmlspecialchars($form_translations['placeholders']['address']) ?>" 
                   value="<?= htmlspecialchars($old['address'] ?? '') ?>" />
            <?php if (isset($errors['address'])): ?>
                <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['address']) ?></small>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="tel" name="phone" class="form-control" 
                   placeholder="<?= htmlspecialchars($form_translations['placeholders']['phone']) ?>" 
                   value="<?= htmlspecialchars($old['phone'] ?? '') ?>" />
            <?php if (isset($errors['phone'])): ?>
                <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['phone']) ?></small>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input type="email" name="email" class="form-control" 
                   placeholder="<?= htmlspecialchars($form_translations['placeholders']['email']) ?>" 
                   value="<?= htmlspecialchars($old['email'] ?? '') ?>" />
            <?php if (isset($errors['email'])): ?>
                <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['email']) ?></small>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="form-group">
    <input type="url" name="website" class="form-control" 
           placeholder="<?= htmlspecialchars($form_translations['placeholders']['website']) ?>" 
           value="<?= htmlspecialchars($old['website'] ?? '') ?>" />
</div>

<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['experience_and_skills']) ?></h4>

<!-- Domaine d'expertise -->
<div class="form-group">
    <label for="technologiesSelect"><?= htmlspecialchars($form_translations['labels']['expertise']) ?></label>
    <select 
        class="form-control <?= isset($errors['expertise']) ? 'is-invalid' : '' ?>" 
        id="technologiesSelect" 
        name="expertise"
    >
        <option value="" disabled <?= empty($old['expertise']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($form_translations['placeholders']['expertise']) ?>
        </option>
        <?php foreach ($form_translations['expertise_options'] as $value => $label): ?>
            <option value="<?= htmlspecialchars($value) ?>" <?= ($old['expertise'] ?? '') === $value ? 'selected' : '' ?>>
                <?= htmlspecialchars($label) ?>
            </option>
        <?php endforeach; ?>
        <option value="autre" <?= ($old['expertise'] ?? '') === 'autre' ? 'selected' : '' ?>>
            <?= htmlspecialchars($form_translations['labels']['other']) ?>
        </option>
    </select>
    <?php if (isset($errors['expertise'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['expertise']) ?></small>
    <?php endif; ?>
</div>

<!-- Champ "Autres domaines" -->
<div 
    class="form-group" 
    id="otherExpertiseContainer" 
    style="display: <?= ($old['expertise'] ?? '') === 'autre' ? 'block' : 'none' ?>;"
>
    <textarea 
        name="other_expertise" 
        class="form-control <?= isset($errors['other_expertise']) ? 'is-invalid' : '' ?>" 
        rows="3" 
        placeholder="<?= htmlspecialchars($form_translations['placeholders']['other_expertise']) ?>"
    ><?= htmlspecialchars($old['other_expertise'] ?? '') ?></textarea>
    <?php if (isset($errors['other_expertise'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['other_expertise']) ?></small>
    <?php endif; ?>
</div>

<!-- Expérience professionnelle -->
<div class="form-group">
    <textarea 
        name="experience" 
        class="form-control <?= isset($errors['experience']) ? 'is-invalid' : '' ?>" 
        rows="4" 
        placeholder="<?= htmlspecialchars($form_translations['placeholders']['experience']) ?>"
    ><?= htmlspecialchars($old['experience'] ?? '') ?></textarea>
    <?php if (isset($errors['experience'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['experience']) ?></small>
    <?php endif; ?>
</div>

<!-- Projets accompagnés -->
<div class="form-group">
    <textarea 
        name="projects" 
        class="form-control" 
        rows="4" 
        placeholder="<?= htmlspecialchars($form_translations['placeholders']['projects']) ?>"
    ><?= htmlspecialchars($old['projects'] ?? '') ?></textarea>
</div>

<!-- Formations ou certifications -->
<div class="form-group">
    <textarea 
        name="certifications" 
        class="form-control" 
        rows="3" 
        placeholder="<?= htmlspecialchars($form_translations['placeholders']['certifications']) ?>"
    ><?= htmlspecialchars($old['certifications'] ?? '') ?></textarea>
</div>


<!-- Section 3: Motivations -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['motivations']) ?></h4>
<div class="form-group">
    <textarea 
        name="motivation" 
        class="form-control <?= isset($errors['motivation']) ? 'is-invalid' : '' ?>" 
        rows="4" 
        placeholder="<?= htmlspecialchars($form_translations['placeholders']['motivation']) ?>"
    ><?= htmlspecialchars($old['motivation'] ?? '') ?></textarea>
    <?php if (isset($errors['motivation'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['motivation']) ?></small>
    <?php endif; ?>
</div>

<!-- Section 4: Documents à Joindre -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['documents']) ?></h4>
<div class="form-group">
    <label for="logo"><?= htmlspecialchars($form_translations['labels']['logo']) ?></label>
    <input 
        type="file" 
        name="logo" 
        id="logo" 
        class="form-control <?= isset($errors['logo']) ? 'is-invalid' : '' ?>" 
        accept=".png, .jpg, .svg" 
    />
    <?php if (isset($errors['logo'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['logo']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="photo"><?= htmlspecialchars($form_translations['labels']['photo']) ?></label>
    <input 
        type="file" 
        name="photo" 
        id="photo" 
        class="form-control <?= isset($errors['photo']) ? 'is-invalid' : '' ?>" 
        accept=".png, .jpg, .jpeg"  
    />
    <?php if (isset($errors['photo'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['photo']) ?></small>
    <?php endif; ?>
</div>
<div class="form-group">
    <label for="cv"><?= htmlspecialchars($form_translations['labels']['cv']) ?></label>
    <input 
        type="file" 
        name="cv" 
        id="cv" 
        class="form-control <?= isset($errors['cv']) ? 'is-invalid' : '' ?>" 
        accept=".pdf, .doc, .docx" 
    />
    <?php if (isset($errors['cv'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['cv']) ?></small>
    <?php endif; ?>
</div>

<!-- Section 5: Déclaration et Signature -->
<h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['declaration_and_signature']) ?></h4>

<div class="form-group">
    <input 
        type="text" 
        name="signatory_name" 
        class="form-control <?= isset($errors['signatory_name']) ? 'is-invalid' : '' ?>" 
        placeholder="<?= htmlspecialchars($form_translations['placeholders']['signatory_name']) ?>" 
        value="<?= htmlspecialchars($old['signatory_name'] ?? '') ?>" 
    />
    <?php if (isset($errors['signatory_name'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['signatory_name']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <input 
        type="text" 
        name="function" 
        class="form-control <?= isset($errors['function']) ? 'is-invalid' : '' ?>" 
        placeholder="<?= htmlspecialchars($form_translations['placeholders']['function']) ?>" 
        value="<?= htmlspecialchars($old['function'] ?? '') ?>" 
    />
    <?php if (isset($errors['function'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['function']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <input 
        type="date" 
        name="date" 
        class="form-control <?= isset($errors['date']) ? 'is-invalid' : '' ?>" 
        value="<?= htmlspecialchars($old['date'] ?? '') ?>" 
    />
    <?php if (isset($errors['date'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['date']) ?></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <label>
        <input 
            type="checkbox" 
            name="confirmation" 
            <?= !empty($old['confirmation']) ? 'checked' : '' ?> 
        />
        <?= htmlspecialchars($form_translations['labels']['confirmation']) ?>
    </label>
    <?php if (isset($errors['confirmation'])): ?>
        <small class="text-danger"><?= htmlspecialchars($errors['confirmation']) ?></small>
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