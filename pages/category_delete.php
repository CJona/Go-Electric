<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

$categories = new Category();

if(
        empty($_GET['id']) ||
        empty($category = $categories->get($_GET['id']))
) {
    die('Ongeldige gegevens, probeer opnieuw');
}

$categories->delete($_GET['id']);

// terug naar home
header('Location: /index.php');