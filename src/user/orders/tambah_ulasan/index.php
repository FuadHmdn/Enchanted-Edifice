<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Review</title>

    <style>
        @font-face {
            font-family: 'Abril Fatface';
            src: url('/res/Abril_Fatface/AbrilFatface-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
        }

        body {
            background-color: #F3F4F7;
        }

        #submit-button {
            border: 2px solid #d8d8d8;
            width: 200px;
            height: 50px;
            margin-top: 10px;
            border-radius: 20px;
            font-weight: 600;
            color: rgb(255, 255, 255);
            background-color: #728bb3;
            transition: background-color 0.3s ease;
            align-self: flex-end;
        }

        #submit-button:hover {
            background-color: #384e97;
        }

        .rating {
            display: flex;
            direction: row-reverse;
            justify-content: center;
            align-self: flex-end;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 2.5rem;
            color: lightgray;
            cursor: pointer;
        }

        .rating input:checked~label {
            color: gold;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input:checked~label:hover,
        .rating input:checked~label:hover~label {
            color: gold;
        }

        .review-bg {
            background-color: white;
            width: 100%;
            margin-left: 16px;
            margin-right: 16px;
            margin-top: 36px;
            padding: 16px;
            border-radius: 25px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.450);
        }

        .review-list {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            background-color: #D3E3FF;
            border-radius: 20px;
            padding: 16px;
        }
    </style>
</head>

<body>
<div style="display: flex; flex-direction: column; max-width: 100%; height: auto; padding-left: 46px; padding-right: 46px; padding-top: 46px;">

<a href="../../orders/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" style="text-decoration: none; color: #8692A6; font-size: 18px; font-weight: bold;">
    <span><img src="../../../login/user/res/arrow_back_ios_24px.png" alt="arrow"> Back</span>
</a>

<div style="background-color: white; width: 100%; margin-left: 16px; margin-right: 16px; margin-top: 36px; padding: 16px; border-radius: 25px; box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.450);">
    <form id="review-form" action="../../../database/custommer/submitReview.php" method="post">

        <input type="hidden" name="id_produk" value="<?php echo htmlspecialchars($_GET['id_produk']); ?>">
        <input type="hidden" name="id_custommer" value="<?php echo htmlspecialchars($_GET['id']); ?>">

        <!-- Pesan Dan Button -->
        <div class="form-group" style="display: flex; flex-direction: column;">
            <!-- TextField Pesan -->
            <label for="message" class="form-label" style="font-weight: 600;">Pesan</label>
            <textarea id="message" class="form-control" name="message" rows="5" cols="50"
                placeholder="Type your message here..." maxlength="500"
                style="background-color: #e9ebee; border-radius: 20px; padding: 10px;"></textarea>

            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
            </div>

            <input id="submit-button" type="submit" value="SEND MESSAGE">
        </div>
    </form>
</div>

<div id="review" style="margin-top: 30px;"></div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        // Menemukan elemen kontainer
        var menuReviewContainer = document.getElementById("review");
        var form = document.getElementById("review-form");
        var id_produk = "<?php echo htmlspecialchars($_GET['id_produk']); ?>";

        // Fungsi untuk menghasilkan bintang berdasarkan rating
        function generateStarRating(rating) {
            var stars = '';
            for (var i = 1; i <= rating; i++) {
                stars += '★'; // Menggunakan Unicode bintang
            }
            return stars;
        }

        function fetchReviews() {
            fetch(`../../../database/custommer/getReview.php?id_produk=${id_produk}`)
                .then(response => response.json())
                .then(data => {
                    menuReviewContainer.innerHTML = ''; // Clear existing reviews
                    // Membuat elemen untuk setiap item dalam data
                    data.forEach(function (item) {
                        var itemContainer = document.createElement("div");
                        itemContainer.classList.add("review-bg");

                        var content = `<div class="review-list">
                                        <p style="font-weight: bold; font-size: 18px;">User Review</p>
                                        <p style="margin: 10px 0; font-size: 16px; font-family: 'Lato', sans-serif;">"${item.komentar}"</p>
                                        <div style="display: flex; max-width: 100%;">
                                            <span style="color: gold; font-size: 40px;">${generateStarRating(item.rating)}</span>
                                        </div>
                                    </div>`;

                        itemContainer.innerHTML = content;
                        itemContainer.style.marginBottom = "20px";
                        menuReviewContainer.appendChild(itemContainer);
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission
            var formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                }
                addNewReview(formData.get('message'), formData.get('rating')); // Add new review to the top
            })
            .catch(error => console.error('Error:', error));
        });

        function addNewReview(message, rating) {
            var itemContainer = document.createElement("div");
            itemContainer.classList.add("review-bg");

            var content = `<div class="review-list">
                            <p style="font-weight: bold; font-size: 18px;">User Review</p>
                            <p style="margin: 10px 0; font-size: 16px; font-family: 'Lato', sans-serif;">"${message}"</p>
                            <div style="display: flex; max-width: 100%;">
                                <span style="color: gold; font-size: 40px;">${generateStarRating(rating)}</span>
                            </div>
                        </div>`;

            itemContainer.innerHTML = content;
            itemContainer.style.marginBottom = "20px";
            menuReviewContainer.insertBefore(itemContainer, menuReviewContainer.firstChild);
        }

        // Initial fetch of reviews
        fetchReviews();
    </script>

</body>

</html>