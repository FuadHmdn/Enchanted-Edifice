<?php
// Koneksi ke database
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');  // Jika root memiliki password, masukkan di sini
define('DB', 'enchanted_edifice');

$connection = new mysqli(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Ambil data order berdasarkan ID
$order_id = $_GET['id'] ?? 0;
$sql = "SELECT order_cust.id_order, order_cust.tanggal_masuk, order_cust.tanggal_keluar, order_cust.complete, order_cust.status_payment, produk.judul, produk.deskripsi, produk.harga, produk.gambar, order_cust.bukti_pembayaran, order_cust.id_penyedia_gedung
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update status order dan status pembayaran
    $new_order_status = $_POST['status_order'] === 'completed' ? 1 : 0;
    $new_payment_status = $_POST['status_payment'];
    $update_sql = "UPDATE order_cust SET complete = ?, status_payment = ? WHERE id_order = ?";
    $update_stmt = $connection->prepare($update_sql);
    if (!$update_stmt) {
        die("Preparation failed: " . $connection->error);
    }
    $update_stmt->bind_param("isi", $new_order_status, $new_payment_status, $order_id);
    if ($update_stmt->execute()) {
        echo "Record updated successfully";
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
    <title>Order Details</title>
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
            margin-top: 100px;
            padding-top: 100px;
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
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
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
            background-color: blue;
            color: white;
        }
        .product-img {
            width: 300px;
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #eceff1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }
        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .inline-group {
            display: flex;
            align-items: center;
            gap: 10px;
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
    <a href="adminorderlist.php" class="back-button">← </a>
    
    <div class="container">
        <div class="form">
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
                <label for="deskripsi">Description</label>
                <input type="text" id="deskripsi" value="<?php echo htmlspecialchars($order['deskripsi']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="harga">Price</label>
                <input type="text" id="harga" value="<?php echo htmlspecialchars($order['harga']); ?>" readonly>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="status_order">Order Status</label>
                    <div class="inline-group">
                        <select id="status_order" name="status_order">
                            <option value="completed" <?php echo $order['complete'] == 1 ? 'selected' : ''; ?>>Completed</option>
                            <option value="incompleted" <?php echo $order['complete'] == 0 ? 'selected' : ''; ?>>Incomplete</option>
                        </select>
                        <button type="submit" class="update">Update</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status_payment">Payment Status</label>
                    <div class="inline-group">
                        <select id="status_payment" name="status_payment">
                            <option value="awaiting" <?php echo $order['status_payment'] == 'awaiting' ? 'selected' : ''; ?>>Awaiting</option>
                            <option value="valid" <?php echo $order['status_payment'] == 'valid' ? 'selected' : ''; ?>>Valid</option>
                            <option value="invalid" <?php echo $order['status_payment'] == 'invalid' ? 'selected' : ''; ?>>Invalid</option>
                        </select>
                        <button type="submit" class="update">Update</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bukti_pembayaran">Proof of Payment</label>
                    <div class="inline-group">
                        <a href="http://localhost/PemWeb/Enchanted-Edifice/src/database/BuktiPembayaran/<?php echo htmlspecialchars($order['bukti_pembayaran']); ?>" target="_blank"><?php echo htmlspecialchars($order['bukti_pembayaran']); ?></a>
                    </div>
                </div>
            </form>
            <div class="form-group">
                <label for="salary">Provider Salary</label>
                <div class="buttons">
                    <button class="salary" onclick="window.location.href='sendeachsalary.php?id_order=<?php echo $order['id_order']; ?>&id_penyedia_gedung=<?php echo $order['id_penyedia_gedung']; ?>'">Send Salary</button>
                </div>
            </div>
        </div>
        <div class="product-img">
            <?php if(isset($order['gambar']) && !empty($order['gambar'])): ?>
                <img src="<?php echo htmlspecialchars($order['gambar']); ?>" alt="Product Image">
            <?php else: ?>
                <img src="/path/to/default-image.jpg" alt="Product Image">
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
