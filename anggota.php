<?php
$pageTitle  = 'Anggota — XII RPL 1';
$activePage = 'anggota';
$kelas      = require __DIR__ . '/data/kelas.php';
$siswa      = require __DIR__ . '/data/siswa.php';

require __DIR__ . '/includes/header.php';
?>

<section class="page-head page-head--split">
    <div>
        <p class="eyebrow">Anggota kelas</p>
        <h1>Kenalan dengan kami</h1>
        <p class="lead">Daftar siswa ditampilkan sebagai kartu foto. Gunakan kolom pencarian untuk mencari anggota.</p>
    </div>
    <span class="count-pill">
        <?= (int) $kelas['statistik']['siswa'] ?> siswa
    </span>
</section>

<section class="section">
    <div class="section-head section-head--split">
        <div>
            <p class="eyebrow">Daftar siswa</p>
            <h2>Anggota XII RPL 1</h2>
        </div>
        <div class="search-field">
            <label for="search-anggota">Cari anggota</label>
            <input type="search" id="search-anggota" placeholder="Nama atau jabatan"
                   autocomplete="off">
        </div>
    </div>

    <p class="search-status" id="search-status" role="status" aria-live="polite"></p>

    <ul class="member-grid">
        <?php foreach ($siswa as $anggota): ?>
            <li data-search="<?= htmlspecialchars(
                $anggota['nama'] . ' ' . $anggota['jabatan'] . ' ' . $anggota['deskripsi_singkat'],
                ENT_QUOTES,
                'UTF-8'
            ) ?>">
                <article class="member-card">
                    <div class="member-card__photo">
                        <img src="<?= htmlspecialchars($anggota['foto'], ENT_QUOTES, 'UTF-8') ?>"
                             alt="Placeholder foto <?= htmlspecialchars($anggota['nama'], ENT_QUOTES, 'UTF-8') ?>"
                             loading="lazy">
                        <span class="member-card__initials" aria-hidden="true">
                            <?= htmlspecialchars(rpl_initials($anggota['nama']), ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </div>
                    <div class="member-card__body">
                        <h2><?= htmlspecialchars($anggota['nama'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="member-card__role"><?= htmlspecialchars($anggota['jabatan'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="member-card__desc"><?= htmlspecialchars($anggota['deskripsi_singkat'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

    <p class="placeholder search-empty" id="search-empty" hidden>Tidak ada anggota yang cocok.</p>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
