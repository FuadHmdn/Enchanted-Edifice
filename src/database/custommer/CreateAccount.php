<?php

require_once ('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $terms = isset($_POST['terms']) ? $_POST['terms'] : '';

    // Validasi data
    if (empty($name) || empty($email) || empty($password) || empty($terms)) {
        echo "<script>alert('Semua field harus diisi.'); window.location.href = '../../login/user/register/user/index.html';</script>";
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
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File bukan gambar.'); window.location.href = '../../login/user/register/user/index.html';</script>";
        exit;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('File foto sudah ada.'); window.location.href = '../../login/user/register/user/index.html';</script>";
        exit;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 5000000) { // 5MB max
        echo "<script>alert('Ukuran file foto terlalu besar.'); window.location.href = '../../login/user/register/user/index.html';</script>";
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.'); window.location.href = '../../login/user/register/user/index.html';</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $photo = basename($_FILES["photo"]["name"]);
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengupload foto.'); window.location.href = '../../login/user/register/user/index.html';</script>";
        exit;
    }

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO custommer (username, email, password, photo) VALUES ('$name', '$email', '$hashedPassword', '$photo')";

    if (mysqli_query($connection, $sql)) {
        // Registrasi berhasil, tampilkan popup
        echo "<script>alert('Registrasi berhasil!'); window.location.href = '../../login/user/login/userLogin/index.html';</script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
