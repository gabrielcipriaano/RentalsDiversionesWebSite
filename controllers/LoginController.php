<?php

namespace Controllers;

use Models\Admin;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alerts = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin = new Admin();
            $admin->sync($_POST);
            $alerts = $admin->validate();
            if (empty($alerts)) {
                $exist = Admin::where('email', $admin->email);
                $passwordIsCorrect = $admin->auth($exist->password);
                if ($exist && $passwordIsCorrect) {
                    debuguear('admin...');
                    header('Location: /admin');
                } else {
                    Admin::setAlert('error', 'Email o password incorrecto');
                    
                }
            }
        }
        $alerts = Admin::getAlerts();
        $router->renderView('auth/login', [
            'main' => false,
            'alerts' => $alerts
        ]);
    }
}
