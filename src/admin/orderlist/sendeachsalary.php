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

// Ambil data order berdasarkan ID
$order_id = $_GET['id_order'] ?? 0;
$penyedia_gedung_id = $_GET['id_penyedia_gedung'] ?? 0;

$sql = "SELECT order_cust.id_order, order_cust.tanggal_masuk, order_cust.tanggal_keluar, produk.judul, produk.harga, order_cust.id_penyedia_gedung 
        FROM order_cust
        JOIN produk ON order_cust.id_produk = produk.id_produk
        WHERE order_cust.id_order = ?";
        
$stmt = $connection->prepare($sql);
if (!$stmt) {
    die("Preparation failed: " . $connection->error);
}
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

if (!$order) {
    die("Order with ID $order_id not found.");
}

$nominal = $order['harga'] * 0.875; // Harga dikurangi 12.5% pajak

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Upload bukti transfer
    $target_dir = "C:/xampp/htdocs/PemWeb/Enchanted-Edifice/src/database/BuktiTransferSalary/";
    $target_file = $target_dir . basename($_FILES["bukti_transfer"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a actual image or fake image
    $check = getimagesize($_FILES["bukti_transfer"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["bukti_transfer"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["bukti_transfer"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["bukti_transfer"]["name"])) . " has been uploaded.";

            // Simpan data salary ke database
            $sql = "INSERT INTO salary (id_order, id_admin, nominal, bukti_transfer, id_penyedia_gedung) VALUES (?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $admin_id = 1; // Ganti dengan ID admin yang sesuai
            $bukti_transfer = htmlspecialchars(basename($_FILES["bukti_transfer"]["name"]));
            $stmt->bind_param("iidss", $order_id, $admin_id, $nominal, $bukti_transfer, $penyedia_gedung_id);

            if ($stmt->execute()) {
                echo "Salary recorded successfully";
                header('Location: adminorderlist.php?id=' . $adminId); // Ganti dengan halaman tujuan setelah sukses
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Salary</title>
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
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
        }
        .form-group input[type="file"] {
            padding: 3px;
        }
        .buttons {
            text-align: right;
        }
        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: blue;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Send Salary</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="order_id">Order ID</label>
                <input type="text" id="order_id" value="<?php echo htmlspecialchars($order['id_order']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Check-in Date</label>
                <input type="text" id="tanggal_masuk" value="<?php echo htmlspecialchars($order['tanggal_masuk']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="tanggal_keluar">Check-out Date</label>
                <input type="text" id="tanggal_keluar" value="<?php echo htmlspecialchars($order['tanggal_keluar']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="judul">Product Title</label>
                <input type="text" id="judul" value="<?php echo htmlspecialchars($order['judul']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="harga">Price</label>
                <input type="text" id="harga" value="<?php echo htmlspecialchars($order['harga']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nominal">Provider Salary</label>
                <input type="text" id="nominal" value="<?php echo number_format($nominal, 2); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="bukti_transfer">Upload Payment Proof</label>
                <input type="file" name="bukti_transfer" id="bukti_transfer" required>
            </div>
            <div class="buttons">
                <button type="submit">Send Salary</button>
            </div>
        </form>
    </div>
</body>
</html>
