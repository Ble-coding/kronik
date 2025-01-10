<?php

session_start();

// Définir la langue par défaut
$default_language = 'fr';

// Récupérer la langue depuis l'URL, la session ou utiliser la langue par défaut
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? $default_language;

// Vérifier si le dossier de langue existe
$lang_path = __DIR__ . "/languages/{$lang}/";
if (!is_dir($lang_path)) {
    $lang = $default_language; // Revenir à la langue par défaut si le dossier n'existe pas
}
$_SESSION['lang'] = $lang; // Sauvegarder la langue dans la session

// Charger toutes les traductions disponibles dans le dossier de langue
$translations = [];
foreach (glob($lang_path . '*.php') as $file) {
    $translations = array_merge($translations, include $file);
}

// Récupérer l'URI demandée
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Supprimer les barres obliques inutiles
$route = trim($requestUri, '/');

// Définir les routes disponibles
$routes = [
    '' => 'home.php', // Route pour la page d'accueil
    'about' => 'about.php',
    'faq' => 'faq.php',
    'contact' => 'contact.php',
    'programs' => 'program.php',
    'terms' => 'terms.php',        // Fichier pour les "Conditions d'utilisation"
    'privacy' => 'privacy.php', 
    'contribute' => 'contribute.php',
    'lmic' => 'lmic.php', 
    'mail-error' => 'mail/mail-error.php',
    'mail-success' => 'mail/mail-success.php'
];

// Vérifier si la route existe
if (array_key_exists($route, $routes)) {
    $file = __DIR__ . '/' . $routes[$route];
    if (file_exists($file)) {
        include $file;
    } else {
        // Fichier introuvable
        header("HTTP/1.0 404 Not Found");
        include '404.php';
    }
} else {
    // Route non définie
    header("HTTP/1.0 404 Not Found");
    include '404.php';
}
exit;
