<?php
  ob_start();
  session_start();
  
  require'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quên mật khẩu</title>

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
      <h2 style="text-align: center; color: blue;">QUÊN MẬT KHẨU</h2>
      <form action="" method="get" accept-charset="utf-8" style="border-radius: 5px; margin-top:7%; margin-left: 34%; border: 1px solid blue; width: 30%; height: 100px; text-align: center;">
        <label>Tên tài khoản :</label>
        <input type="text" name="" id="" style="margin-top: 5px"><br>
        <label>Mã xác nhận :</label>
        <input type="text" name="" id="" style="margin-top: 5px; margin-left: 6px;"><br>
        <label>Mật khẩu mới :</label>
        <input type="text" name="" id="" style="margin-top: 5px;">
      </form>
      <div style="height: 300px;">

    </main>

  <!-- phần cuối -->
  <?php
    include"footer-index.php";
    // Ngắt kết nối
  mysqli_close($conn);
  ?>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</body>
</html>