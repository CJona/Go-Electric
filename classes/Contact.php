<?php

class Contact
{
    public function all(): array
    {
        // $db vanuit index.php ophalen
        global $db;

        return $db->select('contact', '*');
    }

    public function send(string $email, string $phonenumber, string $name, string $message, string $date): void
    {
        // $db vanuit index.php ophalen
        global $db;

        // aanvraag in database aanmaken
        $db->insert('contact', [
            'email' => $email,
            'phonenumber' => $phonenumber,
            'name' => $name,
            'message' => $message,
            'date' => $date
        ]);
    }

    public function update($email, $phonenumber, $name, $message, $date){

        global $db;

        $db->get('products', [
            'id' => 1,
            'message' => $message,
            'name' =>  $name,
            'phonenumber' => $phonenumber,
            'email' => $email,
            'date' => $date,
        ]);
        return true;

    }
    public function delete(){
        global $db;

        $db->delete('contact', 'id');
    }

}
