<?php

require_once ('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_produk = $_POST['id_produk'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $status = $_POST['status'];

    // Validasi data
    if (empty($id_produk) || empty($id_pelanggan) || empty($tanggal_masuk) || empty($tanggal_keluar) || empty($status)) {
        echo "<script>alert('Semua field harus diisi.'); window.location.href = '../../order_customer/form.html';</script>";
        exit;
    }

    $sql = "INSERT INTO order_customer (id_produk, id_pelanggan, tanggal_masuk, tanggal_keluar, status) 
            VALUES ('$id_produk', '$id_pelanggan', '$tanggal_masuk', '$tanggal_keluar', '$status')";

    if (mysqli_query($connection, $sql)) {
        echo "<script>alert('Pesanan berhasil disimpan!'); window.location.href = '../../order_customer/form.html';</script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
