<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'enchanted_edifice');

$connection = mysqli_connect(HOST, USER, PASS, DB);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// Ambil ID penyedia gedung dari URL
$id_penyedia_gedung = isset($_GET['id']) ? $_GET['id'] : die("Provider ID not specified");

// Query untuk mengambil detail gaji penyedia gedung
$sql = "SELECT s.id_salary, s.id_order, s.id_admin, s.nominal, s.bukti_transfer, s.id_penyedia_gedung, o.tanggal_masuk, o.tanggal_keluar
        FROM salary s
        JOIN order_cust o ON s.id_order = o.id_order
        WHERE s.id_penyedia_gedung = $id_penyedia_gedung";

$result = mysqli_query($connection, $sql);

// Mengambil username penyedia gedung
$provider_sql = "SELECT username FROM penyedia_gedung WHERE id = $id_penyedia_gedung";
$provider_result = mysqli_query($connection, $provider_sql);
$provider = mysqli_fetch_assoc($provider_result);
$username = $provider['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Salary Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<a href="adminpenyediagedung.php" class="back-button">←</a>
    <div class="container">
        <h2>Salary Details for <?php echo htmlspecialchars($username); ?></h2>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID Salary</th>
                        <th>ID Order</th>
                        <th>ID Admin</th>
                        <th>Nominal</th>
                        <th>Bukti Transfer</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id_salary']); ?></td>
                            <td><?php echo htmlspecialchars($row['id_order']); ?></td>
                            <td><?php echo htmlspecialchars($row['id_admin']); ?></td>
                            <td><?php echo htmlspecialchars($row['nominal']); ?></td>
                            <td>
                                <?php if (!empty($row['bukti_transfer'])): ?>
                                    <a href="https://localhost/PemWeb/Enchanted-Edifice/src/database/BuktiTransferSalary/<?php echo htmlspecialchars($row['bukti_transfer']); ?>" target="_blank">View</a>
                                <?php else: ?>
                                    No Proof
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['tanggal_masuk']); ?></td>
                            <td><?php echo htmlspecialchars($row['tanggal_keluar']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No salary records found for this provider.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
mysqli_close($connection);
?>
