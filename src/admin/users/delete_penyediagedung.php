<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();

if (!isset($_SESSION['admin_id']) && isset($_GET['admin_id'])) {
    $_SESSION['admin_id'] = intval($_GET['admin_id']);
}
$adminId = $_SESSION['admin_id'];


$order_id = $_GET['id'];
$query = "DELETE FROM penyedia_gedung WHERE id=$order_id";

mysqli_query($connection, $query);
if ($connection->query($query) === TRUE) {
    header('Location: adminpenyediagedung.php');
    exit;
} else {
    echo "Error: " . $query . "<br>" . $connection->error;
}
?>
