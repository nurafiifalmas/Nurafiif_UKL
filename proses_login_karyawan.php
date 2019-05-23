<?php
session_start();
if (isset($_GET["logout"])) {
  session_destroy();
  header("location:login_karyawan.php");
}
$username = $_POST["username"];
$password = $_POST["password"];

//koneksi database
$koneksi = mysqli_connect("localhost","root","","penyewaan");
$sql = "SELECT * FROM karyawan WHERE username='$username' and password='$password'";
$result = mysqli_query($koneksi,$sql);
$jumlah = mysqli_num_rows($result);
if ($jumlah == 0) {
  $_SESSION["message"] = array(
    "type" => "danger",
    "message" => "Username/Password invalid"
  );
  header("location:login_karyawan.php");
} else {
  $_SESSION["session_karyawan"] = mysqli_fetch_array($result);
  header("location:template.php?page=mobil");
}

 ?>
