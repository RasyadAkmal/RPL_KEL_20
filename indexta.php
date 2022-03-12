<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDRA</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="badan">
  <div class="main">
    <header>
      <div class="nav-container">
      <h2 class="judul">INDRA</h2>
      <p class="deskripsi">Info Kendaraan</p>
      <img src="ditlantas.png">
      </div>
    </header>

    <div class="menu">
      <div class="form-container">
        <form class="form" action="./serverta.php" method="POST">
          <div class="form-content">  
            <h3 class="judulD">DATA KENDARAAN</h3>
            <label id="tnkb">Tanda Nomor Kendaraan Bermotor</label>
            <input type="plat" name="plat" placeholder="Plat Nomor" id="plat">
            <br>
            <label id="pemilik">Nama Pemilik</label>
            <input type="text" name="nama" placeholder="Nama Pemilik" id="nama">
            <br><br>
            <button id="form-button" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="tambah-container">
    <form action="./indexta.php" method="POST" class="tambah">
      <h3 class="judulD">DAFTARKAN KENDARAAN</h3>
      <label id="tnkb">Tanda Nomor Kendaraan Bermotor</label>
      <input type="plat" name="plat" placeholder="Plat Nomor" id="plat">
      <br>
      <label id="pemilik">Nama Pemilik</label>
      <input type="text" name="nama" placeholder="Nama Pemilik" id="nama">
      <br>
      <label id="pemilik">Merk</label>
      <input type="text" name="merk" placeholder="Merk" id="merk">
      <br>
      <label id="pemilik">Nomor Rangka</label>
      <input type="text" name="rangka" placeholder="Nomor Rangka (8 Digit)" id="rangka">
      <br>
      <label id="pemilik">Pajak Kendaraan Sampai</label>
      <input type="text" name="pajak" placeholder="Pajak Kendaraan" id="pajak">
      <br><br>
      <button id="daftar-button" name="daftar">DAFTAR</button>
    </form>
  </div>
</body>
</html>
<?php

// CREATE

if(isset($_POST['daftar'])) {
  $nama = $_POST['nama'];
  $plat = $_POST['plat'];
  $merk = $_POST['merk'];
  $rangka = $_POST['rangka'];
  $pajak = $_POST['pajak'];
  
  include_once("config.php");
  $result = mysqli_query($mysqli,"INSERT INTO INDRA (nama_pemilik,plat_nomor,nomor_rangka,merk) VALUES ('$nama','$plat','$rangka','$merk')");
  $result2 = mysqli_query($mysqli,"INSERT INTO ditlantas (plat_nomor,pajak) VALUES ('$plat','$pajak')");
}
?>