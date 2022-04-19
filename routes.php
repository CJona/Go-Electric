<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

$page = 'home';
$pages = ['home', 'contact', 'about'];
$user = new User();

if ($user->isloggedin()){
    $pages = [...$pages, 'logout', 'contact'];

    if ($user->isemployee()) {
        $pages = [...$pages, 'product_create', 'agenda'];
    }

} else {
    $pages = [...$pages, 'login', 'register'];
}

if (isset($_GET['page']) && in_array($_GET['page'], $pages)) {
    $page = $_GET['page'];
}
require 'pages/parts/header.php';
require 'pages/'.$page.'.php';
require 'pages/parts/footer.php';