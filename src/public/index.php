<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
require '../includes/class.php';
require '../includes/queries.php';
require '../includes/functions.php';
require '../config/config.php';
require '../config/conection.php';

// Create and configure Slim app
$app = new \Slim\App(['settings' => $config]);
//Rutas
require '../includes/routes.php';
// Run app
$app->run();

?>