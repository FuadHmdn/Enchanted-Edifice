<?php
session_start();
require_once('../../database/koneksi.php');

$sql = "SELECT * FROM order_cust";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <h2>EnchantedEdifice</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="adminhome.php?id=<?php echo htmlspecialchars($admin_id); ?>">Dashboard</a></li>
                    <li class="active"><a href="adminorderlist.php?id=<?php echo htmlspecialchars($admin_id); ?>">Order List</a></li>
                    <li><a href="adminnotifikasi.html?id=<?php echo htmlspecialchars($admin_id); ?>">Notifications</a></li>
                    <li class="section-title">USER</li>
                    <li><a href="admincustlist.php?id=<?php echo htmlspecialchars($admin_id); ?>">Customer</a></li>
                    <li><a href="adminpenyediagedung.php?id=<?php echo htmlspecialchars($admin_id); ?>">Provider</a></li>
                    <li class="section-title">VERIFICATIONS</li>
                    <li><a href="adminverifpayment.php?id=<?php echo htmlspecialchars($admin_id); ?>">Payments</a></li>
                </ul>
            </nav>
            <div class="settings">
                <a href="#">Logout</a>
            </div>
        </aside>
        <main class="main-content">
            <header>
                <div class="header-right">
                    <div class="notification">
                        <span class="notification-icon">🔔</span>
                        <span class="notification-count">6</span>
                    </div>
                    <div class="user-info">
                        <span>Fuad</span>
                        <span class="role">Admin</span>
                    </div>
                </div>
            </header>

            <h1>Order List</h1>
            <div class="order-list">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $orderStatus = $row['complete'] ? 'Completed' : 'Incomplete';
                        $harga = $row['harga'];
                        $potongan = $harga * 0.125;
                        $salary = $harga - $potongan;
                        echo "<div class='order-card' onclick='viewOrder({$row['id_order']})'>
                                <h3>Order ID: {$row['id_order']}</h3>
                                <p>Customer ID: {$row['id_custommer']}</p>
                                <p>Product ID: {$row['id_produk']}</p>
                                <p>Provider ID: {$row['id_penyedia_gedung']}</p>
                                <p>Check-in Date: {$row['tanggal_masuk']}</p>
                                <p>Check-out Date: {$row['tanggal_keluar']}</p>
                                <p>Status Order: <span class='status {$orderStatus}'>{$orderStatus}</span></p>
                                <p>Status Payment: {$row['status_payment']}</p>
                                <p>Payment Type: {$row['tipe_pembayaran']}</p>
                                <p>Category: {$row['kategori']}</p>
                                <div class='form-group'>
                                    <label for='salary'>Provider Salary</label>
                                    <input type='text' id='salary' value='" . htmlspecialchars($salary) . "' readonly>
                                </div>
                                <form action='sendsalary.php' method='post'>
                                    <input type='hidden' name='id_order' value='{$row['id_order']}'>
                                    <input type='hidden' name='id_admin' value='{$admin_id}'>
                                    <input type='hidden' name='nominal' value='" . htmlspecialchars($salary) . "'>
                                    <input type='hidden' name='id_penyedia_gedung' value='{$row['id_penyedia_gedung']}'>
                                    <label for='bukti_transfer'>Bukti Transfer</label>
                                    <input type='text' name='bukti_transfer' id='bukti_transfer' required>
                                    <button type='submit'>Send Salary</button>
                                </form>
                                <button onclick='deleteOrder(event, {$row['id_order']})'>Delete</button>
                            </div>";
                    }
                } else {
                    echo "<p>No orders found.</p>";
                }
                ?>
            </div>
        </main>
    </div>
    <script>
        function viewOrder(orderId) {
            window.location.href = 'vieworder.php?id=' + orderId;
        }

        function deleteOrder(event, orderId) {
            event.stopPropagation();
            if (confirm('Are you sure you want to delete this order?')) {
                window.location.href = 'deleteorder.php?id=' + orderId;
            }
        }
    </script>
</body>
</html>

<?php
$connection->close();
?>
