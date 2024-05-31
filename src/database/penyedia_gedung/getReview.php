<?php

require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_penyedia_gedung = isset($_GET['id_penyedia_gedung']) ? intval($_GET['id_penyedia_gedung']) : 0;

    if ($id_penyedia_gedung > 0) {
        $sql = "SELECT review.id, review.id_produk, review.rating, review.komentar 
                FROM review 
                JOIN produk ON review.id_produk = produk.id_produk
                LEFT JOIN response ON review.id = response.id_review 
                WHERE produk.id_penyedia_gedung = ? AND response.id_review IS NULL";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id_penyedia_gedung);
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
        echo json_encode(array('message' => 'Invalid id_penyedia_gedung'));
    }
} else {
    echo json_encode(array('message' => 'Invalid request method'));
}

$connection->close();

?>

