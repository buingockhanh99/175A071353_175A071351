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
		<link rel="shortcut icon" href="images/fire.jpg">

		<script src="js/jquery-3.4.1.min.js"></script>
  		<script src="js/style.js"></script>
		<title>Quản trị</title>
	</head>
	<body>
		<header class="page-header">
			<div class="logo">
				<img style="height: 100px;" src="images/logoHK.png" alt="Logo">
			</div>
			<div class = "sub-header">
				<p style="padding-bottom: 10px">Xin chào <span style="color: red">admin</span></p>
				<a href="logout.php" style="padding-left: 60px;">Thoát</a>
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
	</body>
</html>