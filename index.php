<?php
// ervoor zorgen dat sessions cookies kunnen gebruiken
session_start();

// dit is zodat wij later kunnen kijken of de code hier begint
define('START',1);

require 'classes/Medoo.php';

require 'functions.php';
require 'routes.php';

