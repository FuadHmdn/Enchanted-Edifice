<?php
require_once('../koneksi.php');

// Ambil data dari POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = isset($_POST['id_produk']) ? mysqli_real_escape_string($connection, $_POST['id_produk']) : '';
    $nama_paket = isset($_POST['nama_paket']) ? mysqli_real_escape_string($connection, $_POST['nama_paket']) : '';
    $deskripsi = isset($_POST['deskripsi']) ? mysqli_real_escape_string($connection, $_POST['deskripsi']) : '';
    $fasilitas_paket = isset($_POST['fasilitas_paket']) ? mysqli_real_escape_string($connection, $_POST['fasilitas_paket']) : '';
    $harga_paket = isset($_POST['harga_paket']) ? mysqli_real_escape_string($connection, $_POST['harga_paket']) : '';
    $id_penyedia = isset($_POST['id_penyedia_gedung']) ? mysqli_real_escape_string($connection, $_POST['id_penyedia_gedung']) : '';

    // Validasi id_produk
    if (!is_numeric($id_produk)) {
        die("ID produk tidak valid.");
    }

    // Query untuk menambahkan paket ke dalam tabel paket
    $insert_query = "INSERT INTO paket (nama_paket, deskripsi, fasilitas_paket, harga_paket, id_produk)
                    VALUES ('$nama_paket', '$deskripsi', '$fasilitas_paket', '$harga_paket', '$id_produk')";

    if (mysqli_query($connection, $insert_query)) {
        echo "<script>alert('Paket berhasil ditambahkan'); window.location.href = '../../penyediaGedung/offer/index5.php?id=$id_penyedia&id_produk=$id_produk';</script>";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
} else {
    die("Metode request tidak valid.");
}
?>
