<?php
  ob_start();
  session_start();
  
  include'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Đại học Thủy Lợi">
  <meta name="keywords" content="TLU,WRU, Đại học Thủy Lợi">
  <meta name="author" content="Ngọc Khánh Quang Huy">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập vào hệ thống</title>

  <!-- khi mở tap ra có ở phần tiêu đề -->
  <link rel="shortcut icon" href="images/Logo-Thuy_loi.png">

  <!-- Import Boostrap css, js, font awesome here -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="css/css-login1.css" rel="stylesheet">
</head>
<body>
  
  <div id="login">
    <div id="login_left">
      <form id="form" method="POST" name = "login">
    
        <div id="h_1">
           <h1>Đăng Nhập</h1>
        </div> 
          <span id="title">Tài Khoản <i class="fas fa-users"></i></span>
            <div id="textbox">
              <input type="text" name="txtUsername" placeholder="Tên tài khoản">
            </div>          
          <span id="title">Mật khẩu <i class="fas fa-lock"></i></span>
            <div id="textbox">
              <input type="password" name="txtPassword" placeholder="password" id="myInput">
                <span id="eye" onclick="myFunction()">
                  <i id="a1" class="fas fa-eye"></i>
                  <i id="a2" class="fas fa-eye-slash"></i>
                </span>
            </div>
          <br/>
          <button style="text-align: " name="dangnhap" id="button" type="submit">Đăng Nhập</button><br/>
          <a href="index.php">Về trang chủ!!</a>
         </form> 
    </div>
  </div>

<?php
    //Khai báo sử dụng session
    // session_start();
     
    //Khai báo utf-8 để hiển thị được tiếng việt
    // header('Content-Type: text/html; charset=UTF-8');
     
    //Xử lý đăng nhập
    if (isset($_POST['dangnhap'])) 
    {
        //Lấy dữ liệu nhập vào
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
    
         
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$username || !$password) {
            echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
            exit;
        }
         
        // mã hóa pasword
        $password = md5($password);

         
        //Kiểm tra tên đăng nhập có tồn tại không
        $query = mysqli_query($conn,"SELECT TENTK, MATKHAU FROM login WHERE TENTK='$username'");
        if (mysqli_num_rows($query) == 0) {
            echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.";
            exit;
        }

        //Lấy mật khẩu trong database ra
        $row = mysqli_fetch_array($query);
         
         //So sánh 2 mật khẩu có trùng khớp hay không
        if ($password == $row['MATKHAU']) {
            {
               $sql = mysqli_query($conn,"SELECT * from login where TENTK = '{$username}'");
                $row=mysqli_fetch_assoc($sql);                      
                    if($row['LEVEL']==1)
                    {
                        $_SESSION['TENTK'] = $username;
                        header("location: quantri.php");
                        ob_enf_fluck();
                    }
                    else if($row['LEVEL']==2)
                    {
                        $_SESSION['TENTK'] = $username;
                        header("location: quanly.php");
                        ob_enf_fluck();
                    }
                    else
                    {
                        $_SESSION['TENTK'] = $username;
                        header("location: index.php");
                        ob_enf_fluck();
                    }       
            }

        }
        else{
            echo "Mật khẩu không đúng. Vui lòng nhập lại.";
            exit; 
        }
        //Lưu tên đăng nhập
        // echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='/'>Về trang chủ</a>";
        // die();       
}
?>
     <script>
      function myFunction() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("a1");
        var z = document.getElementById("a2");

        if(x.type === 'password'){
          x.type = "text";
          y.type.display = "block";
          z.type.display = "none";
        }
        else {
          x.type = "password";
          y.type.display = "none";
          z.type.display = "block";

        }
      }

    </script> 

</body>
</html>
