<?php

require_once ('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET['id_custommer'])) {
        $id_custommer = intval($_GET['id_custommer']); // Make sure it's an integer
        $first_name = $conn->real_escape_string($_POST['FirstName']);
        $last_name = $conn->real_escape_string($_POST['LastName']);
        $email = $conn->real_escape_string($_POST['Email']);
        $subject = $conn->real_escape_string($_POST['Subject']);
        $message = $conn->real_escape_string($_POST['message']);

        $sql = "INSERT INTO customer_messages (id_custommer, first_name, last_name, email, subject, message)
                VALUES ('$id_custommer', '$first_name', '$last_name', '$email', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: id_custommer not set";
    }
}

$conn->close();
?>