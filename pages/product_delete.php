<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

$products = new Product();

if(
        empty($_GET['id']) ||
        empty($product = $products->get($_GET['id']))
) {
    die('Ongeldige gegevens, probeer opnieuw');
}

$products->delete($_GET['id']);

// terug naar home
header('Location: /index.php');