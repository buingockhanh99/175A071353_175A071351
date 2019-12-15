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


		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" media="screen" type="text/css" href="css/quantri.css">

		<title>Quản lý</title>
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
								<li><a href="quanly/NganhHoc.php" target="iframe">Tạo nghành học</a></li>
								<li><a href="quanly/monhoc.php" target="iframe">Tạo môn học</a></li>
								<li><a href="quanly/LopHocTheoNganhHoc.php" target="iframe">Năm học - Lớp học phần</a></li>
								<li><a href="quanly/hocky-giaidoan.php" target="iframe"> Học kỳ - Giai đoạn</a></li>
								<li><a href="quanly/phanconggiangday.php" target="iframe">Phân công giảng dạy</a></li>
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