<?php

namespace Controllers;

use MVC\Router;

class AdminController
{

    public static function index(Router $router)
    {
        $router->renderView('admin/index', [
            'main' => false
        ]);
    }
}
