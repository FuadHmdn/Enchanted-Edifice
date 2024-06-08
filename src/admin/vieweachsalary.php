<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enchanted_edifice";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// SQL query untuk mendapatkan data dari tabel salary_penyediagedung
$sql = "SELECT penyedia_gedung.username, penyedia_gedung.email, salary_penyediagedung.salary, salary_penyediagedung.date
        FROM salary_penyediagedung
        JOIN penyedia_gedung ON salary_penyediagedung.penyedia_gedung_id = penyedia_gedung.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'><tr><th>Username</th><th>Email</th><th>Salary</th><th>Date</th></tr>";
  // Output data dari setiap baris
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td><td>" . $row["salary"]. "</td><td>" . $row["date"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Salary</title>
</head>
<body>
    <h1>Salary History</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Amount After Tax</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['amount']}</td>
                            <td>{$row['amount_after_tax']}</td>
                            <td>{$row['date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No salary records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Add New Salary</h2>
    <form method="post">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" required>
        <button type="submit">Add Salary</button>
    </form>
</body>
</html>
