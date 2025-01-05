  // Sélection de l'élément <select> et du champ à afficher
  const technologiesSelect = document.getElementById('technologiesSelect');
  const otherTechnologyField = document.getElementById('otherTechnologyField');

  // Ajout d'un écouteur d'événement pour détecter le changement de sélection
  technologiesSelect.addEventListener('change', function () {
    if (this.value === 'autre') {
      otherTechnologyField.style.display = 'block'; // Afficher le champ texte
    } else {
      otherTechnologyField.style.display = 'none'; // Masquer le champ texte
    }
  });


