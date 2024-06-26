<?php
require_once('../../database/koneksi.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id && is_numeric($id)) {
    $sql = "SELECT username, photo FROM penyedia_gedung WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['username'];
        $photo = $row['photo'];
    } else {
        echo "User not found.";
        $photo = null;
    }
} else {
    echo "Invalid ID.";
    $photo = null;
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Profile</title>
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
    </style>

</head>

<body>
        <!-- NAVIGASI -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="position: sticky; top: 0; z-index: 1000;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="../../res/logo_and_name.png" style="width: 210px; height: auto; margin-left: 46px;"
                    alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto" style="margin-right: 46px;">
                    <li class="nav-item">
                        <a class="nav-link" href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color:  #8692A6;">HOME</a>
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
                        <a class="nav-link" aria-current="page" href="../contact/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">CONTACT US</a>
                    </li>
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

    
    <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
        <div style="display: flex; flex-direction: column; background-color: white; width: 60%; height: auto;  margin-top: 76px; border-radius: 40px; margin-bottom: 70px; box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.589);
            padding-left: 100px; padding-right: 100px; padding-top: 46px; padding-bottom: 46px; align-items: center;">
            <?php if(isset($photo) && !empty($photo)): ?>
                <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                    <img src="/PemWeb/Enchanted-Edifice/src/login/user/res/penyedia_gedung/<?php echo $photo; ?>" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            <?php else: ?>
                <div style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden;">
                    <img src="../profile/res/VectorProfile.png" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            <?php endif; ?>

            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-bottom: 20px; margin-top: 20px;">
                <div style="font-size: 22px; font-weight: 700; max-width: 100%; margin: 0;"> <?php echo $nama; ?> </div>
                <p style="font-size: 16px; font-weight: 300; max-width: 100%; margin: 0;">Penyedia Gedung</p>
            </div>

            <a href="../../login/user/login/UserLogin/index.html" style="align-items: center;">
                <button type="button" class="btn btn-outline-danger" style="max-width: 100%; width: 300px; align-self: center;">Log Out</button>
            </a>
        </div>
    </div>


    <!-- BOTTOM BAR -->
    <div
        style="display: flex; flex-direction: row; padding-right: 46px; padding-left: 46px; justify-content: space-between; padding-top: 30px; padding-bottom: 20px;">

        <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
            <img src="../../res/logo_and_name.png" style="width: 210px; height: auto;" alt="Logo">
            <p
                style="margin: 0; padding-left: 50px; font-size: 16px; font-family: 'Roboto', sans-serif; color: #545454; font-weight: bold;">
                Enchanting
                Events, Enchanted<br>Experiences!</p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p
                style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
                Services</p>
            <p style="margin: 0;">Booking</p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p
                style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
                About</p>
            <p style="margin: 0;">Our Story</p>
            <p style="margin: 0;">Blog</p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p
                style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">
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
            window.location.href = "../profile/";
        }
    </script>

</body>

</html>


