<?php

require_once ('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($connection, $_GET['id']);
        
        $sql = "SELECT produk.gambar, produk.judul, produk.harga, order_cust.tanggal_masuk, order_cust.tanggal_keluar, order_cust.id_order
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
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id_order'])) {
        $id_order = mysqli_real_escape_string($connection, $data['id_order']);

        $sql = "DELETE FROM order_cust WHERE id_order = '$id_order'";

        if (mysqli_query($connection, $sql)) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to delete the order', 'error' => mysqli_error($connection)));
        }
    } else {
        echo json_encode(array('success' => false, 'message' => 'No order ID provided'));
    }
}

mysqli_close($connection);

?>

