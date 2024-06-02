<?php
// Mengambil id_penyedia_gedung dari URL
$id_penyedia_gedung = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Enchanted Edifice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: #FBFBFB;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
            margin-left: 170px;
            margin-right: 230px;
            position: absolute; 
            top: 620px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
            margin-top: 20px;
        }

        h2:after {
            content: '';
            display: block;
            width: 60%;
            margin: 10px auto 0;
            border-bottom: 2px solid #000;
            margin-top: 20px;
        }

        .reviews-section {
            margin-bottom: 40px;
            margin-top: 90px;
        }

        .reviews {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .review-card {
            background-color: #1E3A8A;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 45%;
            min-width: 300px;
            box-sizing: border-box;
            position: relative;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            flex-direction: column;
        }

        .review-card:hover {
            background-color: #2c5282;
        }

        .review-card .name {
            font-size: 1.8em;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .review-card:hover {
            background-color: #2c5282;
        }

        .review-card .stars {
            color: #FFD700;
            font-size: 3em;
            margin-top: -28px;
        }

        .review-card .text {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 2em;
            text-align: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div style="width: 1540px; height: 3000px; position: relative; background: #ffffff">
        <div style="width: 1440px; height: 2900px; left: 40px; top: 82px; position: absolute; background: #cbd9ff; box-shadow: 0px -6px 50px rgba(0, 0, 0, 0.15)"></div>
        <img style="width: 1440px; height: 540px; left: 40px; top: 50px; position: absolute" src="../offer/res/download (9).jpeg" />
        <div style="left: 104px; top: 2700px; position: absolute; flex-direction: column; justify-content: center; align-items: center; display: inline-flex">
            <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; display: flex">
                <div style="width: 1260px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                    <div style="width: 1260px; height: 200.50px; border: 3px #E8EEFB solid"></div>
                </div>
            </div>
        </div>
        <h1 style="position: absolute; top: 320px; left: 50%; transform: translateX(-50%); width: 100%; text-align: center; color: white; font-size: 48px; z-index: 10;font-weight: bold;">CUSTOMER REVIEW</h1>
        <div class="container">
            <h2>Here is what our Clients are saying About us</h2>
            <div class="reviews-section">
                <div class="reviews" id="pending-reviews">
                </div>
            </div>
        </div>
    </div>

    <!-- BOTTOM BAR -->
    <div style="position: absolute ;width: 1281px; height: 614px; left: 129px; top: 2480px; display: flex; flex-direction: row; padding-right: 46px; padding-left: 46px; justify-content: space-between; padding-top: 30px; padding-bottom: 20px;">

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
            <a class="nav-link" href="../offer/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: #ffffff; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">OFFERS</a>
            <a class="nav-link" href="../order/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: white; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">ORDERS</a>
            <a class="nav-link active" aria-current="page" href="../review/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: ##95A4C0; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">REVIEW</a>
            <a class="nav-link" href="../salary/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="justify-content: center; align-items: center; gap: 4px; display: flex; text-decoration: none;">
                <div style="color: #EFF0F4; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word">SALARY</div>
            </a>
        </div>
      </div>    
    </div>
  </div>
  <script>
        const id_penyedia_gedung = <?php echo $id_penyedia_gedung; ?>;
        const pendingReviewsUrl = `http://localhost/PemWeb/Enchanted-Edifice/src/database/penyedia_gedung/getReview.php?id=${id_penyedia_gedung}`;
        fetch(pendingReviewsUrl)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const pendingContainer = document.getElementById('pending-reviews');
                    data.forEach(review => {
                        if (!review.response_text) {
                            const card = createReviewCard(review);
                            pendingContainer.appendChild(card);
                        } else {
                            const card = createResponseCard(review);
                            const respondedContainer = document.getElementById('responded-reviews');
                            respondedContainer.appendChild(card);
                        }
                    });
                } else {
                    console.log('No pending reviews found');
                }
            })
            .catch(error => console.error('Error fetching pending reviews:', error));

        function createReviewCard(review) {
            const card = document.createElement('div');
            card.className = 'review-card';
            const stars = '★'.repeat(review.rating) + '☆'.repeat(5 - review.rating);

            card.innerHTML = `
                <div class="name">${review.customer_name}</div>
                <div class="stars">${stars}</div>
                <div class="text">${review.komentar}</div>
            `;

            return card;
        }

    </script>
    <script>
        function profileClick() {
            window.location.href = "../profile/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>";
        }
    </script>
</body>

