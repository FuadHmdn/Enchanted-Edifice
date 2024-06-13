<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Home Enchanted Edifice</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">


    <style>
        body {
            background-color: #F3F4F7;
        }

        @font-face {
            font-family: 'Abril Fatface';
            src: url('/res/Abril_Fatface/AbrilFatface-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }

        .nav-link {
            font-family: 'Lato', sans-serif;
            font-weight: bold;
            font-size: 16px;
            margin-right: 20px;
        }

        .rectangle {
            max-width: 100%;
            height: 400px;
            background-color: #C2D4FB;
            border-radius: 20px;
            margin-bottom: -280px;
        }

        .rectangle2 {
            flex: 1 1 calc(25% - 16px);
            margin: 8px;
            padding: 16px;
            box-sizing: border-box;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.589);
        }

        .rectangle2 img {
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .rectangle_group {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 20px;
            position: relative;
            z-index: 2;
        }

        .bg-home {
            max-width: 100%;
            height: auto;
            padding-bottom: 120px;
            background-color: #E2E9F8;
        }

        .discount {
            width: 200px;
            height: 120px;
            background-color: #ffffff;
            border-radius: 25px;
            position: absolute;
            z-index: 1;
            top: 405px;
            left: 170px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.39);
        }

        .img-terbaik img {
            position: absolute;
            padding-top: 60px;
            padding-left: 100px;
            top: 0;
            left: 0;
            width: 430px;
            height: auto;

        }

        .detail-terbaik {
            position: relative;
            padding-top: 105px;
            padding-left: 650px;
        }

        .lihat-selengkapnya {
            width: 260px;
            height: 50px;
            background-color: #ffffff;
            border-radius: 25px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.171);
        }

        .layanan-kami {
            position: relative;
            margin-left: 46px;
            margin-top: 46px;
        }

        .hotel-image img {
            margin-top: 15px;
            padding-right: 5px;
        }

        div.scrollmenu {
            overflow: auto;
            white-space: nowrap;
            padding: 10px;
        }

        div.scrollmenu item {
            padding: 10px;
        }

        .manuDropdown{
            margin-right: 30px;
        }

        .btn-home{
            width: 150px;
            background-color: #404a68;
        }
    </style>

</head>

