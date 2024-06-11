<?php

require_once('../koneksi.php');

// Debugging: Periksa koneksi database
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id_penyedia_gedung = isset($_GET['id']) ? $_GET['id'] : '';
    $filter_admin = isset($_GET['admin']) ? $_GET['admin'] : '';
    $filter_category = isset($_GET['category']) ? $_GET['category'] : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

    $sql = "
        SELECT 
            salary.id_salary,
            admin.username AS nama_admin,
            salary.id_penyedia_gedung,
            salary.bukti_transfer,
            salary.nominal,
            produk.judul AS nama_gedung,
            order_cust.kategori AS kategori
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

    if (!empty($filter_admin)) {
        $sql .= " AND admin.username = ?";
    }

    if (!empty($filter_category)) {
        $sql .= " AND order_cust.kategori = ?";
    }

    if ($sort === 'asc') {
        $sql .= " ORDER BY salary.nominal ASC";
    } elseif ($sort === 'desc') {
        $sql .= " ORDER BY salary.nominal DESC";
    }

    // Prepare the statement
    $stmt = $connection->prepare($sql);

    // Bind parameters based on filters
    if (!empty($filter_admin) && !empty($filter_category)) {
        $stmt->bind_param('iss', $id_penyedia_gedung, $filter_admin, $filter_category);
    } elseif (!empty($filter_admin)) {
        $stmt->bind_param('is', $id_penyedia_gedung, $filter_admin);
    } elseif (!empty($filter_category)) {
        $stmt->bind_param('is', $id_penyedia_gedung, $filter_category);
    } else {
        $stmt->bind_param('i', $id_penyedia_gedung);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $salaries = [];
    while ($row = $result->fetch_assoc()) {
        $salaries[] = $row;
    }

    echo json_encode($salaries);

    // Tutup statement setelah digunakan
    $stmt->close();
}

// Tutup koneksi setelah digunakan
$connection->close();
?>
