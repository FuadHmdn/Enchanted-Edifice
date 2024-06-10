<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $provider_id = $_POST['provider_id'];
    $message = $_POST['message']; 

    if (!empty($provider_id) && !empty($message)) {
        
        $provider_id = mysqli_real_escape_string($connection, $provider_id);
        $message = mysqli_real_escape_string($connection, $message);

        
        $sql = "INSERT INTO messages (provider_id, message) VALUES ('$provider_id', '$message')";
        if ($connection->query($sql) === TRUE) {
            echo "<script>alert('Message Sent!')</script>";
            

            header('Location: adminpenyediagedung.php'); 
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}

$connection->close();
?>
