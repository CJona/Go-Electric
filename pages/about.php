<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cov</title>


</head>

<body>
<section class="hero is-fullheight is-default is-bold">
    <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <span class="navbar-burger burger" data-target="navbarMenu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                </div>
            </div>
        </nav>
    </div>
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns is-vcentered">
                <div class="column is-5">
                    <figure class="image is-4by3">
                        <img src="https://picsum.photos/800/600/?random" alt="Description">
                    </figure>
                </div>
                <div class="column is-6 is-offset-1">
                    <h1 class="title is-2">
                        Go Electric
                    </h1>
                    <h2 class="subtitle is-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis lacinia odio nec turpis bibendum, eget pharetra eros egestas. Quisque accumsan lacus nec maximus rhoncus. Sed dapibus lobortis odio sed hendrerit. Aliquam malesuada purus vitae elit efficitur auctor. Pellentesque euismod dolor non luctus accumsan. Nam molestie, massa vel malesuada congue, est nibh posuere erat, id congue orci orci vel risus. Integer sit amet fermentum erat. Maecenas blandit eget metus vel malesuada. Duis sed ultrices ex. Suspendisse potenti.
                    </h2>
                    <br>
                    <p class="has-text-centered">
                        <a href="/?page=contact" class="button is-warning is-large">
                            <strong>Neem contact op</strong>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-foot">
        <div class="container">
            <div class="tabs is-centered">
                <ul>
                    <li><a>And this is the bottom</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<script src="../js/bulma.js"></script>
</body>

