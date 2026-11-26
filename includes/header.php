<?php
/**
 * Komponen header bersama.
 * Halaman pemanggil sebaiknya menetapkan $pageTitle dan $activePage.
 */

if (!function_exists('rpl_initials')) {
    function rpl_initials(string $nama): string
    {
        $initials = '';
        foreach (explode(' ', trim($nama)) as $bagian) {
            if ($bagian !== '') {
                $initials .= strtoupper(substr($bagian, 0, 1));
            }
        }
        return substr($initials, 0, 2);
    }
}

if (!isset($pageTitle)) {
    $pageTitle = 'XII RPL 1';
}

if (!isset($activePage)) {
    $activePage = basename($_SERVER['PHP_SELF'] ?? 'index.php', '.php');
}

$navItems = [
    'index'   => ['label' => 'Beranda', 'href' => 'index.php'],
    'tentang' => ['label' => 'Tentang', 'href' => 'tentang.php'],
    'anggota' => ['label' => 'Anggota', 'href' => 'anggota.php'],
    'galeri'  => ['label' => 'Galeri',  'href' => 'galeri.php'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<a class="skip-link" href="#konten">Lewati ke konten</a>

<header class="site-header">
    <nav class="nav" aria-label="Navigasi utama">
        <a class="brand" href="index.php">
            <img class="brand__logo" src="assets/images/Logo-Kelas-RPL-1.jpg" alt="Logo XII RPL 1">
            <span class="brand__label">
                XII RPL 1
                <span>SMK Negeri 1</span>
            </span>
        </a>

        <button class="nav-toggle" type="button" aria-controls="nav-menu"
                aria-expanded="false" aria-label="Buka menu">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-menu" id="nav-menu">
            <?php foreach ($navItems as $key => $item): ?>
                <li>
                    <a href="<?= htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8') ?>"
                       <?= $activePage === $key ? 'class="is-active" aria-current="page"' : '' ?>>
                        <?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

<main id="konten">
