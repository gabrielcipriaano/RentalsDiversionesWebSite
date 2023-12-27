<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\PagesController;
use MVC\Router;
$router = new Router();

// Main Page
$router->get('/',[PagesController::class,'index']);
$router->get('/brincolines',[PagesController::class,'brincolines']);
$router->get('/about',[PagesController::class,'about']);
$router->get('/contact',[PagesController::class,'contact']);
$router->get('/brincolin',[PagesController::class,'brincolin']);
$router->get('/furniture',[PagesController::class,'furniture']);


// Check and validate the routes, ensuring they exist and assign them the functions of the Controller
$router->checkRoutes();