<?php
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
            echo "<div style='text-align:center;color:red'>Vui lòng kiểm tra gmail</div></div>";

          ?>
          <div style="border-radius: 5px; margin-top:7%; margin-left: 34%; border: 1px solid blue; width: 30%; text-align: center; height: 140px;">
            <form method="post">
            <input type="hidden" name="email" style="margin-top: 5px; margin-left: 6px;" value="<?php echo $email ?>" readonly><br>      
            <label>Mã xác nhận :</label>
            <input type="text" name="maxacnhan" style="margin-top: 5px; margin-left: 6px;"><br>
            <label>Mật khẩu mới :</label>
            <input type="password" name="password" style="margin-top: 5px;"><br>
             <input type="submit" name="send1" value="Đổi mật khẩu " style=" margin-top: 10px; margin-bottom: 10px; width: 300px">
            <form>
          </div>
      <?php
        }
         else
         echo "<div style='text-align:center;color:red;'>Không có tài khoản này</div></div>";
              
        }
      ?>
      <?php
      if (!isset($_POST['send1'])){
        die('');
      } 
      else{
        $email = $_POST['email'];
        $sql = mysqli_query($conn,"SELECT * from quenmatkhau WHERE email = '$email'");
        $row = mysqli_fetch_assoc($sql);
        $ma = $_POST['maxacnhan'];
        $password = $_POST['password'];
        $password = password_hash($password,PASSWORD_DEFAULT);
        
        if(!$ma || !$password)
        {
          echo "<div style='text-align:center;color:red;'>Vui lòng nhập đầy đủ thông tin</div></div>";
        }
        else{
          if($ma == $row['maxn'] )
          {
            $update = mysqli_query($conn,"UPDATE login SET PASSWORD = '$password' where USERNAME = '$email'");
            if($update)
            {echo "<div style='text-align:center;color:red;'>Thay đổi mật khẩu thành công</div></div>";
             $delte = mysqli_query($conn,"DELETE from quenmatkhau where email = '$email'"); }
            else
            {echo "<div style='text-align:center;color:red;'>Thay đổi mật khẩu không thành công</div></div>";}
          }
          else{
           echo "<div style='text-align:center;color:red;'>Mã xác thực không đúng</div></div>";
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