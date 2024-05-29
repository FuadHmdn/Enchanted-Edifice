# Enchanted-Edifice

Enchanted-Edifice adalah aplikasi web yang dirancang untuk pemesanan dan penyewaan gedung. Platform ini menyediakan antarmuka yang intuitif bagi pelanggan untuk melihat penawaran yang tersedia, mengelola pesanan mereka, dan menavigasi melalui halaman beranda yang ramah pengguna.

## Fitur

- **Sewa Gedung**: Pengguna dapat melihat dan menyewa gedung berdasarkan ketersediaan.
- **Beranda Pelanggan**: Halaman beranda yang ramah pengguna dengan navigasi yang mudah.
- **Penawaran**: Halaman khusus untuk melihat semua penawaran sewa yang tersedia.
- **Pesanan**: Mengelola dan meninjau pesanan sewa Anda.

## Memulai

### Prasyarat

- [XAMPP](https://www.apachefriends.org/index.html) atau server lokal lainnya dengan dukungan PHP dan MySQL.
- Browser web (misalnya, Chrome, Firefox).

### Instalasi

1. **Klon repositori**:
    ```bash
    git clone https://github.com/yourusername/Enchanted-Edifice.git
    ```

2. **Pindah ke direktori proyek**:
    ```bash
    cd Enchanted-Edifice
    ```

3. **Mulai server lokal Anda** (misalnya, XAMPP).

4. **Tempatkan proyek di direktori root server** (misalnya, `C:\xampp\htdocs\Enchanted-Edifice` untuk XAMPP).

5. **Impor database**:
    - Buka PHPMyAdmin dengan mengunjungi `http://localhost/phpmyadmin`.
    - Buat database baru dengan nama `enchanted_edifice`.
    - Impor file `enchanted_edifice.sql` yang terletak di direktori `database` dari proyek.

6. **Konfigurasikan koneksi database**:
    - Buka `config.php` yang terletak di direktori `src/config`.
    - Perbarui parameter koneksi database:
    ```php
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
    ?>
    ```

7. **Jalankan aplikasi**:
    - Buka browser web Anda dan navigasikan ke `http://localhost/Enchanted-Edifice`.

## Struktur Proyek
