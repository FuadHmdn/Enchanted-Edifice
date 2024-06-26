<?php

require_once('../koneksi.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Ambil dan sanitasi id dari URL (sebagai id_penyedia_gedung)
    $id_penyedia_gedung = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id_penyedia_gedung > 0) {
        // Query untuk mendapatkan ulasan berdasarkan id_penyedia_gedung
        $sql = "SELECT review.*, custommer.username AS customer_name 
                FROM review 
                JOIN custommer ON review.id_custommer = custommer.id
                WHERE review.id_penyedia_gedung = ?";
        $stmt = $connection->prepare($sql);
        if (!$stmt) {
            echo json_encode(array('message' => 'Error in preparing statement: ' . $connection->error));
            exit;
        }
        $stmt->bind_param("i", $id_penyedia_gedung);
        if (!$stmt->execute()) {
            echo json_encode(array('message' => 'Error in executing statement: ' . $stmt->error));
            exit;
        }
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
