<?php
$koneksi = mysqli_connect("localhost", "root", "", "penyewaan");
if (isset($_POST["action"])) {
  // kita tampung dulu data yang dikirim
  $id_pelanggan = $_POST["id_pelanggan"];
  $nama_pelanggan = $_POST["nama_pelanggan"];
  $alamat_pelanggan = $_POST["alamat_pelanggan"];
  $kontak = $_POST["kontak"];
  $action = $_POST["action"];

  if ($action == "insert") {
    $path = pathinfo($_FILES["image"]["name"]);
    $extensi = $path["extension"];
    $filename = $id_mobil."-".rand(1,1000).".".$extensi;

    $sql = "INSERT INTO pelanggan VALUES('$id_pelanggan', '$nama_pelanggan', '$alamat_pelanggan','$filename', '$kontak')";

    if (mysqli_query($koneksi,$sql)) {
      // jika eksekusi berhasil
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_pelanggan/$filename");
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
    header("location:template.php?page=pelanggan");

  }elseif ($_POST["action"] == "update") {
    if (!empty($_FILES["image"]["name"])) {
      // jika gambar diedit
      $sql = "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
      // eksekusi query
      $result = mysqli_query($koneksi,$sql);
      // koversi ke array
      $hasil = mysqli_fetch_array($result);
      //hapus file lama
      if (file_exists("img_pelanggan/".$hasil["image"])) {
        unlink("img_pelanggan/".$hasil["image"]);
        //menghapus file
      }
      //membuat nama file yang baru
      $path = pathinfo($_FILES["image"]["tmp_name"]);
      $extensi = $path["extension"];
      $filename = $id_mobil."-".rand(1,1000).".".$extensi;
      // membuat perintah update
      $sql = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan',alamat_pelanggan='$alamat_pelanggan',image='$filename',kontak='$kontak' where id_pelanggan='$id_pelanggan'";

      if (mysqli_query($koneksi,$sql)) {
        // jika query sukses
        move_uploaded_file($_FILES["image"]["tmp_name"],"img_pelanggan/$filename");
        $_SESSION["message"] = array(
          "type" => "seccess",
          "message" => "Update data has been success"
        );
      }else {
        // jika query gagal
        $_SESSION["message"] = array(
          "type" => "danger",
          "message" => mysqli_error($koneksi)
        );
      }
    }else {
      // jika gambar tidak diedit
      $sql = "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan',alamat_pelanggan='$alamat_pelanggan',kontak='$kontak' where id_pelanggan='$id_pelanggan'";
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
    }
    header("location:template.php?page=pelanggan");
  }
}

if (isset($_GET["hapus"])) {
$id_pelanggan = $_GET["id_pelanggan"];
// ambil data dari data base
$sql = "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
// eksekusi query
$result = mysqli_query($koneksi,$sql);
// koversi ke array
$hasil = mysqli_fetch_array($result);
$sql = "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
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
header("location:template.php?page=pelanggan");
}
 ?>
