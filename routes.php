<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

$page = 'home';
$pages = ['home', 'contact', 'about'];
$user = new User();

if ($user->isloggedin()){
    $pages = [...$pages, 'logout', 'contact'];

    if ($user->isemployee()) {
        $pages = [
            ...$pages,
            'categories',
            'category_create', 'category_edit', 'category_delete',
            'product_create', 'product_edit', 'product_delete',
            'agenda', 'afspraken_delete',
        ];
    }

} else {
    $pages = [...$pages, 'login', 'register'];
}

if (isset($_GET['page']) && in_array($_GET['page'], $pages)) {
    $page = $_GET['page'];
}
require 'pages/'.$page.'.php';

