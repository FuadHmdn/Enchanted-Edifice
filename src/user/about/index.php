<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>About EnchantedEdifice</title>
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

    .about-us {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin: 46px;
    }

    .about-us-text {
      grid-column: span 2;
      font-family: 'Abril Fatface', serif;
    }

    .highlight-text {
      grid-column: span 2;
      background-color: #E2E9F8;
      padding: 20px;
      border-radius: 15px;
      text-align: center;
      font-family: 'Abril Fatface', serif;
      font-size: 24px;
    }

    .bottom-section {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin: 46px;
      align-items: center;
    }

    .bottom-text {
      font-family: 'Abril Fatface', serif;
    }

    .footer {
      display: flex;
      flex-direction: row;
      padding-right: 46px;
      padding-left: 46px;
      justify-content: space-between;
      padding-top: 55px;
      padding-bottom: 30px;
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
            <a class="nav-link" aria-current="page" href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../offers/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">OFFERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../orders/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">ORDERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../contact/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../about/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #000000;">ABOUT</a>
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

  <!-- ABOUT US -->
  <div style="width: 1600px; height: 2000px; position: relative; background: #FBFBFB">
    <div style="width: 1366px; left: 103px; top: 1200px; position: absolute; justify-content: space-between; align-items: center; display: inline-flex">
      <img style="width: 614px; height: 508px; border-top-left-radius: 8px; border-top-right-radius: 8px; border-bottom-right-radius: 80px; border-bottom-left-radius: 8px" src="../about/res/3.png" />
      <div style="width: 621px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 40px; display: inline-flex">
        <div style="align-self: stretch; color: #181D24; font-size: 52px; font-family: Rufina; font-weight: 700; line-height: 64px; letter-spacing: 1px; word-wrap: break-word">Your peace of mind, <br/>our priority</div>
        <div style="align-self: stretch; color: #181D24; font-size: 18px; font-family: Raleway; font-weight: 500; line-height: 32px; word-wrap: break-word">Jadi mari, masuklah ke dalam dunia pesona dan biarkan EnchantedEdifice menjadikan impian Anda menjadi kenyataan. Bersama kami, setiap acara adalah pengalaman yang patut diingat, dan setiap momen diberkahi dengan keajaiban. Selamat datang di dunia di mana yang biasa menjadi luar biasa, dan yang mustahil menjadi mungkin.</div>
      </div>
    </div>
    <div style="width: 1366px; left: 87px; top: 90px; position: absolute; justify-content: space-between; align-items: center; display: inline-flex">
      <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 80px; display: inline-flex">
        <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: flex">
          <div style="width: 557px; color: #181D24; font-size: 60px; font-family: Rufina; font-weight: 700; text-transform: capitalize; line-height: 72px; word-wrap: break-word">About us</div>
          <div style="width: 513px; color: #181D24; font-size: 18px; font-family: Raleway; font-weight: 500; line-height: 32px; word-wrap: break-word">Selamat datang di EnchantedEdifice, di mana setiap acara menjadi perjalanan magis melalui momen tak terlupakan dan keanggunan abadi.<br/>Di dunia di mana acara bukan hanya kesempatan tetapi pengalaman yang patut diingat, EnchantedEdifice berdiri sebagai mercusuar kesopanan dan pesona. Kami memahami bahwa setiap pertemuan menyimpan janji kenangan berharga dan tonggak sejarah yang signifikan, dan misi kami adalah mengubah momen biasa menjadi perayaan luar biasa.<br/>Di EnchantedEdifice, kami percaya bahwa keajaiban sejati terletak pada detail-detail. Sejak Anda melangkah ke dalam venue menakjubkan kami, Anda disambut dengan atmosfer kemewahan yang halus dan selera yang sempurna. Ruang-ruang kami yang dirancang secara teliti dirancang untuk membawa Anda ke dunia keindahan dan pesona tak tertandingi, di mana setiap sudut bercerita dan setiap elemen membangkitkan rasa kagum.</div>
        </div>
        <div style="width: 736px; height: 192px; justify-content: flex-start; align-items: flex-start; gap: 10.19px; display: inline-flex">
          <div style="flex: 1 1 0; height: 192px; padding-left: 16.30px; padding-right: 16.30px; padding-top: 26px; padding-bottom: 26px; background: #DFE3E7; border-radius: 3.06px; flex-direction: column; justify-content: center; align-items: flex-start; gap: 14.27px; display: inline-flex">
            <div style="width: 659px; height: 27px; text-align: center; color: #181D24; font-size: 26px; font-family: Rufina; font-weight: 400; line-height: 12px; word-wrap: break-word">We strive to offer you the best building to booking.</div>
          </div>
        </div>
      </div>
      <div style="width: 756px; height: 787px; position: relative">
        <img style="width: 588px; height: 667px; left: 168px; top: 120px; position: absolute; border-top-left-radius: 6px; border-top-right-radius: 60px; border-bottom-right-radius: 6px; border-bottom-left-radius: 6px; border: 0.19px #E2E9F8 solid" src="../about/res/2.png" />
        <div style="width: 392px; height: 538px; left: 0px; top: 0px; position: absolute">
          <div style="width: 392px; height: 538px; left: 0px; top: 0px; position: absolute; background: linear-gradient(180deg, #F2ECE7 0%, #F8F4F0 15%, #FCFAF8 33%, #FEFEFE 57%, white 83%, white 100%); border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-right-radius: 6px; border-bottom-left-radius: 60px"></div>
          <img style="width: 359.10px; height: 510.30px; left: 17px; top: 14px; position: absolute; border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-right-radius: 6px; border-bottom-left-radius: 60px" src="../about/res/0.png" />
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <div class="footer" style="display: flex; flex-direction: row; padding-right: 46px; padding-left: 46px; justify-content: space-between; padding-top: 55px; padding-bottom: 30px;">
    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
      <img src="../../res/logo_and_name.png" style="width: 210px; height: auto;" alt="Logo">
      <p style="margin: 0; padding-left: 50px; font-size: 16px; font-family: 'Roboto', sans-serif; color: #545454; font-weight: bold;">
        Enchanting Events, Enchanted<br>Experiences!
      </p>
    </div>

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
        Services
      </p>
      <p style="margin: 0;">Booking</p>
    </div>

    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
        About
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
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
  function profileClick() {
    window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
  }
</script>
</body>
</html>

