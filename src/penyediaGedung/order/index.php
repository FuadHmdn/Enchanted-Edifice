<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Order Enchanted Edifice</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

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
            max-width: 80%;
            height: auto;
            padding-bottom: 120px;
            background-color: #E2E9F8;
            margin: auto;
        }

        .filter-bar {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            justify-content: space-between;
            align-items: center;
            margin-left: 200px;
            margin-right: 260px;
        }

        .filter-bar .btn {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: #fff;
            border: 1px solid #ced4da;
            padding: 10px 15px;
        }

        .filter-bar .bi {
            font-size: 1.2rem;
        }

        table {
            width: 70%;
            max-width: 70%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 40px;
            margin-left: 200px;
            margin-right: 200px;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
        .status-completed {
            background-color: #d4edda !important;
            color: #155724 !important;
            padding: 5px 10px;
            border-radius: 60px;
            width: 120px;
            height: 15px;

        }

        .status-processing {
            background-color: #ffeeba !important;
            color: #856404 !important;
            padding: 5px 10px;
            border-radius: 60px;
            width: 120px;
            height: 15px;
            top: 5px;
        }

        .status-scheduled {
            background-color: #f1cbff !important;
            color: #79238b !important;
            padding: 5px 10px;
            border-radius: 60px;
            width: 120px;
            height: 15px;
        }


        .popup {
            display: none;
            position: absolute;
            top: 800px;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            z-index: 1000;
            width: 350px;
        }

        .popup button {
            display: block;
            width: 100%;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
        }

        .popup select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        #datepicker {
            margin-bottom: 10px;
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
                        <a class="nav-link active" aria-current="page" href="../order/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #0a1e3f;">ORDERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../review/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">REVIEW</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../salary/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #8692A6;">SALARY</a>
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
        <img src="../order/res/download (7) 2.png" alt="Order Image" style="max-width: 100%;">
        <div class="image-text"
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <p style="font-family: 'Lato',sans-serif; font-size: 90px; font-weight: bold; color: #ffffff; display: inline-block;">ORDER</p>
        </div>
    </div>
    <div style="margin-top: 40px;">
    <br><br>
    <br>
    <div class="filter-bar">
        <button id="date-filter" class="btn">
            <i class="bi bi-calendar"></i> Date
        </button>
        <button id="category-filter" class="btn">
            <i class="bi bi-list-ul"></i> Order Categories
        </button>
        <button id="status-filter" class="btn">
            <i class="bi bi-info-circle"></i> Order Status
        </button>
        <button class="btn reset-button" id="reset-filter">
            <i class="bi bi-arrow-counterclockwise"></i> Reset Filter
        </button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DATE CHECK-IN</th>
                <th>DATE CHECK-OUT</th>
                <th>BUILDING</th>
                <th>CATEGORY</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody id="order-table">
            <!-- Table rows will be dynamically generated -->
        </tbody>
    </table>
    <div class="popup" id="date-popup">
        <div id="datepicker"></div>
        <button id="apply-date">Apply Now</button>
    </div>
    <div class="popup" id="category-popup">
        <select id="category-select">
            <option value="">Select Category</option>
            <option value="Home">Home</option>
            <option value="Ballroom">Ballroom</option>
            <option value="MeetingRoom">Meeting Room</option>
            <option value="OutdoorVenue">Outdoor Venue</option>
            <option value="BanquetHall">Banquet Hall</option>
            <option value="ConferenceCenter">Conference Center</option>
            <option value="Auditorium">Auditorium</option>
            <option value="CafeRestaurant">Cafe/Restaurant</option>
            <option value="SportsFacility">Sports Facility</option>
        </select>
        <button id="apply-category">Apply Now</button>
    </div>
    <div class="popup" id="status-popup">
        <select id="status-select">
            <option value="">Select Status</option>
            <option value="completed">completed</option>
            <option value="incomplete">incomplete</option>
        </select>
        <button id="apply-status">Apply Now</button>
    </div>
    <br><br><br><br>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function () {
        // Memuat data saat halaman dimuat
        fetchOrders();

        // Fungsi untuk memuat data dari getorder.php
        function fetchOrders() {
            const urlParams = new URLSearchParams(window.location.search);
            const id_penyedia_gedung = urlParams.get('id');
            $.ajax({
                url: '../../database/penyedia_gedung/getorder.php',
                method: 'GET',
                data: { id: id_penyedia_gedung },
                success: function (data) {
                    const orders = JSON.parse(data);
                    displayOrders(orders); // Menampilkan data setelah berhasil dimuat
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: ", status, error); // Debugging: Tampilkan error AJAX
                }
            });
        }

        // Fungsi untuk menampilkan data di tabel
        function displayOrders(orders) {
            const orderTable = document.getElementById('order-table');
            orderTable.innerHTML = '';
            orders.forEach(order => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.id_order}</td>
                    <td>${order.username}</td>
                    <td>${order.tanggal_masuk}</td>
                    <td>${order.tanggal_keluar}</td>
                    <td>${order.nama_gedung}</td>
                    <td>${order.kategori}</td>
                    <td class="${order.status_order === 'incomplete' ? 'status-incomplete' : 'status-complete'}">${order.status_order}</td>
                `;
                orderTable.appendChild(row);
            });
        }

        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $('#date-filter').click(function () {
            $('#date-popup').toggle();
        });

        $('#category-filter').click(function () {
            $('#category-popup').toggle();
        });

        $('#status-filter').click(function () {
            $('#status-popup').toggle();
        });

        $('#apply-date').click(function () {
            const selectedDate = $('#datepicker').datepicker('getFormattedDate');
            filterOrders({ date: selectedDate });
            $('.popup').hide();
        });

        $('#apply-category').click(function () {
            const selectedCategory = $('#category-select').val();
            filterOrders({ category: selectedCategory });
            $('.popup').hide();
        });

        $('#apply-status').click(function () {
            const selectedStatus = $('#status-select').val();
            filterOrders({ status: selectedStatus });
            $('.popup').hide();
        });

        $('#reset-filter').click(function () {
            fetchOrders();
            $('#category-select').val('');
            $('#status-select').val('');
            $('#datepicker').datepicker('clearDates');
        });

        $(document).click(function (event) {
            if (!$(event.target).closest('.btn, .popup').length) {
                $('.popup').hide();
            }
        });

        const filterOrders = (criteria) => {
            const urlParams = new URLSearchParams(window.location.search);
            const id_penyedia_gedung = urlParams.get('id');
            $.ajax({
                url: '../../database/penyedia_gedung/getorder.php',
                method: 'GET',
                data: { id: id_penyedia_gedung },
                success: function (data) {
                    let orders = JSON.parse(data);

                    // Filter data berdasarkan tanggal
                    if (criteria.date) {
                        orders = orders.filter(order => order.tanggal_masuk === criteria.date);
                    }

                    // Filter data berdasarkan kategori
                    if (criteria.category) {
                        orders = orders.filter(order => order.kategori === criteria.category);
                    }

                    // Filter data berdasarkan status
                    if (criteria.status) {
                        orders = orders.filter(order => order.status_order === criteria.status);
                    }

                    displayOrders(orders);
                }
            });
        };
    });
</script>

<script>
    function profileClick() {
        window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
    }
</script>
</body>

</html>
