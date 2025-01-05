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
        <form action="#" method="post" enctype="multipart/form-data">
          <!-- Section 1: Informations Personnelles -->
          <h4 class="mb-3">1. Informations Personnelles</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="full_name" placeholder="Nom complet" required />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Adresse (Ville, Pays)" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="tel" class="form-control" name="phone" placeholder="Numéro de téléphone" required />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Adresse e-mail" required />
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="profilePhoto">Photo de profil (formats acceptés : .png, .jpg) :</label>
            <input type="file" class="form-control" name="profile_photo" id="profilePhoto" accept=".png, .jpg, .jpeg" required />
          </div>

          <!-- Section 2: Informations Professionnelles -->
          <h4 class="mt-4 mb-3">2. Informations Professionnelles</h4>
          <div class="form-group">
            <input type="text" class="form-control" name="current_position" placeholder="Poste actuel" required />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="organization" placeholder="Organisation/Entreprise actuelle" required />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="industry" placeholder="Secteur d’activité" required />
          </div>
          <div class="form-group">
            <label for="logoUpload">Logo de votre organisation (facultatif) :</label>
            <input type="file" class="form-control" name="organization_logo" id="logoUpload" accept=".png, .jpg, .svg" />
          </div>
          <div class="form-group">
            <input type="url" class="form-control" name="linkedin" placeholder="Site Web ou LinkedIn (facultatif)" />
          </div>

          <!-- Section 3: Domaines d’Expertise et Compétences -->
          <h4 class="mt-4 mb-3">3. Domaines d’Expertise et Compétences</h4>
          <div class="form-group">
            <label>Domaines d’expertise : (Cochez les domaines pertinents)</label>
            <div>
              <label><input type="checkbox" name="expertise[]" value="Leadership" /> Leadership et développement personnel</label><br />
              <label><input type="checkbox" name="expertise[]" value="Gestion" /> Gestion de projet</label><br />
              <label><input type="checkbox" name="expertise[]" value="Tech Development" /> Développement de produits technologiques</label><br />
              <label><input type="checkbox" name="expertise[]" value="Data Analysis" /> Analyse de données et IA</label><br />
              <label><input type="checkbox" name="expertise[]" value="Marketing" /> Stratégies marketing et commerciales</label><br />
              <label><input type="checkbox" name="expertise[]" value="Communication" /> Communication et storytelling</label><br />
              <label><input type="checkbox" name="expertise[]" value="Business Models" /> Modèles économiques et planification financière</label><br />
              <label><input type="checkbox" name="expertise[]" value="Regulation" /> Réglementation en santé numérique</label><br />
              <label><input type="checkbox" name="expertise[]" value="Other" /> Autres : <input type="text" name="other_expertise" class="form-control d-inline-block w-auto" placeholder="Précisez" /></label>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="coaching_experience" rows="3" placeholder="Expérience de coaching antérieure (facultatif)"></textarea>
          </div>

          <!-- Section 4: Motivations pour Devenir Coach -->
          <h4 class="mt-4 mb-3">4. Motivations pour Devenir Coach</h4>
          <div class="form-group">
            <textarea class="form-control" name="motivation" rows="4" placeholder="Pourquoi souhaitez-vous devenir coach ?" required></textarea>
          </div>
          <div class="form-group">
            <label>Disponibilité estimée :</label>
            <input type="text" class="form-control" name="availability" placeholder="Ex. : 4 heures par mois" />
          </div>

          <!-- Section 5: Documents Complémentaires -->
          <h4 class="mt-4 mb-3">5. Documents Complémentaires</h4>
          <div class="form-group">
            <label for="cvUpload">Joindre votre CV ou profil professionnel :</label>
            <input type="file" class="form-control" name="cv" id="cvUpload" accept=".pdf, .doc" required />
          </div>
          <div class="form-group">
            <label for="additionalDocs">Autres documents pertinents :</label>
            <input type="file" class="form-control" name="additional_docs[]" id="additionalDocs" multiple />
          </div>

          <!-- Section 6: Déclaration et Signature -->
          <h4 class="mt-4 mb-3">6. Déclaration et Signature</h4>
          <div class="form-group">
            <input type="text" class="form-control" name="signatory_name" placeholder="Nom du signataire" required />
          </div>
          <div class="form-group">
            <input type="date" class="form-control" name="signature_date" required />
          </div>
          <div class="form-group">
            <label>
              <input type="checkbox" name="confirmation" required />
              Je certifie que les informations fournies sont exactes et complètes.
            </label>
          </div>

          <div class="form-group mt-5">
            <button type="submit" class="btn btn-primary-home-square w-100">Soumettre le Formulaire</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
