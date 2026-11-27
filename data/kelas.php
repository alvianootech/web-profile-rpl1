<?php
/**
 * Data kelas dan konten contoh untuk versi awal.
 * Foto memakai berkas contoh lokal.
 */

return [
    'nama'       => 'XII RPL 1',
    'sekolah'    => 'SMK Negeri 1 Pacitan',
    'angkatan'   => '2024',
    'hero_foto'  => 'assets/images/hero/contoh-foto-hero.jpg',
    'deskripsi'  => '26 siswa angkatan 2024 di SMK Negeri 1 Pacitan, dengan satu wali kelas dan empat pengurus.',
    'hero_lead'  => 'Halo, kami XII RPL 1 dari SMK Negeri 1 Pacitan. Mampir sebentar, kenalan sama kami, dan lihat kegiatan kelas di sini.',

    'wali_kelas' => [
        'nama'       => 'Nama Wali Kelas',
        'peran'      => 'Wali Kelas',
        'foto'       => 'assets/images/guru/contoh-foto-guru.jpg',
        'keterangan' => 'Mendampingi 26 siswa XII RPL 1 di SMK Negeri 1 Pacitan.',
    ],

    'statistik'  => [
        'siswa'    => 26,
        'guru'     => 1,
        'kegiatan' => 8,
    ],

    'pengurus'   => [
        ['nama' => 'KHAISAN RAIHAN SAPUTRA',     'jabatan' => 'Ketua Kelas'],
        ['nama' => 'ADHE I GEDHE MADAREZA',      'jabatan' => 'Wakil Ketua'],
        ['nama' => 'INES ARDYNINGRUM',           'jabatan' => 'Sekretaris 1'],
        ['nama' => 'RESIKA DIAN PRANGIRA',       'jabatan' => 'Sekretaris 2'],
        ['nama' => 'ANGGRAENI LYLA NUREFFENDI',  'jabatan' => 'Bendahara 1'],
    ],

    'sosmed'     => [
        'instagram' => [
            'label'  => 'Instagram',
            'handle' => '@r1volution24._',
            'url'    => 'https://www.instagram.com/r1volution24._',
        ],
        'tiktok'    => [
            'label'  => 'TikTok',
            'handle' => '@r1volution24_',
            'url'    => 'https://www.tiktok.com/@r1volution24_',
        ],
    ],

    'perjalanan' => [
        [
            'tahun'      => '2024',
            'judul'      => 'Awal Mula',
            'deskripsi'  => 'Kelas XII RPL 1 dibentuk di SMK Negeri 1 Pacitan.',
        ],
        [
            'tahun'      => '2025',
            'judul'      => 'Membangun Ritme',
            'deskripsi'  => 'Susunan pengurus: ketua, wakil ketua, sekretaris, dan bendahara.',
        ],
        [
            'tahun'      => '2026',
            'judul'      => 'Kelas XII',
            'deskripsi'  => 'Galeri kelas berisi enam foto kegiatan.',
        ],
    ],

    'galeri'     => [
        ['kategori' => 'Kegiatan Kelas', 'judul' => 'Diskusi Kelas',     'foto' => 'assets/images/galeri/contoh-foto-galeri-1.jpg'],
        ['kategori' => 'Kegiatan Kelas', 'judul' => 'Presentasi Bareng', 'foto' => 'assets/images/galeri/contoh-foto-galeri-1.jpg'],
        ['kategori' => 'Proyek',         'judul' => 'Pengerjaan Proyek', 'foto' => 'assets/images/galeri/contoh-foto-galeri-1.jpg'],
        ['kategori' => 'Proyek',         'judul' => 'Uji Coba Aplikasi', 'foto' => 'assets/images/galeri/contoh-foto-galeri-1.jpg'],
        ['kategori' => 'Foto Bersama',   'judul' => 'Foto Kelas',        'foto' => 'assets/images/galeri/contoh-foto-galeri-1.jpg'],
        ['kategori' => 'Foto Bersama',   'judul' => 'Hari Biasa',        'foto' => 'assets/images/galeri/contoh-foto-galeri-1.jpg'],
    ],

    'pembuat'    => [
        [
            'nama'  => 'ALVIANO IBNU IBRAHIM',
            'peran' => 'Pengembang 1',
            'foto'  => '',
        ],
        [
            'nama'  => 'HIZAM AHMAD AL GHIFARI',
            'peran' => 'Pengembang 2',
            'foto'  => '',
        ],
        [
            'nama'  => 'KHAISAN RAIHAN SAPUTRA',
            'peran' => 'Pengembang 3',
            'foto'  => '',
        ],
        [
            'nama'  => 'RIZKY SUMARSONO',
            'peran' => 'Pengembang 4',
            'foto'  => '',
        ],
    ],
];
