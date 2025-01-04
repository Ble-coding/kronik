document.addEventListener('DOMContentLoaded', function () {
    // Vérifie si une ancre est présente dans l'URL
    const hash = window.location.hash;
    if (hash) {
        const tab = document.querySelector(`a[href="${hash}"]`);
        if (tab) {
            // Active l'onglet correspondant
            const bootstrapTab = new bootstrap.Tab(tab);
            bootstrapTab.show();
        }
    }
});