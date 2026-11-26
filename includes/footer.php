<?php
if (!isset($kelas)) {
    $kelas = require __DIR__ . '/../data/kelas.php';
}

$pembuat = $kelas['pembuat'] ?? [
    'nama' => 'Nama Pembuat',
    'peran' => 'Peran',
    'foto' => '',
];

$footerLinks = [
    'index.php'   => 'Beranda',
    'tentang.php' => 'Tentang',
    'anggota.php' => 'Anggota',
    'galeri.php'  => 'Galeri',
];

$initials = '';
foreach (explode(' ', trim($pembuat['nama'])) as $bagian) {
    if ($bagian !== '') {
        $initials .= strtoupper(substr($bagian, 0, 1));
    }
}
$initials = substr($initials, 0, 2);
?>
</main>

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-copyright">
            <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($kelas['nama'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><?= htmlspecialchars($kelas['sekolah'], ENT_QUOTES, 'UTF-8') ?></p>
        </div>

        <nav class="footer-column" aria-label="Navigasi footer">
            <h2 class="footer-heading">Link</h2>
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
            <h2 class="footer-heading">Created by</h2>
            <div class="creator">
                <div class="creator-avatar" aria-hidden="true">
                    <?= htmlspecialchars($initials, ENT_QUOTES, 'UTF-8') ?>
                </div>
                <div>
                    <p class="creator-name"><?= htmlspecialchars($pembuat['nama'], ENT_QUOTES, 'UTF-8') ?></p>
                    <p class="creator-role"><?= htmlspecialchars($pembuat['peran'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>
