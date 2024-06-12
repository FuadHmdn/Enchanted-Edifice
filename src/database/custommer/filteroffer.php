<?php
require_once('../../database/koneksi.php');

// Ambil nilai parameter dari permintaan
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : '';

// Buat query untuk memfilter gedung berdasarkan kategori dan alamat
// Perlu diperhatikan apakah parameter kategori dan alamat sudah di-set atau tidak sebelum membangun query SQL
if (!empty($kategori) && !empty($alamat)) {
    $sql = "SELECT * FROM produk WHERE kategori='$kategori' AND alamat='$alamat'";
} elseif (!empty($kategori)) {
    $sql = "SELECT * FROM produk WHERE kategori='$kategori'";
} elseif (!empty($alamat)) {
    $sql = "SELECT * FROM produk WHERE alamat='$alamat'";
} else {
    // Jika tidak ada parameter yang diset, kembalikan semua produk
    $sql = "SELECT * FROM produk";
}

$result = $connection->query($sql);

$gedungList = array();

// Periksa apakah ada hasil dari query
if ($result->num_rows > 0) {
    // Jika ada, tambahkan setiap baris sebagai elemen dalam array gedungList
    while ($row = $result->fetch_assoc()) {
        $gedungList[] = $row;
    }
}

// Mengembalikan data gedung dalam format JSON
echo json_encode($gedungList);

$connection->close();
?>
