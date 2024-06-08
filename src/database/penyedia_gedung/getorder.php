<?php

require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id_penyedia_gedung = isset($_GET['id']) ? $_GET['id'] : '';

    $sql = "SELECT o.id_order, c.name, o.tanggal_keluar, p.nama_gedung, o.kategori, o.status_order
            FROM order_cust o
            JOIN custommer c ON o.id_custommer = c.id_custommer
            JOIN penyedia_gedung p ON o.id_penyedia_gedung = p.id_penyedia_gedung
            WHERE o.id_penyedia_gedung = ?";

    $params = [$id_penyedia_gedung];

    if (isset($_GET['date'])) {
        $sql .= " AND o.tanggal_keluar = ?";
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

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    echo json_encode($orders);

    $stmt->close();
    $conn->close();
}
?>

