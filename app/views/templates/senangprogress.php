<div class="track">
    <h2>Senang</h2>
    <p>Pada bagian ini terdapat video ceramah yang tentunya dibawakan dengan cara yang menyenangkan</p>
</div>

<div class="progressbar">
    <div class="myprogress">
        <p class="myprogress-count">0%</p>
    </div>

    <input type="hidden" name="data-session" class="data-session" value="<?php
    echo(isset($_SESSION["senang"])) ? count($_SESSION["senang"]) : 0; ?>">
    <input type="hidden" name="data-db" class="data-db" value="<?= $data["sum"]; ?>">
</div>