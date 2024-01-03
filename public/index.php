<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PagesController;
use Controllers\FurnitureController;
use Controllers\BrincolinesController;

$router = new Router();

// Main Page
$router->get('/',[PagesController::class,'index']);
$router->get('/brincolines',[PagesController::class,'brincolines']);
$router->get('/about',[PagesController::class,'about']);
$router->get('/contact',[PagesController::class,'contact']);
$router->get('/brincolin',[PagesController::class,'brincolin']);
$router->get('/furniture',[PagesController::class,'furniture']);

//Login
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/recover',[LoginController::class,'recover']);
$router->post('/recover',[LoginController::class,'recover']);
$router->get('/reset',[LoginController::class,'reset']);
$router->post('/reset',[LoginController::class,'reset']);
$router->get('/logout',[LoginController::class,'logout']);

//administration
$router->get('/admin',[AdminController::class,'index']);
$router->post('/admin',[AdminController::class,'index']);
//brincolines administration
$router->get('/admin-brincolines',[BrincolinesController::class,'brincolines']);
$router->get('/admin-brincolines',[BrincolinesController::class,'brincolines']);
$router->get('/admin-brincolines/create',[BrincolinesController::class,'create']);
$router->post('/admin-brincolines/create',[BrincolinesController::class,'create']);
$router->get('/admin-brincolines/update',[BrincolinesController::class,'update']);
$router->post('/admin-brincolines/update',[BrincolinesController::class,'update']);
$router->post('/admin-brincolines/delete',[BrincolinesController::class,'delete']);
$router->get('/admin-brincolines/find',[BrincolinesController::class,'find']);
$router->post('/admin-brincolines/find',[BrincolinesController::class,'find']);
//furniture administration
$router->get('/admin-furniture',[FurnitureController::class,'furniture']);
$router->get('/admin-furniture',[FurnitureController::class,'furniture']);
$router->get('/admin-furniture/create',[FurnitureController::class,'create']);
$router->post('/admin-furniture/create',[FurnitureController::class,'create']);
$router->get('/admin-furniture/update',[FurnitureController::class,'update']);
$router->post('/admin-furniture/update',[FurnitureController::class,'update']);
$router->post('/admin-furniture/delete',[FurnitureController::class,'delete']);
$router->get('/admin-furniture/find',[FurnitureController::class,'find']);
$router->post('/admin-furniture/find',[FurnitureController::class,'find']);

// Check and validate the routes, ensuring they exist and assign them the functions of the Controller
$router->checkRoutes();