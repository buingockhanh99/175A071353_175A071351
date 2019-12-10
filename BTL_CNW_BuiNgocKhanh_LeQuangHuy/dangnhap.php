<?php
  ob_start();
  session_start();
  
  include'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Đăng nhập vào hệ thống
	</title>
  <link REL="SHORTCUT ICON" HREF="./images/2.jpg">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Import Boostrap css, js, font awesome here -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gelasio&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link href="./css/dangnhap.css" rel="stylesheet">
</head>
<body>
	<header id="header" class="">
		<div class="top-hd"></div>
		<h4>HỆ THỐNG ĐĂNG KÝ HỌC - ĐẠI HỌC THỦY LỢI</h4>	
	</header>
	<div class="nav-bar">
		<a href="#">Trang chủ </a> |
		<a href="#">Đăng nhập </a> |
		<a href="#">Hỏi đáp </a> |
		<a href="#">Trợ giúp </a>
		<select name="" multiple>
			<option value="">VN</option>
		</select>
	</div>
	  <div id="login">
	  	<div class="container">
			<img src="images/login1-t.gif" alt=""><br>
			<form method="post">
				<div class="hi">
					<label>Tài khoản: </label>
					<input type="text" name="txtUsername"><br>
					<label>Mật khẩu : </label>
					<input type="password" name="txtPassword"><br>
					<button name="dangnhap" type="submit">Đăng nhập</button>
					<button name="trangchu">Về trang chủ</button><br>
				</div>
			</form>
			<img id="img-bottom" src="images/login-b.gif" alt="">
		</div>
	  </div>
	<footer>
		<h4>
			Đường dây nóng
			<br>
			<span>024.38521441</span>
		</h4>
		<ul>
			<li><a href="#">Trợ giúp </a></li>
			<li><a href="#">Hỏi đáp </a>|</li>
			<li><a href="#">Đăng nhập </a>|</li>
			<li><a href="#">Trang chủ </a>|</li>
		</ul>
	</footer>
    <?php 
        if (isset($_POST['trangchu'])) {
            include"index.php";
        }
     ?>
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
                        header("location: giangvien.php");
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
</body>
</html>