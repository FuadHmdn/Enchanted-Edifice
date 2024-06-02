<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Gedung Indonesia</title>
    <style>
        body {
            background-color: #F3F4Fdf1;
        }
        .container-custom {
            background-color: #E2E9F8;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            padding: 40px;
        }
        .header-image img {
            width: 100%;
            height: auto;
            max-height: 400px;
            border-radius: 15px;
        }
        .section-title {
            font-family: 'Lato', sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .section-subtitle {
            font-family: 'Lato', sans-serif;
            font-size: 18px;
            color: #555;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .facility-icon {
            width: 60px;
            height: 60px;
        }
        .facility-description {
            font-family: 'Lato', sans-serif;
            font-size: 14px;
            color: #333;
        }
        .map-container {
            margin-top: 40px;
            text-align: center;
            height: 500px;
        }
        .price-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .price-box div {
            font-family: 'Lato', sans-serif;
            font-size: 18px;
            color: #333;
        }
        .price-box h3 {
            font-family: 'Lato', sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .btn-custom {
            border-radius: 50px;
        }
        .facilities-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }
        .facilities-list {
            list-style: none;
            padding: 0;
        }
        .facilities-list li {
            margin-bottom: 10px;
            font-family: 'Lato', sans-serif;
            font-size: 16px;
            color: #333;
        }
        .contact-host {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .contact-host i {
            font-size: 24px;
            margin-right: 10px;
            color: #333;
        }
        .contact-host span {
            font-family: 'Lato', sans-serif;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Header Image -->
        <div class="header-image mb-4">
            <img src="https://assets.bmdstatic.com/web/image?model=product.product&field=image_1024&id=78413&unique=0f81c26" alt="Gedung Indonesia">
        </div>

        <!-- Apartment Description -->
        <div class="container-custom">
            <h2 class="section-title">Gedung Indonesia</h2>
            <p class="section-subtitle">★ New To Sender  <a href="#">(999+ reviews)</a></p>
            <p>Jakarta</p>
            <p>Selamat datang di Gedung Indonesia, ikon baru kebanggaan Jakarta yang menghadirkan kemewahan dan kenyamanan di tengah hiruk-pikuk ibu kota. Dengan desain arsitektur yang megah, setiap ruang apartemen kami dirancang untuk menyatu dengan sempurna antara kemewahan dan kepraktisan.</p>
            <p>Mulai dari fasilitas mewah hingga detail-detail yang terbaik, Apartemen Indonesia memberikan pengalaman hunian yang tak tertandingi. Dari lounge pribadi yang dilengkapi dengan pemandangan kota yang memukau hingga kolam renang infinity yang menawarkan suasana santai, kami hadir untuk memenuhi segala kebutuhan gaya hidup modern Anda.</p>

            <h3 class="section-title mt-4">Atur Jadwal mu disini..</h3>
            <div class="price-box">
                <div>
                    <button class="btn btn-outline-secondary btn-custom"><i class="fa fa-calendar"></i> Check-in</button>
                    <button class="btn btn-outline-secondary btn-custom"><i class="fa fa-calendar"></i> Check-out</button>
                </div>
                <h3>600.000K</h3>
                <button class="btn btn-primary btn-custom">Reserve Now</button>
            </div>
        </div>

        <!-- Facilities Section -->
        <div class="container-custom">
            <div class="facilities-section">
                <div>
                    <h3 class="section-title">Fasilitas Teratas</h3>
                    <ul class="facilities-list">
                        <li><img src="../offers/image/PemanasRuangan.png" alt="Facility 1" class="facility-icon"> Pemanas ruangan</li>
                        <li><img src="../offers/image/AC.png" alt="Facility 2" class="facility-icon"> Ruangan Ber AC</li>
                        <li><img src="../offers/image/Elevator.png" alt="Facility 3" class="facility-icon"> Elevator</li>
                        <li><img src="../offers/image/Layanan.png" alt="Facility 4" class="facility-icon"> Layanan Tiap Saat</li>
                        <li><a href="#">Lihat semua fasilitas</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="section-title">The Sonder standard</h3>
                    <ul class="facilities-list">
                        <li><img src="../offers/image/Password.png" alt="Facility 5" class="facility-icon"> Chek-in Password</li>
                        <li><img src="../offers/image/Wifi.png" alt="Facility 6" class="facility-icon"> WIFI Cepat</li>
                        <li><img src="../offers/image/Kebersihan.png" alt="Facility 7" class="facility-icon"> Kebersihan Profesional</li>
                        <li><img src="../offers/image/Perlengkapan.png" alt="Facility 8" class="facility-icon"> Perlengkapan Lengkap</li>
                    </ul>
                </div>
                <div class="contact-host">
                    <i class="fa fa-phone"></i>
                    <span>(+62 ) 123 456 789</span>
                </div>
            </div>
        </div>

        <!-- Location Map -->
        <div class="container-custom">
            <h3 class="section-title">Peta Lokasi</h3>
            <div class="map-container">
                <iframe src="https://maps.google.com/maps?output=embed&q=Jakarta&z=13&t=m" style="width: 100%; height: 100%; border-radius: 15px;"></iframe>
            </div>
        </div>
    </div>
</body>
</html>
