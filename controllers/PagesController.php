<?php

namespace Controllers;

use Classes\Email;
use Models\Brincolin;
use Models\Furniture;
use MVC\Router;

class PagesController
{
    public static function index(Router $router)
    {   
        $brincolines = Brincolin::get(3);
        $furnitures = Furniture::get(3);
        $router->renderView('pages/index', [
            'main' => true,
            'brincolines' =>  $brincolines,
            'furnitures' =>  $furnitures

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

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = new Email($_POST['name'],null,null);
            $message =$email->sendContact();
        }
        $router->renderView('pages/contact', [
            'main' => false,
            'script' => $script,
            'message' => $message
        ]);
    }
    public static function furnitures(Router $router)
    {   
        $furnitures = Furniture::all();
        $router->renderView('pages/listFurniture', [
            'main' => false,
            'furnitures' => $furnitures
        ]);
    }
    public static function brincolines(Router $router)
    {   
        $brincolines = Brincolin::all();
        $router->renderView('pages/listBrincolines', [
            'main' => false,
            'brincolines' => $brincolines
        ]);
    }
    public static function brincolin(Router $router)
    {   
        $_GET['id'] ? $id = s($_GET['id']) : header('Location: /');

        $brincolin = Brincolin::where('id',$id);

        if(!$brincolin){header('Location: /');}

        $router->renderView('pages/brincolin', [
            'main' => false,
            'brincolin' => $brincolin
        ]);
    }
    public static function furniture(Router $router)
    {   
        $_GET['id'] ? $id = s($_GET['id']) : header('Location: /');

        $furniture = Furniture::where('id',$id);

        if(!$furniture){header('Location: /');}

        $router->renderView('pages/furniture', [
            'main' => false,
            'furniture' => $furniture
        ]);
    }
}
