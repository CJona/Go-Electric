<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

$categories = new Category();
$user = new User();
?>
<?php require 'parts/header.php'; ?>
<section class="hero is-danger" xmlns="http://www.w3.org/1999/html">
    <div class="hero-body">
        <p class="title">
            Go-Electric
        </p>
        <p class="subtitle">
            Bekijk hier uw categorieën
        </p>

    </div>
</section>
<div class="container py-4">
    <section class="hero is-small">
        <div class="hero-body">
            <p class="title">
                Categorieen
            </p>
        </div>
    </section>

    <div class="columns is-multiline is-mobile features">
        <?php foreach ($categories->all() as $item): ?>
            <div class="column is-one-quarter-desktop is-half-mobile">
                <div class="card is-shady">
                    <div class="card-content">
                        <div class="content">
                            <h1><b><?php echo $item['name']?></b></h1>
                            <?php if($user->isemployee()): ?>
                                <a class="button is-rounded is-primary is-focus is-outlined is-responsive is-normal" href="/index.php?page=category_edit&id=<?php echo $item['id']; ?>">Bewerk categorie</a>
                                <a class="button is-danger is-focus is-rounded is-outlined" href="/index.php?page=category_delete&id=<?php echo $item['id']; ?>">Verwijder categorie</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require 'parts/footer.php'; ?>