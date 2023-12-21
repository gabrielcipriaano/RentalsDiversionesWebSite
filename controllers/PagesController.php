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
        $router->renderView('pages/contact', [
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
    public static function gallery(Router $router)
    {
        $router->renderView('pages/listAdds', [
            'main' => false
        ]);
    }
}
