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
    if (isset($_POST['salary_id']) && isset($_POST['status'])) {
        $salary_id = $_POST['salary_id'];
        $status = $_POST['status'];

        $update_query = "UPDATE salary SET status_payment='$status' WHERE id_salary=$salary_id";
        if ($connection->query($update_query) === TRUE) {
            echo "";
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}

$sql_salary = "SELECT * FROM salary";
$result_salary = $connection->query($sql_salary);

$sql_order = "SELECT * FROM order_cust"; 
$result_order = $connection->query($sql_order);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Dashboard</title>
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

    .payment-list {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
        margin: 20px;
    }

    .payment-list table {
        width: 100%;
        border-collapse: collapse;
    }

    .payment-list table th, .payment-list table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .payment-list table th {
        background-color: #f8f8f8;
        font-weight: bold;
        color: #333;
    }

    .payment-list table tbody tr:nth-child(even) {
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
    .buttons {
        margin: 20px;
        text-align: center;
    }

    .buttons button {
        padding: 10px 20px;
        margin: 0 10px;
        border: none;
        border-radius: 5px;
        background-color: #1595eb;
        color: white;
        cursor: pointer;
    }

    .buttons button.active {
        background-color: #0a6abf;
    }

    .table-container {
        display: none;
    }

    .table-container.active {
        display: block;
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

            <div class="buttons">
                <button id="showSalary" class="active" onclick="showTable('salaryTable')">Salary</button>
                <button id="showOrder" onclick="showTable('orderTable')">Customer Order</button>
            </div>

            <div id="salaryTable" class="table-container active">
                <div class="order-list">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Admin ID</th>
                                <th>Nominal</th>
                                <th>Proof</th>
                                <th>Provider ID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_salary->num_rows > 0) {
                                while ($row = $result_salary->fetch_assoc()) {
                                    $id = isset($row['id_salary']) ? $row['id_salary'] : 'N/A';
                                    $order_id = isset($row['id_order']) ? $row['id_order'] : 'N/A';
                                    $admin_id = isset($row['id_admin']) ? $row['id_admin'] : 'N/A';
                                    $nominal = isset($row['nominal']) ? $row['nominal'] : 'N/A';
                                    $proof = isset($row['bukti_transfer']) ? $row['bukti_transfer'] : 'N/A';
                                    $provider_id = isset($row['id_penyedia_gedung']) ? $row['id_penyedia_gedung'] : 'N/A';
                                    $status = isset($row['status_payment']) ? $row['status_payment'] : 'N/A';

                                    echo "<tr>
                                            <td>{$id}</td>
                                            <td>{$order_id}</td>
                                            <td>{$admin_id}</td>
                                            <td>{$nominal}</td>
                                            <td><a href='uploads/{$proof}' target='_blank'>{$proof}</a></td>
                                            <td>{$provider_id}</td>
                                            <td><span class='status {$status}'>{$status}</span></td>
                                            <td>
                                                <form method='post'>
                                                    <input type='hidden' name='salary_id' value='{$id}'>
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
                                echo "<tr><td colspan='8'>No salaries found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="orderTable" class="table-container">
                <div class="order-list">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer ID</th>
                                <th>Product ID</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Complete</th>
                                <th>Status Payment</th>
                                <th>Payment Type</th>
                                <th>Payment Proof</th>
                                <th>Package ID</th>
                                <th>Provider ID</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result_order->num_rows > 0) {
                                while ($row = $result_order->fetch_assoc()) {
                                    $id = isset($row['id_order']) ? $row['id_order'] : 'N/A';
                                    $customer_id = isset($row['id_custommer']) ? $row['id_custommer'] : 'N/A';
                                    $product_id = isset($row['id_produk']) ? $row['id_produk'] : 'N/A';
                                    $start_date = isset($row['tanggal_keluar']) ? $row['tanggal_keluar'] : 'N/A';
                                    $end_date = isset($row['tanggal_masuk']) ? $row['tanggal_masuk'] : 'N/A';
                                    $complete = isset($row['complete']) ? $row['complete'] : 'N/A';
                                    $status_payment = isset($row['status_payment']) ? $row['status_payment'] : 'N/A';
                                    $payment_type = isset($row['tipe_pembayaran']) ? $row['tipe_pembayaran'] : 'N/A';
                                    $payment_proof = isset($row['bukti_pembayaran']) ? $row['bukti_pembayaran'] : 'N/A';
                                    $package_id = isset($row['id_paket']) ? $row['id_paket'] : 'N/A';
                                    $provider_id = isset($row['id_penyedia_gedung']) ? $row['id_penyedia_gedung'] : 'N/A';
                                    $category = isset($row['kategori']) ? $row['kategori'] : 'N/A';

                                    echo "<tr>
                                            <td>{$id}</td>
                                            <td>{$customer_id}</td>
                                            <td>{$product_id}</td>
                                            <td>{$start_date}</td>
                                            <td>{$end_date}</td>
                                            <td>{$complete}</td>
                                            <td>{$status_payment}</td>
                                            <td>{$payment_type}</td>
                                            <td><a href='uploads/{$payment_proof}' target='_blank'>{$payment_proof}</a></td>
                                            <td>{$package_id}</td>
                                            <td>{$provider_id}</td>
                                            <td>{$category}</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='12'>No orders found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        function showTable(tableId) {
            const tables = document.querySelectorAll('.table-container');
            tables.forEach(table => table.classList.remove('active'));

            const buttons = document.querySelectorAll('.buttons button');
            buttons.forEach(button => button.classList.remove('active'));

            document.getElementById(tableId).classList.add('active');
            document.querySelector(`#${tableId}`).classList.add('active');
        }
    </script>
</body>
</html>