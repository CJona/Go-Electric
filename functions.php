<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

function ee (string $text):void
{
    echo htmlentities($text);
}