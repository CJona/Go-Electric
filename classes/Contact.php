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


    public function get(int $id): ?array
    {
        global $db;

        return $db->get('contact', '*', [
            'id' => $id
        ]);
    }
//    public function update($email, $phonenumber, $name, $message, $date){
//
//        global $db;
//
//        $db->get('contact', [
//            'id' => 1,
//            'message' => $message,
//            'name' =>  $name,
//            'phonenumber' => $phonenumber,
//            'email' => $email,
//            'date' => $date,
//        ]);
//        return true;
//
//    }
    public function delete(int $contact_id): void
    {
        global $db;

        $db->delete('contact', [
            'id' => $contact_id
        ]);
    }

}
