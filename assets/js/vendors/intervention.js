document.addEventListener('keydown', function (event) {
    // Désactiver Ctrl+U
    if (event.ctrlKey && (event.key === "u" || event.code === "KeyU")) {
        console.log("Tentative d'accès à Ctrl+U bloquée");
        event.preventDefault();
        return false;
    }

    // Désactiver F12
    if (event.key === "F12") {
        console.log("Tentative d'accès à F12 bloquée");
        event.preventDefault();
        return false;
    }

    // Désactiver Ctrl+Shift+I
    if (event.ctrlKey && event.shiftKey && event.key === "I") {
        console.log("Tentative d'accès à Ctrl+Shift+I bloquée");
        event.preventDefault();
        return false;
    }
});

// Désactiver le clic droit
document.addEventListener('contextmenu', function (event) {
    console.log("Clic droit désactivé");
    event.preventDefault();
});
