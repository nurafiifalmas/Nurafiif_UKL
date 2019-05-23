<?php session_start() ?>
<?php if (isset($_SESSION["session_karyawan"])): ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <title>RENTAL CAR</title>
      <!-- Load bootstrap css -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <!-- Load jquery and bootstrap js -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
    </head>
    <body>
      <nav class="navbar navbar-expand-md bg-danger navbar-dark sticky-top">
        <a class="text-white">
          <h3>RENT CAR!</h3>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse">
          <span class="navbar navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav">
            <li class="nav-item"><a href="template.php?page=pelanggan" class="nav-link">Customers</a></li>
            <li class="nav-item"><a href="template.php?page=karyawan" class="nav-link">Karyawan</a></li>
            <li class="nav-item"><a href="template.php?page=mobil" class="nav-link">Cars</a></li>
            <li class="nav-item"><a href="template.php?page=list_mobil" class="nav-link">list_mobil</a></li>
            <li class="nav-item"><a href="proses_login_karyawan.php?logout=true" class="nav-link">Logout</a></li>
          </ul>
        </div>
        <h5 class="text-white">Hi, admin (<?php echo $_SESSION["session_karyawan"]["nama_karyawan"]; ?>)</h5>
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
    <?php echo "Anda Belum Login!"; ?>
    <br>
    <a href="login_karyawan.php">
      Silahkan Login disini
    </a>
<?php endif; ?>
