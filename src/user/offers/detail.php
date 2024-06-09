<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Gedung Indonesia</title>
    <style>
        body {
            background-color: #F3F4Fdf1;
        }

        .container-custom {
            background-color: #E2E9F8;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
            padding: 40px;
        }

        .header-image img {
            width: 100%;
            height: auto;
            max-height: 400px;
            border-radius: 15px;
        }

        .section-title {
            font-family: 'Lato', sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .section-subtitle {
            font-family: 'Lato', sans-serif;
            font-size: 18px;
            color: #555;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .facility-icon {
            width: 60px;
            height: 60px;
        }

        .facility-description {
            font-family: 'Lato', sans-serif;
            font-size: 14px;
            color: #333;
        }

        .map-container {
            margin-top: 40px;
            text-align: center;
            height: 500px;
        }

        .price-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .price-box div {
            font-family: 'Lato', sans-serif;
            font-size: 18px;
            color: #333;
        }

        .price-box h3 {
            font-family: 'Lato', sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .btn-custom {
            border-radius: 50px;
        }

        .facilities-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .facilities-list {
            list-style: none;
            padding: 0;
        }

        .facilities-list li {
            margin-bottom: 10px;
            font-family: 'Lato', sans-serif;
            font-size: 16px;
            color: #333;
        }

        .contact-host {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .contact-host i {
            font-size: 24px;
            margin-right: 10px;
            color: #333;
        }

        .contact-host span {
            font-family: 'Lato', sans-serif;
            font-size: 18px;
            color: #333;
        }

        .modal {
            display: none;
            width: 600px;
            max-width: 100%;
            height: auto;
            max-height: 100%;
            position: fixed;
            z-index: 100;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 20px;
            box-shadow: 0 0 60px 10px rgba(0, 0, 0, 0.4);
        }

        .modal-payment {
            display: none;
            width: auto;
            max-width: 100%;
            height: auto;
            max-height: 100%;
            position: fixed;
            z-index: 100;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 20px;
            box-shadow: 0 0 60px 10px rgba(0, 0, 0, 0.4);
            justify-content: center;
        }

        .modalOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 50;
            background: rgba(0, 0, 0, 0.6);
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .no-border {
            border: none;
            background-color: transparent;
            outline: none;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div id="container">

        </div>

        <!-- Location Map -->
        <div class="container-custom">
            <h3 class="section-title">Peta Lokasi</h3>
            <div class="map-container">
                <iframe src="https://maps.google.com/maps?output=embed&q=Jakarta&z=13&t=m" style="width: 100%; height: 100%; border-radius: 15px;"></iframe>
            </div>
        </div>
    </div>

    <!-- Modal overlay -->
    <div class="modalOverlay" id="modalOverlay"></div>

    <!-- Modal Detail Payment -->
    <div class="modal-payment" id="payment">

    </div>


    <!-- Modal payment -->
    <div class="modal" id="modal" style="padding: 24px;">
        <span class="close" id="close">&times;</span>
        <div id="modalItem">
            <h3 style="margin: 0;">Select your payment method</h3>
            <p style="margin: 0;">Update your plan payment details.</p>

            <!-- Master Card -->
            <div id="master-card" style="display: flex; flex-direction: row; align-items: center; margin-top: 16px; border: 1px solid #000; border-radius: 10px; cursor: pointer; height: 80px; padding-left: 16px;">
                <img src="./res/mastercard_logo.png" alt="Master Card" style="width: 50px; height: 50px;">
                <div style="border: 2px; margin-left: 10px;">
                    <p style="margin: 0;">Master Card</p>
                    <p style="margin: 0;">Set as default</p>
                </div>
            </div>

            <!-- Visa -->
            <div id="visa-card" style="display: flex; flex-direction: row; align-items: center; border: 1px solid #000; margin-top: 10px; border-radius: 10px; cursor: pointer; height: 80px; padding-left: 16px;">
                <img src="./res/Visa_Logo.png" alt="Visa Card" style="width: 50px; height: 35px;">
                <div style="border: 2px; margin-left: 10px;">
                    <p style="margin: 0;">Visa</p>
                    <p style="margin: 0;">Set as default</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <!-- item -->
    <script>
        // Menemukan elemen kontainer
        var container = document.getElementById("container");

        fetch('http://localhost/PemWeb/Enchanted-Edifice/src/database/penyedia_gedung/getItemById.php?id_produk=<?php echo htmlspecialchars($_GET['id_produk']); ?>')
            .then(response => response.json())
            .then(data => {
                // Membuat elemen untuk setiap item dalam data
                data.forEach(function(item) {
                    // Buat elemen div untuk setiap item
                    var itemContainer = document.createElement("div");

                    // Konten HTML untuk setiap item
                    var content = `
                    <!-- Header Image -->
                    <div class="header-image mb-4">
                        <img src="${item.gambar}" alt="Gedung Indonesia">
                    </div>

                    <!-- Apartment Description -->
                    <div class="container-custom">
                        <h2 class="section-title">${item.judul}</h2>
                        <p class="section-subtitle">★ New To Sender <a href="#">(999+ reviews)</a></p>
                        <p>Jakarta</p>
                        <p>${item.deskripsi}</p>
                        <h3 class="section-title mt-4">Atur Jadwal mu disini..</h3>
                        <div class="price-box">
                            <form class="datetimeForm" style="display:flex; flex-direction:row;">
                                <!-- Check-In Date -->
                                <div>
                                    <label for="checkin">Check-in
                                    </label>
                                    <input type="date" class="checkin" name="checkin" id="checkin" style="display:block;">
                                </div>

                                <!-- Check-Out Date -->
                                <div style="margin-left:10px;">
                                    <label for="checkout">Check-out
                                    </label>
                                    <input type="date" class="checkout" name="checkout" id="checkout" style="display:block;">
                                </div>

                                <div style="margin-left:20px;">
                                    <label for="paket-dropdown">Pilih Paket</label>
                                    <select id="paket-dropdown" name="paket" style="display:block; height:31px;">
                                        <option value="">Select a package</option>
                                    </select>
                                </div>

                            </form>
                            <h3>Rp.${item.harga}</h3>
                            <button class="btn btn-primary btn-custom" onclick="calculateTotal()" id="reserve">Reserve Now</button>
                        </div>
                    </div>

                    <!-- Facilities Section -->
                    <div class="container-custom">
                        <div class="facilities-section">
                            <div>
                                <h3 class="section-title">Fasilitas Teratas</h3>
                                <ul class="facilities-list">
                                    <li><img src="../offers/image/PemanasRuangan.png" alt="Facility 1" class="facility-icon"> Pemanas ruangan</li>
                                    <li><img src="../offers/image/AC.png" alt="Facility 2" class="facility-icon"> Ruangan Ber AC</li>
                                    <li><img src="../offers/image/Elevator.png" alt="Facility 3" class="facility-icon"> Elevator</li>
                                    <li><img src="../offers/image/Layanan.png" alt="Facility 4" class="facility-icon"> Layanan Tiap Saat</li>
                                    <li><a href="#">Lihat semua fasilitas</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="section-title">The Sonder standard</h3>
                                <ul class="facilities-list">
                                    <li><img src="../offers/image/Password.png" alt="Facility 5" class="facility-icon"> Chek-in Password</li>
                                    <li><img src="../offers/image/Wifi.png" alt="Facility 6" class="facility-icon"> WIFI Cepat</li>
                                    <li><img src="../offers/image/Kebersihan.png" alt="Facility 7" class="facility-icon"> Kebersihan Profesional</li>
                                    <li><img src="../offers/image/Perlengkapan.png" alt="Facility 8" class="facility-icon"> Perlengkapan Lengkap</li>
                                </ul>
                            </div>
                            <div class="contact-host">
                                <i class="fa fa-phone"></i>
                                <span>(+62 ) 123 456 789</span>
                            </div>
                        </div>
                    </div>
                    `;

                    var itemContent = `
                    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 24px;">
                        <h2>Booking Details</h2>
                        <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                            <img src="${item.gambar}" alt="" style="width: 300px; height: 250px; border-radius: 20px; margin-bottom: 30px;">
                            <div style="display: flex; flex-direction: column; justify-content: space-between; margin-left: 15px; margin-top: 40px;">
                            <form action="../../database/custommer/orderProduct.php" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 10px;">
                                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo htmlspecialchars($_GET['id']); ?>" >
                                <input type="hidden" name="id_produk" id="id_produk" value="${item.id_produk}" >
                                <input type="hidden" name="id_paket" id="id_paket">
                                <input type="hidden" name="tipe_pembayaran" id="tipe_pembayaran">
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <label for="judul" style="width: 100px;">Judul:</label>
                                    <input readonly type="text" name="judul" id="judul" value="${item.judul}" class="no-border">
                                </div>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <label for="checkinValue" style="width: 100px;">CheckIn:</label>
                                    <input readonly type="date" name="checkinValue" id="checkinValue" class="no-border">
                                </div>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <label for="checkoutValue" style="width: 100px;">CheckOut:</label>
                                    <input readonly type="date" name="checkoutValue" id="checkoutValue" class="no-border">
                                </div>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <label for="harga" style="width: 100px;">Harga:</label>
                                    <input readonly type="text" name="harga" id="harga" value="${item.harga}" class="no-border">
                                </div>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <label for="paket" style="width: 100px;">Paket:</label>
                                    <input readonly type="text" name="paket" id="paket" class="no-border">
                                </div>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <label for="total" style="width: 100px;">Total:</label>
                                    <input readonly type="text" name="total" id="total" class="no-border">
                                </div>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <label for="buktiPembayaran" style="width: 100px;">Bukti:</label>
                                    <input type="file" name="buktiPembayaran" id="buktiPembayaran" accept="image/*" class="no-border">
                                </div>
                                <button type="submit" class="btn btn-secondary" style="width: 40%; margin-top: 35px;">Next</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    `;

                    payment.innerHTML = itemContent;
                    itemContainer.innerHTML = content;
                    container.appendChild(itemContainer);

                    itemContainer.querySelector('.btn.btn-primary.btn-custom').addEventListener('click', function() {
                        modal.style.display = "block";
                        modalOverlay.style.display = "block";
                    });

                    const checkin = document.getElementById('checkin');
                    const checkinValue = document.getElementById('checkinValue');

                    const checkout = document.getElementById('checkout');
                    const checkoutValue = document.getElementById('checkoutValue');

                    checkin.addEventListener("input", function() {
                        checkinValue.value = checkin.value;
                    });

                    checkout.addEventListener("input", function() {
                        checkoutValue.value = checkout.value;
                    });

                });
            })
            .catch(error => console.error('Error:', error));
    </script>

    <script>
        function initMap() {
            // Initialize the map
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -6.2088,
                    lng: 106.8456
                }, // Jakarta coordinates
                zoom: 12 // Zoom level
            });
        }

        // Ketika tombol close diklik, sembunyikan modal dan overlay
        document.getElementById('close').onclick = function() {
            document.getElementById('modal').style.display = "none";
            document.getElementById('modalOverlay').style.display = "none";
        }

        // Ketika tombol close diklik, sembunyikan modal dan overlay
        document.getElementById('master-card').onclick = function() {
            document.getElementById('modal').style.display = "none";
            document.getElementById('payment').style.display = "block";
        }

        // Ketika tombol close diklik, sembunyikan modal dan overlay
        document.getElementById('visa-card').onclick = function() {
            document.getElementById('modal').style.display = "none";
            document.getElementById('payment').style.display = "block";
        }

        // Ketika pengguna mengklik di luar modal, sembunyikan modal dan overlay
        window.onclick = function(event) {
            if (event.target == document.getElementById('modalOverlay')) {
                document.getElementById('modal').style.display = "none";
                document.getElementById('payment').style.display = "none";
                document.getElementById('modalOverlay').style.display = "none";
            }
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            async function getPaket() {
                try {
                    const response = await fetch('http://localhost/PemWeb/Enchanted-Edifice/src/database/custommer/getPaket.php?id_produk=<?php echo htmlspecialchars($_GET['id_produk']); ?>');
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const paketData = await response.json();
                    return paketData;
                } catch (error) {
                    console.error('Error fetching paket data:', error);
                    return [];
                }
            }

            function selectPaymentMethod(method) {
                document.getElementById('tipe_pembayaran').value = method;
                console.log(`Payment method selected: ${method}`);
            }

            document.getElementById('master-card').addEventListener('click', function() {
                selectPaymentMethod('Master Card');
            });

            document.getElementById('visa-card').addEventListener('click', function() {
                selectPaymentMethod('Visa');
            });

            async function populatePaketDropdown() {
                const paketData = await getPaket();
                const paketDropdown = document.getElementById('paket-dropdown');

                if (Array.isArray(paketData) && paketData.length > 0) {
                    paketData.forEach(paket => {
                        const option = document.createElement('option');
                        option.value = paket.id_paket;
                        option.setAttribute('data-price', paket.harga_paket);
                        option.textContent = paket.nama_paket;
                        paketDropdown.appendChild(option);
                    });
                } else {
                    const option = document.createElement('option');
                    option.value = "";
                    option.textContent = "No packages available";
                    paketDropdown.appendChild(option);
                }

                console.log('Dropdown populated with paket options:', paketData);
            }

            populatePaketDropdown();

            document.getElementById('paket-dropdown').addEventListener('change', calculateTotal);
        });

        function calculateTotal() {
            const harga = parseInt(document.getElementById('harga').value, 10) || 0;
            const paketDropdown = document.getElementById('paket-dropdown');
            const selectedPaketOption = paketDropdown.options[paketDropdown.selectedIndex];
            const hargaPaket = parseInt(selectedPaketOption.getAttribute('data-price'), 10) || 0;
            const paketName = selectedPaketOption.textContent;
            const total = harga + hargaPaket;

            document.getElementById('paket').value = paketName;
            document.getElementById('total').value = total;
            document.getElementById('id_paket').value = selectedPaketOption.value;

            console.log('Selected package:', paketName, 'Price:', hargaPaket, 'ID Paket:', selectedPaketOption.value);
            console.log('Hidden input id_paket value:', document.getElementById('id_paket').value);
        }
    </script>

</body>

</html>