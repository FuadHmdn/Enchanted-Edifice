<?php

require_once('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_produk = $_POST['id_produk'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $tanggal_masuk = $_POST['checkinValue'];
    $tanggal_keluar = $_POST['checkoutValue'];
    $status = 'schedule';

    // Validasi data
    if (empty($id_produk) || empty($id_pelanggan) || empty($tanggal_masuk) || empty($tanggal_keluar) || empty($status)) {
        echo "<script>alert('Semua field harus diisi.'); window.location.href = '../../user/offers/index.php?id=$id_pelanggan';</script>";
        exit;
    }

    $target_dir = "../BuktiPembayaran/";
    $target_file = $target_dir . basename($_FILES["buktiPembayaran"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Memeriksa apakah file adalah gambar
    $check = getimagesize($_FILES["buktiPembayaran"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File bukan gambar.'); window.location.href = '../../user/offers/index.php?id=$id_pelanggan';</script>";
        $uploadOk = 0;
    }

    // Memeriksa ukuran file
    if ($_FILES["buktiPembayaran"]["size"] > 500000) {
        echo "<script>alert('Ukuran file terlalu besar.'); window.location.href = '../../user/offers/index.php?id=$id_pelanggan';</script>";
        $uploadOk = 0;
    }

    // Memeriksa format file
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.'); window.location.href = '../../user/offers/index.php?id=$id_pelanggan';</script>";
        $uploadOk = 0;
    }

    // Memeriksa apakah uploadOk bernilai 0 karena ada kesalahan
    if ($uploadOk == 0) {
        echo "<script>alert('File tidak dapat diupload.'); window.location.href = '../../user/offers/index.php?id=$id_pelanggan';</script>";
    } else {
        if (move_uploaded_file($_FILES["buktiPembayaran"]["tmp_name"], $target_file)) {
            // Memasukkan data ke tabel order_customer
            $sql = "INSERT INTO orders_customers (id_produk, id_custommer, tanggal_masuk, tanggal_keluar, status) 
                    VALUES ('$id_produk', '$id_pelanggan', '$tanggal_masuk', '$tanggal_keluar', '$status')";

            if (mysqli_query($connection, $sql)) {
                echo "<script>alert('Pesanan berhasil disimpan!'); window.location.href = '../../user/orders/index.php?id=$id_pelanggan';</script>";
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengupload file.'); window.location.href = '../../user/offers/index.php?id=$id_pelanggan';</script>";
        }
    }

    mysqli_close($connection);
}
