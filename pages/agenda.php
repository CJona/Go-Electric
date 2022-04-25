<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;

$contact = new Contact();
?>
<section class="hero is-danger" xmlns="http://www.w3.org/1999/html">
    <div class="hero-body">
        <p class="title">
            Go-Electric
        </p>
        <p class="subtitle">
            Bekijk hier uw Afspraken
        </p>

    </div>
</section>
<div class="container py-4">
    <section class="hero is-small">
        <div class="hero-body">
            <p class="title">
                Afspraken
            </p>
        </div>
    </section>
    <div class="columns features">
        <?php foreach ($contact->all() as $item): ?>
            <div class="column is-2">
                <div class="card is-shady">
                    <div class="card-content">
                        <div class="content">
                            <p><b>Email: </b><?php echo $item['email']?></p>
                            <p><b>Mobiel: </b><?php echo $item['phonenumber']?></p>
                            <p><b>Naam: </b><?php echo $item['name']?></p>
                            <p><b>Bericht: </b><?php echo $item['message']?></p>
                            <p><b>Datum: </b><?php echo $item['date']?></p>
                        </div>
                        <a class="button is-danger is-focus is-rounded is-outlined" href="/index.php?page=afspraken_delete&id=<?php echo $item['id']; ?>">Verwijder afspraak</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
     </div>
</div>