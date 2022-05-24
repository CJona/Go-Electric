<?php

class Category
{
    public function all(): array
    {
        // $db vanuit index.php ophalen
        global $db;

        return $db->select('categories', '*');
    }

    public function insert(
        string $name,
        int $user_id,
    ): bool
    {
        global $db;

        $db->insert('categories', [
            'user_id' => $user_id,
            'name' => $name,
        ]);
        return true;
    }

    public function get(int $id): ?array
    {
        global $db;

        return $db->get('categories', '*', [
            'id' => $id
        ]);
    }

    public function update(
        int $category_id,
        string $name,
        int $user_id,
    ): void
    {
        global $db;

        $db->update('categories', [
            'user_id' => $user_id,
            'name' => $name,
        ], [
            'id' => $category_id
        ]);
    }

    public function delete(int $category_id): void
    {
        global $db;

        $db->delete('categories', [
            'id' => $category_id
        ]);
    }
}