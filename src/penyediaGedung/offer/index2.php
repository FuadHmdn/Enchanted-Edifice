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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Offers Enchanted Edifice</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
            background: #FBFBFB;
            width: 1400px;
            height: 720px;
            left: 100px;
            top: 630px;
        }

        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: absolute;
            width: 1400px;
            height: 570px;
            top: 630px;
        }

        .container {
            width: 100%;
            max-width: 1440px;
            background: #E6EBF5;
            padding: 20px;
            margin-top: 20px;
            position: absolute;
            width: 1350px;
            height: 840px;
            left: 90px;
            top: 550px;
        }

        .icon-section {
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: relative;
            margin-top: -170px;
            width: 1050px;
            height: 20px;
            left: 120px;
            margin-bottom: 65px;
        }

        .icon-container {
            text-align: center;
            cursor: pointer;
            font-size: 20px;
            font-weight: 600;
            transition: background-color 0.3s, color 0.3s;
            padding: 10px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .icon {
            background-color: #E0E0E0;
            border-radius: 55%;
            padding: 20px;
            width: 80px;
            height: 80px;
            transition: background-color 0.3s, color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon i {
            font-size: 30px;
            transition: color 0.3s;
            color: #3B527E;
        }

        .icon-text {
            margin-top: 10px;
            /* Add some space between icon and text */
            color: #3B527E;
        }

        .icon-container.inactive .icon {
            background-color: #E0E0E0;
            color: #3B527E;
        }

        .icon-container.inactive .icon i {
            color: #3B527E;
        }

        .icon-container.active .icon,
        .icon-container:hover .icon,
        .icon-container:focus .icon {
            background-color: #3B527E;
            color: white;
        }

        .icon-container.active .icon i,
        .icon-container:hover .icon i,
        .icon-container:focus .icon i {
            color: white;
        }

        .icon-section::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: repeating-linear-gradient(to right,
                    #3B527E,
                    #3B527E 5px,
                    transparent 5px,
                    transparent 10px);
            z-index: -1;
        }


        .icon-section .icon-container:first-child::before {
            display: none;
        }

        .form-section {
            padding: 20px;
            margin-top: 150px;
            position: absolute;
            left: 40px;
        }

        .form-section label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-section input,
        .form-section textarea {
            background: white;
            width: 100%;
            border: 1px solid #a8b1bb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;

            margin-right: 200px;
        }

        .form-section textarea {
            height: 200px;
        }

        .form-section .row {
            display: flex;
            justify-content: space-between;
        }

        .form-section .row div {
            flex: 1;
        }

        .form-section .row div:last-child {
            margin-right: 20px;
        }

        .character-count {
            font-size: 12px;
            color: #666;
            text-align: left;
            margin-top: -20px;
            margin-bottom: 20px;
            margin-left: 3px;
            ;
        }

        .form-section .next-button {
            text-align: center;
            margin-top: 200px;
        }

        .form-section .next-button button {
            background: #D3E3FF;
            color: #3B527E;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            width: 199px;
            height: 60px;
        }

        .form-section .next-button button:hover,
        .form-section .next-button button:focus {
            background: #3B527E;
            color: white;
        }

        .form-section .next-button button:active {
            background: #2A3B5E;
            color: white;
        }
    </style>

</head>

<body>
    <div style="width: 1540px; height: 3000px; position: relative; background: #FBFBFB">
        <div style="width: 1440px; height: 2900px; left: -4580.60px; top: 39.27px; position: absolute; background: #F3F4F7; box-shadow: 0px -6px 50px rgba(0, 0, 0, 0.15)"></div>
        <div style="width: 1440px; height: 2900px; left: 39px; top: 102px; position: absolute; background: #F3F4F7; box-shadow: 0px -6px 50px rgba(0, 0, 0, 0.15)"></div>
        <img style="width: 1440px; height: 540px; left: 40px; top: 50px; position: absolute" src="../offer/res/download (9).jpeg" />
        <div style="left: 104px; top: 2700px; position: absolute; flex-direction: column; justify-content: center; align-items: center; display: inline-flex">
            <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="width: 1260px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                    <div style="width: 1260px; height: 200.50px; border: 3px #E8EEFB solid"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- COLUMN BAR -->
    <div class="content-wrapper">
        <div class="container">
            <div class="icon-section">
                <a href="index2.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">
                    <div class="icon-container active" onclick="setActive(this)">
                        <div class="icon">
                            <i class="bi bi-pencil"></i>
                        </div>
                        <div class="icon-text">Description</div>
                    </div>
                </a>
                <a href="index3.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">
                    <div class="icon-container inactive" onclick="setActive(this)">
                        <div class="icon">
                            <i class="bi bi-list"></i>
                        </div>
                        <div class="icon-text">Categories</div>
                    </div>
                </a>
                <a href="index4.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">
                    <div class="icon-container inactive" onclick="setActive(this)">
                        <div class="icon">
                            <i class="bi bi-camera"></i>
                        </div>
                        <div class="icon-text">Photos</div>
                    </div>
                </a>
                <a href="index5.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">
                    <div class="icon-container inactive" onclick="setActive(this)">
                        <div class="icon">
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <div class="icon-text">Package</div>
                    </div>
            </div></a>
            <div class="form-section">
                <h4 style="font-weight: bold;">Fill in the basic information about your item <br> <br></h4>

                <label for="title">Title</label>
                <input type="text" id="title" placeholder="Title" oninput="updateCharacterCount('title', 'title-count')">
                <div id="title-count" class="character-count">0/60</div>

                <label for="description">Description</label>
                <textarea id="description" placeholder="Description" oninput="updateCharacterCount('description', 'description-count')"></textarea>
                <div id="description-count" class="character-count">0/1200</div>

                <div class="row">
                    <div>
                        <label for="length">Length [m]</label>
                        <input type="number" id="length" placeholder="Length [m]">
                    </div>
                    <div>
                        <label for="width">Width [m]</label>
                        <input type="number" id="width" placeholder="Width [m]">
                    </div>
                    <div>
                        <label for="height">Height [m]</label>
                        <input type="number" id="height" placeholder="Height [m]">
                    </div>
                </div>

                <label for="price">Price </label>
                <input type="number" id="price" placeholder="Product price in PLN (gross)">

                <label for="alamatValue">Location</label>
                <select id="alamatValue" class="form-select">
                    <option value="">Select Province</option>
                    <option value="aceh">Aceh</option>
                    <option value="bali">Bali</option>
                    <option value="banten">Banten</option>
                    <option value="bengkulu">Bengkulu</option>
                    <option value="gorontalo">Gorontalo</option>
                    <option value="jakarta">Jakarta</option>
                    <option value="jambi">Jambi</option>
                    <option value="west-java">West Java</option>
                    <option value="central-java">Central Java</option>
                    <option value="east-java">East Java</option>
                    <option value="west-kalimantan">West Kalimantan</option>
                    <option value="south-kalimantan">South Kalimantan</option>
                    <option value="central-kalimantan">Central Kalimantan</option>
                    <option value="east-kalimantan">East Kalimantan</option>
                    <option value="north-kalimantan">North Kalimantan</option>
                    <option value="bangka-belitung">Bangka Belitung</option>
                    <option value="lampung">Lampung</option>
                    <option value="maluku">Maluku</option>
                    <option value="north-maluku">North Maluku</option>
                    <option value="west-ntt">West Nusa Tenggara</option>
                    <option value="east-ntt">East Nusa Tenggara</option>
                    <option value="papua">Papua</option>
                    <option value="west-papua">West Papua</option>
                    <option value="riau">Riau</option>
                    <option value="riau-islands">Riau Islands</option>
                    <option value="west-sulawesi">West Sulawesi</option>
                    <option value="south-sulawesi">South Sulawesi</option>
                    <option value="central-sulawesi">Central Sulawesi</option>
                    <option value="south-east-sulawesi">South East Sulawesi</option>
                    <option value="north-sulawesi">North Sulawesi</option>
                    <option value="west-sumatra">West Sumatra</option>
                    <option value="south-sumatra">South Sumatra</option>
                    <option value="north-sumatra">North Sumatra</option>
                    <option value="yogyakarta">Yogyakarta</option>
                </select>


                <div class="next-button">
                    <button onclick="saveData()">Next →</button>
                </div>
            </div>
        </div>
    </div>
    <!-- BOTTOM BAR -->
    <div style="position:absolute ;width: 1281px; height: 614px; left: 129px; top: 2480px; display: flex; flex-direction: row; padding-right: 46px; padding-left: 46px; justify-content: space-between; padding-top: 30px; padding-bottom: 20px;">

        <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
            <img src="../../res/logo_and_name.png" style="width: 210px; height: auto;" alt="Logo">
            <p style="margin: 0; padding-left: 50px; font-size: 16px; font-family: 'Roboto', sans-serif; color: #545454; font-weight: bold;">
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
                About</p>
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

    <!-- TOP BAR -->
    <div style="width: 1442px; height: 540px; left: 40px; top: 50px; position: absolute; background: rgba(2.64, 9.30, 26.44, 0.51)"></div>
    <div style="width: 1440px; height: 99px; left: 40px; top: 95px; position: absolute">
        <div style="width: 1440px; height: 99px; padding-top: 24px; padding-bottom: 24px; left: 0px; top: 0px; position: absolute; flex-direction: column; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
            <div style="width: 1261px; justify-content: space-between; align-items: center; display: inline-flex">
                <div style="flex: 1 1 0; height: 99px; justify-content: flex-start; align-items: center; gap: 10px; display: flex">
                    <img style="width: 84px; height: 84px" src="../offer/res/Exclude.png" />
                    <div><span style="color: #D3D6DB; font-size: 22px; font-family: Roboto; font-weight: 700; line-height: 33px; word-wrap: break-word">Enchanted</span><span style="color: #ABB5C6; font-size: 22px; font-family: Roboto; font-weight: 400; line-height: 33px; word-wrap: break-word">Edifice</span></div>
                </div>
            </div>
        </div>
        <button onclick="profileClick()" class="btn btn-outline-secondary" style="width: 80px; height: 41px; left: 1250px; top: 30px; position: absolute; justify-content: center; align-items: center; display: inline-flex; border: 20px">
            <img style="width: 23px; height: 23px; left: 44px; top: 9px; position: absolute; " src="../offer/res/🦆 icon _User Circle_.png">
            <div style="width: 29px; height: 29px; padding-left: 3.62px; padding-right: 3.62px; padding-top: 7.25px; padding-bottom: 7.25px; left: 8px; top: 6px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                <img style="width: 21.75px; height: 14.50px;" src="../offer/res/material-symbols_menu.png">
            </div>
            <div style="width: 80px; height: 41px; top: 0px; position: absolute; border-radius: 15px; border: 2px white solid">
            </div>
        </button>
        <div style="width: 424px; height: 24px; left: 777px; top: 39px; position: absolute; justify-content: flex-end; align-items: center; gap: 40px; display: inline-flex">
            <div style="justify-content: center; align-items: center; gap: 32px; display: flex">
                <a class="nav-link" href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: white; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">HOME</a>
                <a class="nav-link active" aria-current="page" href="../offer/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #95A4C0; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">OFFERS</a>
                <a class="nav-link" href="../order/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: white; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">ORDERS</a>
                <a class="nav-link" href="../review/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #EFF0F4; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">REVIEW</a>
                <a class="nav-link" href="../salary/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="justify-content: center; align-items: center; gap: 4px; display: flex; text-decoration: none;">
                    <div style="color: #EFF0F4; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word">SALARY</div>
                </a>
            </div>
        </div>
    </div>
    <div style="width: 1217px; height: 521px; left: 163px; top: 371px; position: absolute; background: rgba(133.98, 145.72, 165.75, 0.55)"></div>
    <div style="width: 25px; height: 18.75px; left: 675px; top: 688px; position: absolute">
        <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute; background: white"></div>
        <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute">
            <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute; background: #D9D9D9"></div>
            <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute">
                <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute; background: white"></div>
                <div style="width: 25px; height: 9.38px; left: 0px; top: 0px; position: absolute; background: #E31D1C"></div>
            </div>
        </div>
    </div>

    <div style="width: 182px; height: 182px; left: 675px; top: 429px; position: absolute">
        <div style="width: 173.47px; height: 173.47px; left: 2.26px; top: 4.26px; position: absolute">
            <div style="width: 173.47px; height: 173.47px; left: 0px; top: 0px; position: absolute; border-radius: 9999px; overflow: hidden;">
                <img src="/PemWeb/Enchanted-Edifice/src/login/user/res/penyedia_gedung/<?php echo $photo; ?>" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>
        </div>
        <div style="width: 182px; height: 182px; left: 0px; top: 0px; position: absolute; border-radius: 9999px; border: 7px white solid"></div>
    </div>
    <div style="left: 50%; top: 628px; position: absolute; color: rgba(16.72, 56.03, 92.44, 0.88); font-size: 36px; font-family: Poppins; font-weight: 500; word-wrap: break-word; transform: translateX(-50%);"><?php echo $nama; ?></div>
    <div style="left: 717px; top: 685px; position: absolute; color: rgba(16.72, 56.03, 92.44, 0.88); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Lampung, Indonesia</div>
    <div style="width: 204px; padding-left: 22px; padding-right: 22px; padding-top: 10px; padding-bottom: 10px; left: 666px; top: 746px; position: absolute; background: rgba(16.72, 56.03, 92.44, 0.88); border-radius: 10px; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
        <img src="../offer/res/🦆 icon _share_.png" style="width: 21.50px; height: 18.81px" ;>
        <div style="text-align: center; color: white; font-size: 17px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Share Store</div>
    </div>
    </div>


    <script>
        function updateCharacterCount(elementId, countId) {
            var element = document.getElementById(elementId);
            var countElement = document.getElementById(countId);
            countElement.textContent = 'Characters: ' + element.value.length + '/' + element.maxLength;
        }

        document.getElementById('title').maxLength = 60;
        document.getElementById('description').maxLength = 1200;

        function setActive(element) {
            document.querySelectorAll('.icon').forEach(icon => {
                icon.classList.remove('active');
                icon.classList.add('inactive');
            });
            element.classList.remove('inactive');
            element.classList.add('active');
        }
    </script>

    <script>
        function profileClick() {
            window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
        }
    </script>

    <script>
        function updateCharacterCount(inputId, countId) {
            var input = document.getElementById(inputId);
            var count = document.getElementById(countId);
            var maxLength = inputId === 'title' ? 60 : 1200;
            count.textContent = `${input.value.length}/${maxLength}`;
        }

        function saveData() {
            var loc = document.getElementById("alamatValue").value;
            console.log("Selected location:", loc);

            // Save the location to localStorage
            localStorage.setItem("loc", loc);

            var title = document.getElementById("title").value;
            var description = document.getElementById("description").value;
            var length = document.getElementById("length").value;
            var width = document.getElementById("width").value;
            var height = document.getElementById("height").value;
            var price = document.getElementById("price").value;

            // Save form data to localStorage
            localStorage.setItem("title", title);
            localStorage.setItem("description", description);
            localStorage.setItem("length", length);
            localStorage.setItem("width", width);
            localStorage.setItem("height", height);
            localStorage.setItem("price", price);

            // Construct the query string
            var queryParams = `?id=<?php echo htmlspecialchars($_GET['id']); ?>&loc=${encodeURIComponent(loc)}&title=${encodeURIComponent(title)}&description=${encodeURIComponent(description)}&length=${encodeURIComponent(length)}&width=${encodeURIComponent(width)}&height=${encodeURIComponent(height)}&price=${encodeURIComponent(price)}`;

            // Redirect to the next page with query parameters
            window.location.href = "index3.php" + queryParams;
        }

        window.onload = function() {
            updateCharacterCount('title', 'title-count');
            updateCharacterCount('description', 'description-count');
        };
    </script>
</body>

</html>