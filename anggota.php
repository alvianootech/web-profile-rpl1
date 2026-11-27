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
        <p class="lead">Cari nama atau jabatan di kolom pencarian.</p>
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
                <article class="member-card"
                         tabindex="0"
                         role="button"
                         aria-haspopup="dialog"
                         aria-label="Lihat profil <?= htmlspecialchars($anggota['nama'], ENT_QUOTES, 'UTF-8') ?>"
                         data-detail="<?= htmlspecialchars(json_encode([
                             'nama'         => $anggota['nama'],
                             'jabatan'      => $anggota['jabatan'],
                             'tentang_saya' => $anggota['tentang_saya'] ?? $anggota['deskripsi_singkat'],
                             'foto'         => $anggota['foto'],
                             'initials'     => rpl_initials($anggota['nama']),
                             'sosmed'       => $anggota['sosmed'] ?? [],
                         ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP), ENT_QUOTES, 'UTF-8') ?>">
                    <div class="member-card__photo">
                        <img src="<?= htmlspecialchars($anggota['foto'], ENT_QUOTES, 'UTF-8') ?>"
                             alt="Foto <?= htmlspecialchars($anggota['nama'], ENT_QUOTES, 'UTF-8') ?>"
                             loading="lazy">
                        <span class="member-card__initials" aria-hidden="true">
                            <?= htmlspecialchars(rpl_initials($anggota['nama']), ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </div>
                    <div class="member-card__body">
                        <h2><?= htmlspecialchars($anggota['nama'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p class="member-card__role"><?= htmlspecialchars($anggota['jabatan'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="member-card__desc"><?= htmlspecialchars($anggota['deskripsi_singkat'], ENT_QUOTES, 'UTF-8') ?></p>
                        <span class="member-card__more">
                            Lihat selengkapnya
                            <svg class="icon icon--arrow" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M5 12h14M13 6l6 6-6 6"/>
                            </svg>
                        </span>
                    </div>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

    <p class="placeholder search-empty" id="search-empty" hidden>Tidak ada anggota yang cocok.</p>
</section>

<!-- Modal Dialog Detail Siswa -->
<dialog class="modal-siswa" id="modal-siswa" aria-labelledby="modal-siswa-nama">
    <div class="modal-siswa__backdrop-close" aria-hidden="true"></div>
    <div class="modal-siswa__dialog">
        <button type="button" class="modal-siswa__close" id="modal-siswa-close" aria-label="Tutup detail siswa">
            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <div class="modal-siswa__content">
            <!-- Sisi Kiri: Foto & Medsos -->
            <div class="modal-siswa__side">
                <div class="modal-siswa__photo-wrap">
                    <img id="modal-siswa-foto" src="" alt="" class="modal-siswa__photo">
                    <span id="modal-siswa-initials" class="modal-siswa__initials" aria-hidden="true"></span>
                </div>
                <div class="modal-siswa__socials-section">
                    <h3 class="modal-siswa__socials-title">Media Sosial</h3>
                    <div class="modal-siswa__socials" id="modal-siswa-sosmed">
                        <!-- Diisi via JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Nama, Jabatan & Tentang Saya -->
            <div class="modal-siswa__main">
                <div class="modal-siswa__header">
                    <span class="modal-siswa__role" id="modal-siswa-jabatan"></span>
                    <h2 class="modal-siswa__name" id="modal-siswa-nama"></h2>
                </div>

                <div class="modal-siswa__bio">
                    <h3 class="modal-siswa__bio-title">Tentang Saya</h3>
                    <p class="modal-siswa__bio-text" id="modal-siswa-tentang"></p>
                </div>
            </div>
        </div>
    </div>
</dialog>

<?php require __DIR__ . '/includes/footer.php'; ?>
