<?php
/**
 * Router khusus untuk PHP Built-in Server (php -S localhost:8000 router.php).
 * Membantu server lokal menangani URL tanpa ekstensi .php persis seperti .htaccess di hosting.
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$path = __DIR__ . $uri;

// 1. Jika request mengakses aset statis nyata (css, js, gambar, svg, dll.), sajikan langsung oleh PHP
if ($uri !== '/' && file_exists($path) && !is_dir($path)) {
    return false;
}

// 2. Jika request cocok dengan file .php (misal /tentang -> tentang.php)
if ($uri !== '/' && file_exists($path . '.php')) {
    require $path . '.php';
    exit;
}

// 3. Jika request root (/) atau /index
if ($uri === '/' || $uri === '/index') {
    require __DIR__ . '/index.php';
    exit;
}

// 4. Default fallback: jika file tidak ditemukan
http_response_code(404);
echo "404 Not Found";
exit;
