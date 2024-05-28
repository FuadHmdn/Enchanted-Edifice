<?php
require_once ('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id_produk'])) {
    $id_produk = mysqli_real_escape_string($connection, $_GET['id_produk']); // Melakukan pengamanan terhadap input
    $sql = "DELETE FROM `produk` WHERE id_produk = '$id_produk'";

    if (mysqli_query($connection, $sql)) {
        echo "Berhasil";
        http_response_code(204); // No Content response for successful deletion
    } else {
        http_response_code(500); // Server Error response for failed deletion
    }
}

mysqli_close($connection);
?>
