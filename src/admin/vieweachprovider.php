<?php
// Koneksi ke database
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Ambil data penyedia gedung berdasarkan ID
$order_id = $_GET['id'];
$sql = "SELECT * FROM penyedia_gedung WHERE id = $order_id";
$result = $connection->query($sql);

$order = $result->fetch_assoc();
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
        .buttons .message {
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
                <?php 
                $legalitas_path = "C:\xampp\htdocs\PemWeb\Enchanted-Edifice\src\penyediaGedung\doclegalitas" . htmlspecialchars($order['legalitas']);
                if (file_exists($legalitas_path)) {
                    echo '<a href="' . $legalitas_path . '" target="_blank">Download Legalitas</a>';
                } else {
                    echo 'File not found';
                }
                ?>
            </div>
            <div class="buttons">
                <button class="message">Send Message</button>
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
        function deleteProvider(id) {
            if (confirm('Are you sure you want to delete this account?')) {
                // Implement delete logic here
                console.log('Account deleted: ' + id);
            }
        }
    </script>
</body>
</html>
