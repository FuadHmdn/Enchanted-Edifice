<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Offers Enchanted Edifice</title>
    <style>
        @font-face {
            font-family: 'Abril Fatface';
            src: url('/res/Abril_Fatface/AbrilFatface-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }

        body {
            background-color: #F3F4F7;
        }

        .nav-link {
            font-family: 'Lato', sans-serif;
            font-weight: bold;
            font-size: 16px;
            margin-right: 20px;
        }

        .home_image img {
            max-width: 100%;
            height: auto;
            margin-top: 30px;
        }

        .line {
            width: 100%;
            height: 2px;
            background-color: #8692A6;
        }

        .bg-kategori {
            width: 650px;
            height: 80px;
            background-color: #E2E9F8;
            border-radius: 10px;
        }

        .daftar-hotel {
            width: 100%;
            height: auto;
            background-color: #E2E9F8;
        }

        .test {
            width: 800px;
            height: 315px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.397);
        }

        .bg-fitur {
            width: auto;
            height: 25px;
            background-color: #c9d5ee;
            border-radius: 15px;
        }

        .bg-fitur2 {
            width: auto;
            height: 25px;
            background-color: #c9d5ee;
            border-radius: 15px;
        }

        .special-offers-style {
            width: 300px;
            height: auto;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.397);
        }

        .modal {
            display: none;
            width: 600px;
            max-width: 100%;
            height: auto;
            max-height: 100%;
            position: fixed;
            z-index: 100;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 20px;
            box-shadow: 0 0 60px 10px rgba(0, 0, 0, 0.4);
        }

        .editModal {
            display: none;
            width: 600px;
            max-width: 100%;
            height: auto;
            max-height: 100%;
            position: fixed;
            z-index: 100;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 20px;
            box-shadow: 0 0 60px 10px rgba(0, 0, 0, 0.4);
        }

        .modalOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 50;
            background: rgba(0, 0, 0, 0.6);
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .editModal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .tombolapply {
            padding: 0px;
            width: 70px;
            height: 50px;
            font-size: 12px;
            background-color: white;
            border-radius: 10px;
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
                    <li class="nav-item">
                        <a class="nav-link"href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../offers/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #000000;">OFFERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../orders/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">ORDERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contact/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <button onclick="profileClick()" class="btn btn-outline-secondary" style="border-radius: 15px;">
                            <span class="d-inline d-sm-none">☰</span>
                            <i class="bi bi-person"></i>
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
    <div class="home_image" style="margin-left: 46px; margin-right: 46px; width: auto; text-align: center; position: relative;">
        <img src="../home/res/home-image.jpg" alt="Home Image" style="max-width: 100%;">
        <div class="image-text" style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center;">
            <p style="font-family: 'Lato', sans-serif; font-size: 42px; color: #ffffff; display: inline-block;">
                Rencanakan Acara Anda dengan Mudah</p>
            <p style="font-family: 'Lato', sans-serif; font-size: 18px; color: #ffffff; display: inline-block;">Dengan
                ruang yang luas dan fleksibel, Anda dapat mewujudkan segala jenis acara yang Anda impikan.</p>
        </div>
        <div class="input-group mb-3" style="position: absolute; top: 65%; left: 50%; transform: translate(-50%, -50%); width: 80%;">
            <input type="text" class="form-control" placeholder="Insert your post code or address here" aria-label="Insert your post code or address here" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>
    </div>

    <!-- LINE -->
    <div style="margin-left: 90px; margin-right: 90px; margin-top: 60px; margin-bottom: 0;">
        <section class="line">

        </section>
    </div>

    <!-- Temukan Ruang Acara Impian Anda -->

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 40px; margin-left: 46px; margin-right: 46px;">
        <p style="font-family: 'Lato', sans-serif; font-weight: bold; font-size: 30px; color: #8692A6;">Temukan Ruang Acara Impian Anda</p>
        <!-- KATEGORI GEDUNG -->
        <div class="bg-kategori" style="display: flex; flex-direction: row; margin-top: 0; justify-content: space-between; align-items: center; padding-left: 40px; padding-right: 40px; max-width: 100%;">
            <select id="kategoriValue" class="form-select" aria-label="Default select example" style="width: 250px; height: 50px;">
                <option selected disabled>Kategori</option>
                <option value="Home">Home</option>
                <option value="Ballroom">Ballroom</option>
                <option value="Meeting Room">Meeting Room</option>
                <option value="Outdoor Venue">Outdoor Venue</option>
                <option value="Banquet Hall">Banquet Hall</option>
                <option value="Conference Center">Conference Center</option>
                <option value="Auditorium">Auditorium</option>
                <option value="Cafe Restaurant">Cafe/Restaurant</option>
                <option value="Sports Facility">Sports Facility</option>
            </select>

            <select id="alamatValue" class="form-select" aria-label="Default select example" style="width: 250px; height: 50px;">
                <option selected disabled>Location</option>
                <option value="aceh">Aceh</option>
                <option value="bali">Bali</option>
                <option value="banten">Banten</option>
                <option value="bengkulu">Bengkulu</option>
                <option value="gorontalo">Gorontalo</option>
                <option value="jakarta">Jakarta</option>
                <option value="jambi">Jambi</option>
                <option value="west-java">West Java</option>
                <option value="central-java">Central Java</option>
                <option value="east-java">East Java</option>
                <option value="west-kalimantan">West Kalimantan</option>
                <option value="south-kalimantan">South Kalimantan</option>
                <option value="central-kalimantan">Central Kalimantan</option>
                <option value="east-kalimantan">East Kalimantan</option>
                <option value="north-kalimantan">North Kalimantan</option>
                <option value="bangka-belitung">Bangka Belitung</option>
                <option value="lampung">Lampung</option>
                <option value="maluku">Maluku</option>
                <option value="north-maluku">North Maluku</option>
                <option value="west-ntt">West Nusa Tenggara</option>
                <option value="east-ntt">East Nusa Tenggara</option>
                <option value="papua">Papua</option>
                <option value="west-papua">West Papua</option>
                <option value="riau">Riau</option>
                <option value="riau-islands">Riau Islands</option>
                <option value="west-sulawesi">West Sulawesi</option>
                <option value="south-sulawesi">South Sulawesi</option>
                <option value="central-sulawesi">Central Sulawesi</option>
                <option value="south-east-sulawesi">South East Sulawesi</option>
                <option value="north-sulawesi">North Sulawesi</option>
                <option value="west-sumatra">West Sumatra</option>
                <option value="south-sumatra">South Sumatra</option>
                <option value="north-sumatra">North Sumatra</option>
                <option value="yogyakarta">Yogyakarta</option>
            </select>

            <button id="resetButton" class="btn btn-secondary" style="height: 50px;">Reset</button>
        </div>
    </div>

    <!-- Daftar Hotel -->
    <section class="daftar-hotel" style="margin-top: 60px; max-width: 100%;">
        <div style="display: flex; flex-direction: row; justify-content: space-between; max-width: 100%;">
            <div id="daftar-hotel" style="max-width: 100%;">
            </div>

            <div style="display: flex; flex-direction: column; width: 100%; align-items: center; margin-left: 65px; max-width: 100%;">
                <p style="margin-top: 20px; font-weight: 700; font-size: 22px; margin-right: 40px;">Special Offers</p>
                <div id="special-offers" style="width: 100%;">
                </div>
            </div>
        </div>
    </section>

    <!-- Modal detail hotel -->
    <div class="modalOverlay" id="modalOverlay"></div>

    <div class="modal" id="modal">
        <span class="close">&times;</span>
    </div>

    <!-- BOTTOM BAR -->
  <div class="footer"
    style="display: flex; flex-direction: row; padding-right: 46px; padding-left: 46px; justify-content: space-between; padding-top: 155px; padding-bottom: 30px;">

    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
      <img src="../../res/logo_and_name.png" style="width: 210px; height: auto;" alt="Logo">
      <p
        style="margin: 0; padding-left: 50px; font-size: 16px; font-family: 'Roboto', sans-serif; color: #545454; font-weight: bold;">
        Enchanting
        Events, Enchanted<br>Experiences!</p>
    </div>

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
        Services</p>
      <p style="margin: 0;">Booking</p>
    </div>

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">About
      </p>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function profileClick() {
            window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
        }

        var allHotelsData = [];

        function fetchHotels() {
            fetch('http://localhost/PemWeb/Enchanted-Edifice/src/database/custommer/getAll.php')
                .then(response => response.json())
                .then(data => {
                    allHotelsData = data;
                    displayHotels(data);
                })
                .catch(error => console.error('Error:', error));
        }

        function displayHotels(data) {
            var daftarHotelContainer = document.getElementById("daftar-hotel");
            daftarHotelContainer.innerHTML = '';
            data.forEach(function(item) {
                var itemContainer = document.createElement("div");
                itemContainer.classList.add("daftar-hotel");
                var content = `
                    <div style="display: flex; flex-direction: row; margin-left: 46px; margin-right: 46px;">
                        <div style="display: flex; flex-direction: column;">
                            <section class="test">
                                <div style="display: flex; flex-direction: column; margin-right: 46px; margin-left: 46px; margin-top: 25px; margin-bottom: 25px;">
                                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                                        <div style="display: flex; flex-direction: column; ">
                                            <p style="margin: 0; font-size: 21px; font-family: 'Lato', sans-serif; font-weight: 600">
                                                ${item.judul}
                                            </p>
                                            <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                                                <img src="../orders/res/Vector.png" alt="stars" style="margin-right: 5px; width: auto; height: 25px;">
                                                <p style="margin: 0; font-size: 16px; font-family: 'Lato', sans-serif;">4.5/5
                                                    <span>999+ reviews </span>| ${item.alamat}
                                                </p>
                                            </div>
                                        </div>
                                        <div style="display: flex; flex-direction: column; align-items: flex-end;">
                                            <div id="kategori" style="display: flex; flex-direction: row; margin-bottom: 10px;">
                                                <div class="bg-fitur" style="display: flex; justify-content: center; align-items: center; margin-left: 5px; margin-right: 5px;">
                                                    <p style="margin: 0px; padding-left: 15px; padding-right: 15px; font-size: 10px;">
                                                        ${item.kapasitas}
                                                    </p>
                                                </div>

                                                <div class="bg-fitur" style="display: flex; justify-content: center; align-items: center; margin-left: 5px; margin-right: 5px;">
                                                    <p style="margin: 0px; padding-left: 15px; padding-right: 15px; font-size: 10px;">
                                                        ${item.AudiovisualEquipment}
                                                    </p>
                                                </div>

                                                <div class="bg-fitur" style="display: flex; justify-content: center; align-items: center; margin-left: 5px; margin-right: 5px;">
                                                    <p style="margin: 0px; padding-left: 15px; padding-right: 15px; font-size: 10px;">
                                                        ${item.cateringService}
                                                    </p>
                                                </div>
                                            </div>
                                            <div id="kategori2" style="display: flex; flex-direction: row;">
                                                <div class="bg-fitur" style="display: flex; justify-content: center; align-items: center; margin-left: 5px; margin-right: 5px;">
                                                    <p style="margin: 0px; padding-left: 15px; padding-right: 15px; font-size: 10px;">
                                                        ${item.outdoorSpace}
                                                    </p>
                                                </div>

                                                <div class="bg-fitur" style="display: flex; justify-content: center; align-items: center; margin-left: 5px; margin-right: 5px;">
                                                    <p style="margin: 0px; padding-left: 15px; padding-right: 15px; font-size: 10px;">
                                                        ${item.decoration}
                                                    </p>
                                                </div>

                                                <div class="bg-fitur" style="display: flex; justify-content: center; align-items: center; margin-left: 5px; margin-right: 5px;">
                                                    <p style="margin: 0px; padding-left: 15px; padding-right: 15px; font-size: 10px;">
                                                        ${item.others}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                                        <img src="${item.gambar}" alt="contoh" style="width: 285px; height: 185px; margin-left: 32px; margin-top: 10px; border-radius: 10px; max-width: 100%">

                                        <div style="display: flex; flex-direction: column; margin-top: 50px; align-items: flex-end;">
                                            <p style="margin:0px; font-size: 24px; font-family: 'Montserrat', sans-serif; font-weight: 500 color: #484848;">
                                                Harga: <span style="font-size: 26px; font-weight: 600;">Rp.<span style="font-family: 'Montserrat', sans-serif; color: #06ac00;">${item.harga}</span></span>
                                            </p>
                                            <button type="button" class="btn btn-primary" style="margin-top: 0px; width: 200px; border-radius: 30px; margin-top: 15px;" onclick="window.location.href='detail.php?id_produk=${item.id_produk}&id=<?php echo htmlspecialchars($_GET['id']); ?>'">Cek Detail</button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                `;
                itemContainer.innerHTML = content;
                itemContainer.style.paddingBottom = "20px";
                itemContainer.style.paddingTop = "20px";
                daftarHotelContainer.appendChild(itemContainer);
            });
        }

        function filterHotels() {
            var kategoriValue = document.getElementById("kategoriValue").value;
            var alamatValue = document.getElementById("alamatValue").value;
            var filteredHotels = allHotelsData.filter(function(hotel) {
                var kategoriMatch = (kategoriValue === "Kategori" || kategoriValue === hotel.kategori);
                var alamatMatch = (alamatValue === "Location" || alamatValue === hotel.alamat);
                return kategoriMatch && alamatMatch;
            });
            displayHotels(filteredHotels);
        }

        function resetFilters() {
            document.getElementById("kategoriValue").selectedIndex = 0;
            document.getElementById("alamatValue").selectedIndex = 0;
            displayHotels(allHotelsData);
        }

        document.getElementById("kategoriValue").addEventListener("change", filterHotels);
        document.getElementById("alamatValue").addEventListener("change", filterHotels);
        document.getElementById("resetButton").addEventListener("click", resetFilters);

        fetchHotels();
    </script>

    <!-- Daftar Special Offers -->
    <script>
        var daftarSpecialOffers = document.getElementById("special-offers");

        fetch('http://localhost/PemWeb/Enchanted-Edifice/src/database/custommer/SpecialOffers.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(function(item) {
                    var itemContainer = document.createElement("section");
                    itemContainer.classList.add("special-offers-style");

                    var content = `
                        <div style="display: flex; flex-direction: column; width: 100%;">
                            <div style="display: flex; align-items: center; width: 100%; justify-content: center;">
                                <img src="${item.gambar}" alt="contoh" style="width: 270px; height: 190px; margin-top: 16px; border-radius: 15px;">
                            </div>
                            <p style="margin-left: 16px; margin-top: 26px; font-weight: 600; font-size: 18px;">${item.judul}</p>
                            <p style="margin-left: 16px; margin-top: 0; font-weight: 500; font-size: 18px;">mulai <span style="font-size: 26px; font-weight: 600;">Rp.<span style="color: #06ac00;">${item.harga}</span></span></p>
                        </div>
                    `;
                    itemContainer.innerHTML = content;
                    itemContainer.style.marginBottom = "30px";
                    daftarSpecialOffers.appendChild(itemContainer);
                });
            })
            .catch(error => console.error('Error:', error));
    </script>
</body>

</html>