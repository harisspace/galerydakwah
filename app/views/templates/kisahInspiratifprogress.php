<div class="track">
    <h2>Kisah Inspiratif</h2>
    <p>Berikut kisah-kisah yang sangat menginspirasi kita dalam hidup agar lebih baik lagi</p>
</div>

<div class="progressbar">
    <div class="myprogress">
        <p class="myprogress-count">0%</p>
    </div>

    <input type="hidden" name="data-session" class="data-session" value="<?php
        echo (isset($_SESSION["kisahInspiratif"])) ? count($_SESSION["kisahInspiratif"]) : 0; ?>">
    <input type="hidden" name="data-db" class="data-db" value="<?= $data["sum"]; ?>">
</div>