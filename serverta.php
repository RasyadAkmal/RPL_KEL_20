<?php 
include 'config.php';
 
$nama = $_POST['nama'];
$plat = $_POST['plat'];
 
$login = mysqli_query($mysqli,"SELECT * FROM INDRA WHERE plat_nomor='$plat' and nama_pemilik='$nama'");
$cek = mysqli_num_rows($login);
if($cek > 0){
    session_start();
	$_SESSION['plat'] = $plat;
	$_SESSION['status'] = "login";
	header("location:hometa.php");
}
else {
    header("location:indexta.php");
}
?>