<body>

    <!-- NAVIGASI -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="position: sticky; top: 0; z-index: 1000;">
        <div class="container-fluid">

            <a class="navbar-brand" href="/home">
                <img src="../../res/logo_and_name.png" style="width: 210px; height: auto; margin-left: 46px;" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto" style="margin-right: 46px;">
                    <div class="dropdown manuDropdown">
                        <button class="btn btn-secondary dropdown-toggle btn-home" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </button>
                        
                            <a class="dropdown-item" href="../orders/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">Order</a>
                            <a class="dropdown-item" href="../contact/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">Contact Us</a>
                            <a class="dropdown-item" href="../about/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">About</a>
                            <a class="dropdown-item" href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">Home</a>
                        
                    </div>
                    <li class="nav-item">
                        <button onclick="profileClick()" class="btn btn-outline-secondary" style="border-radius: 15px;">
                            <span class="d-inline d-sm-none">☰</span>
                            <span class="d-none d-sm-inline">
                                <img src="../../res/profile_vector.png" alt="profile">
                            </span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HOME IMAGE -->
    <div style="margin-left: 46px; margin-right: 46px; width: auto; height: auto; text-align: center; position: relative; margin-top: 30px;">
        <img src="../home/res/home-image.jpg" alt="Home Image" style="max-width: 100%;">
        <div class="image-text" style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center;">
            <p style="font-family: 'Lato', sans-serif; font-size: 2.625rem; color: #ffffff; display: inline-block;">
                Rencanakan Acara Anda dengan Mudah</p>
            <p style="font-family: 'Lato', sans-serif; font-size: 1.125rem; color: #ffffff; display: inline-block;">
                Dengan
                ruang yang luas dan fleksibel, Anda dapat mewujudkan segala jenis acara yang Anda impikan.</p>
        </div>
        <div class="input-group mb-3" style="position: absolute; top: 65%; left: 50%; transform: translate(-50%, -50%); width: 80%;">
            <input type="text" class="form-control" placeholder="Insert your post code or address here" aria-label="Insert your post code or address here" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>
    </div>

    <!-- SERVIce -->
    <div class="home_services" style="margin-left: 46px; margin-right: 46px; margin-top: 120px; width: auto; text-align: center; position: relative;">
        <section class="rectangle">
            <div style="position: absolute; top: 60px; left: 20px; font-size: 16px; font-weight: bold; color: #4D5774;">
                Services</div>
            <div style="position: absolute; top: 80px; left: 20px; font-size: 32px; font-weight: bold; color: #646d8a;">
                What do we offer</div>
        </section>

        <div class="rectangle_group">
            <!-- 1 -->
            <section class="box rectangle2">
                <img src="../home/res/Icon-Communication.png" alt="Communication">
                <div style="font-family: 'Lato', sans-serif; font-weight: bold; font-size: 18px; color: #8692A6;">
                    Pengalaman yang<br>Dihargai
                </div>
                <p style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #3333339f; text-align: start;">
                    Kami bangga memberikan pengalaman acara yang tidak terlupakan bagi setiap tamu. Dari detail terkecil
                    hingga layanan terbaik, kami berkomitmen untuk membuat acara Anda menjadi sukses.
                </p>
            </section>
            <!-- 2 -->
            <section class="box rectangle2">
                <img src="../home/res/Icon-Security.png" alt="Security">
                <div style="font-family: 'Lato', sans-serif; font-weight: bold; font-size: 18px; color: #8692A6;">
                    Kebersihan dan Keselamatan<br>Terjamin
                </div>
                <div>
                    <p style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #3333339f; text-align: start;">
                        Kami mengutamakan kebersihan dan keselamatan tamu kami. Setiap ruang acara dibersihkan secara
                        menyeluruh dan dilengkapi dengan peralatan keselamatan terbaru.
                    </p>
                </div>
            </section>
            <!-- 3 -->
            <section class="box rectangle2">
                <img src="../home/res/Icon-Idea.png" alt="Idea">
                <div style="font-family: 'Lato', sans-serif; font-weight: bold; font-size: 18px; color: #8692A6;">
                    Fasilitas Modern <br> <br>
                </div>
                <div>
                    <p style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #3333339f; text-align: start;">
                        Nikmati fasilitas modern seperti sistem soundsystem terbaru, pencahayaan yang dapat disesuaikan,
                        dan akses internet super cepat untuk memastikan acara Anda berjalan dengan lancar.
                    </p>
                </div>
            </section>
            <!-- 4 -->
            <section class="box rectangle2">
                <img src="../home/res/Icon-Persons.png" alt="Persons">
                <div style="font-family: 'Lato', sans-serif; font-weight: bold; font-size: 18px; color: #8692A6;">
                    Fleksibilitas dan<br>Kepuasan Pelanggan
                </div>
                <div>
                    <p style="font-family: 'Roboto', sans-serif; font-size: 16px; color: #3333339f; text-align: start;">
                        Kami siap untuk menyesuaikan ruang dan layanan kami sesuai dengan kebutuhan dan keinginan Anda.
                        Kepuasan pelanggan adalah prioritas utama kami.
                    </p>
                </div>
            </section>
        </div>
    </div>

    <!-- JUDUL -->
    <div style="display: flex; justify-content: center; margin-top: 120px; color: #646d8a;">
        <h3 style="font-weight: bold; font-size: 32px; font-family: 'Lato', sans-serif;">Temukan Ruang Acara Impian Anda
        </h3>
    </div>

    <!-- LAYANAN TERBAIK -->
    <div style="margin-top: 40px;">
        <section class="bg-home" style="max-width: 100%; box-sizing: border-box;">
            <div class="img-terbaik" style="position: relative; max-width: 100%; display: flex; flex-wrap: wrap;
            justify-content: center;">
                <section class="discount">
                    <div>
                        <p style="display: flex; justify-content: center; font-family: 'Abril Fatface', serif; font-weight: bolder; color: #404a68; font-size: 50px; margin: 0;">
                            99%
                        </p>
                        <p style="font-weight: bold; font-family: 'Lato', sans-serif; display: flex; justify-content: center; font-size: 21px; margin: 0; color: #4D5774;">
                            Customer Suka
                        </p>
                    </div>
                </section>
                <div>
                    <img src="../home/res/terbaik1.png" alt="terbaik">
                    <img src="../home/res/terbaik2.png" alt="terbaik" style="margin-top: 85px; margin-left: 150px; height: 520px; width: 450px;">
                </div>
            </div>
            <div class="detail-terbaik">
                <p style="font-family: 'Abril Fatface', serif; font-size: 15px; color: #646464;">LAYANAN TERBAIK</p>
                <p style="font-family: 'Abril Fatface', serif; font-size: 45px; font-weight: 600; color: #2D2D2D;">
                    Kami Berikan
                    Gedung dan<br>Terbaik
                </p>
                <p style="font-family: 'Abril Fatface', serif; font-size: 18px; color: #6E6E6E;">Memberikan layanan
                    terbaik sampai anda mendapatkan Gedung<br>sesuai
                    dengan impian
                </p>
                <div style="display: flex; align-items: center;">
                    <div style="flex-direction: column;">
                        <p style="font-family: 'Abril Fatface', serif; font-size: 21px; font-weight: 800;"><img class="award" src="../home/res/award.png" alt="award" style="width: 20px; height: auto;">
                            No.1 Layanan Sewa Gedung Terbaik Di Indonesia</p>
                        <p style="font-family: 'Abril Fatface', serif; font-size: 21px; font-weight: 800;"><img class="award" src="../home/res/calendar-days.png" alt="award" style="width: 20px; height: auto;">
                            15 Tahun Lebih Kami Bersedia Layani Anda</p>
                    </div>
                </div>
                <div>
                    <section class="lihat-selengkapnya">
                        <div style="display: flex; justify-content: center;">
                            <p style="font-family: 'Abril Fatface', serif; font-size: 15px; font-weight: 400; margin-top: 13px;">
                                LIHAT SELENGKAPNYA<img src="../home/res/arrow-right.png" alt="arrow" style="width: 15px; height: auto; margin-bottom: 5px; margin-left: 10px;"></p>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>

    <!-- Layanan Kami -->
    <div>
        <div class="layanan-kami">
            <div>
                <p style="font-size: 15px; color: #646464; font-weight: 500;">LAYANAN KAMI</p>
                <p style="font-family: 'Abril Fatface', serif; font-size: 45px; font-weight: 700; color: #2D2D2D; margin-top: 10px;">
                    Gedung impian dan ruangan<br>yang modern.</p>
            </div>
            <div style="display: flex; flex-direction: row;">
                <div style="margin-top: 30px; margin-left: 30px;">
                    <img src="../home/res/quote-left.png" alt="quote" style="width: 40px; height: auto; margin-bottom: 20px;">
                    <p style="font-family: 'Abril Fatface', serif; font-size: 22px; font-weight: 500;"><i>“Layanan
                            Gedung<br>paling terbaik di<br>Indonesia, suka<br>banget..”</i></p>
                    <p style="font-family: 'Abril Fatface', serif; font-size: 25px; font-weight: 900;">Najwa Shihab</p>
                </div>
                <div class="hotel-image" style="display: flex; flex-direction: row; margin-left: 90px;">
                    <img src="../home/res/hotel1.png" alt="hotel" style="width: 310px; height: auto;">
                    <img src="../home/res/hotel2.png" alt="hotel" style="width: 310px; height: auto;">
                    <img src="../home/res/hotel3.png" alt="hotel" style="width: 310px; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <div class="scrollmenu" style="display: flex; flex-direction: row; margin-top: 46px;">
        <p style="font-family: 'Abril Fatface', serif; font-size: 65px; margin-left: 45px;">Our <span style="font-weight: 900;">customers</span><br>think we’re<br>
            the best
        </p>
        <img class="item" src="../home/res/f2.png" alt="image" style="width: 415px; height: auto;">
        <img class="item" src="../home/res/f3.png" alt="image" style="width: 415px; height: auto;">
    </div>

    <!-- BOTTOM BAR -->
    <div style="display: flex; flex-direction: row; padding-right: 46px; padding-left: 46px; justify-content: space-between; padding-top: 30px; padding-bottom: 20px;">

        <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
            <img src="../../res/logo_and_name.png" style="width: 210px; height: auto;" alt="Logo">
            <p style="margin: 0; padding-left: 50px; font-size: 16px; font-family: 'Roboto', sans-serif; color: #545454; font-weight: bold;">
                Enchanting
                Events, Enchanted<br>Experiences!</p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
                Services</p>
            <p style="margin: 0;">Booking</p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
                About</p>
            <p style="margin: 0;">Our Story</p>
            <p style="margin: 0;">Blog</p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
                Follow Us
            </p>

            <div style="display: flex; flex-direction: row;">
                <img src="../../res/Facebook.png" alt="Facebook">
                <img src="../../res/Twitter.png" alt="Twitter">
                <img src="../../res/LinkedIn.png" alt="LinkedIn">
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function profileClick() {
            window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
        }
    </script>
</body>

</html>