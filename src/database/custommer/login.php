<?php
require_once('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi data
    if (empty($email) || empty($password)) {
        echo "<script>alert('Email dan password harus diisi.'); window.location.href = '../../login/user/login/UserLogin/index.html';</script>";
        exit;
    }

    // Fungsi untuk verifikasi login
    function verify_login($connection, $table, $email, $password, $redirect_url)
    {
        $sql = "SELECT * FROM $table WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                // Login berhasil
                $_SESSION[$table . '_id'] = $user['id'];
                $userId = $user['id'];
                echo "<script>alert('Login berhasil!'); window.location.href = '$redirect_url?id=$userId';</script>";
                exit;
            } else {
                // Password salah
                echo "<script>alert('Password salah.'); window.location.href = '../../login/user/login/UserLogin/index.html';</script>";
                exit;
            }
        }
        return false;
    }

    // Cek login untuk masing-masing tabel
    $login_success = false;

    // Cek tabel admin
    if (verify_login($connection, 'admin', $email, $password, '../../admin/dashboard/adminhome.php')) {
        $login_success = true;
    }
    // Cek tabel penyedia gedung
    if (!$login_success && verify_login($connection, 'penyedia_gedung', $email, $password, '../../penyediaGedung/home/index.php')) {
        $login_success = true;
    }
    // Cek tabel custommer
    if (!$login_success && verify_login($connection, 'custommer', $email, $password, '../../user/home/index.php')) {
        $login_success = true;
    }

    if (!$login_success) {
        // Email tidak ditemukan di semua tabel
        echo "<script>alert('Email tidak ditemukan.'); window.location.href = '../../login/user/login/UserLogin/index.html';</script>";
    }

    // Tutup koneksi
    mysqli_close($connection);
}
