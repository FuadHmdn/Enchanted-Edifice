<?php
require_once('../koneksi.php');

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_produk = $_POST['id_produk'];
    $message = $_POST['message'];
    $rating = $_POST['rating'];
    
    // Cek apakah id_produk ada di tabel produk
    $stmt = $connection->prepare("SELECT id_produk FROM produk WHERE id_produk = ?");
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // id_produk ditemukan, lanjutkan dengan insert ke review
        $stmt->close();

        $stmt = $connection->prepare("INSERT INTO review (id_produk, rating, komentar) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $id_produk, $rating, $message);

        // Eksekusi prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Review Telah Ditambahkan!'); window.location.href = '../../user/orders/tambah_ulasan/index.php?id_produk=$id_produk';</script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Tutup prepared statement
        $stmt->close();
    } else {
        // id_produk tidak ditemukan
        echo "<script>alert('Produk tidak ditemukan!'); window.history.back();</script>";
    }

    // Tutup koneksi
    $connection->close();
}
?>
