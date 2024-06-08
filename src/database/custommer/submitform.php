<?php
require_once('../koneksi.php'); // Pastikan path ini benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id_custommer = intval($_GET['id']); // Pastikan ini adalah integer

        $first_name = $connection->real_escape_string($_POST['FirstName']);
        $last_name = $connection->real_escape_string($_POST['LastName']);
        $email = $connection->real_escape_string($_POST['Email']);
        $subject = $connection->real_escape_string($_POST['Subject']);
        $message = $connection->real_escape_string($_POST['message']);

        $sql = "INSERT INTO customer_messages (id_custommer, first_name, last_name, email, subject, message)
                VALUES ('$id_custommer', '$first_name', '$last_name', '$email', '$subject', '$message')";

        if ($connection->query($sql) === TRUE) {
            echo "<script>
                    alert('Your message has been sent successfully!');
                    window.location.href = '../../user/contact/index.php?id=$id_custommer';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    } else {
        echo "Error: id not set or empty";
    }
}

$connection->close();
?>
