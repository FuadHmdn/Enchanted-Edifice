<?php

require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id_produk'])) {
        $id = $_GET['id_produk'];

        // Menggunakan prepared statement untuk mencegah SQL Injection
        $stmt = $connection->prepare("SELECT * FROM `produk` WHERE id_produk = ?");
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $response = array();
            while ($row = $result->fetch_assoc()) {
                $response[] = $row;
            }
            echo json_encode($response);
        } else {
            echo json_encode(array('message' => 'No data found'));
        }

        $stmt->close();
    } else {
        echo json_encode(array('message' => 'Invalid request'));
    }
}

$connection->close();