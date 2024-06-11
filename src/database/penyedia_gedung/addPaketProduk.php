<?php
require_once('../koneksi.php');

// Query untuk mengambil id_produk terbaru dari tabel produk
$query = "SELECT id_produk FROM produk ORDER BY id_produk DESC LIMIT 1";
$result = mysqli_query($connection, $query);

if ($result) {
    // Ambil baris hasil dari query
    $row = mysqli_fetch_assoc($result);
    $id_produk = $row['id_produk'];

    // Lakukan sanitasi atau validasi data jika diperlukan
    // Contoh: mysqli_real_escape_string untuk mencegah SQL injection
    $id_produk = mysqli_real_escape_string($connection, $id_produk);

    // Ambil data dari POST
    $nama_paket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $fasilitas_paket = $_POST['fasilitas_paket'];
    $harga_paket = $_POST['harga_paket'];
    $id_penyedia = $_POST['id_penyedia_gedung'];

    // Query untuk menambahkan paket ke dalam tabel paket
    $insert_query = "INSERT INTO paket (nama_paket, deskripsi, fasilitas_paket, harga_paket, id_produk)
                    VALUES ('$nama_paket', '$deskripsi', '$fasilitas_paket', '$harga_paket', '$id_produk')";

    if (mysqli_query($connection, $insert_query)) {
        echo "<script>alert('Paket berhasil di tambahkan'); window.location.href = '../../penyediaGedung/offer/index5.php?id=$id_penyedia';</script>";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($connection);
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
