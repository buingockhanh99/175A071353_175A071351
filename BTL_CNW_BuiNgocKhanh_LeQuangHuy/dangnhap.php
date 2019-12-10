<?php
  ob_start();
  session_start();
  
  include'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index1.css">
</head>
<body>
      <!-- phần đầu -->
  <?php
    include"header-index.php";
  ?>
  <!-- phần chính -->
      <main>
        <div id="login">
          <div class="container">
              <img src="images/login1-t.gif" alt=""><br>
              <form method="post" class="form">
                <div class="main-login">
                  <div>
                    <label>Tài khoản: </label>
                    <input type="text" name="txtUsername">
                  </div>
                  <div>
                  <label>Mật khẩu : </label>
                  <input type="password" name="txtPassword">
                  </div>
                  <div>
                    <button name="dangnhap" type="submit">Đăng nhập</button>
                    <button name="trangchu" type="submit">Về trang chủ</button>
                  </div>
                  <?php 
                    if (isset($_POST['trangchu'])) {
                        header("location: index.php");
                    }
                  ?>
                </div>
              </form>
              <img id="img-bottom" src="images/login-b.gif" alt="">
        </div>
                <?php
                include 'php/phpxulydangnhap.php'; 
                ?>
        </div>

    </main>

  <!-- phần cuối -->
  <?php
    include"footer-index.php";
  ?>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</body>
</html>