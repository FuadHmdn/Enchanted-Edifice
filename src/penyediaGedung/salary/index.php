<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Salary Enchanted Edifice</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            background-color: #F3F4F7;
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

        .container {
            margin-top: 80px;
        }

        .filter-bar .btn {
            margin-right: 10px;
            margin-bottom: 10px;
            font-size: 1em;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
        }

        .filter-bar .dropdown-menu {
            font-size: 1em;
        }

        .filter-bar {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .filter-item {
            flex: 1;
            max-width: calc(20% - 20px);
            margin: 10px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 900px;
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

        .nominal-cell {
            position: relative;
            text-align: center;
        }

        .nominal-amount {
            position: absolute;
            top: 50%;
            left: 25%;
            transform: translate(-50%, -50%);
            font-weight: bold;
            font-size: 14px;
            color: white;
            text-shadow: 
                -0.7px -0.7px 0 #000,  
                0.7px -0.7px 0 #000,
                -0.7px  0.7px 0 #000,
                0.7px  0.7px 0 #000;
        }

        .nominal-rectangle {
            position: absolute;
            left: -15%;
            top: 10%;
            width: 80%;
            height: 80%;
            border-radius: 8px;
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

    <!-- HOME IMAGE -->
    <div style="margin-left: 46px; margin-right: 46px; width: auto; height: auto; text-align: center; position: relative; margin-top: 30px;">
        <img src="../salary/image/TFC Funding Process Help You With The Bank Processes.jpeg" alt="Order Image" style="width: 92%; border-radius: 40px;">
        <div class="image-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <p style="font-family: 'Lato', sans-serif; font-size: 90px; font-weight: bold; color: #ffffff; display: inline-block;">SALARY</p>
        </div>
    </div>
    

    <div class="container">
    <div class="filter-bar">
        <button id="admin-filter" class="btn btn-primary">
            <i class="fas fa-user"></i> Filter by Admin
        </button>
        <button id="category-filter" class="btn btn-primary">
            <i class="fas fa-building"></i> Filter by Category
        </button>
        <button id="nominal-asc" class="btn btn-primary">
            <i class="fas fa-sort-amount-down"></i> Sort by Nominal (Asc)
        </button>
        <button id="nominal-desc" class="btn btn-primary">
            <i class="fas fa-sort-amount-up"></i> Sort by Nominal (Desc)
        </button>
        <button class="btn btn-secondary reset-button" id="reset-filter">
            <i class="fas fa-redo"></i> Reset Filter
        </button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Admin</th>
                <th>Nama Gedung</th>
                <th>Kategori</th>
                <th>Nominal</th>
                <th>Bukti Transfer</th>
            </tr>
        </thead>
        <tbody id="salary-table">
            <!-- Table rows will be dynamically generated -->
        </tbody>
    </table>
    <div class="popup" id="admin-popup">
        <select id="admin-select" class="form-control">
            <option value="">Select Admin</option>
            <option value="Dimas Adivia">Dimas Adivia</option>
            <option value="Maharani Wahyu Tantri">Maharani Wahyu Tantri</option>
            <option value="Widyasti Bella Kurnia">Widyasti Bella Kurnia</option>
            <option value="Fuad Hamidan">Fuad Hamidan</option>
        </select>
        <button id="apply-admin" class="btn btn-primary">Apply Now</button>
    </div>
    <div class="popup" id="category-popup">
        <select id="category-select" class="form-control">
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
        <button id="apply-category" class="btn btn-primary">Apply Now</button>
    </div>
    <br><br>
</div>
<!-- BOTTOM BAR -->
<div style="display: flex; flex-direction: row; padding-right: 46px; padding-left: 46px; justify-content: space-between; padding-top: 30px; padding-bottom: 20px;">
        <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
            <img src="../../res/logo_and_name.png" style="width: 210px; height: auto;" alt="Logo">
            <p style="margin: 0; padding-left: 50px; font-size: 16px; font-family: 'Roboto', sans-serif; color: #545454; font-weight: bold;">
                Enchanting Events, Enchanted<br>Experiences!
            </p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">Services</p>
            <p style="margin: 0;">Booking</p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">About</p>
            <p style="margin: 0;">Our Story</p>
            <p style="margin: 0;">Blog</p>
        </div>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <p style="margin: 0; font-size: 16px; font-family: 'Roboto', sans-serif; color: #8692A6; font-weight: bold;">Follow Us</p>
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
        fetchSalaries();

        // Fungsi untuk memuat data dari getsalary.php
        function fetchSalaries(filters = {}) {
            const urlParams = new URLSearchParams(window.location.search);
            const id_penyedia_gedung = urlParams.get('id');

            $.ajax({
                url: '../../database/penyedia_gedung/getsalary.php',
                method: 'GET',
                data: { id: id_penyedia_gedung, ...filters },
                success: function (data) {
                    const salaries = JSON.parse(data);
                    displaySalaries(salaries);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                }
            });
        }

        // Fungsi untuk menampilkan data di tabel
        function displaySalaries(salaries) {
            const salaryTable = document.getElementById('salary-table');
            salaryTable.innerHTML = '';
            salaries.forEach(salary => {
                const row = document.createElement('tr');
                const nominalAmount = parseFloat(salary.nominal).toFixed(2);
                let rectangleColor = '';

                if (nominalAmount < 9000000) {
                    rectangleColor = '#f5ffbc';
                } else if (nominalAmount < 20000000) {
                    rectangleColor = '#bce3ff';
                } else if (nominalAmount < 35000000) {
                    rectangleColor = '#cdffd7';
                } else if (nominalAmount < 50000000) {
                    rectangleColor = '#b5eaf8';
                } else if (nominalAmount < 65000000) {
                    rectangleColor = '#ffc1ee';
                } else if (nominalAmount < 80000000) {
                    rectangleColor = '#ffe39b';
                } else if (nominalAmount < 99000000) {
                    rectangleColor = '#ebbcff';
                } else {
                    rectangleColor = 'black'; // Default color
                }

                row.innerHTML = `
                    <td>${salary.id_salary}</td>
                    <td>${salary.nama_admin}</td>
                    <td>${salary.nama_gedung}</td>
                    <td>${salary.kategori}</td>
                    <td class="nominal-cell">
                        <div class="nominal-rectangle" style="background-color: ${rectangleColor};"></div>
                        <span class="nominal-amount">${nominalAmount}</span>
                    </td>
                    <td><a href="../../database/BuktiTransferSalary/${salary.bukti_transfer}" download>${salary.bukti_transfer}</a></td>
                `;
                salaryTable.appendChild(row);
            });
        }

        // Fungsi untuk menambahkan filter berdasarkan admin
        $('#admin-filter').click(function () {
            $('#admin-popup').toggle();
        });

        // Event listener untuk filter berdasarkan kategori
        $('#category-filter').click(function () {
            $('#category-popup').toggle();
        });


        // Fungsi untuk menerapkan filter admin
        $('#apply-admin').click(function () {
            const selectedAdmin = $('#admin-select').val();
            fetchSalaries({ admin: selectedAdmin });
            $('.popup').hide();
        });

        // Event listener untuk menerapkan filter berdasarkan kategori
        $('#apply-category').click(function () {
            const selectedCategory = $('#category-select').val();
            fetchSalaries({ category: selectedCategory });
            $('.popup').hide();
        });

        // Fungsi untuk mengurutkan nominal dari terkecil ke terbesar
        $('#nominal-asc').click(function () {
            fetchSalaries({ sort: 'asc' });
        });

        // Fungsi untuk mengurutkan nominal dari terbesar ke terkecil
        $('#nominal-desc').click(function () {
            fetchSalaries({ sort: 'desc' });
        });

        // Fungsi untuk mereset filter
        $('#reset-filter').click(function () {
            fetchSalaries();
            $('#admin-select').val('');
            $('#category-select').val('');
        });

        $(document).click(function (event) {
            if (!$(event.target).closest('.btn, .popup').length) {
                $('.popup').hide();
            }
        });
    });
</script>
</body>

</html>
