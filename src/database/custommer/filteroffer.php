<?php
require_once('../../database/koneksi.php');

// Ambil nilai parameter dari permintaan
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : '';

// Buat query untuk memfilter produk berdasarkan kategori dan alamat
$sql = "SELECT * FROM produk WHERE kategori LIKE ? AND alamat LIKE ?";
$stmt = $connection->prepare($sql);
$kategori = "%" . $kategori . "%";
$alamat = "%" . $alamat . "%";
$stmt->bind_param('ss', $kategori, $alamat);
$stmt->execute();
$result = $stmt->get_result();

$hotels = [];
while ($row = $result->fetch_assoc()) {
    $hotels[] = $row;
}

header('Content-Type: application/json');
echo json_encode($hotels);

$stmt->close();
$connection->close();
?>
