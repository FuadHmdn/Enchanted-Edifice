<?php
require_once('../koneksi.php');

// Check if id_produk is set in the URL
if(isset($_GET['id_produk']) && !empty($_GET['id_produk'])) {
    // Retrieve id_produk from the URL
    $id_produk = $_GET['id_produk'];

    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM paket WHERE id_produk = ?");
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();

    $produkArray = array();

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $produkArray[] = $row;
        }
        echo json_encode($produkArray);
    } else {
        echo json_encode(array("error" => "Error: " . $stmt->error));
    }

    $stmt->close();
} else {
    echo json_encode(array("error" => "id_produk not provided in URL"));
}

mysqli_close($connection);
?>
