<?php
session_start();
include '../includes/config.php';
var_dump($_POST);

if(isset($_POST["login"])){
$username = $_POST['username'];
$password = $_POST['password'];
$query = mysqli_query($config, "SELECT * from customers where username='$username'");
$cek = mysqli_num_rows($query);
$d = mysqli_fetch_assoc($query);

if ($cek == true) {
    if (password_verify($password, $d["password"])){
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    echo 
    "<script>
    alert('Login Berhasil');
    </script>";
    header("location:index.php?customer_id=");
    exit;
    } else {
        echo 
        "<script>
        alert('konfirmasi password tidak sesuai');
        </script>";
    header("location:login.php");
    }
    } else{
        echo 
        "<script>
        alert('gagal login');
        </script>";
    }
}
?>