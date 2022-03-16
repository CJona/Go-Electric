<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;
    $message = "Bedankt voor uw bericht";
?>


<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns is-8 is-variable ">
                <div class="column is-two-thirds has-text-left">
                    <h1 class="title is-1">Contact Us</h1>
                    <p class="is-size-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eligendi soluta
                        voluptate facere molestiae consequatur.
                    </p>
                    <div class="column is-5">
                        <figure class="image is-4by3">
                            <img src="https://picsum.photos/800/600/?random" alt="Description">
                        </figure>
                    </div>
                </div>
                <form method="post" target="_self">
                    <div class="column has-text-left">
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
                                <textarea class="textarea is-medium"></textarea>
                            </div>
                        </div>
                        <div class="control">
                            <button type="submit" value="submit" class="button is-link is-fullwidth has-text-weight-medium is-medium">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    // (B) PROCESS FORM SUBMISSION & SHOW MESSAGE
    if (isset($_POST["name"])) {
        echo "<div>$message</div>";
    }

    ?>
</section>

