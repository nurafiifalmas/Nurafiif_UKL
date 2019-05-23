<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css"/>
    <!-- Load jquery and bootstrap js -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="form">
      <div class="header">
            <h1>Silahkan login</h1>
          <div>
            <?php if (isset($_SESSION["message"])): ?>
              <div class="class alert-<?=($_SESSION["message"]["type"])?>">
                <?php echo $_SESSION["message"]["message"]; ?>
                <?php unset($_SESSION["message"]); ?>
              </div>
            <?php endif; ?>
            <form action="proses_login_karyawan.php" method="post">
            <section class="login">
                 <div class="a">
                    <label><b>Username</b></label><br/>
                    <p><input  class="b" type="text" name="username" placeholder="Username"></p>
                 </div>    
                 <div class="a">
                     <label><b>Password</b></label><br/>
                     <p><input  class="b" type="password" name="password" placeholder="Password"></p>
                 </div>
                 <input class="tombol" type="submit" nama ="submit" value="Login"><br/>
            </section>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

