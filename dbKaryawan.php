<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","penyewaan");
if(isset($_POST["action"])){
  $id_karyawan = $_POST["id_karyawan"];
  $nama = $_POST["nama_karyawan"];
  $alamat = $_POST["alamat_karyawan"];
  $kontak = $_POST["kontak"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $action = $_POST["action"];

  
  if ($_POST["action"] == "insert") {

    $sql = "INSERT INTO karyawan VALUES('$id_karyawan', '$nama', '$alamat', '$kontak', '$username', '$password')";

    if (mysqli_query($koneksi,$sql)) {
      // jika eksekusi berhasil
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "insert data has been success"
      );

    }else {
      // jika eksekusi gagal
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=karyawan");
  }else if ($_POST["action"] == "update") {
      $sql = "UPDATE karyawan SET nama_karyawan='$nama',alamat_karyawan='$alamat',kontak='$kontak',username='$username',password='$password' where id_karyawan='$id_karyawan'";
      $result = mysqli_query($koneksi,$sql);
      $hasil = mysqli_fetch_array($result);
      if (mysqli_query($koneksi,$sql)) {
        // jika query sukses
        $_SESSION["message"] = array(
          "type" => "success",
          "message" => "Update data has been success"
        );
      }else {
        // jika query gagal
        $_SESSION["message"] = array(
          "type" => "danger",
          "message" => mysqli_error($koneksi)
        );
      }
    header("location:template.php?page=karyawan");
  }
}

if (isset($_GET["hapus"])) {
  $id_karyawan = $_GET["id_karyawan"];
  // ambil data dari data base
  $sql = "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan'";
  // eksekusi query
  $result = mysqli_query($koneksi,$sql);
  // koversi ke array
  $hasil = mysqli_fetch_array($result);
  $sql = "DELETE FROM karyawan WHERE id_karyawan='$id_karyawan'";
  if (mysqli_query($koneksi,$sql)) {
    // jika query sukses
    $_SESSION["message"] = array(
      "type" => "success",
      "message" => "Data has been deleted"
    );
  }else {
    // jika query gagal
    $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
    );
  }
  header("location:template.php?page=karyawan");
}
 ?>
