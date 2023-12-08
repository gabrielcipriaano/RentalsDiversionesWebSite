<?php 

require 'funciones.php';
require 'database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conect to database
use Model\ActiveRecord;
ActiveRecord::setDB($db);