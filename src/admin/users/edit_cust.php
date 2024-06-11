<?php
session_start();
require_once('../../database/koneksi.php');

// Ambil ID admin dari URL atau sesi
$adminId = isset($_GET['admin_id']) ? intval($_GET['admin_id']) : (isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : 0);

// Set sesi admin jika belum diatur
if (!isset($_SESSION['admin_id'])) {
    $_SESSION['admin_id'] = $adminId;
}

// Fetch admin username if not already set
if (!isset($_SESSION['admin_username'])) {
    $sql = "SELECT username FROM admin WHERE id = $adminId";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['admin_username'] = $row['username'];
    } else {
        echo "<script>alert('Admin not found.'); window.location.href = '../admin/index.html';</script>";
        exit;
    }
}

$admin_username = $_SESSION['admin_username'];

// Ambil data customer berdasarkan ID
$customer_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($customer_id > 0) {
    $sql = "SELECT * FROM custommer WHERE id = $customer_id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        echo "<script>alert('Customer not found.'); window.location.href = 'admincustlist.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Customer ID missing.'); window.location.href = 'admincustlist.php';</script>";
    exit;
}

// Handle form submission for editing customer data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $photo = $_FILES['photo'];

    // Check if photo is uploaded
    if ($photo['error'] == UPLOAD_ERR_OK) {
        $photoName = basename($photo['name']);
        $photoTmpName = $photo['tmp_name'];
        $photoPath = "C:/xampp/htdocs/PemWeb/Enchanted-Edifice/src/login/user/res/customer/" . $photoName;

        // Check if the directory exists, if not, create it
        if (!is_dir(dirname($photoPath))) {
            mkdir(dirname($photoPath), 0755, true);
        }

        // Move the uploaded file
        if (!move_uploaded_file($photoTmpName, $photoPath)) {
            echo "<script>alert('Error uploading photo.'); window.location.href = 'admincustlist.php';</script>";
            exit;
        }
    } else {
        $photoName = $customer['photo'];
    }

    // Hash the new password if provided
    if (!empty($newPassword)) {
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    } else {
        $hashedNewPassword = $customer['password']; // Retain the old password if no new password is provided
    }

    // Update customer in the database
    $sql = "UPDATE custommer SET username = '$username', email = '$email', password = '$hashedNewPassword', photo = '$photoName' WHERE id = $customer_id";
    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Customer updated successfully.'); window.location.href = 'admincustlist.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Tutup koneksi
mysqli_close($connection);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .profile-pic {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #eceff1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }
        .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .buttons .delete {
            background-color: #f44336;
            color: white;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="admincustlist.php" class="back-button">←</a>
    <div class="container">
        <div class="form">
            <form id="formEditCustomer" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="InputUsername">Username</label>
                    <input type="text" class="form-control" id="InputUsername" name="username" value="<?php echo htmlspecialchars($customer['username']); ?>">
                </div>
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="email" class="form-control" id="InputEmail" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>">
                </div>
                <div class="form-group">
                    <label for="InputNewPassword">New Password</label>
                    <input type="password" class="form-control" id="InputNewPassword" name="new_password">
                </div>
                <div class="form-group">
                    <label for="InputPhoto">Upload Photo</label>
                    <input type="file" class="form-control" id="InputPhoto" name="photo">
                    <div class="mt-2">
                        <img src="../../../../res/customer/<?php echo htmlspecialchars($customer['photo']); ?>" alt="Current Photo" style="width: 100px; height: auto;">
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="delete" onclick="deleteCust(<?php echo $customer_id; ?>)">Delete Account</button>
                </div>
            </form>
        </div>
        <div class="profile-pic">
            <?php if(isset($customer['photo']) && !empty($customer['photo'])): ?>
                <img src="/PemWeb/Enchanted-Edifice/src/login/user/res/customer/<?php echo htmlspecialchars($customer['photo']); ?>" alt="Profile Picture">
            <?php else: ?>
                <img src="/path/to/default-image.jpg" alt="Profile Picture">
            <?php endif; ?>
        </div>
    </div>
    <script>
        function deleteCust(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete_cust.php?id=" + userId + "&admin_id=<?php echo $adminId; ?>";
            }
        }
    </script>
</body>
</html>
