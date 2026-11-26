<?php
$pageTitle  = 'Galeri — XII RPL 1';
$activePage = 'galeri';
$kelas      = require __DIR__ . '/data/kelas.php';

$album = [];
foreach ($kelas['galeri'] as $foto) {
    $album[$foto['kategori']][] = $foto;
}

require __DIR__ . '/includes/header.php';
?>

<section class="page-head">
    <p class="eyebrow">Galeri</p>
    <h1>Dokumentasi kegiatan</h1>
    <p class="lead">Foto dikelompokkan berdasarkan kegiatan. Klik foto untuk melihat tampilan lebih besar.</p>
</section>

<?php foreach ($album as $namaKategori => $fotos): ?>
    <section class="section">
        <div class="section-head section-head--split">
            <div>
                <p class="eyebrow">Album</p>
                <h2><?= htmlspecialchars($namaKategori, ENT_QUOTES, 'UTF-8') ?></h2>
            </div>
            <span class="count-pill"><?= count($fotos) ?> foto</span>
        </div>

        <ul class="gallery-grid">
            <?php foreach ($fotos as $foto): ?>
                <li>
                    <button type="button" class="gallery-card"
                            data-src="<?= htmlspecialchars($foto['foto'], ENT_QUOTES, 'UTF-8') ?>"
                            data-caption="<?= htmlspecialchars($foto['judul'], ENT_QUOTES, 'UTF-8') ?>"
                            aria-label="Lihat foto <?= htmlspecialchars($foto['judul'], ENT_QUOTES, 'UTF-8') ?>">
                        <img src="<?= htmlspecialchars($foto['foto'], ENT_QUOTES, 'UTF-8') ?>"
                             alt="<?= htmlspecialchars($foto['judul'], ENT_QUOTES, 'UTF-8') ?>"
                             loading="lazy">
                        <span class="gallery-card__label"><?= htmlspecialchars($foto['judul'], ENT_QUOTES, 'UTF-8') ?></span>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endforeach; ?>

<dialog class="lightbox" id="lightbox" aria-label="Tampilan foto besar">
    <button type="button" class="lightbox__close" aria-label="Tutup foto">
        <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
    </button>
    <img class="lightbox__image" src="" alt="">
    <p class="lightbox__caption"></p>
</dialog>

<?php require __DIR__ . '/includes/footer.php'; ?>
