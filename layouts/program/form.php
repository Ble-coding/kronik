<section class="box-section box-contact-section-2">
  <div class="container" data-aos="fade-up">
    <h1 class="heading-jakarta-55 dark-950 mb-5">Appel à Candidatures <br /> Kronik X HEALTH </h1>
    <p class="mb-4"> Postulez pour rejoindre la première cohorte du Kronik Lab et révolutionner la prise en charge des maladies chroniques grâce à l’innovation numérique. </p>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="form-contact-us"> 


          <?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
session_destroy(); // Supprimer les erreurs après affichage
?>

<form class="form" action="mail/apply.php" method="POST" enctype="multipart/form-data">
    <!-- 1. Informations Générales sur le Projet -->
    <h4 class="mb-3">1. Informations Générales sur le Projet</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="project_name" class="form-control" placeholder="Nom du projet/startup" value="<?= htmlspecialchars($old['project_name'] ?? '') ?>"  />
                <?php if (isset($errors['project_name'])): ?>
                    <small class="text-danger"><?= $errors['project_name'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select name="technologies" class="form-control" id="technologiesSelect" >
                    <option value="" disabled selected>Technologies utilisées</option>
                    <option value="IA" <?= ($old['technologies'] ?? '') === 'IA' ? 'selected' : '' ?>>Intelligence Artificielle</option>
                    <option value="Big Data" <?= ($old['technologies'] ?? '') === 'Big Data' ? 'selected' : '' ?>>Big Data</option>
                    <option value="IoT" <?= ($old['technologies'] ?? '') === 'IoT' ? 'selected' : '' ?>>Objets connectés</option>
                    <option value="plateformes-numeriques" <?= ($old['technologies'] ?? '') === 'plateformes-numeriques' ? 'selected' : '' ?>>Plateformes numériques</option>
                    <option value="autre" <?= ($old['technologies'] ?? '') === 'autre' ? 'selected' : '' ?>>Autres</option>
                </select>
                <?php if (isset($errors['technologies'])): ?>
                    <small class="text-danger"><?= $errors['technologies'] ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group" id="otherTechnologyField" style="display: none;">
        <input type="text" name="other_technology" class="form-control" placeholder="Précisez les autres technologies (si applicable)" value="<?= htmlspecialchars($old['other_technology'] ?? '') ?>" />
    </div>
    <div class="form-group">
        <textarea name="project_summary" class="form-control" rows="4" placeholder="Résumé du projet (200 mots maximum)" ><?= htmlspecialchars($old['project_summary'] ?? '') ?></textarea>
        <?php if (isset($errors['project_summary'])): ?>
            <small class="text-danger"><?= $errors['project_summary'] ?></small>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <textarea name="problem" class="form-control" rows="3" placeholder="Problématique ciblée" ><?= htmlspecialchars($old['problem'] ?? '') ?></textarea>
                <?php if (isset($errors['problem'])): ?>
                    <small class="text-danger"><?= $errors['problem'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <textarea name="solution" class="form-control" rows="3" placeholder="Solution proposée" ><?= htmlspecialchars($old['solution'] ?? '') ?></textarea>
                <?php if (isset($errors['solution'])): ?>
                    <small class="text-danger"><?= $errors['solution'] ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <select name="current_stage" class="form-control" >
            <option value="" disabled selected>Stade actuel du projet</option>
            <option value="ideation" <?= ($old['current_stage'] ?? '') === 'ideation' ? 'selected' : '' ?>>Idéation</option>
            <option value="prototype" <?= ($old['current_stage'] ?? '') === 'prototype' ? 'selected' : '' ?>>Prototype</option>
            <option value="en-developpement" <?= ($old['current_stage'] ?? '') === 'en-developpement' ? 'selected' : '' ?>>Produit en cours de développement</option>
            <option value="commercialise" <?= ($old['current_stage'] ?? '') === 'commercialise' ? 'selected' : '' ?>>Produit déjà commercialisé</option>
        </select>
        <?php if (isset($errors['current_stage'])): ?>
            <small class="text-danger"><?= $errors['current_stage'] ?></small>
        <?php endif; ?>
    </div>

    <!-- 2. Informations sur l’Équipe -->
    <h4 class="mt-4 mb-3">2. Informations sur l’Équipe</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="team_lead" class="form-control" placeholder="Nom du porteur de projet" value="<?= htmlspecialchars($old['team_lead'] ?? '') ?>"  />
                <?php if (isset($errors['team_lead'])): ?>
                    <small class="text-danger"><?= $errors['team_lead'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Adresse e-mail" value="<?= htmlspecialchars($old['email'] ?? '') ?>"  />
                <?php if (isset($errors['email'])): ?>
                    <small class="text-danger"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Numéro de téléphone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>"  />
                <?php if (isset($errors['phone'])): ?>
                    <small class="text-danger"><?= $errors['phone'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="organization" class="form-control" placeholder="Organisation (le cas échéant)" value="<?= htmlspecialchars($old['organization'] ?? '') ?>" />
            </div>
        </div>
    </div>
    <div class="form-group">
        <textarea name="team_presentation" class="form-control" rows="3" placeholder="Présentation de l’équipe (compétences principales)  (Décrivez brièvement les membres clés de l’équipe et leurs compétences principales.)" ><?= htmlspecialchars($old['team_presentation'] ?? '') ?></textarea>
        <?php if (isset($errors['team_presentation'])): ?>
            <small class="text-danger"><?= $errors['team_presentation'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="uploadCV" class="form-label">Téléversement des CV :</label>
        <input type="file" name="cv_files[]" class="form-control" id="uploadCV" accept=".pdf, .doc, .docx" multiple  />
    </div>

    <!-- 3. Impact et Modèle Économique -->
    <h4 class="mt-4 mb-3">3. Impact et Modèle Économique</h4>
    <div class="form-group">
        <textarea name="impact" class="form-control" rows="3" placeholder="Impact attendu (Comment améliorerez-vous les parcours de santé ?)" ><?= htmlspecialchars($old['impact'] ?? '') ?></textarea>
        <?php if (isset($errors['impact'])): ?>
            <small class="text-danger"><?= $errors['impact'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <textarea name="target_audience" class="form-control" rows="3" placeholder="Public cible  (Qui sont les utilisateurs finaux ? Patients, professionnels de santé, institutions, etc.)" ><?= htmlspecialchars($old['target_audience'] ?? '') ?></textarea>
        <?php if (isset($errors['target_audience'])): ?>
            <small class="text-danger"><?= $errors['target_audience'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <textarea name="business_model" class="form-control" rows="3" placeholder="Modèle économique  (Décrivez comment votre solution générera des revenus ou sera financièrement durable.)" ><?= htmlspecialchars($old['business_model'] ?? '') ?></textarea>
        <?php if (isset($errors['business_model'])): ?>
            <small class="text-danger"><?= $errors['business_model'] ?></small>
        <?php endif; ?>
    </div>

    <!-- 4. Partenariats et Ressources -->
    <h4 class="mt-4 mb-3">4. Partenariats et Ressources</h4>
    <div class="form-group">
        <textarea name="partners" class="form-control" rows="3" placeholder="Partenaires actuels (Listez les institutions ou entreprises qui soutiennent déjà votre projet.)"><?= htmlspecialchars($old['partners'] ?? '') ?></textarea>
    </div>
    <div class="form-group">
        <textarea name="resources" class="form-control" rows="3" placeholder="Ressources nécessaires (De quelles ressources avez-vous besoin pour faire avancer votre projet ? Ex. : financement, expertise technique, etc.)"><?= htmlspecialchars($old['resources'] ?? '') ?></textarea>
    </div>

    <!-- 5. Documents Complémentaires -->
    <h4 class="mt-4 mb-3">5. Documents Complémentaires</h4>
    <div class="form-group">
        <label for="presentation-detaillée">Présentation détaillée du projet :</label>
        <input type="file" name="project_presentation" class="form-control" id="presentation-detaillée"  />
    </div>
    <div class="form-group">
        <label for="prototype-demo">Prototype ou démo :</label>
        <input type="url" name="prototype_demo" class="form-control" id="prototype-demo" placeholder="Lien vers une vidéo ou une plateforme démonstrative" />
    </div>
    <div class="form-group">
        <label for="autres-documents">Autres documents pertinents :</label>
        <input type="file" name="additional_documents[]" class="form-control" id="autres-documents" multiple />
    </div>

    <!-- 6. Consentement -->
    <h4 class="mt-4 mb-3">6. Consentement</h4>
    <div class="form-group">
        <label>
            <input type="checkbox" name="consent"  />
            Je certifie que les informations fournies dans ce formulaire sont exactes et j’accepte les termes et conditions de participation au programme Kronik X Health.
        </label>
    </div>

    <!-- Soumission -->
    <div class="form-group mt-5">
        <button type="submit" class="btn btn-primary-home-square w-100">Soumettre ma candidature</button>
    </div>
</form>


        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</section>