<?php
require_once ('../../database/koneksi.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT username FROM penyedia_gedung WHERE id = $id";

  $result = mysqli_query($connection, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $nama = $row['username'];
    }
  }
}
mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">

<s>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Offers Enchanted Edifice</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">
  <style>
    #listProduk {
      display: flex;
      flex-wrap: wrap;
      padding: 26px;
      justify-content: space-between;
    }

    .listProduk {
      width: calc(33.33% - 30px);
      /* Lebar item dengan margin antar item */
      margin-bottom: 45px;
      border-radius: 16px;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.589);
    }
  </style>
  </head>

  <body>

    <!-- Gambar -->
    <div
      style="width: 100%; height: auto; position: relative; background: #FBFBFB; left: 50%; transform: translateX(-50%);">
      <div
        style="width: 100%; height: auto; left: 50%; top: 39.27px; position: absolute; background: #F3F4F7; box-shadow: 0px -6px 50px rgba(0, 0, 0, 0.15); transform: translateX(-50%);">
      </div>
      <div
        style="width: 100%; height: auto; left: 50%; top: 102px; position: absolute; background: #F3F4F7; box-shadow: 0px -6px 50px rgba(0, 0, 0, 0.15); transform: translateX(-50%);">
      </div>
      <img style="width: 100%; height: 540px; left: 50%; top: 0; position: absolute; transform: translateX(-50%);"
        src="../offer/res/download (9).jpeg" />
    </div>

    <!-- Effek -->
    <div
      style="width: 100%; height: 540px; left: 50%; top: 0; position: absolute; background: rgba(2.64, 9.30, 26.44, 0.51); transform: translateX(-50%);">
    </div>

    <!-- Top Bar -->
    <div style="width: 1440px; height: 99px; left: 50%; top: 35px; position: absolute; transform: translateX(-50%);">
      <div
        style="width: 1440px; height: 99px; padding-top: 24px; padding-bottom: 24px; left: 0px; top: 0px; position: absolute; flex-direction: column; justify-content: center; align-items: center; gap: 10px; display: inline-flex">
        <div style="width: 1261px; justify-content: space-between; align-items: center; display: inline-flex">
          <div
            style="flex: 1 1 0; height: 99px; justify-content: flex-start; align-items: center; gap: 10px; display: flex">
            <img style="width: 84px; height: 84px" src="../offer/res/Exclude.png" />
            <div><span
                style="color: #D3D6DB; font-size: 22px; font-family: Roboto; font-weight: 700; line-height: 33px; word-wrap: break-word">Enchanted</span><span
                style="color: #ABB5C6; font-size: 22px; font-family: Roboto; font-weight: 400; line-height: 33px; word-wrap: break-word">Edifice</span>
            </div>
          </div>
        </div>
      </div>
      <div
        style="width: 80px; height: 41px; left: 1260px; top: 30px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
        <div style="width: 80px; height: 41px; position: relative">
          <img style="width: 23px; height: 23px; left: 44px; top: 9px; position: absolute; "
            src="../offer/res/🦆 icon _User Circle_.png">
          <div
            style="width: 29px; height: 29px; padding-left: 3.62px; padding-right: 3.62px; padding-top: 7.25px; padding-bottom: 7.25px; left: 8px; top: 6px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
            <img style="width: 21.75px; height: 14.50px;" src="../offer/res/material-symbols_menu.png">
          </div>
          <div
            style="width: 80px; height: 41px; left: 0px; top: 0px; position: absolute; border-radius: 15px; border: 2px white solid">
          </div>
        </div>
      </div>
      <div
        style="width: 424px; height: 24px; left: 777px; top: 39px; position: absolute; justify-content: flex-end; align-items: center; gap: 40px; display: inline-flex">
        <div style="justify-content: center; align-items: center; gap: 32px; display: flex">
          <a class="nav-link" href="../home/index.php?id=<?php echo htmlspecialchars($_GET['id']); ?>"
            style="color: white; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">HOME</a>
          <a class="nav-link active" aria-current="page" href="../offer/"
            style="color: #95A4C0; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">OFFERS</a>
          <a class="nav-link" href="../order/"
            style="color: white; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">ORDERS</a>
          <a class="nav-link" href="../review/"
            style="color: #EFF0F4; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word; text-decoration: none;">REVIEW</a>
          <a class="nav-link" href="../salary/"
            style="justify-content: center; align-items: center; gap: 4px; display: flex; text-decoration: none;">
            <div
              style="color: #EFF0F4; font-size: 16px; font-family: Lato; font-weight: 700; line-height: 24px; word-wrap: break-word">
              SALARY</div>
          </a>
        </div>
      </div>
    </div>

    <!-- Biru Transparan -->
    <div
      style="width: 80%; height: 521px; left: 50%; top: 300px; position: absolute; background: rgba(133.98, 145.72, 165.75, 0.55); transform: translateX(-50%); border-radius: 15px;">
    </div>

    <!-- Bendera Indonesia -->
    <div style="width: 25px; height: 18.75px; left: 50%; top: 613px; position: absolute; transform: translateX(-50%);">
      <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute; background: white"></div>
      <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute">
        <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute; background: #D9D9D9"></div>
        <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute">
          <div style="width: 25px; height: 18.75px; left: 0px; top: 0px; position: absolute; background: white"></div>
          <div style="width: 25px; height: 9.38px; left: 0px; top: 0px; position: absolute; background: #E31D1C"></div>
        </div>
      </div>
    </div>

    <!-- Profile Image -->
    <div style="width: 182px; height: 182px; left: 50%; top: 350px; position: absolute; transform: translateX(-50%);">
      <div style="width: 173.47px; height: 173.47px; left: 4.26px; top: 4.26px; position: absolute">
        <div
          style="width: 173.47px; height: 173.47px; left: 0px; top: 0px; position: absolute; border-radius: 9999px; overflow: hidden;">
          <img src="../offer/res/332a995097c86d47a2177e337095f2f5 1.png"
            style="width: 100%; height: 100%; object-fit: cover;" />
        </div>
      </div>
      <div
        style="width: 182px; height: 182px; left: 0px; top: 0px; position: absolute; border-radius: 9999px; border: 7px white solid">
      </div>
    </div>

    <div
      style="left: 50%; top: 550px; position: absolute; color: rgba(16.72, 56.03, 92.44, 0.88); font-size: 36px; font-family: Poppins; font-weight: 500; word-wrap: break-word; transform: translateX(-50%);">
      <?php echo $nama; ?>
    </div>

    <div
      style="left: 50%; top: 640px; position: absolute; color: rgba(16.72, 56.03, 92.44, 0.88); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word; transform: translateX(-50%);">
      Lampung, Indonesia</div>

    <div
      style="width: 204px; padding-left: 22px; padding-right: 22px; padding-top: 10px; padding-bottom: 10px; left: 50%; top: 700px; position: absolute; background: rgba(16.72, 56.03, 92.44, 0.88); border-radius: 10px; justify-content: center; align-items: center; gap: 10px; display: inline-flex; transform: translateX(-50%);">
      <img src="../offer/res/🦆 icon _share_.png" style="width: 21.50px; height: 18.81px;">
      <div
        style="text-align: center; color: white; font-size: 17px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
        Share Store
      </div>
    </div>

    <!-- Menu Item Hotel -->
    <div
      style="width: 100%; height: auto; left: 50%; top: 880px; position: absolute; transform: translateX(-50%); display: flex; flex-direction: column;">
      <div style="width: 100%; display: flex; justify-content: center; margin-top: 10px; padding-bottom: 60px;">
        <button type="button" class="btn btn-outline-primary" style="width: 200px;">+Offers</button>
      </div>

      <div id="listProduk" style="width: 100%; margin: auto;">
      </div>
    </div>

    <!-- Get Data Item Produk Hotel -->
    <script>
      // Menemukan elemen kontainer
      var menuItemContainer = document.getElementById("listProduk");

      fetch('http://localhost/PemWeb/Enchanted-Edifice/src/database/penyedia_gedung/getAll.php?id_penyedia_gedung=<?php echo htmlspecialchars($_GET['id']); ?>')
        .then(response => response.json())
        .then(data => {
          // Membuat elemen untuk setiap item dalam data
          data.forEach(function (item) {
            var itemContainer = document.createElement("div");
            itemContainer.classList.add("listProduk");

            var content = `
        <img style="width: 100%; height: 320px; border-top-left-radius: 16px; border-top-right-radius: 16px"
        src="${item.gambar}" />
      <div style="padding: 16px;">
        <div style="color: #24AB70; font-size: 12px; font-family: Open Sans; font-weight: 400; line-height: 18px;">
          London NW8 7JT England
        </div>
        <div
          style="color: #222222; font-size: 24px; font-family: Open Sans; font-weight: 600; line-height: 30px; margin-top: 10px;">
          ${item.judul}
        </div>
        <div
          style="color: #222222; font-size: 16px; font-family: Open Sans; font-weight: 400; line-height: 18px; margin-top: 10px;">
          ${item.harga} Per Night
        </div>
        <div style="display: flex; align-items: center; margin-top: 10px;">
          <div
            style="color: #222222; font-size: 16px; font-family: Open Sans; font-weight: 400; line-height: 18px; margin-left: 10px;">
            4.8
          </div>
        </div>
      </div>`;

            itemContainer.innerHTML = content;
            menuItemContainer.appendChild(itemContainer);
          });
        })
        .catch(error => console.error('Error:', error));
    </script>

  </body>

</html>