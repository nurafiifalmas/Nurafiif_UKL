<?php session_start(); ?>
<?php if (isset($_SESSION["session_karyawan"])): ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENTAL_MOBIL-Malang_kota</title>
    <!-- Load bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Load jquery and bootstrap js -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-danger navbar-dark sticky-top">
      <a href="template_pembeli.php?page=list_mobil" class="text-white">
        <h3>RENT CARS!</h3>
      </a>

      <!-- pemanggilan icon menu saat menu bar disembunyikan -->
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar navbar-toggler-icon"></span>
      </button>

      <!-- daftar menu pada navbar -->
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="proses_login_karyawan.php?logout=true" class="nav-link">Logout</a></li>
        </ul>
      </div>
      <a href="template_pembeli.php?page=list_sewa">
        <b class="text-white">sewa : <?php echo count($_SESSION["session_transaksi"]); ?></b>
      </a>
    </nav>
    <div class="container my-2">
      <?php if (isset($_GET["page"])): ?>
        <?php if ((@include$_GET["page"].".php") === true): ?>
          <?php include$_GET["page"].".php"; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </body>
</html>
<?php else: ?>
  <?php echo "Anda belum login!"; ?>
  <br>
  <a href="login_pembeli.php">
    Silahkan Login disini
  </a>
<?php endif; ?>
