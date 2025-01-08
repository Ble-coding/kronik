<section class="box-section box-contact-section-2">
  <div class="container" data-aos="fade-up">
    <h1 class="heading-jakarta-55 dark-950 mb-5">Devenir Mentor</h1>
    <p class="mb-4">Rejoignez notre programme de mentorat et soutenez les innovateurs en santé numérique dans les LMICs.</p>

    <div class="col-lg-12">
      <div class="form-contact-us">
      <?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
session_destroy(); // Supprimer les erreurs après affichage
?>

<form class="form" action="mail/mentorMail.php" method="POST" enctype="multipart/form-data">
    <!-- Section 1: Informations Générales -->
    <h4 class="mb-3">1. Informations Générales</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="full_name" class="form-control" placeholder="Nom complet" value="<?= htmlspecialchars($old['full_name'] ?? '') ?>"  />
                <?php if (isset($errors['full_name'])): ?>
                    <small class="text-danger"><?= $errors['full_name'] ?></small>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="address" class="form-control" placeholder="Adresse (Ville, Pays)" value="<?= htmlspecialchars($old['address'] ?? '') ?>"  />
                <?php if (isset($errors['address'])): ?>
                    <small class="text-danger"><?= $errors['address'] ?></small>
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
                <input type="email" name="email" class="form-control" placeholder="Adresse e-mail" value="<?= htmlspecialchars($old['email'] ?? '') ?>"  />
                <?php if (isset($errors['email'])): ?>
                    <small class="text-danger"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="url" name="website" class="form-control" placeholder="Site web ou Profil LinkedIn (facultatif)" value="<?= htmlspecialchars($old['website'] ?? '') ?>" />
    </div>

    <h4 class="mt-4 mb-3">2. Expérience et Compétences</h4>
<div class="form-group">
    <label for="technologiesSelect">Domaines d'expertise</label>
    <select 
        class="form-control <?= isset($errors['expertise']) ? 'is-invalid' : '' ?>" 
        id="technologiesSelect" 
        name="expertise"
    >
        <option value="" disabled <?= empty($old['expertise']) ? 'selected' : '' ?>>Choisissez un domaine</option>
        <option value="IA" <?= ($old['expertise'] ?? '') === 'IA' ? 'selected' : '' ?>>Intelligence Artificielle</option>
        <option value="Big Data" <?= ($old['expertise'] ?? '') === 'Big Data' ? 'selected' : '' ?>>Big Data</option>
        <option value="IoT" <?= ($old['expertise'] ?? '') === 'IoT' ? 'selected' : '' ?>>Objets connectés</option>
        <option value="strategie" <?= ($old['expertise'] ?? '') === 'strategie' ? 'selected' : '' ?>>Stratégie</option>
        <option value="autre" <?= ($old['expertise'] ?? '') === 'autre' ? 'selected' : '' ?>>Autres</option>
    </select>
    <?php if (isset($errors['expertise'])): ?>
        <small class="text-danger"><?= $errors['expertise'] ?></small>
    <?php endif; ?>
</div>

<!-- Champ pour "Autres domaines" -->
<div 
    class="form-group" 
    id="otherExpertiseContainer" 
    style="display: <?= ($old['expertise'] ?? '') === 'autre' ? 'block' : 'none' ?>;"
>
    <textarea 
        name="other_expertise" 
        class="form-control <?= isset($errors['other_expertise']) ? 'is-invalid' : '' ?>" 
        rows="3" 
        placeholder="Précisez les autres domaines d'expertise"
    ><?= htmlspecialchars($old['other_expertise'] ?? '') ?></textarea>
    <?php if (isset($errors['other_expertise'])): ?>
        <small class="text-danger"><?= $errors['other_expertise'] ?></small>
    <?php endif; ?>
</div>

    <div class="form-group">
        <textarea name="experience" class="form-control" rows="4" placeholder="Expérience professionnelle pertinente" ><?= htmlspecialchars($old['experience'] ?? '') ?></textarea>
        <?php if (isset($errors['experience'])): ?>
            <small class="text-danger"><?= $errors['experience'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <textarea name="projects" class="form-control" rows="4" placeholder="Projets ou startups accompagnés (facultatif)"><?= htmlspecialchars($old['projects'] ?? '') ?></textarea>
    </div>
    <div class="form-group">
        <textarea name="certifications" class="form-control" rows="3" placeholder="Formations ou certifications (ex. : MBA, Santé numérique)"><?= htmlspecialchars($old['certifications'] ?? '') ?></textarea>
    </div>

    <!-- Section 3: Motivations -->
    <h4 class="mt-4 mb-3">3. Motivations</h4>
    <div class="form-group">
        <textarea name="motivation" class="form-control" rows="4" placeholder="Pourquoi souhaitez-vous devenir mentor ?" ><?= htmlspecialchars($old['motivation'] ?? '') ?></textarea>
        <?php if (isset($errors['motivation'])): ?>
            <small class="text-danger"><?= $errors['motivation'] ?></small>
        <?php endif; ?>
    </div>

    <!-- Section 4: Documents à Joindre -->
    <h4 class="mt-4 mb-3">4. Documents à Joindre</h4>
    <div class="form-group">
        <label for="logo">Joindre votre logo (facultatif) :</label>
        <input type="file" name="logo" id="logo" class="form-control" accept=".png, .jpg, .svg" />
    </div>
    <div class="form-group">
        <label for="photo">Joindre votre photo professionnelle :</label>
        <input type="file" name="photo" id="photo" class="form-control" accept=".png, .jpg, .jpeg"  />
    </div>
    <div class="form-group">
        <label for="cv">Joindre un CV ou portfolio (facultatif) :</label>
        <input type="file" name="cv" id="cv" class="form-control" accept=".pdf, .doc, .docx" />
    </div>

    <!-- Section 5: Déclaration et Signature -->
    <h4 class="mt-4 mb-3">5. Déclaration et Signature</h4>
    <div class="form-group">
        <input type="text" name="signatory_name" class="form-control" placeholder="Nom du signataire" value="<?= htmlspecialchars($old['signatory_name'] ?? '') ?>"  />
        <?php if (isset($errors['signatory_name'])): ?>
            <small class="text-danger"><?= $errors['signatory_name'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="text" name="function" class="form-control" placeholder="Fonction" value="<?= htmlspecialchars($old['function'] ?? '') ?>"  />
        <?php if (isset($errors['function'])): ?>
            <small class="text-danger"><?= $errors['function'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($old['date'] ?? '') ?>"  />
        <?php if (isset($errors['date'])): ?>
            <small class="text-danger"><?= $errors['date'] ?></small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="confirmation"  />
            Je confirme que les informations fournies sont exactes et complètes.
        </label>
        <?php if (isset($errors['confirmation'])): ?>
            <small class="text-danger"><?= $errors['confirmation'] ?></small>
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
