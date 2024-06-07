<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        .bg-home {
            max-width: 100%;
            height: auto;
            padding-bottom: 120px;
            background-color: #E2E9F8;
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

        .cek-salary-btn {
            background-color: #E2E9F8;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            color: #0a1e3f;
            font-family: 'Lato', sans-serif;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
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
                        <a class="nav-link" href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">HOME</a>
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
                        <a class="nav-link active" aria-current="page" href="../salary/?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #0a1e3f;">SALARY</a>
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

    <!-- HOME IMAGE -->
    <div style="margin-left: 46px; margin-right: 46px; width: auto; height: auto; text-align: center; position: relative; margin-top: 30px;">
        <img src="../salary/image/TFC Funding Process Help You With The Bank Processes.jpeg" alt="Order Image" style="width: 100%; border-radius: 40px;">
        <div class="image-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <p style="font-family: 'Lato', sans-serif; font-size: 90px; font-weight: bold; color: #ffffff; display: inline-block;">SALARY</p>
        </div>
    </div>

    <!-- CEK SALARY BUTTON -->
    <div style="text-align: right; margin-right: 46px; margin-top: 20px;">
        <button class="cek-salary-btn" onclick="openModal()">Cek Salary</button>
    </div>

    <!-- TEAM CARDS -->
    <div class="container" style="margin-bottom: 90px; margin-top: 80px;">
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

    <!-- MODAL -->
    <div id="salaryModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Salary Details</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Team</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>00001</td>
                        <td>Maharani Wahayuhu</td>
                        <td>Wahayuhu@gmail.com</td>
                        <td>14 Feb 2019</td>
                        <td>Chief of Company</td>
                        <td><span class="badge bg-success">Paid</span></td>
                    </tr>
                    <tr>
                        <td>00002</td>
                        <td>Fuuaach</td>
                        <td>Fuuaach@gmail.com</td>
                        <td>14 Feb 2019</td>
                        <td>Chief of Company</td>
                        <td><span class="badge bg-success">Paid</span></td>
                    </tr>
                    <tr>
                        <td>00003</td>
                        <td>Uripin</td>
                        <td>Urip@gmail.com</td>
                        <td>14 Feb 2019</td>
                        <td>Design Team</td>
                        <td><span class="badge bg-danger">Unpaid</span></td>
                    </tr>
                    <tr>
                        <td>00004</td>
                        <td>Ithin</td>
                        <td>Ithinnn@gmail.com</td>
                        <td>14 Feb 2019</td>
                        <td>Marketing Team</td>
                        <td><span class="badge bg-success">Paid</span></td>
                    </tr>
                    <tr>
                        <td>00005</td>
                        <td>Bellacaw</td>
                        <td>Beww@gmail.com</td>
                        <td>14 Feb 2019</td>
                        <td>Social Media Team</td>
                        <td><span class="badge bg-success">Paid</span></td>
                    </tr>
                    <tr>
                        <td>00006</td>
                        <td>Alfad</td>
                        <td>Alfad@gmail.com</td>
                        <td>14 Feb 2019</td>
                        <td>Developer Team</td>
                        <td><span class="badge bg-success">Paid</span></td>
                    </tr>
                    <!-- Additional rows can be added here -->
                </tbody>
            </table>
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
            window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
        }

        function openModal() {
            document.getElementById("salaryModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("salaryModal").style.display = "none";
        }
    </script>
</body>

</html>
