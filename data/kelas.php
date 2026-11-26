<?php
/**
 * Data kelas dan konten dummy untuk versi awal.
 * Foto masih memakai placeholder SVG lokal.
 */

return [
    'nama'       => 'XII RPL 1',
    'sekolah'    => 'SMK Negeri 1',
    'angkatan'   => '2024',
    'hero_foto'  => 'assets/images/hero/hero-placeholder.svg',
    'deskripsi'  => 'Kelas XII RPL 1 yang tumbuh bersama melalui kegiatan belajar, proyek, dan dokumentasi kelas.',

    'wali_kelas' => [
        'nama'       => 'Nama Wali Kelas',
        'peran'      => 'Wali Kelas',
        'foto'       => 'assets/images/guru/wali-kelas-placeholder.svg',
        'keterangan' => 'Pendamping kelas dalam proses belajar, kegiatan, dan perkembangan siswa.',
    ],

    'statistik'  => [
        'siswa'    => 26,
        'guru'     => 1,
        'kegiatan' => 8,
    ],

    'pengurus'   => [
        ['nama' => 'Andi Pratama',   'jabatan' => 'Ketua Kelas'],
        ['nama' => 'Bima Saputra',   'jabatan' => 'Wakil Ketua'],
        ['nama' => 'Citra Maharani', 'jabatan' => 'Sekretaris'],
        ['nama' => 'Dimas Ramadhan', 'jabatan' => 'Bendahara'],
    ],

    'perjalanan' => [
        [
            'tahun'      => '2024',
            'judul'      => 'Awal Mula',
            'deskripsi'  => 'Kelas dibentuk dan mulai membangun kebiasaan belajar bersama.',
        ],
        [
            'tahun'      => '2025',
            'judul'      => 'Membangun Ritme',
            'deskripsi'  => 'Berbagai kegiatan kelas dan proyek kecil mulai dijalankan.',
        ],
        [
            'tahun'      => '2026',
            'judul'      => 'Kelas XII',
            'deskripsi'  => 'Fokus pada proyek akhir, dokumentasi, dan kenangan bersama.',
        ],
    ],

    'galeri'     => [
        ['kategori' => 'Kegiatan Kelas', 'judul' => 'Diskusi Kelas',     'foto' => 'assets/images/galeri/placeholder-1.svg'],
        ['kategori' => 'Kegiatan Kelas', 'judul' => 'Presentasi Bareng', 'foto' => 'assets/images/galeri/placeholder-2.svg'],
        ['kategori' => 'Proyek',         'judul' => 'Pengerjaan Proyek', 'foto' => 'assets/images/galeri/placeholder-3.svg'],
        ['kategori' => 'Proyek',         'judul' => 'Uji Coba Aplikasi', 'foto' => 'assets/images/galeri/placeholder-4.svg'],
        ['kategori' => 'Foto Bersama',   'judul' => 'Foto Kelas',        'foto' => 'assets/images/galeri/placeholder-5.svg'],
        ['kategori' => 'Foto Bersama',   'judul' => 'Hari Biasa',        'foto' => 'assets/images/galeri/placeholder-6.svg'],
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
