<?php

require_once ('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT produk.gambar, produk.judul, order_cust.tanggal_masuk, order_cust.tanggal_keluar 
            FROM order_cust 
            JOIN produk ON order_cust.id_produk = produk.id_produk 
            WHERE order_cust.status_payment = 'awaiting' AND order_cust.complete = 0;";

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
