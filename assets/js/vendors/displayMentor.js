document.getElementById('technologiesSelect').addEventListener('change', function () {
  const otherExpertiseContainer = document.getElementById('otherExpertiseContainer');
  if (this.value === 'autre') {
      otherExpertiseContainer.style.display = 'block';
  } else {
      otherExpertiseContainer.style.display = 'none';
  }
});
