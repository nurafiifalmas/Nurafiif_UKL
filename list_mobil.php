<?php
$koneksi = mysqli_connect("localhost","root","","penyewaan");
$sql = "SELECT * FROM mobil";
$result = mysqli_query($koneksi,$sql);
?>

<div class="row">
  <?php foreach ($result as $hasil): ?>
  <div class="card col-sm-3">
    <div class="card-body">
      <img src="img_mobil/<?php echo $hasil["image"]; ?>" class="img" width="200">
    </div>
    <div class="card-footer">
      <h5 class="text-center"><B><?php echo $hasil["jenis"]; ?></b></h5>
      <br>
      <h5 class="text-center">Biaya sewa/hari : <?php echo $hasil["biaya_sewa_per_hari"]; ?></h5>
      <br>
      <h6 class="text-center">Jenis : <?php echo $hasil["merk"]; ?></h6>
      
      <a href="template_pembeli.php?page=list_mobil">
        <button type="button" class="btn btn-warning btn-block">sewa
          <?php echo $hasil["harga"]; ?>
        </button>
      </a>
    </div>
  </div>
<?php endforeach; ?>
</div>
