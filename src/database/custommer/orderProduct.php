<?php
require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_produk = $_POST['id_produk'];
    $checkinValue = $_POST['checkinValue'];
    $checkoutValue = $_POST['checkoutValue'];
    $harga = $_POST['harga'];
    $paket = $_POST['paket'];
    $total = $_POST['total'];
    $id_paket = $_POST['id_paket'];
    $complete = 0; // false
    $status_payment = "awaiting";
    $tipe_pembayaran = $_POST['tipe_pembayaran'];

    // Menyiapkan rentang tanggal
    $start_date = strtotime($checkinValue);
    $end_date = strtotime($checkoutValue);

    // Query untuk memeriksa apakah ada pesanan dalam rentang tanggal yang sama
    $check_query = "SELECT * FROM order_cust WHERE id_produk = '$id_produk' AND ((tanggal_masuk BETWEEN '$checkinValue' AND '$checkoutValue') OR (tanggal_keluar BETWEEN '$checkinValue' AND '$checkoutValue'))";

    $result = mysqli_query($connection, $check_query);

    // Jika ada pesanan dalam rentang tanggal yang sama, berikan pesan peringatan
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('Maaf, Anda tidak dapat memesan pada tanggal tersebut. Silakan pilih tanggal lain.');
                window.location.href = '../../user/orders/index.php?id=$id_pelanggan';
              </script>";
        exit(); // Menghentikan eksekusi skrip
    }

    // Jika tidak ada pesanan dalam rentang tanggal yang sama, lanjutkan dengan proses pemesanan
    $target_dir = "../BuktiPembayaran/";
    $target_file = $target_dir . basename($_FILES["buktiPembayaran"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an actual image or fake image
    $check = getimagesize($_FILES["buktiPembayaran"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["buktiPembayaran"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["buktiPembayaran"]["tmp_name"], $target_file)) {
            // File is uploaded successfully
            $buktiPembayaran = $target_file;

            $sql = "INSERT INTO order_cust (id_custommer, id_produk, tanggal_keluar, tanggal_masuk, complete, status_payment, tipe_pembayaran,  bukti_pembayaran, id_paket) 
                    VALUES ('$id_pelanggan', '$id_produk', '$checkinValue', '$checkoutValue', '$complete', '$status_payment', '$tipe_pembayaran', '$buktiPembayaran', '$id_paket')";

            if (mysqli_query($connection, $sql)) {
                echo "<script>
                alert('Berhasil melakukan pemesanan..');
                window.location.href = '../../user/orders/index.php?id=$id_pelanggan';
              </script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    mysqli_close($connection);
}
