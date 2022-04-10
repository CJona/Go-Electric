<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

// Fout meldingen in formulier
$errors = [];

// we controlen of we deze velden vanuit het formulier hebben gekregen
if (isset($_POST["email"], $_POST["password"])){
    // formulier waardes ophalen
    [$email, $password] = [$_POST["email"], $_POST["password"]];

    if (strlen($email) < 3 || strlen($email) > 50){
        $errors[] = "uw email moet langer dan 3 en korter dan 50 karakters zijn";
    }

    if (strlen($password) < 6){
        $errors[] = "uw wachtwoord moet langer dan 6 karakters zijn";
    }

    if (!$errors){
        $user = new User();
        $user->login($email, $password);
    }
}

?>
<div class="container is-max-desktop py-6">
    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="post" action="/?page=login" class="box">
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input name="email" class="input" type="email" placeholder="e.g. alex@example.com">
            </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input name="password" class="input" type="password" placeholder="********">
            </div>
        </div>

        <button class="button is-primary">Sign in</button>
    </form>
</div>
