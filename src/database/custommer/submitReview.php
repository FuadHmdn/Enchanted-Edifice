<?php
require_once('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_produk = intval($_POST['id_produk']);
    $id_custommer = intval($_POST['id_custommer']);
    $message = $_POST['message'];
    $rating = intval($_POST['rating']);

    // Cek apakah id_produk ada di tabel produk dan ambil id_penyedia_gedung
    $stmt = $connection->prepare("SELECT id_penyedia_gedung FROM produk WHERE id_produk = ?");
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_penyedia_gedung);
        $stmt->fetch();
        $stmt->close();

        // Insert review ke tabel review
        $stmt = $connection->prepare("INSERT INTO review (id_produk, id_custommer, id_penyedia_gedung, rating, komentar) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $id_produk, $id_custommer, $id_penyedia_gedung, $rating, $message);

        if ($stmt->execute()) {
            echo json_encode(array('message' => 'Review Telah Ditambahkan!'));
        } else {
            echo json_encode(array('message' => 'Error: ' . $stmt->error));
        }

        $stmt->close();
    } else {
        echo json_encode(array('message' => 'Produk tidak ditemukan!'));
    }

    $connection->close();
} else {
    echo json_encode(array('message' => 'Invalid request method'));
}
?>
