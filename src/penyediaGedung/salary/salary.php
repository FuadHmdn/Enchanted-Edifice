<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .header {
            background-image: url('path/to/your/image.png');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }
        .team-info {
            text-align: center;
            margin: 20px 0;
        }
        .member-list {
            max-width: 800px;
            margin: auto;
        }
        .member-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .member-item img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 20px;
        }
        .member-details {
            flex-grow: 1;
        }
        .member-status {
            margin-left: 20px;
        }
    </style>
</head>
<body>

<div class="header">
    Salary
</div>

<div class="team-info">
    <h3>Design Team</h3>
    <p>6 members</p>
    <button class="btn btn-warning" id="unpaid-btn">Unpaid</button>
</div>

<div class="member-list">
    <div class="member-item">
        <img src="path/to/avatar1.jpg" alt="Ryan Artadiyah">
        <div class="member-details">
            <h5>Ryan Artadiyah</h5>
            <p>Product Design Manager - $3000</p>
        </div>
        <button class="btn btn-danger member-status">Unpaid</button>
    </div>
    <div class="member-item">
        <img src="path/to/avatar2.jpg" alt="Jawad Majid">
        <div class="member-details">
            <h5>Jawad Majid</h5>
            <p>Senior Designer - $2000</p>
        </div>
        <button class="btn btn-danger member-status">Unpaid</button>
    </div>
    <!-- Add more members as needed -->
</div>

<script>
    document.getElementById('unpaid-btn').addEventListener('click', function() {
        window.location.href = 'salary.php?team=design';
    });

    const statusButtons = document.querySelectorAll('.member-status');
    statusButtons.forEach(button => {
        button.addEventListener('click', function() {
            window.location.href = 'salary.php?team=design';
        });
    });
</script>

</body>
</html>
