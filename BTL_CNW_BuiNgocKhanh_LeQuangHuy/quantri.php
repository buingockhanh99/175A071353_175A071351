<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Đại học Thủy Lợi">
		<meta name="keywords" content="TLU,WRU, Đại học Thủy Lợi">
		<meta name="author" content="Ngọc Khánh Quang Huy">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" media="screen" type="text/css" href="css/quantri.css">


		<script src="js/jquery-3.4.1.min.js"></script>
  		<script src="js/style.js"></script>
		<title>Quản trị</title>
	</head>
<body>


	<header>
			<div class="head-top">
				<div class="head-top-left"><h1>HỆ THÔNG ĐĂNG KÝ HỌC - ĐẠI HỌC THỦY LỢI</h1></div>
				<div class="head-top-right">
					<?php 
					echo "<div style='color:blue; padding:5px 30px;'>Xin chào admin</div>";
					?>
				</div>
			</div>
			<div class="main-top">
				<div class="left-top"></div>
				<div class="right-top">
					<div id="menu1">
						<ul>
							<li><a href="index.php" style="border-left: none">Trang chủ</a></li>
							<li><a href="">Hỏi đáp</a></li>
							<li><a href="#">Trợ giúp</a></li>
							<li><a href="logout.php">Thoát</a></li>
							<li style="line-height: 30px;">
								<select name="">
									<option value="">VN</option>
								</select> 
							</li>
						</ul>
					</div>
					
				</div>
			</div>
	</header>
	<main>
		<div class="container-fluid" >
			<div class="row">
				<form action="" method="post">
					<div id = "menu" class="col-3">
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