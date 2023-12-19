<?php

namespace Controllers;

use MVC\Router;

class PagesController {
    public static function index(Router $router){

        
        $router->renderView('pages/index',[
            'main' => true
            
        ]);
    } 
    public static function about(Router $router){
        echo 'desde about';
    } 
    public static function gallery(Router $router){
        $router->renderView('pages/listAdds',[
            'main' => false
        ]);
    } 
}