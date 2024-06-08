<?php
// Koneksi ke database
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = new mysqli(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Ambil data penyedia gedung berdasarkan ID
$order_id = $_GET['id'];
$sql = "SELECT * FROM penyedia_gedung WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update status legalitas
    $new_status = $_POST['legalitas_status'];
    $update_sql = "UPDATE penyedia_gedung SET legalitas_status = ? WHERE id = ?";
    $update_stmt = $connection->prepare($update_sql);
    $update_stmt->bind_param("si", $new_status, $order_id);
    if ($update_stmt->execute()) {
        echo "Record updated successfully";
        // Refresh the page to show updated status
        header("Refresh:0");
    } else {
        echo "Error updating record: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Details</title>
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
        .form-group input, .form-group select {
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
        .buttons .salary {
            background-color: #1595eb;
            color: white;
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
        .inline-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <a href="adminpenyediagedung.php" class="back-button">←</a>
    <div class="container">
        <div class="form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" value="<?php echo htmlspecialchars($order['username']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" value="<?php echo htmlspecialchars($order['email']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="legalitas">Legalitas</label>
                <a href="http://localhost/PemWeb/Enchanted-Edifice/src/login/user/res/doclegalitas/<?php echo htmlspecialchars($order['legalitas']); ?>" target="_blank"><?php echo htmlspecialchars($order['legalitas']); ?></a>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="legalitas_status">Status Legalitas</label>
                    <div class="inline-group">
                        <select id="legalitas_status" name="legalitas_status">
                            <option value="VALID" <?php echo $order['legalitas_status'] == 'VALID' ? 'selected' : ''; ?>>VALID</option>
                            <option value="INVALID" <?php echo $order['legalitas_status'] == 'INVALID' ? 'selected' : ''; ?>>INVALID</option>
                        </select>
                        <button type="submit" class="update">Update</button>
                    </div>
                </div>
            </form>
            <div class="buttons">
                <button onclick="viewSalary(event, <?php echo $row['id']; ?>)">View Salary</button>
                <button class="delete" onclick="deleteProvider(<?php echo $order_id; ?>)">Delete Account</button>
            </div>

        </div>
        <div class="profile-pic">
            <?php if(isset($order['photo']) && !empty($order['photo'])): ?>
                <img src="/PemWeb/Enchanted-Edifice/src/login/user/res/penyedia_gedung/<?php echo htmlspecialchars($order['photo']); ?>" alt="Profile Picture">
            <?php else: ?>
                <img src="/path/to/default-image.jpg" alt="Profile Picture">
            <?php endif; ?>
        </div>
    </div>
    <script>
        function deleteProvider(order_id) {
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete_penyediagedung.php?id=" + order_id;
            }
        }function viewSalary(event, id) {
            event.stopPropagation();
            window.location.href = 'vieweachsalary.php?id=' + id;
        }
    </script>
</body>
</html>
