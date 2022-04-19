<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;
// TODO: KOPIEER EN PLAK VAN CONTACT OM EEN PRODUCT AAN TE MAKEN, DAARNA MOOI MAKEN
// Fout meldingen in formulier
$errors = [];

// we controlen of we deze velden vanuit het formulier hebben gekregen
if (isset($_POST["name"], $_POST["description"], $_POST["price"], $_POST["stock"], $_FILES["image"])){

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

    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];

    $file_names = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($file_names));

    $extensions= array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)=== false) {
        $errors[] = "Ongeldige bestand, upload alleen jpg/jpeg/png bestanden aub.";
    }

    if($file_size > (2 * 1024 * 1024)) {
        $errors[] = "Bestand mag niet groter dan 2mb zijn";
    }

    if (!$errors){
        $uploaded_file = time() . "." . $file_ext;
        move_uploaded_file($file_tmp, __DIR__ . "/../images/".$uploaded_file);
        $user = new User();
        $product = new Product();
        $product->insert(
                $_POST["name"],
                $_POST["description"],
                $_POST["price"],
                $_POST["stock"],
                $uploaded_file,
                $user->get()["id"]
        );
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

<form class="container" enctype="multipart/form-data" action="/index.php?page=product_create" method="POST">
    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>sss
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="columns features">
        <div class="column is-4">
            <div class="card is-shady">
                <div class="card-content">
                    <div class="content">
                        <h4>Vul productgegevens in</h4>
                        <input type="text" name="name" placeholder="name"><br>
                        <input type="text" name="description" placeholder="description"><br>
                        <input type="number" name="price" placeholder="price"><br>
                        <input type="number" name="stock" placeholder="stock"><br>
                        <input type="file" accept="image/*" name="image"><br>
                        <input class="button is-succes is-rounded" type="submit" value="Submit"><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
