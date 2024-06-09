<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$order_id = $_GET['id'];
$query = "DELETE FROM order_cust WHERE id_order=$order_id";

if (mysqli_query($connection, $query)) {
    header('Location: adminorderlist.php');
    exit;
} else {
    echo "Error: " . $query . "<br>" . $connection->error;
}
?>
