<?php
if (!isset($kelas)) {
    $kelas = require __DIR__ . '/../data/kelas.php';
}
if (!isset($siswa)) {
    $siswa = require __DIR__ . '/../data/siswa.php';
}

$pembuat = $kelas['pembuat'] ?? [];

if (isset($pembuat['nama'])) {
    $pembuat = [$pembuat];
}

if (!is_array($pembuat) || $pembuat === []) {
    $pembuat = [
        ['nama' => 'Nama Pembuat 1', 'peran' => 'Pengembang 1', 'foto' => ''],
    ];
}

$footerLinks = [
    './'      => 'Beranda',
    'tentang' => 'Tentang',
    'anggota' => 'Anggota',
    'galeri'  => 'Galeri',
];
?>
</main>

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-copyright">
            <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($kelas['nama'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><?= htmlspecialchars($kelas['sekolah'], ENT_QUOTES, 'UTF-8') ?></p>

            <?php if (!empty($kelas['sosmed'])): ?>
                <div class="footer-socials">
                    <span class="footer-socials__title">Sosial Media</span>
                    <ul class="footer-socials__list" aria-label="Media sosial kelas">
                        <?php foreach ($kelas['sosmed'] as $platform => $info): ?>
                            <li>
                                <a class="footer-socials__link"
                                   href="<?= htmlspecialchars($info['url'], ENT_QUOTES, 'UTF-8') ?>"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="<?= htmlspecialchars($info['label'], ENT_QUOTES, 'UTF-8') ?> XII RPL 1">
                                    <?php if ($platform === 'instagram'): ?>
                                        <svg class="footer-socials__icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                                        </svg>
                                    <?php elseif ($platform === 'tiktok'): ?>
                                        <svg class="footer-socials__icon" viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true">
                                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.29 0 .58.04.86.12V9.42a6.34 6.34 0 0 0-.86-.06 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.34-6.34V8.41a8.27 8.27 0 0 0 4.77 1.72V6.69z"/>
                                        </svg>
                                    <?php endif; ?>
                                    <span><?= htmlspecialchars($info['handle'] ?? $info['label'], ENT_QUOTES, 'UTF-8') ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <nav class="footer-column" aria-label="Navigasi footer">
            <h2 class="footer-heading">Navigasi</h2>
            <ul class="footer-links">
                <?php foreach ($footerLinks as $href => $label): ?>
                    <li>
                        <a href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="footer-column footer-creator">
            <h2 class="footer-heading">Pembuat</h2>
            <div class="creator-list">
                <?php foreach ($pembuat as $orang): ?>
                    <?php
                    $dataSiswa = function_exists('rpl_find_siswa') ? rpl_find_siswa($orang['nama'] ?? '', $siswa) : null;
                    $nama      = $dataSiswa['nama'] ?? ($orang['nama'] ?? 'Nama Pembuat');
                    $foto      = $dataSiswa['foto'] ?? ($orang['foto'] ?? '');
                    $peran     = $orang['peran'] ?? 'Peran';
                    $avatar    = function_exists('rpl_initials') ? rpl_initials($nama) : substr($nama, 0, 2);
                    ?>
                    <div class="creator">
                        <?php if (!empty($foto) && file_exists(__DIR__ . '/../' . $foto)): ?>
                            <img class="creator-avatar creator-avatar--photo"
                                 src="<?= htmlspecialchars($foto, ENT_QUOTES, 'UTF-8') ?>"
                                 alt="Foto <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>">
                        <?php else: ?>
                            <div class="creator-avatar" aria-hidden="true">
                                <?= htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <p class="creator-name"><?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></p>
                            <p class="creator-role"><?= htmlspecialchars($peran, ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>
