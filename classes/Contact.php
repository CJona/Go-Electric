<?php

class Contact
{
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
}