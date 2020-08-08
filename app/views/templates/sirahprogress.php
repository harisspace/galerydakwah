<div class="track">
    <h2>Sirah Nabawiyah</h2>
    <p>Mempelajari sirah nabawiyah, kita dapat lebih mengenal teladan terbaik bagi seluruh manusia dalam aqidah, ibadah, dan akhlak yaitu Rasulallah Muhammad SAW</p>
</div>

<div class="progressbar">
    <div class="myprogress">
        <p class="myprogress-count">0%</p>
    </div>

    <input type="hidden" name="data-session" class="data-session" value="<?php 
    echo(isset($_SESSION["sirah"])) ? count($_SESSION["sirah"]) : 0; ?>">
    <input type="hidden" name="data-db" class="data-db" value="<?= $data["sum"]; ?>">
</div>