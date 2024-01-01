<?php 
use Models\ActiveRecord;

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'funciones.php';
require 'database.php';

// Conect to database
ActiveRecord::setDB($db);


