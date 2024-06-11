<?php
session_start();
require_once('../../database/koneksi.php');

if (!isset($_SESSION['admin_id']) && isset($_GET['admin_id'])) {
    $_SESSION['admin_id'] = intval($_GET['admin_id']);
}

$adminId = $_SESSION['admin_id'];


$order_id = $_GET['id'];
$query = "DELETE FROM order_cust WHERE id_order=$order_id";

if (mysqli_query($connection, $query)) {
    header('Location: adminorderlist.php?id=' . $adminId);
    exit;

} else {
    echo "Error: " . $query . "<br>" . $connection->error;
}


?>
