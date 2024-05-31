<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Review Enchanted Edifice</title>
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

      .container {
            max-width: 1200px;
            margin-top: 770px;
            margin-left: 200px;
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
        }
        .review-card .stars {
            color: #FFD700;
        }
        .review-card .response {
            background-color: #E5E7EB;
            color: black;
            border: none;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            margin-top: 20px;
        }
        .review-card .response-area {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .upload-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
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
        <h1 style="position: absolute; top: 320px; left: 50%; transform: translateX(-50%); width: 100%; text-align: center; color: white; font-size: 48px; z-index: 10;font-weight: bold;">CUSTOMER REVIEW <br> INI BELUM SELESAI YAA</h1>
    </div>

    <div class="container">
        <h2>Here is what our Clients are saying About us</h2>
        <div class="reviews-section">
            <h3>Pending reviews:</h3>
            <div class="reviews" id="pending-reviews">
                <!-- Pending reviews will be injected here -->
            </div>
        </div>
        <div class="reviews-section">
            <h3>Responded reviews:</h3>
            <div class="reviews" id="responded-reviews">
                <!-- Responded reviews will be injected here -->
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
            <a class="nav-link" href="../order/index.html?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: white; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">ORDERS</a>
            <a class="nav-link active" aria-current="page" href="../review/index.html?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="color: ##95A4C0; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">REVIEW</a>
            <a class="nav-link" href="../salaryi/ndex.html?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="justify-content: center; align-items: center; gap: 4px; display: flex; text-decoration: none;">
                <div style="color: #EFF0F4; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word">SALARY</div>
            </a>
        </div>
      </div>    
    </div>
  </div>

  <script>
    const id_penyedia_gedung = <?php echo json_encode($_GET['id_penyedia_gedung']); ?>;
    const pendingReviewsUrl = `http://localhost/PemWeb/Enchanted-Edifice/src/database/custommer/getReview.php?id_penyedia_gedung=${id_penyedia_gedung}`;
    const submitResponseUrl = 'http://localhost/PemWeb/Enchanted-Edifice/src/database/custommer/submitResponse.php';

    fetch(pendingReviewsUrl)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                const pendingContainer = document.getElementById('pending-reviews');
                data.forEach(review => {
                    const card = createReviewCard(review, true);
                    pendingContainer.appendChild(card);
                });
            } else {
                console.log('No pending reviews found');
            }
        })
        .catch(error => console.error('Error fetching reviews:', error));

    function createReviewCard(review, isPending) {
        const card = document.createElement('div');
        card.className = 'review-card';

        const stars = '★'.repeat(review.rating) + '☆'.repeat(5 - review.rating);

        card.innerHTML = `
            <div class="name">${review.id_produk}</div>
            <div class="stars">${stars}</div>
            <div class="text">${review.komentar}</div>
            ${isPending ? `<div class="response-area">
                            <textarea class="response" placeholder="write response..."></textarea>
                            <button class="upload-btn" onclick="uploadResponse(${review.id}, this)">Upload</button>
                           </div>` : `<div class="response-area"><div class="response">${review.response}</div></div>`}
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
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id_review: reviewId, response: responseText })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Your response has been successfully uploaded!');
                        location.reload();
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
</script>
  
</body>
</html>