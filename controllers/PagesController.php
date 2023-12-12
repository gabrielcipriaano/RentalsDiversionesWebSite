<?php

namespace Controllers;

use MVC\Router;

class PagesController {
    public static function index(Router $router){

        
        $router->renderView('pages/index',[
            
        ]);
    } 
    public static function about(Router $router){
        echo 'desde about';
    } 
    public static function adds(Router $router){
        echo 'desde adds';
    } 
}