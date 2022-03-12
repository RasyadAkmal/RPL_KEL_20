<?php
    include 'config.php';
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password1 = $_POST['password'];
            $password2 = md5($password1);
            $login = mysqli_query($mysqli, "SELECT * FROM akun WHERE username='$username'");
            $cek = mysqli_num_rows($login);
            if($cek > 0){
                session_start();
                $_SESSION['username'] = $username;
                header("location:indexta.php");
            }
            else{
                header("location:login.php"); 
            }
        }
?>