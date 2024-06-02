<?php
require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil id_review, response, dan id_penyedia_gedung dari body POST
    $id_review = isset($_POST['id_review']) ? intval($_POST['id_review']) : 0;
    $response_text = isset($_POST['response']) ? trim($_POST['response']) : '';
    $id_penyedia_gedung = isset($_POST['id_penyedia_gedung']) ? intval($_POST['id_penyedia_gedung']) : 0;

    if ($id_review > 0 && !empty($response_text) && $id_penyedia_gedung > 0) {
        // Menyiapkan query untuk menyimpan respons ke dalam database
        $sql = "INSERT INTO response (id_review, response_text, id_penyedia_gedung) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("isi", $id_review, $response_text, $id_penyedia_gedung);
        
        // Menjalankan query dan memberikan respons sesuai dengan hasilnya
        if ($stmt->execute()) {
            echo json_encode(array('success' => true, 'message' => 'Response submitted successfully'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to submit response'));
        }

        $stmt->close();
    } else {
        echo json_encode(array('success' => false, 'message' => 'Invalid input data'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request method'));
}

$connection->close();
?>
