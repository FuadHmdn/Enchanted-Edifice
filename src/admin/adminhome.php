<?php
session_start();
// Koneksi ke database
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$admin_username = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : '';

// Ambil total user
$sql_users = "SELECT COUNT(*) as total_users FROM custommer";
$result_users = $connection->query($sql_users);
$total_users = $result_users->fetch_assoc()['total_users'];

// Ambil total product
$sql_products = "SELECT COUNT(*) as total_products FROM produk";
$result_products = $connection->query($sql_products);
$total_products = $result_products->fetch_assoc()['total_products'];

// Ambil total order
$sql_orders = "SELECT COUNT(*) as total_orders FROM order_cust";
$result_orders = $connection->query($sql_orders);
$total_orders = $result_orders->fetch_assoc()['total_orders'];

// Ambil data penjualan
$sales_data = [];
$sql_sales = "SELECT DATE(tanggal_masuk) as order_date, COUNT(*) as total_sales FROM order_cust GROUP BY DATE(tanggal_masuk) ORDER BY DATE(tanggal_masuk) DESC LIMIT 7";
$result_sales = $connection->query($sql_sales);
while ($row = $result_sales->fetch_assoc()) {
    $sales_data[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        .search-bar input {
            padding: 10px;
            border: 1px solid #eceff1;
            border-radius: 5px;
        }
        .header-right {
            display: flex;
            align-items: center;
        }
        .notification {
            position: relative;
            margin-right: 20px;
        }
        .notification-icon {
            font-size: 24px;
        }
        h1{
            padding: 20px;
        }
        .notification-count {
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
        .overview-cards {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .card {
            flex: 1;
            background-color: #ffffff;
            padding: 20px;
            margin-right: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
        }
        .card:last-child {
            margin-right: 0;
        }
        .card h3 {
            margin-bottom: 10px;
            color: #333;
        }
        .card p {
            margin-bottom: 5px;
            font-size: 24px;
            font-weight: bold;
        }
        .percentage {
            font-size: 14px;
            color: #78909c;
        }
        .percentage.up {
            color: green;
        }
        .percentage.down {
            color: red;
        }
        .sales-details {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .sales-details h3 {
            margin-bottom: 20px;
        }
        .chart-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            height: 300px;
        }
        .chart-bar {
            width: 50px;
            background-color: #1595eb;
            text-align: center;
            color: white;
            margin: 0 10px;
            border-radius: 5px 5px 0 0;
        }
        .chart-bar span {
            display: block;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <h2>EnchantedEdifice</h2>
            </div>
            <nav>
                <ul>
                    <li class="active"><a href="adminhome.php?id=<?php echo htmlspecialchars($admin_id); ?>">Dashboard</a></li>
                    <li><a href="adminorderlist.php?id=<?php echo htmlspecialchars($admin_id); ?>">Order List</a></li>
                    <li><a href="adminnotifikasi.html?id=<?php echo htmlspecialchars($admin_id); ?>">Notifications</a></li>
                    <li class="section-title">USER</li>
                    <li><a href="admincustlist.php?id=<?php echo htmlspecialchars($admin_id); ?>">Customer</a></li>
                    <li><a href="adminpenyediagedung.php?id=<?php echo htmlspecialchars($admin_id); ?>">Provider</a></li>
                    <li class="section-title">VERIFICATIONS</li>
                    <li><a href="adminverifpayment.php?id=<?php echo htmlspecialchars($admin_id); ?>">Payments</a></li>
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
                    <div class="notification">
                        <span class="notification-icon">🔔</span>
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

            <h1>Dashboard</h1>
            <div class="dashboard">
                <div class="overview-cards">
                    <div class="card">
                        <h3>Total Users</h3>
                        <p><?php echo $total_users; ?></p>
                    </div>
                    <div class="card">
                        <h3>Total Products</h3>
                        <p><?php echo $total_products; ?></p>
                    </div>
                    <div class="card">
                        <h3>Total Orders</h3>
                        <p><?php echo $total_orders; ?></p>
                    </div>
                </div>

                <div class="sales-details">
                    <h3>Sales Details</h3>
                    <div class="chart-container">
                        <?php foreach ($sales_data as $data): ?>
                            <div class="chart-bar" style="height: <?php echo $data['total_sales'] * 20; ?>px;">
                                <span><?php echo $data['total_sales']; ?></span>
                                <span><?php echo $data['order_date']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<?php
// Tutup koneksi database
$connection->close();
?>