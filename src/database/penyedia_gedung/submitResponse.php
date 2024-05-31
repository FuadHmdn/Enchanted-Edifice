<?php

require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_produk = isset($_GET['id_produk']) ? intval($_GET['id_produk']) : 0;

    if ($id_produk > 0) {
        $sql = "SELECT review.id, review.id_produk, review.rating, review.komentar 
                FROM review 
                LEFT JOIN response ON review.id = response.id_review 
                WHERE review.id_produk = ? AND response.id_review IS NULL";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id_produk);
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
        echo json_encode(array('message' => 'Invalid id_produk'));
    }
} else {
    echo json_encode(array('message' => 'Invalid request method'));
}

$connection->close();

?>
