<?php
   ob_start();
   session_start(); 
   
   include'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Đại học Thủy Lợi">
        <meta name="keywords" content="TLU,WRU, Đại học Thủy Lợi">
        <meta name="author" content="Ngọc Khánh Quang Huy">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- khi mở tap ra có ở phần tiêu đề -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" media="screen" type="text/css" href="css/quantri1.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="shortcut icon" href="images/fire.jpg">
        <title>Quản trị</title>

    </head>
<body>
	<?php
	
		$sql =  mysqli_query($conn, "SELECT ID FROM login where TENTK ='admin'");
		$row = mysqli_fetch_assoc($sql);
	 ?>
	<header class="page-header">
		<div class="wrapper">
			<div class="logo">
				<img style="height: 100px;" src="images/logoHK.png" alt="Logo">
			</div>
			<div class = "sub-header" style="float: right; padding-top:0">
				<p>Xin chào <span style="color: red"><?php echo $row['ID'] ?></span></p>
				<a href="login.php" style="padding-left: 60px;">Thoát</a>
			</div>
		</div>
	</header>

	<main>
		<div class="container-fluid" >
			<div class="row">
				<div class="col-3">
					<form action="" method="post">
						<div id = "menu">
							<ul>
								<li><a href="thongtintaikhoan.php" target="iframe">Quản lý tài khoản</a></li>
								<li><a href="dangkytaikhoangiangvien.php" target = "iframe">Tạo tài khoản giảng viên</a></li>
								<li><a href="dangkytaikhoanquanly.php" target="iframe">Tạo tài khoản quản lý</a></li>
							</ul>
						</div>
					</form>
				</div>
				<div class="col-9">
					<iframe src="" name = "iframe">
						
					</iframe>


				</div>
			</div>
		</div>
		
	</main>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-4">
					<img style="height: 90px;" src="images/fire.jpg" alt="">
				</div>
				<div class="col-4">
					<p style="margin-bottom: 5px; padding-top: 15px">Bùi Ngọc Khánh</p>	
					<p style="margin-bottom: 5px;">Email: khanhbn72@wru.vn</p>	
					<p>SDT: 0368699895</p>		 	
				</div>
				<div class="col-4">
					<p style="margin-bottom: 5px; padding-top: 15px">Lê Quang Huy</p>	
					<p style="margin-bottom: 5px;">Email: huylq720@wru.vn</p>	
					<p>SDT: 0969608810</p>		 	
				</div>
			</div>
		</div>
	</footer>
	
</body>
</html>