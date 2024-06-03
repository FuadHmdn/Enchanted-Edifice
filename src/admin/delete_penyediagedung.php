<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM penyedia_gedung";
$result = $connection->query($sql);

// Periksa apakah permintaan POST ada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id']; // ID item yang akan dihapus

    // Query untuk menghapus data dari database
    $sql = "DELETE FROM nama_tabel WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman lain atau tampilkan pesan sukses
        header("Location: success.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
