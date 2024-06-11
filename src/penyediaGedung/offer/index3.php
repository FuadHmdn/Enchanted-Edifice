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
            max-width: 1335px;
            background: #E6EBF5;
            padding: 20px;
            margin-top: 20px;
            position: absolute;
            left: 90px;
            top: 550px;
            min-height: 700px;
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

        .containerr {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .categories,
        .selected-categories,
        .subcategories {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 16px;
            font-weight: 400px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .category-group,
        .subcategory-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .category-item,
        .subcategory-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .selected-item {
            display: inline-block;
            padding: 5px 10px;
            background-color: #bddbff;
            border: 1px solid #9bbfe4;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 20px;
            border-radius: 60px;
        }

        .selected-item span {
            margin-left: 5px;
            color: rgb(23, 32, 94);
            cursor: pointer;
        }

        .next-button {
            margin-top: 20px;
            text-align: center;
            margin-left: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 230px;
            background-color: #c3d7ef;
            border: 1px solid #b6dbff;
            border-radius: 9px;
        }

        .subcategory-group {
            display: none;
        }

        .subcategories-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .subcategories-grid h4 {
            margin: 0;
            padding-bottom: 10px;
        }

        .subcategories-grid .subcategory-item {
            margin: 5px 0;
        }

        .next-button button:hover,
        .next-button button:focus {
            background: #3B527E;
            color: white;
        }

        .next-button button:active {
            background: #2A3B5E;
            color: white;
        }
    </style>

</head>

<body>
    <div style="width: 1540px; height: 3000px; position: relative; background: #FBFBFB">
        <div style="width: 1440px; height: 2900px; left: -4580.60px; top: 39.27px; position: absolute; background: #F3F4F7; box-shadow: 0px -6px 50px rgba(0, 0, 0, 0.15)">
        </div>
        <div style="width: 1440px; height: 2900px; left: 39px; top: 102px; position: absolute; background: #F3F4F7; box-shadow: 0px -6px 50px rgba(0, 0, 0, 0.15)">
        </div>
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
                    <div class="icon-container inactive" onclick="setActive(this)">
                        <div class="icon">
                            <i class="bi bi-pencil"></i>
                        </div>
                        <div class="icon-text">Description</div>
                    </div>
                </a>
                <a href="index3.php?id=<?php echo htmlspecialchars($_GET['id']); ?>">
                    <div class="icon-container active" onclick="setActive(this)">
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
            <div class="containerr" style="margin-top: 130px; margin-left: 30px;">
                <div class="categories">
                    <input type="hidden" id="hidden-title" name="hidden-title" value="">
                    <input type="hidden" id="hidden-description" name="hidden-description" value="">
                    <input type="hidden" id="hidden-length" name="hidden-length" value="">
                    <input type="hidden" id="hidden-width" name="hidden-width" value="">
                    <input type="hidden" id="hidden-height" name="hidden-height" value="">
                    <input type="hidden" id="hidden-price" name="hidden-price" value="">
                    <input type="hidden" id="hidden-location" name="hidden-location" value="">
                    <h3>Select the category your goods belong to (min. 3)</h3>
                    <div class="category-list">
                        <div class="category-item">
                            <input type="checkbox" id="ballroom-checkbox" name="category-item">
                            <label for="ballroom-checkbox">Ballroom</label>
                        </div>
                        <div class="category-item">
                            <input type="checkbox" id="home-checkbox" name="category-item">
                            <label for="home-checkbox">Home</label>
                        </div>
                        <div class="category-item">
                            <input type="checkbox" id="meeting-room-checkbox" name="category-item">
                            <label for="meeting-room-checkbox">Meeting Room</label>
                        </div>
                        <div class="category-item">
                            <input type="checkbox" id="outdoor-venue-checkbox" name="category-item">
                            <label for="outdoor-venue-checkbox">Outdoor Venue</label>
                        </div>
                        <div class="category-item">
                            <input type="checkbox" id="banquet-hall-checkbox" name="category-item">
                            <label for="banquet-hall-checkbox">Banquet Hall</label>
                        </div>
                        <div class="category-item">
                            <input type="checkbox" id="conference-center-checkbox" name="category-item">
                            <label for="conference-center-checkbox">Conference Center</label>
                        </div>
                        <div class="category-item">
                            <input type="checkbox" id="auditorium-checkbox" name="category-item">
                            <label for="auditorium-checkbox">Auditorium</label>
                        </div>
                        <div class="category-item">
                            <input type="checkbox" id="cafe-restaurant-checkbox" name="category-item">
                            <label for="cafe-restaurant-checkbox">Cafe/Restaurant</label>
                        </div>
                        <div class="category-item">
                            <input type="checkbox" id="sports-facility-checkbox" name="category-item">
                            <label for="sports-facility-checkbox">Sports Facility</label>
                        </div>
                    </div>

                    <!-- Subkategori -->
                    <div class="subcategory-grid">
                        <div class="subcategory-column">
                            <div>
                                <h4>Capacity</h4>
                                <div class="subcategory-item"><input type="radio" id="capacity-5-10-ballroom" name="capacity" value="5-10 person"> <label for="capacity-5-10-ballroom">5-10 person</label></div>
                                <div class="subcategory-item"><input type="radio" id="capacity-20-50-ballroom" name="capacity" value="20-50 person"> <label for="capacity-20-50-ballroom">20-50 person</label></div>
                                <div class="subcategory-item"><input type="radio" id="capacity-50-80-ballroom" name="capacity" value="50-80 person"> <label for="capacity-50-80-ballroom">50-80 person</label></div>
                                <div class="subcategory-item"><input type="radio" id="capacity-100-300-ballroom" name="capacity" value="100-300 person"> <label for="capacity-100-300-ballroom">100-300 person</label></div>
                                <div class="subcategory-item"><input type="radio" id="capacity-500-1000-ballroom" name="capacity" value="500-1000 person"> <label for="capacity-500-1000-ballroom">500-1000 person</label></div>
                            </div>
                            <div>
                                <h4>Audiovisual Equipment</h4>
                                <div class="subcategory-item"><input type="radio" id="av-projectors-home" name="av-equipment" value="Projectors"> <label for="av-projectors-home">Projectors</label></div>
                                <div class="subcategory-item"><input type="radio" id="av-screen-home" name="av-equipment" value="Screen"> <label for="av-screen-home">Screen</label></div>
                                <div class="subcategory-item"><input type="radio" id="av-sound-systems-home" name="av-equipment" value="Sound systems"> <label for="av-sound-systems-home">Sound systems</label></div>
                                <div class="subcategory-item"><input type="radio" id="av-microphones-home" name="av-equipment" value="Microphones"> <label for="av-microphones-home">Microphones</label></div>
                                <div class="subcategory-item"><input type="radio" id="av-printers-scanners-home" name="av-equipment" value="Printers and scanners"> <label for="av-printers-scanners-home">Printers and scanners</label></div>
                            </div>
                        </div>
                        <div class="subcategory-column">
                            <div>
                                <h4>Catering Services</h4>
                                <div class="subcategory-item"><input type="radio" id="catering-menu-meeting-room" name="catering-service" value="Menu options"> <label for="catering-menu-meeting-room">Menu options</label></div>
                                <div class="subcategory-item"><input type="radio" id="catering-staff-meeting-room" name="catering-service" value="Serving staff"> <label for="catering-staff-meeting-room">Serving staff</label></div>
                                <div class="subcategory-item"><input type="radio" id="catering-bar-meeting-room" name="catering-service" value="Bar services"> <label for="catering-bar-meeting-room">Bar services</label></div>
                                <div class="subcategory-item"><input type="radio" id="catering-food-meeting-room" name="catering-service" value="Food catering"> <label for="catering-food-meeting-room">Food catering</label></div>
                                <div class="subcategory-item"><input type="radio" id="catering-snack-meeting-room" name="catering-service" value="Snack"> <label for="catering-snack-meeting-room">Snack</label></div>
                            </div>
                            <div>
                                <h4>Outdoor Spaces</h4>
                                <div class="subcategory-item"><input type="radio" id="outdoor-gardens-outdoor-venue" name="outdoor-space" value="Gardens"> <label for="outdoor-gardens-outdoor-venue">Gardens</label></div>
                                <div class="subcategory-item"><input type="radio" id="outdoor-playgrounds-outdoor-venue" name="outdoor-space" value="Playgrounds"> <label for="outdoor-playgrounds-outdoor-venue">Playgrounds</label></div>
                                <div class="subcategory-item"><input type="radio" id="outdoor-recreation-outdoor-venue" name="outdoor-space" value="Open recreation areas"> <label for="outdoor-recreation-outdoor-venue">Open recreation areas</label></div>
                            </div>
                            <div>
                                <h4>Decorations</h4>
                                <div class="subcategory-item"><input type="radio" id="decor-flowers-banquet-hall" name="decor" value="Including flowers"> <label for="decor-flowers-banquet-hall">Including flowers</label></div>
                                <div class="subcategory-item"><input type="radio" id="decor-ornaments-banquet-hall" name="decor" value="Including ornaments"> <label for="decor-ornaments-banquet-hall">Including ornaments</label></div>
                                <div class="subcategory-item"><input type="radio" id="decor-furniture-banquet-hall" name="decor" value="Including furniture"> <label for="decor-furniture-banquet-hall">Including furniture</label></div>
                                <div class="subcategory-item"><input type="radio" id="decor-complete-banquet-hall" name="decor" value="Complete decor"> <label for="decor-complete-banquet-hall">Complete decor</label></div>
                            </div>
                            <div>
                                <h4>Photography</h4>
                                <div class="subcategory-item"><input type="radio" id="photo-cameras-conference-center" name="photography" value="Digital cameras"> <label for="photo-cameras-conference-center">Digital cameras</label></div>
                                <div class="subcategory-item"><input type="radio" id="photo-lenses-conference-center" name="photography" value="Lenses"> <label for="photo-lenses-conference-center">Lenses</label></div>
                                <div class="subcategory-item"><input type="radio" id="photo-accessories-conference-center" name="photography" value="Photo accessories"> <label for="photo-accessories-conference-center">Photo accessories</label></div>
                                <div class="subcategory-item"><input type="radio" id="photo-instant-conference-center" name="photography" value="Instant cameras (Instax, Polaroid)"> <label for="photo-instant-conference-center">Instant cameras (Instax, Polaroid)</label></div>
                            </div>
                            <div>
                                <h4>Others</h4>
                                <div class="subcategory-item"><input type="radio" id="others-dressing-auditorium" name="others" value="Dressing room"> <label for="others-dressing-auditorium">Dressing room</label></div>
                                <div class="subcategory-item"><input type="radio" id="others-bridal-auditorium" name="others" value="Bridal Suite"> <label for="others-bridal-auditorium">Bridal Suite</label></div>
                                <div class="subcategory-item"><input type="radio" id="others-parking-auditorium" name="others" value="Free Parking Spaces"> <label for="others-parking-auditorium">Free Parking Spaces</label></div>
                                <div class="subcategory-item"><input type="radio" id="others-internet-auditorium" name="others" value="Internet access"> <label for="others-internet-auditorium">Internet access</label></div>
                                <div class="subcategory-item"><input type="radio" id="others-security-auditorium" name="others" value="Security service"> <label for="others-security-auditorium">Security service</label></div>
                                <div class="subcategory-item"><input type="radio" id="others-restroom-auditorium" name="others" value="Rest room"> <label for="others-restroom-auditorium">Rest room</label></div>
                                <div class="subcategory-item"><input type="radio" id="others-childcare-auditorium" name="others" value="Childcare Services"> <label for="others-childcare-auditorium">Childcare Services</label></div>
                                <div class="subcategory-item"><input type="radio" id="others-smoking-auditorium" name="others" value="Smoking Areas"> <label for="others-smoking-auditorium">Smoking Areas</label></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="selected-categories">
                    <h3 style="display: inline-block; margin-right: 10px;"><br>Selected categories:</h3>
                    <div id="selected-items" style="display: inline-block;"></div>
                </div>
                <div class="next-button">
                    <button onclick="saveDataAndNext()">Next →</button>
                </div>
            </div>
        </div>
    </div>

    <!-- TOP BAR -->
    <div style="width: 1442px; height: 540px; left: 40px; top: 50px; position: absolute; background: rgba(2.64, 9.30, 26.44, 0.51)">
    </div>
    <div style="width: 1440px; height: 99px; left: 40px; top: 95px; position: absolute">
        <div style="width: 1440px; height: 99px; padding-top: 24px; padding-bottom: 24px; left: 0px; top: 0px; position: absolute; flex-direction: column; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
            <div style="width: 1261px; justify-content: space-between; align-items: center; display: inline-flex">
                <div style="flex: 1 1 0; height: 99px; justify-content: flex-start; align-items: center; gap: 10px; display: flex">
                    <img style="width: 84px; height: 84px" src="../offer/res/Exclude.png" />
                    <div><span style="color: #D3D6DB; font-size: 22px; font-family: Roboto; font-weight: 700; line-height: 33px; word-wrap: break-word">Enchanted</span><span style="color: #ABB5C6; font-size: 22px; font-family: Roboto; font-weight: 400; line-height: 33px; word-wrap: break-word">Edifice</span>
                    </div>
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
        document.getElementById('ballroom-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="ballroom"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.getElementById('home-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="home"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.getElementById('meeting-room-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="meeting-room"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.getElementById('outdoor-venue-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="outdoor-venue"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.getElementById('banquet-hall-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="banquet-hall"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.getElementById('conference-center-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="conference-center"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.getElementById('auditorium-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="auditorium"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.getElementById('cafe-restaurant-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="cafe-restaurant"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.getElementById('sports-facility-button').addEventListener('click', function() {
            const subcategoryGroup = document.querySelector('.subcategory-group[data-category="sports-facility"]');
            if (subcategoryGroup.style.display === 'none') {
                subcategoryGroup.style.display = 'flex';
                this.classList.add('active');
            } else {
                subcategoryGroup.style.display = 'none';
                this.classList.remove('active');
            }
            updateSelectedItems();
        });

        document.querySelectorAll('input[name="subcategory"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedItems = document.getElementById('selected-items');
                const itemId = this.id;
                const itemValue = this.value;

                if (this.checked) {
                    const selectedItem = document.createElement('div');
                    selectedItem.classList.add('selected-item');
                    selectedItem.id = `selected-${itemId}`;
                    selectedItem.innerHTML = `${itemValue} <span data-id="${itemId}">&times;</span>`;
                    selectedItems.appendChild(selectedItem);
                } else {
                    const selectedItem = document.getElementById(`selected-${itemId}`);
                    if (selectedItem) {
                        selectedItem.remove();
                    }
                }

                updateSelectedItems();
            });
        });

        document.getElementById('selected-items').addEventListener('click', function(e) {
            if (e.target.tagName === 'SPAN') {
                const itemId = e.target.getAttribute('data-id');
                document.getElementById(itemId).checked = false;
                document.getElementById(`selected-${itemId}`).remove();
                updateSelectedItems();
            }
        });

        function updateSelectedItems() {
            const selectedItems = document.getElementById('selected-items');
            if (selectedItems.children.length >= 3) {
                document.querySelector('.next-button button').disabled = false;
            } else {
                document.querySelector('.next-button button').disabled = true;
            }
        }

        updateSelectedItems();

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
        function saveDataAndNext() {
            // Get values from localStorage (assuming they were stored in the previous page)
            var title = localStorage.getItem("title");
            var description = localStorage.getItem("description");
            var length = localStorage.getItem("length");
            var width = localStorage.getItem("width");
            var height = localStorage.getItem("height");
            var price = localStorage.getItem("price");
            var loc = localStorage.getItem("loc");

            // Set hidden inputs with the retrieved values
            document.getElementById("hidden-title").value = title;
            document.getElementById("hidden-description").value = description;
            document.getElementById("hidden-length").value = length;
            document.getElementById("hidden-width").value = width;
            document.getElementById("hidden-height").value = height;
            document.getElementById("hidden-price").value = price;
            document.getElementById("hidden-location").value = loc;

            // Collect selected categories
            var selectedCategories = [];
            var categoryCheckboxes = document.querySelectorAll('.category-item input[type="checkbox"]');
            categoryCheckboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    selectedCategories.push(checkbox.labels[0].textContent);
                }
            });

            // Store selected categories in localStorage
            localStorage.setItem("selectedCategories", JSON.stringify(selectedCategories));

            // Get selected subcategories
            var cateringService = document.querySelector('input[name="catering-service"]:checked');
            var outdoorSpace = document.querySelector('input[name="outdoor-space"]:checked');
            var decor = document.querySelector('input[name="decor"]:checked');
            var photography = document.querySelector('input[name="photography"]:checked');
            var others = document.querySelector('input[name="others"]:checked');
            var capacity = document.querySelector('input[name="capacity"]:checked');
            var avEquipment = document.querySelector('input[name="av-equipment"]:checked');

            // Assign values to variables
            var selectedCateringService = cateringService ? cateringService.labels[0].textContent : '';
            var selectedOutdoorSpace = outdoorSpace ? outdoorSpace.labels[0].textContent : '';
            var selectedDecor = decor ? decor.labels[0].textContent : '';
            var selectedPhotography = photography ? photography.labels[0].textContent : '';
            var selectedOthers = others ? others.labels[0].textContent : '';
            var selectedCapacity = capacity ? capacity.labels[0].textContent : '';
            var selectedAvEquipment = avEquipment ? avEquipment.labels[0].textContent : '';

            // Store selected subcategories in localStorage
            localStorage.setItem("selectedCateringService", selectedCateringService);
            localStorage.setItem("selectedOutdoorSpace", selectedOutdoorSpace);
            localStorage.setItem("selectedDecor", selectedDecor);
            localStorage.setItem("selectedPhotography", selectedPhotography);
            localStorage.setItem("selectedOthers", selectedOthers);
            localStorage.setItem("selectedCapacity", selectedCapacity);
            localStorage.setItem("selectedAvEquipment", selectedAvEquipment);

            // Proceed to the next page
            window.location.href = "index4.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
        }
    </script>





</body>

</html>