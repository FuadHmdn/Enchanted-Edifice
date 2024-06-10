<?php
session_start(); // Memulai sesi

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = new mysqli(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

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
    h1 {
        padding: 20px;
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
            <!--Navbar-->
            <nav>
                <ul>
                    <li><a href="../dashboard/adminhome.php?id=<?php echo $adminId; ?>">Dashboard</a></li>
                    <li class="active"><a href="../orderlist/adminorderlist.php?id=<?php echo $adminId; ?>">Order List</a></li>
                    <li><a href="../messages/adminmessage.php?id=<?php echo $adminId; ?>">Messages</a></li>
                    <li class="section-title">USER</li>
                    <li><a href="../users/admincustlist.php?id=<?php echo $adminId; ?>">Customer</a></li>
                    <li><a href="../users/adminpenyediagedung.php?id=<?php echo $adminId; ?>">Provider</a></li>
                </ul>
            </nav>
            
            <div class="settings">
                <a href="logout.php">Logout</a>
            </div>
        </aside>
        <main class="main-content">
            <header>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
                <div class="header-right">
                    <div class="message">
                        <span class="message-icon">🔔</span>
                    </div>
                    <div class="user-info">
                        <!-- Menampilkan username admin -->
                        <div>
                            <div style="font-size: 16px; font-weight: 700; max-width: 100%; margin: 0;"><?php echo htmlspecialchars($admin_username); ?></div>
                            <p style="font-size: 12px; font-weight: 300; max-width: 100%; margin: 0;">Admin</p>
                        </div>
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
            var adminId = <?php echo $adminId; ?>;
            window.location.href = 'vieworder.php?id=' + orderId + '&admin_id=' + adminId;
        }

        function deleteOrder(event, orderId) {
            event.stopPropagation();
            if (confirm('Are you sure you want to delete this order?')) {
                var adminId = <?php echo $adminId; ?>;
                window.location.href = 'deleteorder.php?id=' + orderId + '&admin_id=' + adminId;
            }
        }
    </script>
</body>
</html>

<?php
$connection->close();
?>