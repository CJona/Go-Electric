<?php
// zodat de code alleen vanuit index.php uitgevoerd mag worden
if (!defined('START')) die;
?>
<div class="container is-max-desktop py-6">

    <form class="box">
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input class="input" type="email" placeholder="e.g. alex@example.com">
            </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" type="password" placeholder="********">
            </div>
        </div>

        <button class="button is-primary">Sign in</button>
    </form>
</div>
