<?php

require_once('../koneksi.php');

// Debugging: Periksa koneksi database
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id_penyedia_gedung = isset($_GET['id']) ? $_GET['id'] : '';
    
    // Debugging: Tampilkan id_penyedia_gedung
    // echo "id_penyedia_gedung: " . $id_penyedia_gedung;

    $sql = "
        SELECT 
            salary.id_salary,
            admin.username AS nama_admin,
            salary.id_penyedia_gedung,
            salary.bukti_transfer,
            salary.nominal,
            produk.judul AS nama_gedung
        FROM 
            salary
        JOIN 
            admin ON salary.id_admin = admin.id
        JOIN 
            order_cust ON salary.id_order = order_cust.id_order
        JOIN
            produk ON order_cust.id_produk = produk.id_produk
        WHERE 
            salary.id_penyedia_gedung = ?
    ";

    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }

    $stmt->bind_param("i", $id_penyedia_gedung);
    if ($stmt->execute() === false) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    $result = $stmt->get_result();
    if ($result === false) {
        die('Get result failed: ' . htmlspecialchars($stmt->error));
    }

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

    $stmt->close();
    $connection->close();
}
?>



