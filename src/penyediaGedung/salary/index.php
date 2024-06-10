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
        <div class="filter-bar mb-3">
            <div class="btn-group me-2">
                <button id="admin-filter" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i> Filter by Admin
                </button>
                <ul id="admin-dropdown" class="dropdown-menu"></ul>
            </div>
            <div class="btn-group me-2">
                <button id="gedung-filter" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-building"></i> Filter by Gedung
                </button>
                <ul id="gedung-dropdown" class="dropdown-menu"></ul>
            </div>
            <button id="nominal-asc" class="btn btn-primary me-2">
                <i class="fas fa-sort-amount-down"></i> Sort by Nominal (Asc)
            </button>
            <button id="nominal-desc" class="btn btn-primary me-2">
                <i class="fas fa-sort-amount-up"></i> Sort by Nominal (Desc)
            </button>
            <button id="reset-filter" class="btn btn-secondary">
                <i class="fas fa-redo"></i> Reset Filter
            </button>
        </div>
        <table class="table table-striped">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-2kPdJ8iC0yAOMvH6Z6JZBUyV00H5O0d2N5gLPmsW1UPgLrDDOXkfzTpIIeFCRH10" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-Yb8Qs27+QbGyqj8uZZN2g1POsW9GQ+M+kWikqkBYxHCSwiJzOk0Tf6m0Se2R2Ohl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            const urlParams = new URLSearchParams(window.location.search);
            const id_penyedia_gedung = urlParams.get('id');

            fetchDropdownData(id_penyedia_gedung);

            function fetchSalaries(filters = {}) {
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
                        <td><a href="../../database/BuktiTransferSalary/${salary.bukti_transfer}" download>${salary.bukti_transfer}</a></td>
                    `;
                    salaryTable.appendChild(row);
                });
            }

            function fetchDropdownData(id) {
                $.ajax({
                    url: '../../database/penyedia_gedung/getsalary.php',
                    method: 'GET',
                    data: { id: id },
                    success: function (data) {
                        const salaries = JSON.parse(data);
                        populateDropdowns(salaries);
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error: ", status, error);
                    }
                });
            }

            function populateDropdowns(salaries) {
                const adminDropdown = document.getElementById('admin-dropdown');
                const gedungDropdown = document.getElementById('gedung-dropdown');
                const admins = [...new Set(salaries.map(salary => salary.nama_admin))];
                const gedungs = [...new Set(salaries.map(salary => salary.nama_gedung))];

                adminDropdown.innerHTML = '';
                gedungDropdown.innerHTML = '';

                admins.forEach(admin => {
                    const item = document.createElement('li');
                    item.innerHTML = `<a class="dropdown-item" href="#">${admin}</a>`;
                    item.addEventListener('click', function () {
                        fetchSalaries({ admin: admin });
                    });
                    adminDropdown.appendChild(item);
                });

                gedungs.forEach(gedung => {
                    const item = document.createElement('li');
                    item.innerHTML = `<a class="dropdown-item" href="#">${gedung}</a>`;
                    item.addEventListener('click', function () {
                        fetchSalaries({ gedung: gedung });
                    });
                    gedungDropdown.appendChild(item);
                });
            }

            $('#nominal-asc').click(function () {
                fetchSalaries({ sort: 'asc' });
            });

            $('#nominal-desc').click(function () {
                fetchSalaries({ sort: 'desc' });
            });

            $('#reset-filter').click(function () {
                fetchSalaries();
            });

            fetchSalaries();
        });
    </script>
</body>
</html>