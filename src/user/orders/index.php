<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Orders Enchanted Edifice</title>

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

    .footer {
      flex-shrink: 0;
      /* Mencegah footer agar tidak mengecil jika konten sedikit */
    }

    .orders_image {
      position: relative;
    }

    .menu button {
      justify-content: center;
      width: 130px;
      margin: 50px;
      border-radius: 15px;

    }

    .scheduled {
      width: 100%;
      height: 300px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.589);
    }

    .ongoing {
      width: 100%;
      height: 290px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.589);
    }

    .completed {
      width: 100%;
      height: 220px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.589);
    }

    .line {
      width: 80%;
      height: 2px;
      background-color: #8692A6;
    }

    .btn-secondary.active {
      background-color: rgb(57, 113, 216);
      color: white;
    }

    .btn-secondary {
      background-color: #bfc2c9;
    }

    .btn-secondary:hover {
      background-color: rgb(57, 113, 216);
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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto" style="margin-right: 46px;">
          <li class="nav-item">
            <a class="nav-link" href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../offers/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">OFFERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../orders/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #000000;">ORDERS</a>
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
  <div class="orders_image" style="width: auto; text-align: center; position: relative;">
    <img src="../orders/res/download (7) 3.png" alt="Home Image"
      style="max-width: 100%; height: 485px; margin-top: 30px; filter: brightness(80%) contrast(70%);">
    <div class="image-text"
      style="position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%); width: 100%; text-align: center;">
      <p
        style="font-family: 'Lato', sans-serif; font-size: 96px; font-weight: 500; color: #ffffff; display: inline-block;">
        Orders</p>
    </div>
  </div>

  <!-- LINE -->
  <div
    style="display: flex; margin-left: 90px; margin-right: 90px; margin-top: 30px; margin-bottom: 0; justify-content: center;">
    <section class="line">

    </section>
  </div>

  <!-- Menu -->
  <div class="menu" style="display: flex; flex-direction: row; justify-content: center;">
    <button id="btnScheduled" type="button" class="btn btn-secondary active">Scheduled</button>
    <button id="btnOngoing" type="button" class="btn btn-secondary">Ongoing</button>
    <button id="btnCompleted" type="button" class="btn btn-secondary">History</button>
  </div>

  <!-- Konten Menu -->
  <div id="scheduled" class="menu-content" style=" margin-left: 46px; margin-right: 46px;">
  </div>

  <div id="ongoing" class="menu-content" style="display: none; margin-left: 46px; margin-right: 46px;">
  </div>

  <div id="completed" class="menu-content" style="display: none; margin-left: 46px; margin-right: 46px;">
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script>
    function profileClick() {
      window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
    }
  </script>

  <script>
    const btnScheduled = document.getElementById('btnScheduled');
    const btnOngoing = document.getElementById('btnOngoing');
    const btnCompleted = document.getElementById('btnCompleted');
    const scheduledContent = document.getElementById('scheduled');
    const ongoingContent = document.getElementById('ongoing');
    const completedContent = document.getElementById('completed');

    function clearActive() {
      btnScheduled.classList.remove('active');
      btnOngoing.classList.remove('active');
      btnCompleted.classList.remove('active');
    }

    btnScheduled.addEventListener('click', () => {
      clearActive();
      btnScheduled.classList.add('active');
      scheduledContent.style.display = 'block';
      ongoingContent.style.display = 'none';
      completedContent.style.display = 'none';

    });

    btnOngoing.addEventListener('click', () => {
      clearActive();
      btnOngoing.classList.add('active');
      scheduledContent.style.display = 'none';
      ongoingContent.style.display = 'block';
      completedContent.style.display = 'none';
    });

    btnCompleted.addEventListener('click', () => {
      clearActive();
      btnCompleted.classList.add('active');
      scheduledContent.style.display = 'none';
      ongoingContent.style.display = 'none';
      completedContent.style.display = 'block';
    });
  </script>

  <!-- Schedule Get -->
  <script>
    // Menemukan elemen kontainer
    var menuScheduleContainer = document.getElementById("scheduled");

    fetch('http://localhost/PemWeb/Enchanted-Edifice/src/database/custommer/schedule.php')
      .then(response => response.json())
      .then(data => {
        // Membuat elemen untuk setiap item dalam data
        data.forEach(function (item) {
          var itemContainer = document.createElement("section");
          itemContainer.classList.add("scheduled");

          var content = `
        <div style="display: flex; flex-direction: row; justify-content: space-between; margin-left: 50px; margin-right: 50px; padding-top: 20px;">
          <div style="display: flex; flex-direction: column;">
            <p style="margin: 0; font-size: 21px; font-family: 'Lato', sans-serif;">${item.judul}</p>
            <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
              <img src="../orders/res/Vector.png" alt="stars" style="margin-right: 5px; width: auto; height: 25px;">
              <p style="margin: 0; font-size: 16px; font-family: 'Lato', sans-serif;">4.5/5 <span>999+ reviews </span>| Bandar Lampung</p>
            </div>
            <img src="${item.gambar}" alt="contoh" style="width: 285px; height: 185px; margin-left: 32px; margin-top: 10px; border-radius: 5px;">
          </div>
          <div style="display: flex; flex-direction: column; justify-content: center; margin-top: 90px">
            <div style="margin-right: 100px;">
              <p style="margin:0px; font-size: 24px; font-family: 'Montserrat', sans-serif; color: #484848;">Check In: <span style="font-size: 22px; font-family: 'Montserrat', sans-serif; color: #9A9A9A;">${item.tanggal_masuk}</span></p>
              <p style="margin:0px; font-size: 24px; font-family: 'Montserrat', sans-serif; color: #484848;">Check Out: <span style="font-size: 22px; font-family: 'Montserrat', sans-serif; color: #9A9A9A;">${item.tanggal_keluar}</span></p>
            </div>
            <button type="button" class="btn btn-primary" style="margin-top: 40px; width: 200px; border-radius: 30px; margin-left: 150px;">Cek Detail</button>
          </div>
        </div>
      `;

          itemContainer.innerHTML = content;
          itemContainer.style.marginBottom = "60px";
          menuScheduleContainer.appendChild(itemContainer);
        });
      })
      .catch(error => console.error('Error:', error));
  </script>

  <!-- Ongoing -->
  <script>
    // Menemukan elemen kontainer
    var menuOngoingContainer = document.getElementById("ongoing");

    fetch('http://localhost/PemWeb/Enchanted-Edifice/src/database/custommer/ongoing.php')
      .then(response => response.json())
      .then(data => {
        // Membuat elemen untuk setiap item dalam data
        data.forEach(function (item) {
          var itemContainer = document.createElement("section");
          itemContainer.classList.add("ongoing");

          var content = `
          <div style="display: flex; flex-direction: row; justify-content: space-between; margin-left: 50px; margin-right: 50px; padding-top: 20px;">
            <div style="display: flex; flex-direction: column;">
              <p style="margin: 0; font-size: 21px; font-family: 'Lato', sans-serif;">${item.judul}</p>
              <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                <img src="${item.gambar}" alt="contoh"
                  style="width: 285px; height: 195px; margin-left: 32px; margin-top: 10px; border-radius: 5px;">
                <div style="display: flex; flex-direction: column; margin-left: 60px;">
                  <p
                    style="margin:5px; font-size: 24px; font-family: 'Montserrat', sans-serif; color: #484848; font-weight: 500">
                    Check In: <span style="font-size: 24px; font-family: 'Montserrat', sans-serif; color: #9A9A9A;">${item.tanggal_masuk}</span></p>
                  <p
                    style="margin:5px; font-size: 24px; font-family: 'Montserrat', sans-serif; color: #484848; font-weight: 600;">
                    Rp.<span>${item.harga}</span></p>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-danger"
              style="margin-top: 195px; width: 200px; height: 40px; border-radius: 30px; margin-left: 150px;">Cancel
              Reservation</button>
          </div>`;

          itemContainer.innerHTML = content;
          itemContainer.style.marginBottom = "60px";
          menuOngoingContainer.appendChild(itemContainer);
        });
      })
      .catch(error => console.error('Error:', error));
  </script>

  <!-- Completed -->
  <script>
    // Menemukan elemen kontainer
    var menuCompletedContainer = document.getElementById("completed");

    fetch('http://localhost/PemWeb/Enchanted-Edifice/src/database/custommer/completed.php')
      .then(response => response.json())
      .then(data => {
        // Membuat elemen untuk setiap item dalam data
        data.forEach(function (item) {
          var itemContainer = document.createElement("section");
          itemContainer.classList.add("completed");

          var content = `
          <div style="display: flex; flex-direction: row; justify-content: space-between; margin-left: 50px; margin-right: 50px;">
            <div style="display: flex; flex-direction: column; justify-content: center; margin-top: 55px;">
              <p style="margin: 0; font-size: 26px; font-family: 'Lato', sans-serif; color: #000000; font-weight: 800;">${item.judul}</p>
              <p
                style="font-size: 24px; font-family: 'Montserrat', sans-serif; color: #484848; font-weight: 500; margin-top: 30px;">
                Check Out: <span
                  style="font-size: 24px; font-family: 'Montserrat', sans-serif; color: #9A9A9A;">${item.tanggal_keluar}</span>
              </p>
            </div>
            <div style="display: flex; flex-direction: column; margin-top: 65px; align-items: flex-end;">
              <p
                style="font-size: 21px; font-family: 'Montserrat', sans-serif; color: #484848; font-weight: 600; margin-right: 5px;">
                Rp.<span>${item.harga}</span></p>
              <button type="button" class="btn btn-primary detail-button" data-id="${item.id_produk}"
                style="margin-top: 0px; width: 200px; height: 40px; border-radius: 30px;">Tambah Ulasan</button>
            </div>
          </div>`;

          itemContainer.innerHTML = content;
          itemContainer.style.marginBottom = "60px";
          menuCompletedContainer.appendChild(itemContainer);
        });
        // Menambahkan event listener untuk semua tombol "Cek Detail"
        document.querySelectorAll('.detail-button').forEach(button => {
          button.addEventListener('click', function () {
            var itemId = this.getAttribute('data-id');
            window.location.href = `../orders/tambah_ulasan/index.php?id_produk=${itemId}&id=<?php echo htmlspecialchars($_GET['id']); ?>`;
          });
        });
      })
      .catch(error => console.error('Error:', error));
  </script>

</body>

</html>