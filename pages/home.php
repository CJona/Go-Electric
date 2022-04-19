<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

$product = new Product();
$user = new User();
?>
<section class="hero is-danger" xmlns="http://www.w3.org/1999/html">
    <div class="hero-body">
        <p class="title">
            Go-Electric
        </p>
        <p class="subtitle">
            De leverancier voor al uw elektrische vervoermiddelen
        </p>
        <a href="/?page=contact" class="button is-warning is-large">
            <strong>Neem contact op</strong>
        </a>
    </div>
</section>
<div class="container py-4">
    <section class="hero is-small">
        <div class="hero-body">
            <p class="title">
                Fietsen
            </p>
        </div>
    </section>
    <div class="columns features">
        <?php foreach ($product->all() as $item): ?>
            <div class="column is-3">
                <div class="card is-shady">
                    <?php if($item["image"]): ?>
                        <div class="card-image">
                            <figure class="image is-3by3">
                                <img src="/images/<?php echo $item["image"]; ?>" alt="Product image">
                            </figure>
                        </div>
                    <?php endif; ?>
                    <div class="card-content">
                        <div class="content">
                            <p><b>Name: </b><?php echo $item['name']?></p>
                            <p><b>Beschrijving: </b><?php echo $item['description']?></p>
                            <p><b>Prijs: </b><?php echo $item['price']?></p>
                            <p><b>Stock: </b><?php echo $item['stock']?></p>
                            <?php if($user->isemployee()): ?>
                                <a href="/index.php?page=product_edit&id=<?php echo $item['id']; ?>">Bewerk product</a>
                                <a class="button is-danger" href="/index.php?page=product_delete&id=<?php echo $item['id']; ?>">Verwijder product</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<div class="container py-4">
    <section class="hero is-small">
        <div class="hero-body">
            <p class="title">
                Fietsen
            </p>
        </div>
    </section>
    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">One</p>
                <p class="subtitle">Subtitle</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Two</p>
                <p class="subtitle">Subtitle</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Three</p>
                <p class="subtitle">Subtitle</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Four</p>
                <p class="subtitle">Subtitle</p>
            </article>
        </div>
    </div>
</div>
