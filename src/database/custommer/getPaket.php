<?php

require_once ('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id_produk'])) {
        $id_produk = $_GET['id_produk'];
        
        $sql = "SELECT * FROM `paket` WHERE id_produk = '$id_produk'";

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
        echo json_encode(array('message' => 'id_produk parameter is missing'));
    }
}

mysqli_close($connection);

?>
