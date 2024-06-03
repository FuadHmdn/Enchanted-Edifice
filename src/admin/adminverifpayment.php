<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['payment_id']) && isset($_POST['status'])) {
        $payment_id = $_POST['payment_id'];
        $status = $_POST['status'];

        $update_query = "UPDATE admin_payment SET status='$status' WHERE id=$payment_id";
        if ($connection->query($update_query) === TRUE) {
            echo "";
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}

$sql = "SELECT * FROM admin_payment";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Styles tetap sama */
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
    }

    nav ul li a:hover, nav ul li.active a {
        background-color: #1595eb;
        color: #ffffff;
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

    .user-info {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }

    .user-info span {
        margin: 2px 0;
    }

    h1 {
        padding: 20px;
    }

    .tabs {
        display: flex;
        justify-content: start;
        padding: 20px;
    }

    .tab-button {
        padding: 10px 20px;
        margin-right: 10px;
        border: none;
        border-radius: 20px;
        background-color: #f4f5f7;
        cursor: pointer;
    }

    .tab-button.active {
        background-color: #1595eb;
        color: #fff;
    }

    .filters {
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .filters select, .filters button {
        padding: 10px;
        border: 1px solid #eceff1;
        border-radius: 5px;
    }

    .reset-filters {
        background-color: #1595eb;
        color: #fff;
        cursor: pointer;
    }

    .order-list {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
        margin: 20px;
    }

    .order-list table {
        width: 100%;
        border-collapse: collapse;
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

    .status.Valid {
        background-color: #d4edda;
        color: #155724;
    }

    .status.Processing {
        background-color: #fff3cd;
        color: #856404;
    }

    .status.Invalid {
        background-color: #f8d7da;
        color: #721c24;
    }

    .status.Completed {
        background-color: #d1ecf1;
        color: #0c5460;
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
                    <li><a href="adminorderlist.php?id=<?php echo htmlspecialchars($admin_id); ?>">Order List</a></li>
                    <li><a href="adminnotifikasi.html?id=<?php echo htmlspecialchars($admin_id); ?>">Notifications</a></li>
                    <li class="section-title">USER</li>
                    <li><a href="admincustlist.php?id=<?php echo htmlspecialchars($admin_id); ?>">Customer</a></li>
                    <li><a href="adminpenyediagedung.php?id=<?php echo htmlspecialchars($admin_id); ?>">Provider</a></li>
                    <li class="section-title">VERIFICATIONS</li>
                    <li class="active"><a href="adminverifpayment.php?id=<?php echo htmlspecialchars($admin_id); ?>">Payments</a></li>
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

    <div class="order-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Proof</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th> <!-- Tambah kolom untuk dropdown status -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['order_id']}</td>
                                <td>{$row['date']}</td>
                                <td><a href='uploads/{$row['proof']}' target='_blank'>{$row['proof']}</a></td>
                                <td>{$row['type']}</td>
                                <td><span class='status {$row['status']}'>{$row['status']}</span></td>
                                <td>
                                    <form method='post'>
                                        <input type='hidden' name='payment_id' value='{$row['id']}'>
                                        <select name='status'>
                                            <option value='Valid'>Valid</option>
                                            <option value='Invalid'>Invalid</option>
                                            <option value='Processing'>Processing</option>
                                        </select>
                                        <button type='submit'>Update</button>
                                    </form>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No payments found</td></tr>";
                }
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
