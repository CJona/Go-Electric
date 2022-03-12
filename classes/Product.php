<?php

class Product
{
    public function all(): array
    {
        // $db vanuit index.php ophalen
        global $db;

        return $db->select('products', '*');
    }
}
