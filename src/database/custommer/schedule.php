<?php

require_once ('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT produk.gambar, produk.judul, orders_customers.tanggal_masuk, orders_customers.tanggal_keluar FROM orders_customers JOIN produk ON orders_customers.id_produk = produk.id_produk WHERE orders_customers.status = 'schedule';";

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
}

mysqli_close($connection);

?>