<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = new mysqli(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

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
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        display: flex;
        min-height: 100vh;
        background-color: #f4f5f7;
    }

    .container {
        display: flex;
        width: 100%;
    }

    .sidebar {
        width: 250px;
        background-color: #ffffff;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .logo {
        padding: 20px;
        text-align: center;
        background-color: #eceff1;
    }

    .logo h2 {
        color: #3949ab;
        margin: 0;
    }

    nav {
        flex-grow: 1;
    }

    nav ul {
        list-style-type: none;
    }

    nav ul li {
        padding: 15px 20px;
    }

    nav ul li.section-title {
        font-weight: bold;
        color: #78909c;
        text-transform: uppercase;
        margin-top: 20px;
        padding: 10px 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: #333;
        display: block;
        transition: background 0.3s;
        padding: 15px;
        margin: 0;
    }

    nav ul li a:hover {
        background-color: #1595eb;
        color: #ffffff;
        padding: 15px;
        margin: 0;
        border-radius: 10px;
    }
    nav ul li.active a {
        background-color: #1595eb;
        color: #ffffff;
        padding: 15px;
        border-radius: 10px;
    }

    .settings {
        padding: 20px;
        border-top: 1px solid #eceff1;
    }

    .settings a {
        display: block;
        text-decoration: none;
        color: #333;
        margin-bottom: 10px;
    }

    .main-content {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    header {
        padding: 20px;
        background-color: #ffffff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .header-right {
        display: flex;
        align-items: center;
    }

    .message {
        position: relative;
        margin-right: 20px;
    }

    .message-icon {
        font-size: 24px;
    }

    .message-count {
        position: absolute;
        top: -5px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
    }

    .language img {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        margin-right: 20px;
    }

    .user-info {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .user-info span {
        margin: 2px 0;
    }

    .dashboard {
        padding: 20px;
    }

    .order-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
    }

    .order-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        width: calc(33.333% - 20px);
        display: flex;
        flex-direction: column;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.3s;
        cursor: pointer;
    }

    .order-card:hover {
        transform: translateY(-10px);
    }

    .order-card h3 {
        margin: 10px 0 5px 0;
        color: #333;
    }

    .order-card p {
        margin: 5px 0 10px 0;
        color: #777;
    }

    .order-card button {
        padding: 10px 20px;
        border: none;
        background-color: #1595eb;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .order-card button:hover {
        background-color: #0f7bb5;
    }

    .status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        text-align: center;
    }

    .status.completed {
        background-color: #d4edda;
        color: #155724;
    }

    .status.processing {
        background-color: #fff3cd;
        color: #856404;
    }

    .status.canceled {
        background-color: #f8d7da;
        color: #721c24;
    }
</style>
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
                    <li><a href="adminmessage.php?id=<?php echo htmlspecialchars($admin_id); ?>">Messages</a></li>
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
                    <div class="message">
                        <span class="message-icon">🔔</span>
                        <span class="message-count">6</span>
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