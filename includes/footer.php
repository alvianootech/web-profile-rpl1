<?php
if (!isset($kelas)) {
    $kelas = require __DIR__ . '/../data/kelas.php';
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
    'index.php'   => 'Beranda',
    'tentang.php' => 'Tentang',
    'anggota.php' => 'Anggota',
    'galeri.php'  => 'Galeri',
];
?>
</main>

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-copyright">
            <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($kelas['nama'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><?= htmlspecialchars($kelas['sekolah'], ENT_QUOTES, 'UTF-8') ?></p>
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
                    $nama = $orang['nama'] ?? 'Nama Pembuat';
                    $avatar = function_exists('rpl_initials') ? rpl_initials($nama) : substr($nama, 0, 2);
                    if (preg_match('/\b(\d+)$/', $nama, $cocok)) {
                        $avatar = strtoupper(substr($nama, 0, 1)) . $cocok[1];
                    }
                    ?>
                    <div class="creator">
                        <div class="creator-avatar" aria-hidden="true">
                            <?= htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                        <div>
                            <p class="creator-name"><?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?></p>
                            <p class="creator-role"><?= htmlspecialchars($orang['peran'] ?? 'Peran', ENT_QUOTES, 'UTF-8') ?></p>
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
