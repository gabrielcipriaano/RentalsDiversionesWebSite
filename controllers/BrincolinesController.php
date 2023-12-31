<?php

namespace Controllers;

use MVC\Router;

class BrincolinesController
{
    public static function brincolines(Router $router)
    {
        $router->renderView('brincolines/index', [
            'main' => false
        ]);
    }
}
