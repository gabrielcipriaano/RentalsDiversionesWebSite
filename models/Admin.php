<?php

namespace Models;

class Admin extends ActiveRecord
{
    protected static $table = 'users';
    protected static $dbColumns = ['id', 'email', 'password', 'token', 'name'];

    public $id;
    public $email;
    public $password;
    public $token;
    public $name;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    public function validate()
    {
        if (!$this->email) {
            self::$alerts['error'][] = 'Ingresa el email';
        }
        if (!$this->password) {
            self::$alerts['error'][] = 'Ingresa la contraseña';
        }

        return self::$alerts;
    }
    public function validateEmail()
    {
        if (!$this->email) {
            self::$alerts['error'][] = 'Ingresa el email';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alerts['error'][] = 'El email es incorrecto';
        }

        return self::$alerts;
    }
    public function validatePassword()
    {   $passwordPattern = '/^(?!\s*$)[A-Za-z\d\W_]*$/';

        if (!$this->password) {
            self::$alerts['error'][] = 'Ingresa la contraseña';
        }
        if (!strlen($this->password) > 6) {
            self::$alerts['error'][] = 'La contraseña debe ser de al menos 6 caracteres';
        }
        if (!preg_match($passwordPattern, $this->password)) {
            self::$alerts['error'][] = 'Formato de contraseña no válido';
        }

        return self::$alerts;
    }

    public function createToken()
    {
        $this->token = uniqid();
    }


    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function auth($password): bool
    {
        return password_verify($this->password, $password);
    }
}
