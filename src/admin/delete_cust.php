<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$customer_id = $_GET['id'];
$query = "DELETE FROM custommer WHERE id=$customer_id";

mysqli_query($connection, $query);
if ($connection->query($query) === TRUE) {
    header('Location: adminpenyediagedung.php');
    exit;
} else {
    echo "Error: " . $query . "<br>" . $connection->error;
}
?>
