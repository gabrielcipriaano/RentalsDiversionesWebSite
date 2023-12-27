<?php

namespace Controllers;

use MVC\Router;

class PagesController
{
    public static function index(Router $router)
    {
        $router->renderView('pages/index', [
            'main' => true

        ]);
    }
    public static function about(Router $router)
    {
        $router->renderView('pages/about', [
            'main' => false
        ]);
    }
    public static function contact(Router $router)
    {
        $script = "<script src='build/js/dinamicRadio.js'></script>";
        $router->renderView('pages/contact', [
            'main' => false,
            'script' => $script
        ]);
    }
    public static function furniture(Router $router)
    {
        $router->renderView('pages/listFurniture', [
            'main' => false
        ]);
    }
    public static function brincolines(Router $router)
    {
        $router->renderView('pages/listBrincolines', [
            'main' => false
        ]);
    }
    public static function brincolin(Router $router)
    {
        $router->renderView('pages/brincolin', [
            'main' => false
        ]);
    }
}
