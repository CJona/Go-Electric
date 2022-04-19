<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;
// Fout meldingen in formulier
$errors = [];

// we controlen of we deze velden vanuit het formulier hebben gekregen
if (isset($_POST["name"], $_POST["description"], $_POST["price"], $_POST["stock"])){

    if (strlen($_POST["name"]) < 3 || strlen($_POST["name"]) > 50){
        $errors[] = "Uw naam moet langer dan 3 en korter dan 50 karakters zijn";
    }

    if (strlen($_POST["description"]) < 3 || strlen($_POST["description"]) > 100){
        $errors[] = "Uw beschrijving moet langer dan 3 en korter dan 100 karakters zijn";
    }

    if (strlen($_POST["price"]) < 3 || strlen($_POST["price"]) > 9999){
        $errors[] = "U moet een geldig getal tussen 3 en 9999 invoeren.";
    }

    if (strlen($_POST["stock"]) < 3 || strlen($_POST["stock"]) > 9999){
        $errors[] = "u moet een geldig getal tussen 3 en 9999 invoeren.";
    }



    if (!$errors){
        $product = new Product();
        $product->insert($_POST["name"], $_POST["description"], $_POST["price"], $_POST["stock"]);
    }
}

?>

<section class="hero is-danger">
    <div class="hero-body">
        <p class="title">
            Go-Electric
        </p>
        <p class="subtitle">
            Producten Aanmaken
        </p>

    </div>
</section>