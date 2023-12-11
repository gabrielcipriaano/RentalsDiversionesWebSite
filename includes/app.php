<?php 
use Models\ActiveRecord;
require 'funciones.php';
require 'database.php';
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Conect to database
ActiveRecord::setDB($db);