</html>
  <!-- <script>
    untuk nambahin tanggapan dr penyedia gedung
        const id_penyedia_gedung = <?php echo $id_penyedia_gedung; ?>;
        const pendingReviewsUrl = `http://localhost/PemWeb/Enchanted-Edifice/src/database/penyedia_gedung/getReview.php?id=${id_penyedia_gedung}`;
        const respondedReviewsUrl = `http://localhost/PemWeb/Enchanted-Edifice/src/database/penyedia_gedung/getResponse.php?id=${id_penyedia_gedung}`;
        const submitResponseUrl = 'http://localhost/PemWeb/Enchanted-Edifice/src/database/penyedia_gedung/submitResponse.php';

        fetch(respondedReviewsUrl)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const respondedContainer = document.getElementById('responded-reviews');
                    data.forEach(response => {
                        const card = createResponseCard(response);
                        respondedContainer.appendChild(card);
                    });
                } else {
                    console.log('No responded reviews found');
                }
            })
            .catch(error => console.error('Error fetching responded reviews:', error));

        fetch(pendingReviewsUrl)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const pendingContainer = document.getElementById('pending-reviews');
                    data.forEach(review => {
                        if (!review.response_text) {
                            const card = createReviewCard(review);
                            pendingContainer.appendChild(card);
                        } else {
                            const card = createResponseCard(review);
                            const respondedContainer = document.getElementById('responded-reviews');
                            respondedContainer.appendChild(card);
                        }
                    });
                } else {
                    console.log('No pending reviews found');
                }
            })
            .catch(error => console.error('Error fetching pending reviews:', error));

        function createReviewCard(review) {
            const card = document.createElement('div');
            card.className = 'review-card';
            const stars = '★'.repeat(review.rating) + '☆'.repeat(5 - review.rating);

            card.innerHTML = `
                <div class="name">${review.customer_name}</div>
                <div class="stars">${stars}</div>
                <div class="text">${review.komentar}</div>
                <div class="response-area active">
                    <textarea class="response" placeholder="Write response..."></textarea>
                    <button class="upload-btn" onclick="uploadResponse(${review.id}, this)">Upload</button>
                </div>
            `;

            const responseTextarea = card.querySelector('.response');
            responseTextarea.addEventListener('input', function () {
                const uploadBtn = card.querySelector('.upload-btn');
                if (responseTextarea.value.trim()) {
                    uploadBtn.classList.add('visible');
                } else {
                    uploadBtn.classList.remove('visible');
                }
            });

            return card;
        }

        function createResponseCard(response) {
            const card = document.createElement('div');
            card.className = 'review-card';
            const stars = '★'.repeat(response.rating) + '☆'.repeat(5 - response.rating);

            card.innerHTML = `
                <div class="name">${response.customer_name}</div>
                <div class="stars">${stars}</div>
                <div class="text">${response.komentar}</div>
                <div class="text">You: ${response.response_text}</div>
            `;
            return card;
        }

        function uploadResponse(reviewId, button) {
            const responseText = button.previousElementSibling.value;
            if (responseText.trim()) {
                const confirmed = confirm('Are you sure you want to upload this response?');
                if (confirmed) {
                    fetch(submitResponseUrl, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: `id_review=${reviewId}&response=${encodeURIComponent(responseText)}&id_penyedia_gedung=${id_penyedia_gedung}`
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Your response has been successfully uploaded!');
                                const reviewCard = button.closest('.review-card');
                                reviewCard.querySelector('.response').innerText = responseText;
                                reviewCard.querySelector('.response-area').classList.remove('active');
                                button.classList.remove('visible');

                                const pendingReviewsContainer = document.getElementById('pending-reviews');
                                if (pendingReviewsContainer.contains(reviewCard)) {
                                    pendingReviewsContainer.removeChild(reviewCard);
                                }

                                const respondedReviewsContainer = document.getElementById('responded-reviews');
                                respondedReviewsContainer.appendChild(createResponseCard({
                                    ...data.review, // Data review yang sudah direspon
                                    response_text: responseText
                                }));
                            } else {
                                alert('Error: ' + data.message);
                            }
                        })
                        .catch(error => console.error('Error uploading response:', error));
                }
            } else {
                alert('Please write a response before uploading.');
            }
        }
    </script> -->
        <!-- <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: #FBFBFB;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
            margin-left: 170px;
            margin-right: 230px;
            position: absolute; 
            top: 620px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        .reviews-section {
            margin-bottom: 40px;
        }

        .reviews-section h3 {
            margin-bottom: 20px;
        }

        .reviews {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding-bottom: 20px;
        }

        .review-card {
            background-color: #1E3A8A;
            color: white;
            padding: 20px;
            border-radius: 10px;
            min-width: 300px;
            position: relative;
            flex-shrink: 0;
            transition: background-color 0.3s;
        }

        .review-card:hover,
        .review-card.active {
            background-color: #2c5282;
        }

        .review-card .stars {
            color: #FFD700;
        }

        .review-card .text {
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .response-area {
            margin-top: 10px;
        }

        .response {
            width: 100%;
            min-height: 100px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
        }

        .upload-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            display: none;
        }

        .upload-btn.visible {
            display: block;
        }

    </style> -->
    <!-- <div class="container">
            <h2>Here is what our Clients are saying About us</h2>
            <div class="reviews-section">
                <h3>Pending reviews:</h3>
                <div class="reviews" id="pending-reviews">
                </div>
            </div>
            <div class="reviews-section">
                <h3>Responded reviews:</h3>
                <div class="reviews" id="responded-reviews">
                </div>
            </div>
        </div> --> 