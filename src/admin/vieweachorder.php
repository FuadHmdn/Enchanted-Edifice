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

// Ambil data pesanan dan customer
$sql = "SELECT orders_customers.*, customers.username FROM orders_customers 
        JOIN customers ON orders_customers.id_custommer = customers.id";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $orders = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No records found";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order and Customer Details</title>
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
            width: 90%;
            max-width: 1000px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order and Customer Details</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Username</th>
                    <th>ID Produk</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id_pesanan']); ?></td>
                        <td><?php echo htmlspecialchars($order['username']); ?></td>
                        <td><?php echo htmlspecialchars($order['id_produk']); ?></td>
                        <td><?php echo htmlspecialchars($order['tanggal_masuk']); ?></td>
                        <td><?php echo htmlspecialchars($order['tanggal_keluar']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
