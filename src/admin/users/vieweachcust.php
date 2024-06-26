<?php
session_start();
require_once('../../database/koneksi.php');

// Ambil ID admin dari URL atau sesi
$adminId = isset($_GET['id']) ? intval($_GET['id']) : (isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : 0);


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
$customer_id = $_GET['id'];
$sql = "SELECT * FROM custommer WHERE id = $customer_id";
$result = $connection->query($sql);

$customer = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
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
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" value="<?php echo htmlspecialchars($customer['username']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" value="<?php echo htmlspecialchars($customer['email']); ?>" readonly>
            </div>
            <div class="buttons">
                <button class="delete" onclick="deleteCust(<?php echo $customer_id; ?>)">Delete Account</button>
            </div>
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
