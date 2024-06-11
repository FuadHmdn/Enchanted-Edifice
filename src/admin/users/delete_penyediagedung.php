<?php
session_start();
require_once('../../database/koneksi.php');

if (!isset($_SESSION['admin_id']) && isset($_GET['admin_id'])) {
    $_SESSION['admin_id'] = intval($_GET['admin_id']);
}
$adminId = $_SESSION['admin_id'];

$provider_id = $_GET['id'];

// Hapus terlebih dahulu entri terkait dari tabel provider_message
$query_provider_message = "DELETE FROM provider_message WHERE id_penyedia_gedung = $provider_id";
mysqli_query($connection, $query_provider_message);

// Hapus entri dari tabel penyedia_gedung setelah entri terkait sudah dihapus
$query_penyedia_gedung = "DELETE FROM penyedia_gedung WHERE id=$provider_id";
mysqli_query($connection, $query_penyedia_gedung);

// Periksa jika query berhasil dijalankan
if (mysqli_affected_rows($connection) > 0) {
    header('Location: adminpenyediagedung.php');
    exit;
} else {
    echo "Error: " . $query_penyedia_gedung . "<br>" . mysqli_error($connection);
}
?>
