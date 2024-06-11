<?php
session_start();
require_once('../../database/koneksi.php');

// Ambil ID admin dari URL atau sesi
$adminId = isset($_GET['id']) ? intval($_GET['id']) : (isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : 0);

// Validasi ID admin
if ($adminId <= 0) {
    echo "<script>alert('ID admin tidak valid.'); window.location.href = '../admin/index.html';</script>";
    exit;
}

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

// Query messages
$userType = isset($_POST['userType']) ? $_POST['userType'] : 'customer';
if ($userType == 'customer') {
    $sql = "SELECT id_custommer, first_name, last_name, message FROM customer_messages";
} else {
    $sql = "SELECT id, first_name, last_name, message FROM provider_message"; // Changed to provider_message
}

try {
    $result = $connection->query($sql);
    if (!$result) {
        throw new Exception("Query failed: " . $connection->error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .user-info span {
            margin: 2px 0;
        }

        .messages-section {
            display: flex;
            height: 100%;
        }

        .messages-sidebar {
            width: 250px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding: 20px;
        }

        .messages-sidebar .send-messages {
            background-color: #1595eb;
            color: #fff;
            border: none;
            padding: 10px 20px;
            width: 100%;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }

        .messages-sidebar .send-messages.active {
            background-color: #1595eb;
        }

        .messages-sidebar .send-messages.inactive {
            background-color: #cccccc;
            color: #666666;
        }

        .messages-sidebar .inbox-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .messages-sidebar .inbox-menu li {
            margin: 10px 0;
        }

        .messages-sidebar .inbox-menu li a {
            text-decoration: none;
            color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .messages-sidebar .inbox-menu li a .count {
            background-color: #eee;
            padding: 2px 5px;
            border-radius: 10px;
        }

        .messages-sidebar .inbox-menu li a.active,
        .messages-sidebar .inbox-menu li a:hover {
            font-weight: bold;
            color: #1595eb;
        }

        .messages-content {
            flex-grow: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .messages-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 20px;
        }

        .messages-header input[type="search"] {
            padding: 5px;
            width: 200px;
        }

        .message-list {
            border-top: 1px solid #ddd;
            flex-grow: 1;
            overflow-y: auto;
        }

        .message-item {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .message-item span {
            margin-right: 20px; 
        }

        .message-item .id_custommer, .message-item .id {
            flex: 1;
        }

        .message-item .first_name {
            flex: 2;
        }

        .message-item .last_name {
            flex: 2;
        }

        .message-item .message {
            flex: 4;
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
                    <li><a href="../dashboard/adminhome.php?id=<?php echo $adminId; ?>">Dashboard</a></li>
                    <li><a href="../orderlist/adminorderlist.php?id=<?php echo $adminId; ?>">Order List</a></li>
                    <li class="active"><a href="../messages/adminmessage.php?id=<?php echo $adminId; ?>">Messages</a></li>
                    <li class="section-title">USER</li>
                    <li><a href="../users/admincustlist.php?id=<?php echo $adminId; ?>">Customer</a></li>
                    <li><a href="../users/adminpenyediagedung.php?id=<?php echo $adminId; ?>">Provider</a></li>
                </ul>
            </nav>
            <div class="settings">
            <a href="../../login/user/login/UserLogin/index.html" style="align-items: center;"><b>Log Out</b></a>
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
            <div class="messages-section">
                <aside class="messages-sidebar">
                    <form action="adminmessage.php" method="post">
                        <button type="submit" name="userType" value="customer" class="send-messages <?php echo ($userType == 'customer') ? 'active' : 'inactive'; ?>">Customer</button>
                        <button type="submit" name="userType" value="provider" class="send-messages <?php echo ($userType == 'provider') ? 'active' : 'inactive'; ?>">Provider</button>
                    </form>
                </aside>
                <div class="messages-content">
                    <div class="message-list">
                        <?php
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="message-item">';
                                if ($userType == 'customer') {
                                    echo '<span class="id_custommer">' . htmlspecialchars($row['id_custommer']) . '</span>';
                                } else {
                                    echo '<span class="id">' . htmlspecialchars($row['id']) . '</span>';
                                }
                                echo '<span class="first_name">' . htmlspecialchars($row['first_name']) . '</span>';
                                echo '<span class="last_name">' . htmlspecialchars($row['last_name']) . '</span>';
                                echo '<span class="message">' . htmlspecialchars($row['message']) . '</span>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>No messages found.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
