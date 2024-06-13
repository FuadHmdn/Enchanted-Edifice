<?php
require_once('../koneksi.php');

// Check if id is provided
if (isset($_POST['id']) && !empty($_POST['id'])) {
    // Get the id from POST data
    $id = $_POST['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $connection->prepare("DELETE FROM paket WHERE id_paket = ?");
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(array("success" => true, "message" => "Item deleted successfully"));
    } else {
        echo json_encode(array("success" => false, "message" => "Error: " . $stmt->error));
    }

    $stmt->close();
} else {
    echo json_encode(array("success" => false, "message" => "ID not provided"));
}

mysqli_close($connection);
?>
