<?php

namespace Models;

class Admin extends ActiveRecord
{
    protected static $table = 'users';
    protected static $dbColumns = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validate(){
        if(!$this->email){
            self::$alerts['error'][] = 'Ingresa el email';
        }
        if(!$this->password){
            self::$alerts['error'][] = 'Ingresa la contraseña';
        }
    
        return self::$alerts;
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
