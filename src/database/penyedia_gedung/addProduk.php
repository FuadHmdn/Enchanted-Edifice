<?php
require_once('../koneksi.php'); // Sesuaikan dengan path dan nama file koneksi

// Pastikan $_POST['id_penyedia_gedung'] ada dan aman untuk digunakan
$id_penyedia_gedung = isset($_POST['id_penyedia_gedung']) ? $_POST['id_penyedia_gedung'] : '';
$judul = isset($_POST['judul']) ? $_POST['judul'] : '';
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
$deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
$panjang = isset($_POST['panjang']) ? $_POST['panjang'] : '';
$lebar = isset($_POST['lebar']) ? $_POST['lebar'] : '';
$tinggi = isset($_POST['tinggi']) ? $_POST['tinggi'] : '';
$harga = isset($_POST['harga']) ? $_POST['harga'] : '';
$gambar = ''; // Variabel untuk menyimpan path dan nama gambar
$kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
$kapasitas = isset($_POST['kapasitas']) ? $_POST['kapasitas'] : '';
$audiovisualEquipment = isset($_POST['AudiovisualEquipment']) ? $_POST['AudiovisualEquipment'] : '';
$cateringService = isset($_POST['cateringService']) ? $_POST['cateringService'] : '';
$outdoorSpace = isset($_POST['outdoorSpace']) ? $_POST['outdoorSpace'] : '';
$decoration = isset($_POST['decoration']) ? $_POST['decoration'] : '';
$photography = isset($_POST['Photography']) ? $_POST['Photography'] : '';
$others = isset($_POST['others']) ? $_POST['others'] : '';

// Proses upload gambar jika diperlukan
if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
    // Lokasi penyimpanan file
    $target_dir = "../../penyediaGedung/image/gedung/"; // Sesuaikan dengan folder penyimpanan gambar
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["gambar"]["size"] > 25000000) { // Max size 25Mb
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Simpan path lengkap dan nama file gambar ke dalam variabel $gambar
            $gambar = $target_file;

            // Setelah berhasil diunggah, masukkan data ke dalam database
            $sql = "INSERT INTO produk (id_penyedia_gedung, judul, alamat, deskripsi, panjang, lebar, tinggi, harga, gambar, kategori, kapasitas, AudiovisualEquipment, cateringService, outdoorSpace, decoration, Photography, others)
                    VALUES ('$id_penyedia_gedung', '$judul', '$alamat', '$deskripsi', '$panjang', '$lebar', '$tinggi', '$harga', '$gambar', '$kategori', '$kapasitas', '$audiovisualEquipment', '$cateringService', '$outdoorSpace', '$decoration', '$photography', '$others')";
            
            if ($connection->query($sql) === TRUE) {
                echo "<script>alert('Data berhasil ditambahkan.'); window.location.href = '../../penyediaGedung/offer/index5.php?id=$id_penyedia_gedung';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$connection->close();
?>
