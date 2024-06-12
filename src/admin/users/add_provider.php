<?php
session_start();
require_once('../../database/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $bvn = isset($_POST['bvn']) ? mysqli_real_escape_string($connection, $_POST['bvn']) : '';
    $name = isset($_POST['username']) ? mysqli_real_escape_string($connection, $_POST['username']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $terms = isset($_POST['terms']) ? $_POST['terms'] : '';
    $photo = isset($_FILES['photo']) ? $_FILES['photo'] : '';
    $legal_document = isset($_FILES['legal_document']) ? $_FILES['legal_document'] : '';

    // Validasi data
    if (empty($bvn) || empty($name) || empty($email) || empty($password) || empty($terms) || empty($photo) || empty($legal_document)) {
        echo "<script>alert('Semua field harus diisi.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    // Periksa apakah email sudah ada di database
    $emailCheckQuery = "SELECT email FROM penyedia_gedung WHERE email = '$email'";
    $checkResult = mysqli_query($connection, $emailCheckQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Email sudah terdaftar.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Proses upload foto
    $target_dir = "C:/xampp/htdocs/PemWeb/Enchanted-Edifice/src/login/user/res/penyedia_gedung/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File bukan gambar.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>alert('File foto sudah ada.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 5000000) { // 5MB max
        echo "<script>alert('Ukuran file foto terlalu besar.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $photo = basename($_FILES["photo"]["name"]);
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengupload foto.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    // Proses upload dokumen legalitas
    $target_dir_document = "C:/xampp/htdocs/PemWeb/Enchanted-Edifice/src/login/user/res/doclegalitas/";
    $target_file_document = $target_dir_document . basename($_FILES["legal_document"]["name"]);
    $documentFileType = strtolower(pathinfo($target_file_document, PATHINFO_EXTENSION));

    // Validasi dokumen
    if ($documentFileType != "pdf") {
        echo "<script>alert('Hanya file PDF yang diperbolehkan.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["legal_document"]["tmp_name"], $target_file_document)) {
        $legal_document = basename($_FILES["legal_document"]["name"]);
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengupload dokumen.'); window.location.href = 'add_provider.php';</script>";
        exit;
    }

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO penyedia_gedung (bvn, username, email, password, photo, legalitas) VALUES ('$bvn','$name', '$email', '$hashedPassword', '$photo', '$legal_document')";

    if (mysqli_query($connection, $sql)) {
        // Git commands to add, commit and push the uploaded file to the GitHub repository
        shell_exec("cd C:/xampp/htdocs/PemWeb/Enchanted-Edifice/src/login/user/res/penyedia_gedung/ && git add $photo && git commit -m 'Add new photo $photo' && git push origin main");
        shell_exec("cd C:/xampp/htdocs/PemWeb/Enchanted-Edifice/src/login/user/res/doclegalitas/ && git add $legal_document && git commit -m 'Add new document $legal_document' && git push origin main");
        
        // Registrasi berhasil, tampilkan popup
        echo "<script>alert('Registration successful! You can log in once your account is verified. Estimated verification time: five minutes to one hour.'); window.location.href = 'adminpenyediagedung.php';</script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Provider</title>
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="file"] {
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
        <h2>Register Provider</h2>
        <form action="add_provider.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="bvn">Bank Verification Number (BVN):</label>
                <input type="text" name="bvn" id="bvn" required>
            </div>
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
                <label for="legal_document">Legal Document (PDF):</label>
                <input type="file" name="legal_document" id="legal_document" accept=".pdf" required>
            </div>
            <div class="form-group">
                <input type="checkbox" name="terms" id="terms" required>
                <label for="terms">I agree to terms & conditions</label>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Register</button>
            </div>
        </form>
        <a href="admincustlist.php?id=<?php echo $adminId; ?>" class="back-link">Back to Customer List</a>
    </div>
</body>

</html>
