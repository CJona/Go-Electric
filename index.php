<?php
// ervoor zorgen dat sessions cookies kunnen gebruiken
session_start();

// dit is zodat wij later kunnen kijken of de code hier begint
define('START',1);

// Database connectie
require_once 'classes/Medoo.php';
$db = new Medoo\Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'goelectric',
    'username' => 'root',
    'password' => ''
]);
require 'classes/User.php';
require 'classes/Product.php';
require 'classes/Contact.php';


require 'functions.php';
require 'routes.php';


