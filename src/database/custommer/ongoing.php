<?php

require_once ('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($connection, $_GET['id']);
        
        $sql = "SELECT produk.gambar, produk.judul, produk.harga, order_cust.tanggal_masuk, order_cust.tanggal_keluar 
                FROM order_cust 
                JOIN produk ON order_cust.id_produk = produk.id_produk 
                WHERE order_cust.status_payment = 'valid' AND order_cust.complete = 0 AND order_cust.id_custommer = '$id';";

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
