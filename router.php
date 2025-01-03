<?php
// Récupérer l'URI demandée
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Déterminer le chemin de base
$basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');

// Retirer le chemin de base de l'URI
$route = str_replace($basePath, '', $requestUri);

// Définir les routes disponibles
$routes = [
    '/' => 'home.php',
    '/about' => 'about.php',
];

// Vérifiez si la route existe
if (array_key_exists($route, $routes)) {
    $file = __DIR__ . '/' . $routes[$route];
    if (file_exists($file)) {
        include $file;
    } else {
        error_log("Fichier introuvable : $file");
        header("HTTP/1.0 404 Not Found");
        include '404.php';
    }
} else {
    // Afficher une erreur 404 si la route n'est pas définie
    header("HTTP/1.0 404 Not Found");
    include '404.php';
}
exit;
