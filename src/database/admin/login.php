<?php
require_once ('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi data
    if (empty($email) || empty($password)) {
        echo "<script>alert('Email dan password harus diisi.'); window.location.href = '../../login/user/login/admin/index.html';</script>";
        exit;
    }

    // Query untuk mengecek email dan password di database
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['admin_id'] = $user['id'];
            $adminId = $user['id'];
            echo "<script>alert('Login berhasil!'); window.location.href = '../../admin/adminhome.html?id=$adminId';</script>";
            exit;
        } else {
            // Password salah
            echo "<script>alert('Password salah. $password '); window.location.href = '../../login/user/login/admin/index.html';</script>";
            exit;
        }
    } else {
        // Email tidak ditemukan
        echo "<script>alert('Email tidak ditemukan.'); window.location.href = '../../login/user/login/admin/index.html';</script>";
        exit;
    }

    // Tutup koneksi
    mysqli_close($connection);
}
?>
