<?php
session_start();
require_once('../../database/koneksi.php');

// Ambil ID admin dari URL atau sesi
$adminId = isset($_GET['admin_id']) ? intval($_GET['admin_id']) : 0;

// Ambil ID pelanggan dari URL
$customer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Pastikan ID pelanggan dan ID admin valid
if ($customer_id <= 0 || $adminId <= 0) {
    echo "<script>alert('Invalid customer or admin ID.'); window.location.href = '../admin/index.html';</script>";
    exit;
}

// Hapus pelanggan dari basis data
$query = "DELETE FROM custommer WHERE id=$customer_id";

if (mysqli_query($connection, $query)) {
    // Redirect to after successful deletion
    header('Location: admincustlist.php?id=' . $adminId);
    exit;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
?>
