<?php
$koneksi = new mysqli('localhost', 'root', '', 'quicktix');
if ($koneksi->connect_error) {
    die('Koneksi gagal: ' . $koneksi->connect_error);
}
echo 'Koneksi berhasil!';
?>