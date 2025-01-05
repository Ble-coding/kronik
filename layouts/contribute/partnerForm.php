<section class="box-section box-contact-section-2">
  <div class="container" data-aos="fade-up">
    <h1 class="heading-jakarta-55 dark-950 mb-5">
      Devenir Partenaire
    </h1>
    <p class="p-classik mb-4">
      Merci de votre intérêt à devenir partenaire de Kronik X health. Veuillez remplir ce formulaire pour nous permettre de mieux comprendre votre organisation et identifier des opportunités de collaboration.
    </p>

    <div class="col-lg-12">
      <div class="form-contact-us">
        <form action="#" method="post" enctype="multipart/form-data">

          <!-- Section 1: Informations Générales sur l’Organisation -->
          <h4 class="mb-3">1. Informations Générales sur l’Organisation</h4>
          <div class="form-group">
            <input type="text" class="form-control" name="organization_name" placeholder="Nom de l’Organisation" required />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="organization_address" placeholder="Adresse (Siège social ou bureau principal)" required />
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" name="organization_phone" placeholder="Téléphone" required />
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="organization_email" placeholder="Adresse e-mail" required />
          </div>
          <div class="form-group">
            <input type="url" class="form-control" name="organization_website" placeholder="Site Web (facultatif)" />
          </div>

          <!-- Section 2: Détails du Contact Principal -->
          <h4 class="mt-4 mb-3">2. Détails du Contact Principal</h4>
          <div class="form-group">
            <input type="text" class="form-control" name="contact_name" placeholder="Nom et Prénom" required />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="contact_position" placeholder="Fonction/Poste" required />
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" name="contact_phone" placeholder="Téléphone" required />
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="contact_email" placeholder="E-mail" required />
          </div>

          <!-- Section 3: Informations sur l’Organisation -->
          <h4 class="mt-4 mb-3">3. Informations sur l’Organisation</h4>
          <div class="form-group">
            <input type="text" class="form-control" name="organization_sector" placeholder="Secteur d’activité" required />
          </div>
          <div class="form-group">
            <select class="form-control" name="organization_size" required>
              <option value="">Taille de l’organisation</option>
              <option value="Petite entreprise">Petite entreprise</option>
              <option value="Moyenne entreprise">Moyenne entreprise</option>
              <option value="Grande entreprise">Grande entreprise</option>
              <option value="ONG internationale">ONG internationale</option>
            </select>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="organization_expertise" rows="3" placeholder="Domaines d’expertise pertinents" required></textarea>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="organization_experience" rows="3" placeholder="Expérience avec des initiatives similaires" required></textarea>
          </div>

          <!-- Section 4: Objectifs du Partenariat -->
          <h4 class="mt-4 mb-3">4. Objectifs du Partenariat</h4>
          <div class="form-group">
            <textarea class="form-control" name="partnership_objectives" rows="4" placeholder="Pourquoi souhaitez-vous devenir partenaire ?" required></textarea>
          </div>
          <div class="form-group">
            <label>Types de soutien proposés :</label>
            <div>
              <label><input type="checkbox" name="support_types[]" value="Financier" /> Financier</label><br />
              <label><input type="checkbox" name="support_types[]" value="Technique" /> Technique</label><br />
              <label><input type="checkbox" name="support_types[]" value="Formation" /> Formation et renforcement de capacités</label><br />
              <label><input type="checkbox" name="support_types[]" value="Communication" /> Communication et sensibilisation</label><br />
              <label><input type="checkbox" name="support_types[]" value="Accès aux réseaux" /> Accès aux réseaux ou aux ressources</label><br />
              <label><input type="checkbox" name="support_types[]" value="Autres" /> Autres : <input type="text" name="other_support" class="form-control d-inline-block w-auto" placeholder="Précisez" /></label>
            </div>
          </div>

          <!-- Section 5: Documents et Informations Complémentaires -->
          <h4 class="mt-4 mb-3">5. Documents et Informations Complémentaires</h4>
          <div class="form-group">
            <label for="logoUpload">Joindre votre logo :</label>
            <input type="file" class="form-control" name="organization_logo" id="logoUpload" accept=".png, .jpg, .svg" />
          </div>
          <div class="form-group">
            <label for="additionalDocs">Joindre des documents pertinents :</label>
            <input type="file" class="form-control" name="additional_docs[]" id="additionalDocs" multiple />
          </div>

          <!-- Section 6: Déclaration et Signature -->
          <h4 class="mt-4 mb-3">6. Déclaration et Signature</h4>
          <div class="form-group">
            <input type="text" class="form-control" name="signatory_name" placeholder="Nom du signataire" required />
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="signatory_position" placeholder="Fonction" required />
          </div>
          <div class="form-group">
            <input type="date" class="form-control" name="signature_date" required />
          </div>
          <div class="form-group">
            <label>
              <input type="checkbox" name="confirmation" required />
              Je certifie que les informations fournies dans ce formulaire sont exactes et complètes.
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
