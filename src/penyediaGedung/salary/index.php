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
        .filter-bar {
            margin-bottom: 20px;
        }
        .popup {
            display: none;
            position: absolute;
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            z-index: 10;
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

    <div class="container">
        <h1 class="mt-5">Salary Management</h1>
        <div class="filter-bar">
            <button id="admin-filter" class="btn btn-primary">Filter by Admin</button>
            <button id="gedung-filter" class="btn btn-primary">Filter by Gedung</button>
            <button id="nominal-asc" class="btn btn-primary">Sort by Nominal (Asc)</button>
            <button id="nominal-desc" class="btn btn-primary">Sort by Nominal (Desc)</button>
            <button id="reset-filter" class="btn btn-secondary">Reset Filter</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Admin</th>
                    <th>Nama Gedung</th>
                    <th>Nominal</th>
                    <th>Bukti Transfer</th>
                </tr>
            </thead>
            <tbody id="salary-table">
                <!-- Table rows will be dynamically generated -->
            </tbody>
        </table>
        <div class="popup" id="admin-popup">
            <input type="text" id="admin-input" placeholder="Enter Admin Name">
            <button id="apply-admin">Apply</button>
        </div>
        <div class="popup" id="gedung-popup">
            <input type="text" id="gedung-input" placeholder="Enter Gedung Name">
            <button id="apply-gedung">Apply</button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            fetchSalaries();

            function fetchSalaries(filters = {}) {
                const urlParams = new URLSearchParams(window.location.search);
                const id_penyedia_gedung = urlParams.get('id');
                let queryParams = { id: id_penyedia_gedung, ...filters };

                $.ajax({
                    url: '../../database/penyedia_gedung/getsalary.php',
                    method: 'GET',
                    data: queryParams,
                    success: function (data) {
                        const salaries = JSON.parse(data);
                        displaySalaries(salaries);
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error: ", status, error);
                    }
                });
            }

            function displaySalaries(salaries) {
                const salaryTable = document.getElementById('salary-table');
                salaryTable.innerHTML = '';
                salaries.forEach(salary => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${salary.id_salary}</td>
                        <td>${salary.nama_admin}</td>
                        <td>${salary.nama_gedung}</td>
                        <td>${salary.nominal}</td>
                        <td><a href="/path/to/transfers/${salary.bukti_transfer}" download>${salary.bukti_transfer}</a></td>
                    `;
                    salaryTable.appendChild(row);
                });
            }

            $('#admin-filter').click(function () {
                $('#admin-popup').toggle();
            });

            $('#gedung-filter').click(function () {
                $('#gedung-popup').toggle();
            });

            $('#apply-admin').click(function () {
                const adminName = $('#admin-input').val();
                fetchSalaries({ admin: adminName });
                $('.popup').hide();
            });

            $('#apply-gedung').click(function () {
                const gedungName = $('#gedung-input').val();
                fetchSalaries({ gedung: gedungName });
                $('.popup').hide();
            });

            $('#nominal-asc').click(function () {
                fetchSalaries({ sort: 'asc' });
            });

            $('#nominal-desc').click(function () {
                fetchSalaries({ sort: 'desc' });
            });

            $('#reset-filter').click(function () {
                fetchSalaries();
                $('#admin-input').val('');
                $('#gedung-input').val('');
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
