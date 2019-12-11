<?php 
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Đại học Thủy Lợi">
		<meta name="keywords" content="TLU,WRU, Đại học Thủy Lợi">
		<meta name="author" content="Ngọc Khánh Quang Huy">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" media="screen" type="text/css" href="css/quantri1.css">


		<script src="js/jquery-3.4.1.min.js"></script>
  		<script src="js/style.js"></script>
		<title>Quản trị</title>
	</head>
<body>


	<!-- phần đầu -->
	<?php
		include"header-index.php";
	?>
		
	<!-- phần chính -->
	<main>
		<div class="container-fluid" >
			<div class="row">
				<form action="" method="post">
					<div id = "menu1" class="col-3">
						<ul>
							<li><a href="quantri/thongtintaikhoan.php" target="iframe">Quản lý tài khoản</a></li>
							<li><a href="quantri/dangkytaikhoangiangvien.php" target = "iframe">Tạo tài khoản giảng viên</a></li>
							<li><a href="quantri/dangkytaikhoanquanly.php" target="iframe">Tạo tài khoản quản lý</a></li>
							<li><a href="quantri/xoataikhoangv.php" target="iframe">Xóa tài khoản giảng viên</a></li>
							<li><a href="quantri/xoataikhoanql.php" target="iframe">Xóa tài khoản giảng quản lý</a></li>
						</ul>
					</div>
				</form>
				
				<iframe src="" name = "iframe" class="col-9">
				
				</iframe>
				
			</div>
		</div>
		
	</main>
	<footer>
	<div class="container-fluid">
		<div class="row footer">
			<div class="col-6 footer-left">
				<p>Đường dây nóng</p>
				<p>0705.927.709</p>
			</div>
			<div class="col-6 footer-right">
				
			</div>
		</div>
		
	</div>
</footer>
	</body>
</html>