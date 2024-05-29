<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Ambil data orderan pengguna
$sql = "SELECT * FROM orders_customers";
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
h1 {
    padding: 20px;
}


.order-list {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
}

.order-list table {
    width: 100%;
    border-collapse: collapse;
    padding: 20px;
}

.order-list table th, .order-list table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.order-list table th {
    background-color: #f8f8f8;
    font-weight: bold;
    color: #333;
}

.order-list table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
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

.pagination {
    padding: 15px;
    text-align: right;
    font-size: 14px;
    color: #666;
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
                    <li><a href="adminhome.html">Dashboard</a></li>
                    <li class="active"><a href="adminorderlist.php">Order List</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li class="section-title">USER</li>
                    <li><a href="#">Customer</a></li>
                    <li><a href="#">Provider</a></li>
                    <li class="section-title">VERIFICATIONS</li>
                    <li><a href="#">Payments</a></li>
                </ul>
            </nav>
            <div class="settings">
                <a href="#">Settings</a>
                <a href="#">Logout</a>
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
                <table>
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>ID Customer</th>
                            <th>ID Produk</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id_pesanan']}</td>
                                        <td>{$row['id_custommer']}</td>
                                        <td>{$row['id_produk']}</td>
                                        <td>{$row['tanggal_masuk']}</td>
                                        <td>{$row['tanggal_keluar']}</td>
                                        <td class='status {$row['status']}'>{$row['status']}</td>
                                        <td>
                                            <button onclick='editOrder({$row['id_pesanan']})'>Edit</button>
                                            <button onclick='deleteOrder({$row['id_pesanan']})'>Delete</button>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No orders found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!--
                <div class="pagination">
                <span>Showing 1-9 of 78</span>
            </div>
                    -->
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="script.js"></script>
</body>
</html>
