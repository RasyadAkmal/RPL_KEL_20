<?php 
include 'config.php';

// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){   
	header("location:indexta.php");
}

$plat=$_SESSION['plat'];

// SELECT (READ)
$query = mysqli_query ($mysqli, "SELECT INDRA.plat_nomor, INDRA.nomor_rangka, INDRA.nama_pemilik, INDRA.merk, ditlantas.pajak 
FROM (INDRA INNER JOIN ditlantas ON INDRA.plat_nomor = ditlantas.plat_nomor) WHERE INDRA.plat_nomor='$plat'");
$data = mysqli_fetch_assoc($query);
 
// DELETE
if(isset($_POST['delete'])) {
    $platno = $data['plat_nomor'];
    $result = mysqli_query($mysqli, "DELETE FROM INDRA WHERE plat_nomor='$platno'");
    // After delete redirect to Home, so that latest user list will be displayed.
    header("Location:indexta.php");
}

// UPDATE
if(isset($_POST['update-button'])) {
    $platnomor = $data['plat_nomor'];
    $pajak = $_POST['pajak'];
    $result2 = mysqli_query($mysqli,"UPDATE ditlantas SET pajak='$pajak' WHERE plat_nomor='$platnomor'");
    header("Location:indexta.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDRA</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="badan">
    <div class="pajak">
        <label>Perpanjang pajak sampai dengan : </label>
        <form action="./hometa.php" method="POST">
            <input type="text" name="pajak" placeholder="tgl bln thn" id="pajak">
            <button name="update-button" id="update-button">Perpanjang</button>
        </form>
    </div>
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
                    <br><br>
                    <?php echo "Nama pemilik : ".$data['nama_pemilik']; ?>
                    <br><br>
                    <?php echo "Nomor rangka : ".$data['nomor_rangka']; ?>
                    <br><br>
                    <?php echo "Merk kendaraan : ".$data['merk']; ?>
                    <br><br>
                    <?php echo "TNKB : ".$data['plat_nomor']; ?>
                    <br><br>
                    <?php echo "Pajak berlaku sampai : ".$data['pajak']; ?>
                    <br><br><br>
                    <button href="indexta.php" id="form-button">Kembali</button>
                </form>
            </div>
            <form action="./hometa.php" method="POST">
                <button name="delete" href="indexta.php" id="hapus">Hapus Data Kendaraan</button> 
            </form>
        </div>
        <a class="logoutbutton" href="logout.php">LOGOUT</a> 
    </div>
</body>
</html>