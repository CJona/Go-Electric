<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

// Fout meldingen in formulier
$errors = [];

// we controlen of we deze velden vanuit het formulier hebben gekregen
if (isset($_POST["name"])){

    if (strlen($_POST["name"]) < 3 || strlen($_POST["name"]) > 50){
        $errors[] = "De ingevulde naam moet langer dan 3 en korter dan 50 karakters zijn";
    }

    if (!$errors){
        $category = new Category();
        $inserted = $category->insert(
            $_POST["name"],
            $_SESSION["user_id"]
        );
    }
}
?>
<?php require 'parts/header.php'; ?>
<section class="hero is-danger">
    <div class="hero-body">
        <p class="title">
            Go-Electric
        </p>
        <p class="subtitle">
           Categorieën Aanmaken
        </p>

    </div>
</section>

<form class="container" enctype="multipart/form-data" action="/index.php?page=category_create" method="POST">
    <?php if (isset($inserted) && $inserted === true): ?>
        <div class="notification is-success">
            Categorie <?php echo $_POST["name"]; ?> aangemaakt!
        </div>
    <?php endif; ?>
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
                        <h4>Vul categorie gegevens in</h4>
                        <input type="text" name="name" placeholder="name"><br>
                        <input class="button is-succes is-rounded" type="submit" value="Submit"><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php require 'parts/footer.php'; ?>