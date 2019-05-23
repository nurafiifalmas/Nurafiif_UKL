<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","penyewaan");
if (isset($_GET["id_sewa"])) {
  $id_sewa = $_GET["id_sewa"];
  $sql = "SELECT * FROM mobil WHERE id_mobil='$id_mobil'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);

  if (!in_array($hasil,$_SESSION["session_sewa"])) {
    array_push($_SESSION["session_sewa"],$hasil);
  }
  header("location:template_pembeli.php?page=list_mobil");
}
if (isset($_GET["checkout"])) {
  $id_sewa = rand(1,10000).date("dmY");
  $id_pelanggan = $_SESSION["session_pelanggan"]["id_pelanggan"];
  $tgl_sewa = date("Y-m-d");
  $tgl_sewa = date("Y-m-d");
  $sql = "INSERT INTO sewa VALUES('$id_sewa','$id_pelanggan','$tgl_sewa','$tgl_kembali')";
  if (mysqli_query($koneksi,$sql)) {
    foreach ($_SESSION["session_sewa"] as $hasil) {
      $id_mobil = $hasil["id_sewa"];
      $jumlah= $_POST['jumlah_mobil'.$hasil["id_sewa"]];
      $harga_sewa = $hasil["total_sewa"];
      $sql2 = "INSERT INTO detail_sewa VALUES('$id_sewa','$id_mobil','$jumlah','$harga')";
      if(!mysqli_query($koneksi,$sql2)) echo mysqli_error($koneksi);

    }
    $_SESSION["session_transaksi"] = array();
    header("location:template_pembeli.php?page=nota&kode_transaksi=$id_transaksi");
  }
}
 ?>
