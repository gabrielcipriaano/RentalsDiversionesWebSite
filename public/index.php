<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\PagesController;
use MVC\Router;
$router = new Router();

// Main Page
$router->get('/',[PagesController::class,'index']);
$router->get('/gallery',[PagesController::class,'gallery']);
$router->get('/about',[PagesController::class,'about']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->checkRoutes();