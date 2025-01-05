<section class="box-section box-contact-section-2">
  <div class="container" data-aos="fade-up">
    <h1 class="heading-jakarta-55 dark-950 mb-5">Devenir Mentor</h1>
    <p class="mb-4">Rejoignez notre programme de mentorat et soutenez les innovateurs en santé numérique dans les LMICs.</p>

    <div class="col-lg-12">
      <div class="form-contact-us">
        <form action="#" method="post" enctype="multipart/form-data">
          <!-- Section 1: Informations Générales -->
          <h4 class="mb-3">1. Informations Générales</h4>
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
            <input type="url" class="form-control" name="website" placeholder="Site web ou Profil LinkedIn (facultatif)" />
          </div>

          <!-- Section 2: Expérience et Compétences -->
          <h4 class="mt-4 mb-3">2. Expérience et Compétences</h4>
          <div class="form-group">
  <label for="technologiesSelect">Domaines d'expertise</label>
  <select class="form-control" id="technologiesSelect" name="expertise" required>
    <option value="" disabled selected>Choisissez un domaine</option>
    <option value="IA">Intelligence Artificielle</option>
    <option value="Big Data">Big Data</option>
    <option value="IoT">Objets connectés</option>
    <option value="strategie">Stratégie</option>
    <option value="autre">Autres (précisez ci-dessous)</option>
  </select>
</div>

<!-- Champ pour "Autres" qui s'affiche uniquement si nécessaire -->
<div class="form-group" id="otherExpertiseContainer" style="display: none;">
  <textarea 
    class="form-control" 
    name="other_expertise" 
    rows="3" 
    placeholder="Précisez les autres domaines d'expertise" 
  ></textarea>
</div>

          <div class="form-group">
            <textarea class="form-control" name="experience" rows="4" placeholder="Expérience professionnelle pertinente" required></textarea>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="projects" rows="4" placeholder="Projets ou startups accompagnés (facultatif)"></textarea>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="certifications" rows="3" placeholder="Formations ou certifications (ex. : MBA, Santé numérique)"></textarea>
          </div>

          <!-- Section 3: Motivations -->
          <h4 class="mt-4 mb-3">3. Motivations</h4>
          <div class="form-group">
            <textarea class="form-control" name="motivation" rows="4" placeholder="Pourquoi souhaitez-vous devenir mentor ?" required></textarea>
          </div>
          <div class="form-group">
            <label>Votre apport comme mentor :</label>
            <div>
              <label><input type="checkbox" name="contribution[]" value="Stratégie et Business Model" /> Stratégie et Business Model</label><br />
              <label><input type="checkbox" name="contribution[]" value="Développement Technologique" /> Développement Technologique</label><br />
              <label><input type="checkbox" name="contribution[]" value="Commercialisation et Marketing" /> Commercialisation et Marketing</label><br />
              <label><input type="checkbox" name="contribution[]" value="Accès aux Financements" /> Accès aux Financements</label><br />
              <label><input type="checkbox" name="contribution[]" value="Conformité Juridique et Réglementaire" /> Conformité Juridique et Réglementaire</label><br />
              <label><input type="checkbox" name="contribution[]" value="Autres" /> Autres : <input type="text" name="other_contribution" class="form-control d-inline-block w-auto" /></label>
            </div>
          </div>

          <!-- Section 4: Documents à Joindre -->
          <h4 class="mt-4 mb-3">4. Documents à Joindre</h4>
          <div class="form-group">
            <label for="logo">Joindre votre logo (facultatif) :</label>
            <input type="file" class="form-control" name="logo" id="logo" accept=".png, .jpg, .svg" />
          </div>
          <div class="form-group">
            <label for="photo">Joindre votre photo professionnelle :</label>
            <input type="file" class="form-control" name="photo" id="photo" accept=".png, .jpg, .jpeg" required />
          </div>
          <div class="form-group">
            <label for="cv">Joindre un CV ou portfolio (facultatif) :</label>
            <input type="file" class="form-control" name="cv" id="cv" accept=".pdf, .doc, .docx" />
          </div>

          <!-- Section 5: Déclaration et Signature -->
          <h4 class="mt-4 mb-3">5. Déclaration et Signature</h4>
          <div class="form-group">
            <label>Nom du signataire :</label>
            <input type="text" class="form-control" name="signatory_name" required />
          </div>
          <div class="form-group">
            <label>Fonction :</label>
            <input type="text" class="form-control" name="function" required />
          </div>
          <div class="form-group">
            <label>Date :</label>
            <input type="date" class="form-control" name="date" required />
          </div>
          <div class="form-group">
            <label>
              <input type="checkbox" name="confirmation" required />
              Je confirme que les informations fournies sont exactes et complètes.
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
