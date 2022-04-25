<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;
// Fout meldingen in formulier
$errors = [];

// we controlen of we deze velden vanuit het formulier hebben gekregen
if (isset($_POST["email"], $_POST["phonenumber"], $_POST["name"], $_POST["message"], $_POST["date"])){

    if (strlen($_POST["email"]) < 3 || strlen($_POST["email"]) > 100){
        $errors[] = "uw email moet langer dan 3 en korter dan 100 karakters zijn";
    }

    if (strlen($_POST["phonenumber"]) < 8){
        $errors[] = "Uw telefoonnummer moet langer dan 8 cijfers zijn";
    }

    if (strlen($_POST["message"]) < 3 || strlen($_POST["message"]) > 500){
        $errors[] = "Uw bericht moet langer dan 3 en korter dan 500 karakters zijn";
    }

    if (strlen($_POST["name"]) < 3 || strlen($_POST["name"]) > 50){
        $errors[] = "Uw naam moet langer dan 3 en korter dan 50 karakters zijn";
    }

    if (strlen($_POST["date"]) < 3){
        $errors[] = "Uw moet een geldige datum en tijd selecteren";
    }

    if (!$errors){
        $contact = new Contact();
        $contact->send($_POST["email"], $_POST["phonenumber"], $_POST["name"], $_POST["message"], $_POST["date"]);
    }
}
?>
<section class="hero is-danger">
    <div class="hero-body">
        <h1 class="title is-2">Contact Us</h1>
    </div>
</section>
<div class="container py-4">
    <div class="columns is-variable">
        <div class="column is-two-thirds has-text-left">
            <p class="is-size-5">
                Go Electric maakt het voor iedereen makkelijk om tegen aanvaardbare prijzen een fiets of ander elektrisch vervoermiddel aan te schaffen. Wij geven veel om betrouwbaarheid en een goed advies over Uw toekomstige aankoop.
                <br>
                Denkt U na over het aanschaffen van een fiets voor U zelf of kinderen dan hoort daar niet alleen een goed advies bij maar ook is een proefrit zeker nodig om de juiste keuze en afstellingen van Uw vervoermiddel te doen.
                <br>
                Bij ons kunt U in een fijne sfeer waarbij het hele gezin welkom is een gratis en ongedwongen afspraak te maken voor een proefrit en advies. Het enige wat we van U vragen is een datum en tijd af te spreken via het contactformulier.
                <br>
                We zien U graag terug in onze winkel voor een proefrit.
            </p>
            <div class="column is-6">
                <figure class="image is-4by3">
                    <img src="https://picsum.photos/800/600/?random" alt="Description">
                </figure>
            </div>
        </div>
        <div class="column is-one-third has-text-left">
            <?php if ($errors): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="/?page=contact" method="post">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input is-medium" required type="text" name="name" id="name">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input is-medium"  required type="text" name="email" id="email">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Phone number</label>
                    <div class="control">
                        <input class="input is-high"  type="number" name="phonenumber" id="phonenumber">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea name="message" class="textarea is-medium"></textarea>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Date</label>
                    <div class="control">
                        <input class="input is-high" type="datetime-local" name="date">
                    </div>
                </div>

                <div class="control">
                    <button  type="submit" value="submit" class="button  is-danger is-fullwidth has-text-weight-medium is-medium">Send Message</button>
                    <span class="icon">
                        <i class="create.php"></i>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
