
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Contact Enchanted Edifice</title>
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

    #submit-button {
      border: 2px solid #d8d8d8;
      width: 200px;
      height: 50px;
      margin-top: 40px;
      border-radius: 20px;
      font-weight: 600;
      color: rgb(255, 255, 255);
      background-color: #728bb3;
      transition: background-color 0.3s ease;
      /* Smooth transition */
    }

    #submit-button:hover {
      background-color: #384e97;
    }

    .form-group {
      flex: 1;
      margin-right: 10px;
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
            <a class="nav-link" href="../offer/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">OFFERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../order/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">ORDERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../review/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">REVIEW</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../salary/?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">SALARY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../contact/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #000000;">CONTACT US</a>
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

  <!-- Lets Connect -->
  <div
    style="background-color: #E2E9F8; max-width: 100%; height: auto; margin-left: 46px; margin-right: 46px; margin-top: 46px; border-radius: 25px;">

    <!-- Infromasi Kontak -->
    <div style="display: flex; flex-direction: column; width: 100%; padding: 26px;">
      <p style="font-size: 96px; font-weight: 700; font-family: 'Abril Fatface', serif; margin: 0;">Let’s connect</p>

      <!-- NO TELEPON -->
      <div style="display: flex; flex-direction: row; max-width: 100%; margin-top: 50px;">
        <p style="font-size: 35px; font-weight: 700; font-family: 'Abril Fatface', serif; margin: 0;">Phone</p>
        <p
          style="font-size: 35px; font-weight: 400; font-family: 'Abril Fatface', serif; margin: 0; padding-left: 10px; margin-left: 180px;">
          +6282228282828</p>
      </div>

      <!-- EMAil -->
      <div style="display: flex; flex-direction: row; max-width: 100%;">
        <p style="font-size: 35px; font-weight: 700; font-family: 'Abril Fatface', serif; margin: 0;">Email</p>
        <p
          style="font-size: 35px; font-weight: 400; font-family: 'Abril Fatface', serif; margin: 0; padding-left: 10px; margin-left: 185px;">
          EnchantedEdifice@gmail.com</p>
      </div>

      <!-- ALAMAT -->
      <div style="display: flex; flex-direction: row; max-width: 100%;">
        <p style="font-size: 35px; font-weight: 700; font-family: 'Abril Fatface', serif; margin: 0;">Address</p>
        <p
          style="font-size: 35px; font-weight: 400; font-family: 'Abril Fatface', serif; margin: 0; margin-left: 163px;">
          Bandar Lampung</p>
      </div>

      <!-- Sosial Media -->
      <div style="display: flex; flex-direction: row; margin-top: 60px;">
        <img src="../contact/res/FacebookSocialIcon.png" alt="Facebook"
          style="width: 50px; height: auto; max-width: 100%; margin-right: 10px;">
        <img src="../contact/res/LinkedInSocialIcon.png" alt="LinkedIn"
          style="width: 50px; height: auto; max-width: 100%; margin-right: 10px;"">
        <img src=" ../contact/res/TwitterSocialicon.png" alt="Twitter"
          style="width: 50px; height: auto; max-width: 100%; margin-right: 10px;"">
      </div>



    </div>

    <!-- HUBUNGI KAMI -->
    <div style=" display: flex; flex-direction: column; width: 100%; background-color: white; padding-left: 26px;
          padding-right: 26px; padding-top: 26px; border-radius: 25px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.397);
          margin-top: 40px; padding-bottom: 60px;">

        <p style="font-size: 66px; font-weight: 700; font-family: 'Abril Fatface', serif; margin: 0;">Hubungi Kami</p>
        <p style="font-size: 23px; font-weight: 100; font-family: 'Abril Fatface', serif; margin: 0;">Jangan ragu untuk
          meminta konsultasi atau bertanya lansung saja hubungi kami </p>
          <!-- Input Data -->
          <form action="../../database/penyedia_gedung/submitform.php?id=<?php echo $_GET['id']; ?>" method="post">


    <!-- Text Field Name -->
    <div style="display: flex; flex-direction: row; max-width: 100%; justify-content: space-between; margin-top: 40px;">

        <!-- First Name -->
        <div class="form-group" style="display: flex; flex-direction: column; max-width: 100%;">
            <label for="FirstName" class="form-label" style="font-weight: 600; max-width: 100%;">First Name</label>
            <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="First Name"
                   style="border-radius: 25px; width: auto; height: 55px; background-color: #e9ebee; max-width: 100%;">
        </div>

        <!-- Last Name -->
        <div class="form-group" style="display: flex; flex-direction: column; max-width: 100%;">
            <label for="LastName" class="form-label" style="font-weight: 600;">Last Name</label>
            <input type="text" class="form-control" id="LastName" name="LastName" placeholder="Last Name"
                   style="border-radius: 25px; width: auto; height: 55px; background-color: #e9ebee; max-width: 100%;">
        </div>

    </div>

    <!-- Text Field Email, Subject -->
    <div style="display: flex; flex-direction: row; max-width: 100%; justify-content: space-between; margin-top: 20px;">
        <!-- Email -->
        <div class="form-group" style="display: flex; flex-direction: column; max-width: 100%;">
            <label for="Email" class="form-label" style="font-weight: 600;">Email Address</label>
            <input type="email" class="form-control" id="Email" name="Email" placeholder="Email"
                   style="border-radius: 25px; width: auto; height: 55px; background-color: #e9ebee; max-width: 100%;">
        </div>

        <!-- Subject -->
        <div class="form-group" style="display: flex; flex-direction: column; max-width: 100%;">
            <label for="Subject" class="form-label" style="font-weight: 600;">Subject</label>
            <input type="text" class="form-control" id="Subject" name="Subject" placeholder="Subject"
                   style="border-radius: 25px; width: auto; height: 55px; background-color: #e9ebee; max-width: 100%;">
        </div>
    </div>

    <!-- Pesan Dan Button -->
    <div class="form-group" style="display: flex; flex-direction: column;">
        <!-- TextField Pesan -->
        <label for="message" class="form-label" style="font-weight: 600;">Pesan</label>
        <textarea id="message" class="form-control" name="message" rows="5" cols="50"
                  placeholder="Type your message here..." maxlength="500"
                  style="background-color: #e9ebee; border-radius: 20px; padding: 10px;"></textarea>

        <input id="submit-button" type="submit" value="SEND MESSAGE">
    </div>
</form>
      </div>

    </div>

    <!-- BOTTOM BAR -->
    <div class="footer"
      style="display: flex; flex-direction: row; padding-right: 46px; padding-left: 46px; justify-content: space-between; padding-top: 55px; padding-bottom: 30px;">

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