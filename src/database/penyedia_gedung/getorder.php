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

    $sql = "SELECT o.id_order, c.username, o.tanggal_keluar, o.tanggal_masuk, pr.judul AS nama_gedung, o.kategori, o.status_order
            FROM order_cust o
            JOIN custommer c ON o.id_custommer = c.id
            JOIN produk pr ON o.id_produk = pr.id_produk
            WHERE o.id_penyedia_gedung = ?";

    $params = [$id_penyedia_gedung];

    if (isset($_GET['date'])) {
        $sql .= " AND o.tanggal_keluar = ?";
        $params[] = $_GET['date'];
    }

    if (isset($_GET['date'])) {
        $sql .= " AND o.tanggal_masuk = ?";
        $params[] = $_GET['date'];
    }

    if (isset($_GET['category'])) {
        $sql .= " AND o.kategori = ?";
        $params[] = $_GET['category'];
    }

    if (isset($_GET['status'])) {
        $sql .= " AND o.status_order = ?";
        $params[] = $_GET['status'];
    }

    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }

    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    if ($stmt->execute() === false) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    $result = $stmt->get_result();
    if ($result === false) {
        die('Get result failed: ' . htmlspecialchars($stmt->error));
    }

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    echo json_encode($orders);

    $stmt->close();
    $connection->close();
}
?>