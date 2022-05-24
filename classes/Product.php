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
        ?string $image,
        ?int $category_id,
        int $user_id,
    ): bool
    {
        global $db;

        $db->insert('products', [
            'user_id' => $user_id,
            'category_id' => $category_id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
            'image' => $image,
        ]);
        return true;
    }

    public function get(int $id): ?array
    {
        global $db;

        return $db->get('products', '*', [
            'id' => $id
        ]);
    }

    public function update(
        int $product_id,
        string $name,
        string $description,
        string $price,
        string $stock,
        ?string $image,
        ?int $category_id,
        int $user_id,
    ): void
    {
        global $db;

        $db->update('products', [
            'user_id' => $user_id,
            'category_id' => $category_id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
            'image' => $image
        ], [
            'id' => $product_id
        ]);
    }

    public function delete(int $product_id): void
    {
        global $db;

        $db->delete('products', [
            'id' => $product_id
        ]);
    }
}