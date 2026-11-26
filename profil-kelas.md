# Website Profil Kelas --- XII RPL 1

## Ringkasan Proyek

Website profil kelas untuk memperkenalkan kelas XII RPL 1 melalui
informasi kelas, profil siswa, dan dokumentasi foto kegiatan.

-   **Teknologi:** PHP native (tanpa framework), HTML, CSS, dan
    JavaScript
-   **Database:** Belum diperlukan untuk versi awal
-   **Desain:** Terang bersih --- putih/soft blue dengan primary biru
    academic (`#2563EB`) dan aksen amber (`#F59E0B`)
-   **Konten awal:** Foto contoh dan data contoh
-   **Halaman:** Beranda, Tentang, Anggota, Galeri
-   **Kenangan Kita:** Tidak termasuk untuk saat ini

## Struktur Folder

``` text
profil-kelas/
├── index.php
├── tentang.php
├── anggota.php
├── galeri.php
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
│   └── images/
│       ├── hero/
│       ├── siswa/
│       ├── guru/
│       └── galeri/
├── includes/
│   ├── header.php
│   └── footer.php
└── data/
    ├── kelas.php
    └── siswa.php
```

## Isi Halaman

### Beranda (`index.php`)

-   Hero dengan foto utama, nama kelas, angkatan, dan pengantar singkat
-   Ringkasan statistik kelas
-   Beberapa foto pilihan
-   Tautan menuju halaman Tentang, Anggota, dan Galeri

### Tentang (`tentang.php`)

-   Cerita dan deskripsi kelas
-   Informasi wali kelas
-   Pengurus kelas
-   Informasi atau perjalanan kelas

### Anggota (`anggota.php`)

-   Daftar siswa dalam kartu foto
-   Nama dan informasi singkat siswa
-   Pencarian anggota jika diperlukan

### Galeri (`galeri.php`)

-   Foto kegiatan dalam susunan album atau grid
-   Kategori foto berdasarkan kegiatan
-   Foto dapat dibuka dalam tampilan lebih besar

## Pengelolaan Konten

Untuk versi awal, data kelas dan siswa disimpan sebagai array PHP di
folder `data/`. Foto disimpan sebagai berkas di folder `assets/images/`.

Header dan footer dibuat sebagai komponen bersama di folder `includes/`,
lalu dipanggil dengan `include` atau `require` pada setiap halaman agar
navigasi dan tampilan tetap konsisten.

## Alasan Belum Menggunakan Database

Konten awal relatif tetap dan dapat diperbarui langsung melalui berkas
PHP serta foto. MySQL dapat ditambahkan kemudian jika diperlukan panel
admin, pengelolaan album melalui website, unggah foto, atau fitur akun.

## Catatan

-   Ganti foto contoh dengan foto asli beresolusi baik sebelum website
    dipublikasikan.
-   Pastikan ada izin untuk memublikasikan foto dan informasi siswa
    maupun guru.
-   Gunakan layout responsif agar nyaman diakses dari ponsel dan
    desktop.
