<button class="tambah">Tambah</button>

<div class="modal">
    <form action="<?= BASEURL; ?>/senang/tambah" method="POST">
        <div class="modal-content">
            <span class="close">x</span>

            <label for="pilihan">Pilih: </label>
            <select name="pilihan" id="pilihan" autofocus required>
                <optgroup label="Tema">
                    <option value="sirah">Sirah</option>
                    <option value="tadabbur">Tadabbur</option>
                </optgroup>
                <optgroup label="Suasana">
                    <option value="senang">Senang</option>
                </optgroup>
            </select>

            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" placeholder="judul" required>

            <label for="channel">Channel</label>
            <input type="text" name="channel" id="channel" placeholder="channel" required>

            <label for="video">Video</label>
            <input type="text" name="video" id="video" placeholder="video" required>

            <button type="submit" name="tambah" id="tambah">tambah</button>
        </div>
    </form>
</div>



<div class="track">
    <?php foreach ($data['videos'] as $video) : ?>
        <a href="<?= BASEURL; ?>/senang/video/<?= $video['id'] ?>" class="track-video is-black"><?= $video["judul"] ?>
            <a href="<?= BASEURL; ?>/senang/hapus/<?= $video['id'] ?>" class="is-black link" onclick="return confirm('apakah anda yakin??')">hapus</a> |
            <a href="<?= BASEURL; ?>/senang/ubah/<?= $video['id'] ?>" class="is-black link">ubah</a>
        </a>
    <?php endforeach; ?>
</div>