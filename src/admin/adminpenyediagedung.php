<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Ambil data penyedia gedung
$sql = "SELECT * FROM penyedia_gedung";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyedia Gedung</title>
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
    h1 {
        padding: 20px;
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
                    <li class="active"><a href="adminpenyediagedung.php?id=<?php echo htmlspecialchars($admin_id); ?>">Provider</a></li>
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

            <h1>Penyedia Gedung</h1>
            <div class="customer-list">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $photo = $row['photo'];
                        echo "<div class='customer-card' onclick='viewProvider({$row['id']})'>
                                <div class='profile-pic'>";
                        if(isset($photo) && !empty($photo)) {
                            echo "<img src='/PemWeb/Enchanted-Edifice/src/login/user/res/penyedia_gedung/{$photo}' alt='Profile'>";
                        } else {
                            echo "<img src='/path/to/default-image.jpg' alt='No Photo'>";
                        }
                        echo "</div>
                                <h3>{$row['username']}</h3>
                                <p>{$row['email']}</p>
                                <button onclick='viewSalary(event, {$row['id']})'>View Salary</button>
                                <button onclick='deleteProvider(event, {$row['id']})'>Delete</button>
                            </div>";
                    }
                } else {
                    echo "<p>No providers found</p>";
                }
                ?>
            </div>
        </main>
    </div>

    <script>
        function viewProvider(id) {
            window.location.href = 'vieweachprovider.php?id=' + id;
        }

        function viewSalary(event, id) {
            event.stopPropagation();
            window.location.href = 'vieweachsalary.php?id=' + id;
        }

        

        function deleteProvider(event, userId) {
            event.stopPropagation();
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = "delete_penyediagedung.php?id=" + userId;
            }
        }
    </script>
</body>
</html>