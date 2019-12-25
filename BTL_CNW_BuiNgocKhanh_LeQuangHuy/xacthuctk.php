<?php
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
      <div style="border-radius: 5px; margin-top:7%; margin-left: 34%; border: 1px solid blue; width: 30%; text-align: center; height: 140px;">
        <form method="post">
        <input type="hidden" name="email" style="margin-top: 5px; margin-left: 6px;" value="<?php echo  $_SESSION['email'] ?>" readonly><br>      
        <label>Mã xác nhận :</label>
        <input type="text" name="maxacnhan" style="margin-top: 5px; margin-left: 6px;"><br>
        <label>Mật khẩu mới :</label>
        <input type="password" name="password" style="margin-top: 5px;"><br>
         <input type="submit" name="send1" value="Đổi mật khẩu " style=" margin-top: 10px; margin-bottom: 10px; width: 300px">
        <form>
      <?php
      if (!isset($_POST['send1'])){
        die('');
      } 
      else{
        $sql = mysqli_query($conn,"SELECT * from quenmatkhau");
        $row = mysqli_fetch_assoc($sql);
        $ma = $_POST['maxacnhan'];
        $password = $_POST['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
        $email = $_POST['email'];
        if(!$ma || !$password)
        {
          echo "<div style='text-align:center;color:red;'>Vui lòng nhập đầy đủ thông tin</div></div>";
        }
        else{
          if($ma == $row['maxn'] and $email = $row['email'] )
          {
            $mail =$_SESSION['email'];
            $update = mysqli_query($conn,"UPDATE login SET PASSWORD = '$password' where USERNAME = '$mail'");
            if($update)
            {echo "<div style='text-align:center;color:red;'>Thay đổi mật khẩu thành công.  <a href='http://localhost/175A071353_175A071351/BTL_CNW_BuiNgocKhanh_LeQuangHuy/dangnhap.php'>Đăng nhập</a></div></div>";
             $delte = mysqli_query($conn,"DELETE from quenmatkhau where email = '$email'"); 
            unset($_SESSION['email']);}
            else
            {echo "<div style='text-align:center;color:red;'>Thay đổi mật khẩu không thành công.</div></div>";}
          }
          else{
           echo "<div style='text-align:center;color:red;'>Mã xác thực không đúng! Vui lòng nhập lại</div></div>";
          }
        }
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