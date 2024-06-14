<?php
session_start();
require_once('../../database/koneksi.php');

// Function to get admin username by admin ID
function getAdminUsername($connection, $adminId) {
    $sql_username = "SELECT username FROM admin WHERE id = $adminId";
    $result_username = $connection->query($sql_username);
    if ($result_username->num_rows > 0) {
        return $result_username->fetch_assoc()['username'];
    } else {
        return '';
    }
}

// Get admin ID from URL or session
$adminId = isset($_GET['id']) ? intval($_GET['id']) : (isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : 0);
$admin_username = isset($_GET['username']) ? $_GET['username'] : (isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : '');

// Validate admin ID
if ($adminId <= 0) {
    echo "<script>alert('ID admin tidak valid.'); window.location.href = '../admin/index.html';</script>";
    exit;
}

// Set session admin if not set
if (!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != $adminId) {
    $_SESSION['admin_id'] = $adminId;
}

// Get admin username from session or database
if (empty($admin_username)) {
    $admin_username = getAdminUsername($connection, $adminId);
    $_SESSION['admin_username'] = $admin_username;
}

// Get total users
$sql_users = "SELECT COUNT(*) as total_users FROM custommer";
$result_users = $connection->query($sql_users);
$total_users = $result_users->fetch_assoc()['total_users'];

// Get total products
$sql_products = "SELECT COUNT(*) as total_products FROM produk";
$result_products = $connection->query($sql_products);
$total_products = $result_products->fetch_assoc()['total_products'];

// Get total orders
$sql_orders = "SELECT COUNT(*) as total_orders FROM order_cust";
$result_orders = $connection->query($sql_orders);
$total_orders = $result_orders->fetch_assoc()['total_orders'];

// Get sales data from January to December 2024
$sql_sales = "SELECT DATE_FORMAT(tanggal_masuk, '%Y-%m') as order_month, COUNT(*) as total_sales 
              FROM order_cust 
              WHERE YEAR(tanggal_masuk) = 2024 
              GROUP BY order_month 
              ORDER BY order_month";
$result_sales = $connection->query($sql_sales);
$sales_data = [];
while ($row = $result_sales->fetch_assoc()) {
    $sales_data[$row['order_month']] = $row['total_sales'];
}

// Prepare monthly sales data
$bulan = array(
    '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', 
    '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', 
    '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
);

$monthly_sales = [];
foreach ($bulan as $num => $name) {
    $key = '2024-' . $num;
    $monthly_sales[$key] = isset($sales_data[$key]) ? $sales_data[$key] : 0;
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
            padding: 30px;
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
            padding: 0px;
        }
        .contenttt {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
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
        .message {
            position: relative;
            margin-right: 20px;
        }
        .message-icon {
            font-size: 24px;
        }
        h1 {
            padding: 20px 0;
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
            padding: 20px 0;
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
            position: relative;
            height: 300px;
            padding: 20px;
        }
        .y-axis {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 100%;
            justify-content: space-between;
            padding-right: 10px;
        }
        .y-axis span {
            font-size: 12px;
        }
        .chart-bar {
            width: 50px;
            background-color: #1595eb;
            text-align: center;
            color: black;
            margin: 0 10px;
            border-radius: 5px 5px 0 0;
        }
        .chart-bar span {
            display: block;
            padding: 5px 0;
            font-size: 12px;
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
                    <li class="active"><a href="../dashboard/adminhome.php?id=<?php echo $adminId; ?>">Dashboard</a></li>
                    <li><a href="../orderlist/adminorderlist.php?id=<?php echo $adminId; ?>">Order List</a></li>
                    <li><a href="../messages/adminmessage.php?id=<?php echo $adminId; ?>">Messages</a></li>
                    <li class="section-title">USER</li>
                    <li><a href="../users/admincustlist.php?id=<?php echo $adminId; ?>">Customer</a></li>
                    <li><a href="../users/adminpenyediagedung.php?id=<?php echo $adminId; ?>">Penyedia Gedung</a></li>
                </ul>
            </nav>
            <div class="settings">
                <button onclick="confirmLogout()"><b>Log Out</b></button>
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
                        <div>
                            <div style="font-size: 16px; font-weight: 700;"><?php echo htmlspecialchars($admin_username); ?></div>
                            <p style="font-size: 12px; font-weight: 300;">Admin</p>
                        </div>
                    </div>
                </div>
            </header>
            <div class="contenttt">
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
                        <h3>Sales Details (2024)</h3>
                        <div class="chart-container">
                            <div class="y-axis">
                                <span>50</span>
                                <span>40</span>
                                <span>30</span>
                                <span>20</span>
                                <span>10</span>
                                <span>0</span>
                            </div>
                            <?php foreach ($monthly_sales as $month => $total_sales): ?>
                                <div class="chart-bar" style="height: <?php echo $total_sales * 6; ?>px;">
                                    <span><?php echo $total_sales; ?></span>
                                    <span><?php echo $bulan[substr($month, 5)]; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin keluar?")) {
                window.location.href = "../../login/user/login/UserLogin/index.html";
            }
        }
    </script>
</body>
</html>

<?php
// Close the database connection
$connection->close();
?>