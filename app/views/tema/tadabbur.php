<div class="track">
    <?php foreach ($data['videos'] as $video) : ?>
        <a href="<?= BASEURL; ?>/tadabbur/video/<?= $video['id'] ?>" class="track-video is-black"><?= $video["judul"] ?>
            <?php if (isset($_SESSION["tadabbur"])) : ?>
                <?php foreach ($_SESSION["tadabbur"] as $key => $value) : ?>
                    <?php if ($key == $video["id"]) : ?>
                        <img src="<?= BASEURL; ?>/img/checklist.png" alt="gambar" width="30px" height="30px">
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </a>
    <?php endforeach; ?>
</div>