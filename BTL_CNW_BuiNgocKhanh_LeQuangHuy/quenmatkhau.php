<?php
    ob_start();
  require'connect.php';
  session_start();
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
    <main style="height: 500px">
      <form action="" method="post" >
        <div style="border-radius: 5px; margin-top:7%; margin-left: 34%; border: 1px solid blue; width: 30%; height: 100px; text-align: center;">
          <label>Tên tài khoản :</label>
          <input type="email" name="email" style="margin-top: 5px"><br>
          <input type="submit" name="send" value="Gửi mã xác thực" style=" margin-top: 10px; margin-bottom: 10px; width: 300px">
      </form>
      <?php 
        if(isset($_POST['send']))
        {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;
        if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM login WHERE USERNAME ='$email'")) > 0)
        {
                  $maxn = rand();
                  if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM quenmatkhau WHERE email ='$email'")) > 0)
                  {
                    $add = mysqli_query($conn, "
                    UPDATE quenmatkhau SET maxn = '$maxn' where email = '$email'");
                  }
                  else{
                    $add = mysqli_query($conn, "
                    INSERT INTO quenmatkhau (maxn,email)
                    VALUE ('$maxn','$email')");
                  }
          $body='Mã xác thực đổi mật khẩu là :'.$maxn.'';
          include 'php/guimail1.php';
          header ("location: xacthuctk.php");
                  
        }
         else
         echo "<div style='text-align:center;color:red;'>Không có tài khoản này</div></div>";
        }
      ?>

    </main>

  <!-- phần cuối -->
  <?php
  include"footer-index.php";
  // Ngắt kết nối
  mysqli_close($conn);
  ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</body>
</html>