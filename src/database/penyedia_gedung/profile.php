<?php

require_once ('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $id_produk = $_POST['id_produk'];
    $sql = "SELECT * FROM `penyedia_gedung` WHERE id = $id_penyedia_gedung";

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