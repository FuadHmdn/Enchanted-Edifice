<?php
session_start();
require_once('../../database/koneksi.php');

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

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Ambil data customer
$sql = "SELECT * FROM custommer";
$result = $connection->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
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
    h1 {
        padding: 20px;
    }

    .header-right {
        display: flex;
        align-items: center;
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
    .search-bar input {
            padding: 10px;
            border: 1px solid #eceff1;
            border-radius: 5px;
        }
    .pagination {
        padding: 15px;
        text-align: right;
        font-size: 14px;
        color: #666;
    }

    .customer-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
    }

    .customer-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        width: calc(33.333% - 20px);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.3s;
        cursor: pointer;
    }

    .customer-card:hover {
        transform: translateY(-10px);
    }

    .customer-card .profile-pic {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .customer-card .profile-pic img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .customer-card h3 {
        margin: 10px 0 5px 0;
        color: #333;
    }

    .customer-card p {
        margin: 5px 0 10px 0;
        color: #777;
    }
    .message-icon {
        font-size: 24px;
        padding: 20px;
    }

    .customer-card button {
        padding: 10px 20px;
        border: none;
        background-color: #1595eb;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-bottom: 10px;
    }

    .customer-card button:hover {
        background-color: #0f7bb5;
    }

    .add-customer-button {
        display: inline-block;
        padding: 10px 20px;
        margin-bottom: 20px;
        background-color: #1595eb;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        width: fit-content;
    }

    .add-customer-button:hover {
        background-color: #0f7bb5;
    }
    .button-container {
    display: flex;
    justify-content: flex-end;
    margin-right: 50px;
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
                    <li><a href="../orderlist/adminorderlist.php?id=<?php echo $adminId; ?>">Order List</a></li>
                    <li><a href="../messages/adminmessage.php?id=<?php echo $adminId; ?>">Messages</a></li>
                    <li class="section-title">USER</li>
                    <li class="active"><a href="../users/admincustlist.php?id=<?php echo $adminId; ?>">Customer</a></li>
                    <li><a href="../users/adminpenyediagedung.php?id=<?php echo $adminId; ?>">Penyedia Gedung</a></li>
                </ul>
            </nav>
            
            <div class="settings">
                <button onclick="confirmLogout()" style="align-items: center;"><b>Log Out</b></button>
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

            <h1>Customer List</h1>
            <div class="button-container">
            <a href="add_customer.php" class="add-customer-button">Add Customer</a>
            </div>

                <div class="customer-list">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $photo = $row['photo'];
                            echo "<div class='customer-card' onclick='viewCustomer(" . $row["id"] . ")'>
                                <div class='profile-pic'>";
                            if (!empty($row["photo"])) {
                                echo "<img src='/PemWeb/Enchanted-Edifice/src/login/user/res/customer/" . htmlspecialchars($row["photo"]) . "' alt='Profile Picture'>";
                            } else {
                                echo "<img src='/path/to/default-image.jpg' alt='No Photo'>";
                            }
                            echo "</div>
                                <h3>" . htmlspecialchars($row["username"]) . "</h3>
                                <p>" . htmlspecialchars($row["email"]) . "</p>
                                <button onclick='deleteCust(event, " . $row["id"] . ")'>Delete</button>
                                <button onclick='editCust(event, " . $row["id"] . ")'>Edit</button>
                            </div>";
                        }
                    } else {
                        echo "<p>No customers found</p>";
                    }
                    ?>
                </div>
        </main>
    </div>

    <script>
        function viewCustomer(id) {
            window.location.href = 'vieweachcust.php?id=' + id;
        }

        function deleteCust(event, userId) {
            event.stopPropagation();
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete_cust.php?id=" + userId + "&admin_id=<?php echo $adminId; ?>";
            }
        }

        function editCust(event, userId) {
            event.stopPropagation();
            window.location.href = "edit_cust.php?id=" + userId + "&admin_id=<?php echo $adminId; ?>";
        }

        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin keluar?")) {
                window.location.href = "../../login/user/login/UserLogin/index.html";
            }
        }

    </script>
</body>
</html>