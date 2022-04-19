<?php

class Product
{
    public function all(): array
    {
        // $db vanuit index.php ophalen
        global $db;

        return $db->select('products', '*');
    }

    public function insert(
        string $name,
        string $description,
        string $price,
        string $stock,
        string $image,
        int $user_id,
    ): bool
    {
        global $db;

        $db->insert('products', [
            'user_id' => $user_id,
            'category_id' => 1,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
            'image' => $image
        ]);
        return true;
    }

    public function update(string $name, string $description, string $price, string $stock){

        global $db;

        $db->update('products', [
            'user_id' => 1,
            'category_id' => 1,
            'name' =>  $name,
            'price' => $price,
            'stock' => $stock,
            'description' => $description,
        ]);
        return true;

    }

//    public function select($name, $price, $stock, $description){
//
//        global $db;
//
//        $db->select('products', [
//            'user_id' => 1,
//            'category_id' => 1,
//            'name' => $name,
//            'price' => $price,
//            'stock' => $stock,
//            'description' => $description,
//        ]);
//        return true;
//
//    }


}