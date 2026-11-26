<?php
$pageTitle  = 'Beranda — XII RPL 1';
$activePage = 'index';
$kelas      = require __DIR__ . '/data/kelas.php';

require __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="hero__media">
        <img src="<?= htmlspecialchars($kelas['hero_foto'], ENT_QUOTES, 'UTF-8') ?>"
             alt="Ilustrasi placeholder kegiatan kelas XII RPL 1">
    </div>

    <div class="hero__body">
        <p class="badge">
            <svg class="icon icon--star" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2l2.9 6.3 6.9.8-5.1 4.7 1.4 6.8L12 17.6 6 20.6l1.4-6.8L2.3 9.1l6.9-.8z"/></svg>
            Angkatan <?= htmlspecialchars($kelas['angkatan'], ENT_QUOTES, 'UTF-8') ?>
        </p>
        <h1>XII <span>RPL 1</span></h1>
        <p class="hero__lead"><?= htmlspecialchars($kelas['deskripsi'], ENT_QUOTES, 'UTF-8') ?></p>
        <div class="hero__actions">
            <a class="btn btn--primary" href="tentang.php">
                Tentang Kelas
                <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
            <a class="btn btn--ghost" href="anggota.php">Lihat Anggota</a>
        </div>
        <p class="hero__sign">Salam kenal dari kami</p>
    </div>
</section>

<section class="section section--stats">
    <div class="section-head">
        <p class="eyebrow">Sekilas kelas</p>
        <h2>Kelas dalam angka</h2>
    </div>

    <div class="stats-grid">
        <article class="stat-card">
            <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/></svg>
            <strong><?= (int) $kelas['statistik']['siswa'] ?></strong>
            <span>Siswa</span>
        </article>
        <article class="stat-card">
            <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <strong><?= (int) $kelas['statistik']['guru'] ?></strong>
            <span>Wali Kelas</span>
        </article>
        <article class="stat-card">
            <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 11h18"/></svg>
            <strong><?= (int) $kelas['statistik']['kegiatan'] ?></strong>
            <span>Kegiatan</span>
        </article>
    </div>
</section>

<section class="section">
    <div class="section-head section-head--split">
        <div>
            <p class="eyebrow">Dokumentasi</p>
            <h2>Foto pilihan</h2>
        </div>
        <a class="text-link" href="galeri.php">
            Lihat galeri
            <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
    </div>

    <div class="feature-grid">
        <?php foreach (array_slice($kelas['galeri'], 0, 3) as $foto): ?>
            <figure class="feature-card">
                <img src="<?= htmlspecialchars($foto['foto'], ENT_QUOTES, 'UTF-8') ?>"
                     alt="<?= htmlspecialchars($foto['judul'], ENT_QUOTES, 'UTF-8') ?>"
                     loading="lazy">
                <figcaption>
                    <span><?= htmlspecialchars($foto['kategori'], ENT_QUOTES, 'UTF-8') ?></span>
                    <strong><?= htmlspecialchars($foto['judul'], ENT_QUOTES, 'UTF-8') ?></strong>
                </figcaption>
            </figure>
        <?php endforeach; ?>
    </div>
</section>

<section class="section cta-band">
    <div>
        <p class="eyebrow">Jelajahi</p>
        <h2>Ingin mengenal lebih dekat?</h2>
        <p>Singgasana di halaman Tentang, Anggota, dan Galeri.</p>
    </div>
    <div class="cta-band__links">
        <a class="btn btn--ghost" href="tentang.php">Tentang</a>
        <a class="btn btn--ghost" href="anggota.php">Anggota</a>
        <a class="btn btn--ghost" href="galeri.php">Galeri</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
