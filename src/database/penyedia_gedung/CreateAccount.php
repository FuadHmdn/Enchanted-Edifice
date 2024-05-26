<?php

require_once ('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $bvn = $_POST['bvn'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $terms = isset($_POST['terms']) ? $_POST['terms'] : '';

    // Validasi data
    if ( empty($bvn) || empty($name) || empty($email) || empty($password) || empty($terms)) {
        echo "<script>alert('Semua field harus diisi.'); window.location.href = '../../login/user/register/penyediaGedung/index.html';</script>";
    }

    // Periksa apakah email sudah ada di database
    $emailCheckQuery = "SELECT email FROM penyedia_gedung WHERE email = '$email'";
    $checkResult = mysqli_query($connection, $emailCheckQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Email sudah terdaftar.'); window.location.href = '../../login/user/register/penyediaGedung/index.html';</script>";
        exit;
        
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO penyedia_gedung (bvn, username, email, password) VALUES ('$bvn','$name', '$email', '$hashedPassword')";

    if (mysqli_query($connection, $sql)) {
        // Registrasi berhasil, tampilkan popup
        echo "<script>alert('Registrasi berhasil!'); window.location.href = '../../login/user/login/PenyediaGedungLogin/index.html';</script>";
        exit;
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>