<div class="track">
    <h2>Tadabbur</h2>
    <p>Yuk tadabbur alquran dengan tenang, dan menghayatinya dengan baik</p>
</div>

<div class="progressbar">
    <div class="myprogress">
        <p class="myprogress-count">0%</p>
    </div>

    <input type="hidden" name="data-session" class="data-session" value="<?php
    echo(isset($_SESSION["tadabbur"])) ? count($_SESSION["tadabbur"]) : 0; ?>">
    <input type="hidden" name="data-db" class="data-db" value="<?= $data["sum"]; ?>">
</div>