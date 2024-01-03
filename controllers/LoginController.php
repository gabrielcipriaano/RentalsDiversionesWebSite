<?php

namespace Controllers;


use MVC\Router;
use Models\Admin;
use Classes\Email;

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
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['name'] = $admin->name;
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

    public static function recover(Router $router)
    {
        $alerts = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin = new Admin($_POST);
            $alerts = $admin->validateEmail();

            if (empty($alerts)) {
                $admin = Admin::where('email', $admin->email);

                if ($admin) {
                    $admin->createToken();
                    $admin->save();
                    $email = new Email($admin->name, $admin->email, $admin->token);
                    $email->sendResetInstructions();
                    Admin::setAlert('success', 'Se enviarion las instrucciones para restablecer tu contraseña a tu email');
                } else {
                    Admin::setAlert('error', 'El usuario no existe');
                }
            }
        }
        $alerts = Admin::getAlerts();
        $router->renderView('auth/recover', [
            'main' => false,
            'alerts' => $alerts
        ]);
    }

    public static function reset(Router $router)
    {
        $alerts = [];
        $token = s($_GET['token']);

        if (!$token) {
            header('Location: /');
        } else {
            $admin = Admin::where('token', $token);
            if (!$admin) {
                Admin::setAlert('error', 'token no válido');
                $token = false;
            }
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin->sync($_POST);

            $alerts = $admin->validatePassword();

            if (empty($alerts)) {
                $admin->hashPassword();
                $admin->token = '';
                $admin->save();
                Admin::setAlert('success', 'La contraseña fue actualizada correctamente');
            }
        }
        $alerts = Admin::getAlerts();
        $router->renderView('auth/reset', [
            'main' => false,
            'alerts' => $alerts,
            'token' => $token

        ]);
    }

    public static function logout(Router $router)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];
        header('Location: /');
    }
}
