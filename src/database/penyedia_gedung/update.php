<?php
require_once ('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_produk = $_POST['id_produk'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $capacity = $_POST['capacity'];

    // Query update data
    $query = "UPDATE produk SET 
                judul = '$title', 
                harga = '$price', 
                deskripsi = '$description', 
                kategori = '$category', 
                kapasitas = '$capacity' 
              WHERE id_produk = '$id_produk'";

    if (mysqli_query($connection, $query)) {
        echo "<script>
                alert('Data berhasil diperbarui');
                window.location.href = '../../penyediaGedung/offer/index.php?id=$id_pelanggan';
              </script>";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>