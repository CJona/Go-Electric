<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;
$user = new User();

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Go Electric</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-calendar@5.0.3/dist/css/bulma-calendar.min.css">
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="https://www.groenezaken.com/storage/app/uploads/public/118/4bc/2de/thumb__600_0_0_0_landscape.jpg" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a href="/" class="navbar-item">
                Home
            </a>
            
            <a href="/?page=contact" class="navbar-item">
                Contact
            </a>

            <a href="/?page=about" class="navbar-item">
                About
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    More
                </a>

                <div class="navbar-dropdown">
                    <?php if($user->isemployee()): ?>
                        <a href="/?page=product_create" class="navbar-item">
                            Product Aanmaken
                        </a>
                        <a href="/?page=product_create" class="navbar-item">
                            Categorie Aanmaken
                        </a>
                        <a href="/?page=agenda" class="navbar-item">
                            Afspraken
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php if (!$user->isloggedin()): ?>
                        <a href="/?page=register" class="button is-light">
                            <strong>Sign up</strong>
                        </a>
                        <a href="/?page=login" class="button is-light">
                            Log in
                        </a>
                    <?php else: ?>
                        <a href="/?page=logout" class="button is-light">
                            Log out
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>