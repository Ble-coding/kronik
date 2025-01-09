<?php
           
           // Charger les traductions pour le formulaire
           $form_translations = include __DIR__ . "/../../languages/{$lang}/program/form.php";
           
           $errors = $_SESSION['errors'] ?? [];
           $old = $_SESSION['old'] ?? [];
           session_destroy(); // Supprimer les erreurs après affichage
           ?>

<section class="box-section box-contact-section-2">
  <div class="container" data-aos="fade-up">
  <h1 class="heading-jakarta-55 dark-950 mb-5">
            <?= htmlspecialchars($form_translations['title']) ?>
        </h1>
        <p class="mb-4">
            <?= htmlspecialchars($form_translations['description']) ?>
        </p>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="form-contact-us"> 

  


<form class="form" action="mail/apply.php?lang=<?= htmlspecialchars($lang) ?>" method="POST" enctype="multipart/form-data">
<h4 class="mb-3"><?= htmlspecialchars($form_translations['section_titles']['project_info']) ?></h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="project_name" class="form-control" 
                       placeholder="<?= htmlspecialchars($form_translations['placeholders']['project_name']) ?>" 
                       value="<?= htmlspecialchars($old['project_name'] ?? '') ?>" />
                <?php if (isset($errors['project_name'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['project_name']) ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="technologies" class="form-control" id="technologiesSelect">
                    <option value="" disabled selected><?= htmlspecialchars($form_translations['placeholders']['technologies']) ?></option>
                    <option value="IA" <?= ($old['technologies'] ?? '') === 'IA' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['technology_options']['ia']) ?></option>
                    <option value="Big Data" <?= ($old['technologies'] ?? '') === 'Big Data' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['technology_options']['big_data']) ?></option>
                    <option value="IoT" <?= ($old['technologies'] ?? '') === 'IoT' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['technology_options']['iot']) ?></option>
                    <option value="plateformes-numeriques" <?= ($old['technologies'] ?? '') === 'plateformes-numeriques' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['technology_options']['digital_platforms']) ?></option>
                    <option value="autre" <?= ($old['technologies'] ?? '') === 'autre' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['technology_options']['other']) ?></option>
                </select>
                <?php if (isset($errors['technologies'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['technologies']) ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group" id="otherTechnologyField" style="display: none;">
        <input type="text" name="other_technology" class="form-control" 
               placeholder="<?= htmlspecialchars($form_translations['placeholders']['other_technology']) ?>" 
               value="<?= htmlspecialchars($old['other_technology'] ?? '') ?>" />
    </div>
    <div class="form-group">
        <textarea name="project_summary" class="form-control" rows="4" 
                  placeholder="<?= htmlspecialchars($form_translations['placeholders']['project_summary']) ?>"><?= htmlspecialchars($old['project_summary'] ?? '') ?></textarea>
        <?php if (isset($errors['project_summary'])): ?>
            <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['project_summary']) ?></small>
        <?php endif; ?>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <textarea name="problem" class="form-control" rows="3" 
                          placeholder="<?= htmlspecialchars($form_translations['placeholders']['problem']) ?>"><?= htmlspecialchars($old['problem'] ?? '') ?></textarea>
                <?php if (isset($errors['problem'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['problem']) ?></small>
                <?php endif; ?>
            </div>
        </div>

        <!-- Champ pour Solution -->
        <div class="col-md-6">
            <div class="form-group">
                <textarea name="solution" class="form-control" rows="3" 
                          placeholder="<?= htmlspecialchars($form_translations['placeholders']['solution']) ?>"><?= htmlspecialchars($old['solution'] ?? '') ?></textarea>
                <?php if (isset($errors['solution'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['solution']) ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Champ pour Stade Actuel -->
    <div class="form-group">
        <select name="current_stage" class="form-control">
            <option value="" disabled selected><?= htmlspecialchars($form_translations['placeholders']['current_stage']) ?></option>
            <option value="ideation" <?= ($old['current_stage'] ?? '') === 'ideation' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['current_stage_options']['ideation']) ?></option>
            <option value="prototype" <?= ($old['current_stage'] ?? '') === 'prototype' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['current_stage_options']['prototype']) ?></option>
            <option value="en-developpement" <?= ($old['current_stage'] ?? '') === 'en-developpement' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['current_stage_options']['in_development']) ?></option>
            <option value="commercialise" <?= ($old['current_stage'] ?? '') === 'commercialise' ? 'selected' : '' ?>><?= htmlspecialchars($form_translations['current_stage_options']['commercialized']) ?></option>
        </select>
        <?php if (isset($errors['current_stage'])): ?>
            <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['current_stage']) ?></small>
        <?php endif; ?>
    </div>

  <!-- Section 2: Informations sur l’Équipe -->
  <h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['team_info']) ?></h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="team_lead" class="form-control" 
                       placeholder="<?= htmlspecialchars($form_translations['placeholders']['team_lead']) ?>" 
                       value="<?= htmlspecialchars($old['team_lead'] ?? '') ?>" />
                <?php if (isset($errors['team_lead'])): ?>
                    <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['team_lead']) ?></small>
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
                <input type="text" name="organization" class="form-control" 
                       placeholder="<?= htmlspecialchars($form_translations['placeholders']['organization']) ?>" 
                       value="<?= htmlspecialchars($old['organization'] ?? '') ?>" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <textarea name="team_presentation" class="form-control" rows="3" 
                  placeholder="<?= htmlspecialchars($form_translations['placeholders']['team_presentation']) ?>"><?= htmlspecialchars($old['team_presentation'] ?? '') ?></textarea>
        <?php if (isset($errors['team_presentation'])): ?>
            <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['team_presentation']) ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="uploadCV" class="form-label"><?= htmlspecialchars($form_translations['labels']['cv_upload']) ?></label>
        <input type="file" name="cv_files[]" class="form-control" id="uploadCV" 
               accept=".pdf, .doc, .docx" multiple />
    </div>

  <!-- 3. Impact et Modèle Économique -->
  <h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['impact_and_business_model']) ?></h4>
    <div class="form-group">
        <textarea name="impact" class="form-control" rows="3" 
                  placeholder="<?= htmlspecialchars($form_translations['placeholders']['impact']) ?>"><?= htmlspecialchars($old['impact'] ?? '') ?></textarea>
        <?php if (isset($errors['impact'])): ?>
            <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['impact']) ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <textarea name="target_audience" class="form-control" rows="3" 
                  placeholder="<?= htmlspecialchars($form_translations['placeholders']['target_audience']) ?>"><?= htmlspecialchars($old['target_audience'] ?? '') ?></textarea>
        <?php if (isset($errors['target_audience'])): ?>
            <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['target_audience']) ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <textarea name="business_model" class="form-control" rows="3" 
                  placeholder="<?= htmlspecialchars($form_translations['placeholders']['business_model']) ?>"><?= htmlspecialchars($old['business_model'] ?? '') ?></textarea>
        <?php if (isset($errors['business_model'])): ?>
            <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['business_model']) ?></small>
        <?php endif; ?>
    </div>

    <!-- 4. Partenariats et Ressources -->
    <h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['partnerships_and_resources']) ?></h4>
    <div class="form-group">
        <textarea name="partners" class="form-control" rows="3" 
                  placeholder="<?= htmlspecialchars($form_translations['placeholders']['partners']) ?>"><?= htmlspecialchars($old['partners'] ?? '') ?></textarea>
    </div>
    <div class="form-group">
        <textarea name="resources" class="form-control" rows="3" 
                  placeholder="<?= htmlspecialchars($form_translations['placeholders']['resources']) ?>"><?= htmlspecialchars($old['resources'] ?? '') ?></textarea>
    </div>
 
    <!-- 5. Documents Complémentaires -->
    <h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['additional_documents']) ?></h4>
    <div class="form-group">
        <label for="project_presentation"><?= htmlspecialchars($form_translations['labels']['project_presentation']) ?></label>
        <input type="file" name="project_presentation" class="form-control" id="project_presentation" />
    </div>
    <div class="form-group">
        <label for="prototype_demo"><?= htmlspecialchars($form_translations['labels']['prototype_demo']) ?></label>
        <input type="url" name="prototype_demo" class="form-control" id="prototype_demo" 
               placeholder="<?= htmlspecialchars($form_translations['placeholders']['prototype_demo']) ?>" />
    </div>
    <div class="form-group">
        <label for="additional_documents"><?= htmlspecialchars($form_translations['labels']['additional_documents']) ?></label>
        <input type="file" name="additional_documents[]" class="form-control" id="additional_documents" multiple />
    </div>

    <!-- 6. Consentement -->
    <h4 class="mt-4 mb-3"><?= htmlspecialchars($form_translations['section_titles']['consent']) ?></h4>
    <div class="form-group">
        <label>
            <input type="checkbox" name="consent" <?= !empty($old['consent']) ? 'checked' : '' ?> />
            <?= htmlspecialchars($form_translations['labels']['consent']) ?>
        </label>
        <?php if (isset($errors['consent'])): ?>
            <small class="text-danger"><?= htmlspecialchars($form_translations['errors']['consent']) ?></small>
        <?php endif; ?>
    </div>



    <!-- Soumission -->
    <div class="form-group mt-5">
    <button type="submit" class="btn btn-primary-home-square w-100">
        <?= htmlspecialchars($form_translations['buttons']['submit_form']) ?>
    </button>
    </div>
</form>


        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>