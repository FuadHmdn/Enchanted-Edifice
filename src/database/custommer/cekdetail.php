<?php

require_once ('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id_produk'])) {
        $id_produk = mysqli_real_escape_string($connection, $_GET['id_produk']);
        
        $sql = "SELECT produk.gambar, produk.judul, produk.harga, produk.lokasi, order_cust.tanggal_masuk, order_cust.tanggal_keluar, order_cust.status_payment 
                FROM order_cust 
                JOIN produk ON order_cust.id_produk = produk.id_produk 
                WHERE order_cust.id_produk = '$id_produk';";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $response = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $response[] = $row;
            }
            echo json_encode($response);
        } else {
            echo json_encode(array('message' => 'No data found'));
        }
    } else {
        echo json_encode(array('message' => 'No ID provided'));
    }
}

mysqli_close($connection);

?>
