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

        .message-item input[type="checkbox"] {
            margin-right: 10px;
        }

        .message-item .star {
            margin-right: 10px;
            color: gold;
        }

        .message-item .name {
            flex: 1;
        }

        .message-item .message {
            flex: 2;
        }

        .message-item .time {
            color: #888;
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
                    <li><a href="adminhome.php?id=<?php echo htmlspecialchars($admin_id); ?>">Dashboard</a></li>
                    <li><a href="adminorderlist.php?id=<?php echo htmlspecialchars($admin_id); ?>">Order List</a></li>
                    <li class="active"><a href="adminmessage.php?id=<?php echo htmlspecialchars($admin_id); ?>">Messages</a></li>
                    <li class="section-title">USER</li>
                    <li><a href="admincustlist.php?id=<?php echo htmlspecialchars($admin_id); ?>">Customer</a></li>
                    <li><a href="adminpenyediagedung.php?id=<?php echo htmlspecialchars($admin_id); ?>">Provider</a></li>
    <!--
                    <li class="section-title">VERIFICATIONS</li>
                    <li><a href="adminverifpayment.php?id=<?php echo htmlspecialchars($admin_id); ?>">Payments</a></li>
    -->         
                </ul>
            </nav>
            <div class="settings">
                <a href="#">Settings</a>
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

            <div class="messages-section">
                <aside class="messages-sidebar">
                    <form action="adminmessage.php" method="post">
                        <button type="submit" name="userType" value="customer" class="send-messages">Customer</button>
                        <button type="submit" name="userType" value="provider" class="send-messages">Provider</button>
                    </form>
                </aside>
                <div class="messages-content">
                    <div class="messages-header">
                        <input type="search" placeholder="Search Inbox">
                    </div>
                    <div class="message-list">
                        <?php
                        // Database connection
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "enchanted_edifice";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $userType = isset($_POST['userType']) ? $_POST['userType'] : 'customer';
                        if ($userType == 'customer') {
                            $sql = "SELECT c.nama AS name, m.isi_pesan AS message, m.created_at AS time FROM message_customer m JOIN custommer c ON m.id_customer = c.id";
                        } else {
                            $sql = "SELECT p.nama AS name, m.isi_pesan AS message, m.created_at AS time FROM message_penyediagedung m JOIN penyedia_gedung p ON m.id_penyediagedung = p.id";
                        }

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="message-item">';
                                echo '<input type="checkbox">';
                                echo '<span class="star">⭐</span>';
                                echo '<span class="name">' . htmlspecialchars($row['name']) . '</span>';
                                echo '<span class="message">' . htmlspecialchars($row['message']) . '</span>';
                                echo '<span class="time">' . htmlspecialchars($row['time']) . '</span>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>No messages found.</p>';
                        }

                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
