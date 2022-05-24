<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

// Fout meldingen in formulier
$errors = [];

$products = new Product();
$categories = new Category();
$category = null;

if(
        empty($_GET['id']) ||
        empty($product = $products->get($_GET['id']))
) {
    die('Ongeldige gegevens, probeer opnieuw');
}

$all_categories = $categories->all();

// we controlen of we deze velden vanuit het formulier hebben gekregen
if (isset($_POST["name"], $_POST["description"], $_POST["price"], $_POST["stock"])){

    if (strlen($_POST["name"]) < 3 || strlen($_POST["name"]) > 50){
        $errors[] = "De ingevulde naam moet langer dan 3 en korter dan 50 karakters zijn";
    }

    if (strlen($_POST["description"]) < 3 || strlen($_POST["description"]) > 100){
        $errors[] = "De ingevulde beschrijving moet langer dan 3 en korter dan 100 karakters zijn";
    }

    if ($_POST["price"] < 3 || $_POST["price"] > 9999){
        $errors[] = "U moet een geldig getal tussen 3 en 9999 invoeren voor de prijs.";
    }

    if ($_POST["stock"] < 3 || $_POST["stock"] > 9999){
        $errors[] = "u moet een geldig getal tussen 3 en 9999 invoeren voor uw voorraad.";
    }

    if(isset($_POST['category'])) {
        $check = array_filter($all_categories, function($single_category) {
            return $single_category['id'] === $_POST['category'];
        });

        if(!empty($check)) {
            $category = (int)$_POST['category'];
        }
    }



    $uploaded_file = null;
    $file_tmp = null;

    if (isset($_FILES["image"]) && $_FILES["image"]["size"] > 0) {
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

        if (!$errors) {
            $uploaded_file = time() . "." . $file_ext;
        }
    }

    if (!$errors){
        if($uploaded_file) {
            move_uploaded_file($file_tmp, __DIR__ . "/../images/".$uploaded_file);
        }

        $products->update(
            $_GET['id'],
            $_POST["name"],
            $_POST["description"],
            $_POST["price"],
            $_POST["stock"],
            $uploaded_file,
            $category,
            $_SESSION["user_id"]
        );

        $product = $products->get($_GET['id']);
    }
}
?>

<section class="hero is-danger">
    <div class="hero-body">
        <p class="title">
            Go-Electric
        </p>
        <p class="subtitle">
           Product <?php echo $product['name']; ?> bewerken
        </p>
    </div>
</section>

<form class="container" enctype="multipart/form-data" action="/index.php?page=product_edit&id=<?php echo $product['id']; ?>" method="POST">
    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <div class="columns features">
        <div class="column is-4">
            <div class="card is-shady">
                <div class="card-content">
                    <div class="content">
                        <h4>Vul productgegevens in</h4>
                        <input type="text" name="name" value="<?php echo $product['name']; ?>" placeholder="name"><br>
                        <input type="text" name="description" value="<?php echo $product['description']; ?>" placeholder="description"><br>
                        <input type="number" name="price" value="<?php echo $product['price']; ?>" placeholder="price"><br>
                        <input type="number" name="stock" value="<?php echo $product['stock']; ?>" placeholder="stock"><br>
                        <select name="category">
                            <option value="">Geen categorie</option>
                            <?php foreach($all_categories as $single_category): ?>
                                <option
                                    value="<?php echo $single_category['id']; ?>"
                                    <?php if($product["category_id"] == $single_category['id']): ?>
                                        selected
                                    <?php endif; ?>
                                >
                                    <?php echo $single_category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select><br>
                        <input type="file" accept="image/*" name="image"><br>
                        <input class="button is-succes is-rounded" type="submit" value="Submit"><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
