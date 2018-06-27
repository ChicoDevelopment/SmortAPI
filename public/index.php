<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/structure/settings.php';
$app = new \Slim\App($settings);

//Dependencias
require __DIR__ . '/../src/routes/DemandaRota.php';
require __DIR__ . '/../src/routes/TransportadorRota.php';
require __DIR__ . '/../src/routes/UsuarioRota.php';
require __DIR__ . '/../src/routes/VeiculoRota.php';
require __DIR__ . '/../src/routes/TipoVeiculoRota.php';
require __DIR__ . '/../src/routes/MarcaRota.php';

// Register middleware
require __DIR__ . '/../src/structure/middleware.php';

// Run app
$app->run();