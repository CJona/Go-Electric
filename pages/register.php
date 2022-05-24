<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

// Fout meldingen in formulier
$errors = [];

// we controlen of we deze velden vanuit het formulier hebben gekregen
if (isset($_POST["name"], $_POST["email"], $_POST["password"], $_POST["phonenumber"])){
    // formulier waardes ophalen
    [$name, $email, $password, $phonenumber] = [$_POST["name"], $_POST["email"], $_POST["password"], $_POST["phonenumber"]];

    if (strlen($name) < 3 || strlen($name) > 50){
        $errors[] = "uw naam moet langer dan 3 en korter dan 50 karakters zijn";
    }

    if (strlen($email) < 3 || strlen($email) > 50){
        $errors[] = "uw email moet langer dan 3 en korter dan 50 karakters zijn";
    }

    if (strlen($password) < 6){
        $errors[] = "uw wachtwoord moet langer dan 6 karakters zijn";
    }

    if (strlen($phonenumber) !== 10 && !ctype_digit($phonenumber)){
        $errors[] = "Ongeldig telefoon nummer";
    }

    if (!$errors){
        $user = new User();
        $user->register($email, $password, $phonenumber, $name);
    }
}
?>
<?php require 'parts/header.php'; ?>
<div class="container is-max-desktop py-6">
    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="post" action="/?page=register" class="box">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input" name="name" type="text" placeholder="Alex example">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" name="email" type="email" placeholder="e.g. alex@example.com">
            </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" name="password" type="password" placeholder="********">
            </div>
        </div>

        <div class="field">
            <label class="label">Phone number</label>
            <div class="control">
                <input class="input" name="phonenumber" type="text" placeholder="0612345678">
            </div>
        </div>

        <button class="button is-primary">Register</button>
    </form>
</div>
<?php require 'parts/footer.php'; ?>