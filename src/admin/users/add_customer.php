<?php
session_start();
require_once('../../database/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = isset($_POST['username']) ? mysqli_real_escape_string($connection, $_POST['username']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $terms = isset($_POST['terms']) ? $_POST['terms'] : '';
    $photo = isset($_FILES['photo']) ? $_FILES['photo'] : '';

    // Validasi data
    if (empty($name) || empty($email) || empty($password) || empty($terms) || empty($photo)) {
        echo "<script>alert('Semua field harus diisi.'); window.location.href = '../../../users/add_customer.php';</script>";
        exit;
    }

    // Periksa apakah email sudah ada di database
    $emailCheckQuery = "SELECT email FROM custommer WHERE email = '$email'";
    $checkResult = mysqli_query($connection, $emailCheckQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Email sudah terdaftar.'); window.location.href = '../../login/user/register/user/index.html';</script>";
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Proses upload foto
    $target_dir = "C:/xampp/htdocs/PemWeb/Enchanted-Edifice/src/login/user/res/customer/";
    // Cek apakah direktori tujuan ada, jika tidak, buat direktori tersebut
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File bukan gambar.'); window.location.href = 'add_customer.php';</script>";
        exit;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('File foto sudah ada.'); window.location.href = 'add_customer.php';</script>";
        exit;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 5000000) { // 5MB max
        echo "<script>alert('Ukuran file foto terlalu besar.'); window.location.href = 'add_customer.php';</script>";
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.'); window.location.href = 'add_customer.php';</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $photo = basename($_FILES["photo"]["name"]);
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengupload foto.'); window.location.href = 'add_customer.php';</script>";
        exit;
    }

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO custommer (username, email, password, photo) VALUES ('$name', '$email', '$hashedPassword', '$photo')";

    if (mysqli_query($connection, $sql)) {
        // Registrasi berhasil, tampilkan popup
        echo "<script>alert('Berhasil tambah Customer!'); window.location.href = 'admincustlist.php';</script>";
        exit;
    } else {
        // Tampilkan error query jika gagal
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Tutup koneksi
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 500px;
            max-width: 100%;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input[type="text"], .form-group input[type="email"], .form-group input[type="password"], .form-group input[type="file"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input[type="file"] {
            padding: 3px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #1595eb;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #0f7bb5;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #1595eb;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Customer</h2>
        <form action="add_customer.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" id="photo" required>
            </div>
            <div class="form-group">
                <label for="terms">Terms and Conditions:</label>
                <input type="checkbox" name="terms" id="terms" required> Agree to terms and conditions
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Add Customer</button>
            </div>
        </form>
        <a href="admincustlist.php?id=<?php echo $adminId; ?>" class="back-link">Back to Customer List</a>
    </div>
</body>
</html>
