<div class="track">
    <h2>One Minute Booster</h2>
    <p>Salah satu tren durasi video saat ini, kita akan melihat video singkat yang tentunya sangat bermakna</p>
</div>

<div class="progressbar">
    <div class="myprogress">
        <p class="myprogress-count">0%</p>
    </div>

    <input type="hidden" name="data-session" class="data-session" value="<?php
        echo (isset($_SESSION["omb"])) ? count($_SESSION["omb"]) : 0; ?>">
    <input type="hidden" name="data-db" class="data-db" value="<?= $data["sum"]; ?>">
</div>