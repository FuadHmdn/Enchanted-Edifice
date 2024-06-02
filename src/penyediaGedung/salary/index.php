<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Salary Enchanted Edifice</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">

    <style>
        body {
            background-color: #F3F4F7;
            font-family: 'Open Sans', sans-serif;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            font-weight: bold;
            font-size: 16px;
            color: #0a1e3f;
            margin-right: 20px;
        }

        .nav-link.active {
            color: #007bff;
        }

        .header-image {
            position: relative;
            text-align: center;
            margin-bottom: 40px;
            overflow: hidden;
            border-radius: 15px;
        }

        .header-image img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            filter: brightness(70%);
        }

        .header-image .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7));
            opacity: 0.9;
        }

        .header-image .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 48px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .team-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .team-card img {
            border-radius: 50%;
            margin-right: 20px;
        }

        .team-card .team-info {
            flex-grow: 1;
        }

        .team-card .team-info h5 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .team-card .team-info p {
            margin: 0;
            color: #888;
        }

        .team-card .badge {
            font-size: 14px;
            padding: 10px;
            border-radius: 20px;
        }

        .footer {
            background-color: #fff;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        .footer img {
            width: 150px;
            margin-bottom: 10px;
        }

        .footer p {
            margin: 5px 0;
            color: #555;
        }

        .footer .social-icons img {
            width: 30px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <!-- NAVIGASI -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="../../res/logo_and_name.png" alt="Logo" style="width: 210px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../offer/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">OFFERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../order/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">ORDERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../review/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">REVIEW</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../salary/">SALARY</a>
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

    <!-- HEADER IMAGE -->
    <div class="header-image">
        <img src="../salary/image/Salary.jpg" alt="Salary Header Image">
        <div class="overlay"></div>
        <div class="overlay-text">Salary</div>
    </div>

    <!-- TEAM CARDS -->
    <div class="container">
        <div class="team-card">
            <img src="../salary/image/chief.png" alt="Chief of Company" width="60">
            <div class="team-info">
                <h5>Chief of Company</h5>
                <p>5 members</p>
            </div>
            <span class="badge bg-success">Paid</span>
        </div>

        <div class="team-card">
            <img src="../salary/image/design.png" alt="Design Team" width="60">
            <div class="team-info">
                <h5>Design Team</h5>
                <p>6 members</p>
            </div>
            <span class="badge bg-warning">Unpaid</span>
        </div>

        <div class="team-card">
            <img src="../salary/image/develover.png" alt="Developer Team" width="60">
            <div class="team-info">
                <h5>Developer Team</h5>
                <p>5 members</p>
            </div>
            <span class="badge bg-success">Paid</span>
        </div>

        <div class="team-card">
            <img src="../salary/image/marketing.png" alt="Marketing Team" width="60">
            <div class="team-info">
                <h5>Marketing Team</h5>
                <p>5 members</p>
            </div>
            <span class="badge bg-success">Paid</span>
        </div>

        <div class="team-card">
            <img src="../salary/image/socialmedia.png" alt="Social Media Team" width="60">
            <div class="team-info">
                <h5>Social Media Team</h5>
                <p>5 members</p>
            </div>
            <span class="badge bg-success">Paid</span>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">
            <img src="../../res/logo_and_name.png" alt="Logo">
            <p>Enchanting Events, Enchanted Experiences!</p>
            <div class="social-icons">
                <img src="../../res/Facebook.png" alt="Facebook">
                <img src="../../res/Twitter.png" alt="Twitter">
                <img src="../../res/LinkedIn.png" alt="LinkedIn">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        function profileClick() {
            window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
        }
    </script>
</body>

</html>
