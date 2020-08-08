<div class="track">
    <h2>Renungan</h2>
    <p>Pentingnya muhasabah diri agar dapat menjadi lebih baik lagi kedepannya, maka dari itu yuk muhasabah diri</p>
</div>

<div class="progressbar">
    <div class="myprogress">
        <p class="myprogress-count">0%</p>
    </div>

    <input type="hidden" name="data-session" class="data-session" value="<?php
                                                                            echo (isset($_SESSION["renungan"])) ? count($_SESSION["renungan"]) : 0; ?>">
    <input type="hidden" name="data-db" class="data-db" value="<?= $data["sum"]; ?>">
</div>