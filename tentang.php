<?php
$pageTitle  = 'Tentang — XII RPL 1';
$activePage = 'tentang';
$kelas      = require __DIR__ . '/data/kelas.php';
$siswa      = require __DIR__ . '/data/siswa.php';

require __DIR__ . '/includes/header.php';
?>

<section class="page-head page-head--split">
    <div>
        <p class="eyebrow">Tentang kelas</p>
        <h1>Cerita XII RPL 1</h1>
        <p class="lead"><?= htmlspecialchars($kelas['deskripsi'], ENT_QUOTES, 'UTF-8') ?></p>
    </div>
    <img class="page-head__art"
         src="<?= htmlspecialchars($kelas['hero_foto'], ENT_QUOTES, 'UTF-8') ?>"
         alt="Foto suasana kelas XII RPL 1">
</section>

<section class="section">
    <div class="section-head">
        <p class="eyebrow">Pengajar</p>
        <h2>Wali kelas</h2>
    </div>

    <article class="teacher-card">
        <img src="<?= htmlspecialchars($kelas['wali_kelas']['foto'], ENT_QUOTES, 'UTF-8') ?>"
             alt="Foto wali kelas XII RPL 1">
        <div>
            <h3><?= htmlspecialchars($kelas['wali_kelas']['nama'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="teacher-card__role"><?= htmlspecialchars($kelas['wali_kelas']['peran'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><?= htmlspecialchars($kelas['wali_kelas']['keterangan'], ENT_QUOTES, 'UTF-8') ?></p>
        </div>
    </article>
</section>

<section class="section">
    <div class="section-head">
        <p class="eyebrow">Kelola kelas</p>
        <h2>Pengurus kelas</h2>
    </div>

    <ul class="pengurus-grid">
        <?php foreach ($kelas['pengurus'] as $pengurus): ?>
            <?php
            $dataSiswa = function_exists('rpl_find_siswa') ? rpl_find_siswa($pengurus['nama'], $siswa) : null;
            $nama = $dataSiswa['nama'] ?? $pengurus['nama'];
            $jabatan = $pengurus['jabatan'] ?? ($dataSiswa['jabatan'] ?? 'Pengurus');
            $foto = $dataSiswa['foto'] ?? '';
            ?>
            <li>
                <article class="person-card">
                    <?php if (!empty($foto) && file_exists(__DIR__ . '/' . $foto)): ?>
                        <img class="person-card__avatar person-card__avatar--photo"
                             src="<?= htmlspecialchars($foto, ENT_QUOTES, 'UTF-8') ?>"
                             alt="Foto <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>">
                    <?php else: ?>
                        <span class="person-card__avatar" aria-hidden="true">
                            <?= htmlspecialchars(rpl_initials($nama), ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    <?php endif; ?>
                    <div>
                        <h3><?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></h3>
                        <p><?= htmlspecialchars($jabatan, ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<section class="section">
    <div class="section-head">
        <p class="eyebrow">Perjalanan</p>
        <h2>Jejak kelas</h2>
    </div>

    <ol class="timeline">
        <?php foreach ($kelas['perjalanan'] as $langkah): ?>
            <li class="timeline__item">
                <span class="timeline__year"><?= htmlspecialchars($langkah['tahun'], ENT_QUOTES, 'UTF-8') ?></span>
                <div>
                    <h3><?= htmlspecialchars($langkah['judul'], ENT_QUOTES, 'UTF-8') ?></h3>
                    <p><?= htmlspecialchars($langkah['deskripsi'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </li>
        <?php endforeach; ?>
    </ol>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
