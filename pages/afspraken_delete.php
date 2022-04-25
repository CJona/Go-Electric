<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

$afspraak = new Contact();

if(
        empty($_GET['id']) ||
        empty($afspraakk = $afspraak->get($_GET['id']))
) {
    die('');
}

$afspraak->delete($_GET['id']);


header('Location: /');