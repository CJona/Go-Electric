<?php

class User
{
    public function get(): array|null
    {
        // $db vanuit index.php ophalen
        global $db;

        // controlen of de gebruiker ingelogd is
        if ($this->isloggedin()) {
            // Als de gebruiker ingelogd is halen wij al zijn gegevens op en geven wij dit
            return $db->get('users', '*', [
                'id' => $_SESSION['user_id']
            ]);
        } else {
            // als de gebruiker niet ingelogd is sturen wij null
            return null;
        }
    }

    public function login(string $email, string $password): void
    {
        // $db vanuit index.php ophalen
        global $db;

        // controleren of gegevens al bestaan
        $user = $db->get('users', ['email', 'password', 'id'], [
            'email' => $email
        ]);
        if(!$user) {
            die('Lukt niet');
        }

        // wachtwoord vergelijken
        if ($user['password'] === sha1($password));

        // id in session user_id stoppen
        $_SESSION['user_id'] = $user['id'];

        // doorsturen naar contact pagina
        header('Location: /?page=contact');
    }
    public function register(string $email, string $password, string $phonenumber, string $name): void
    {
        // $db vanuit index.php ophalen
        global $db;

        // controleren of gegevens al bestaan
        $user = $db->get('users', ['id'], [
            'email' => $email
        ]);
        if($user) {
            die('Lukt niet');
        }

        // gebruiker in database aanmaken
        $db->insert('users', [
            'email' => $email,
            'phonenumber' => $phonenumber,
            'name' => $name,
            'password' => sha1($password),
        ]);

        // id van die aangemaakte gebruiker ophalen uit database
        $user_id = $db->id();

        // id in session user_id stoppen
        $_SESSION['user_id'] = $user_id;

        // doorsturen naar contact pagina
        header('Location: /?page=contact');

    }
    public function logout(): void
    {
        // de sessie cookie van de gebruiker verwijderen
        session_destroy();
    }
    public function isloggedin(): bool
    {
        return isset($_SESSION['user_id']);
    }
}
