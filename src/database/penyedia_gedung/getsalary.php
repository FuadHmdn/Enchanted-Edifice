<?php

require_once('../koneksi.php');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_penyedia_gedung = isset($_GET['id']) ? $_GET['id'] : '';
    $admin = isset($_GET['admin']) ? $_GET['admin'] : '';
    $gedung = isset($_GET['gedung']) ? $_GET['gedung'] : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

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

    if (!empty($admin)) {
        $sql .= " AND admin.username = ?";
    }

    if (!empty($gedung)) {
        $sql .= " AND produk.judul = ?";
    }

    if ($sort === 'asc') {
        $sql .= " ORDER BY salary.nominal ASC";
    } elseif ($sort === 'desc') {
        $sql .= " ORDER BY salary.nominal DESC";
    }

    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($connection->error));
    }

    if (!empty($admin) && !empty($gedung)) {
        $stmt->bind_param("iss", $id_penyedia_gedung, $admin, $gedung);
    } elseif (!empty($admin)) {
        $stmt->bind_param("is", $id_penyedia_gedung, $admin);
    } elseif (!empty($gedung)) {
        $stmt->bind_param("is", $id_penyedia_gedung, $gedung);
    } else {
        $stmt->bind_param("i", $id_penyedia_gedung);
    }

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


