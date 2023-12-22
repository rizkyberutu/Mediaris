<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $name = "mediaris";
  $config = mysqli_connect($host, $user, $pass) or die ("Koneksi ke database gagal");
  mysqli_select_db($config,$name) or die ("Database tidak tersedia");
?>