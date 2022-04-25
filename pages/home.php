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

    <?php if ($user->isloggedin()): ?>
        <div>
            <p><b>Welkom bij Go electric</b></p>
        </div>
    <?php endif; ?>


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
                            <h1><b><?php echo $item['name']?></b></h1>
                            <p><b>Beschrijving: <br> </b><?php echo $item['description']?></p>
                            <p><b>Prijs: </b><?php echo $item['price']?></p>
                            <p><b>Stock: </b><?php echo $item['stock']?></p>
                            <?php if($user->isemployee()): ?>
                                <a class="button is-rounded is-primary is-focus is-outlined is-responsive is-normal" href="/index.php?page=product_edit&id=<?php echo $item['id']; ?>">Bewerk product</a>
                                <a class="button is-danger is-focus is-rounded is-outlined" href="/index.php?page=product_delete&id=<?php echo $item['id']; ?>">Verwijder product</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


