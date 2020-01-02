<?php 
    ob_start();
session_start();
require('connect.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Đại học Thủy Lợi">
		<meta name="keywords" content="TLU,WRU, Đại học Thủy Lợi">
		<meta name="author" content="Ngọc Khánh Quang Huy">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" media="screen" type="text/css" href="css/quantri1.css">

		<title>Quản lý</title>
	</head>
	<body>
	<!-- phần đầu -->
	<?php
		include"header-index.php";
	?>
		
	<!-- phần chính -->
	<?php
	if(isset($_SESSION['Username']))
	{
	?>
	<main>
			<div class="container-fluid" >
				<div class="row">
					<form action="" method="post">
						<div id = "menu1" class="col-lg-3 col-xs-3">
							<ul>
								<li><a href="quanly/monhoc.php" target="iframe">Tạo môn học</a></li>
								<li><a href="quanly/LopHocTheoNganhHoc.php" target="iframe">Lớp học phần</a></li>
								<li><a href="quanly/hocky-giaidoan.php" target="iframe"> Học kỳ - Giai đoạn</a></li>
								<li><a href="quanly/phanconggiangday.php" target="iframe">Phân công giảng dạy</a></li>
								<li><a href="quanly/danhsachmonhoc.php" target="iframe">Danh sách môn học</a></li>
								<li><a href="quanly/dsphanconggiangday.php" target="iframe">Danh sách phân công giảng dạy</a></li>
								<li><a href="quanly/danhsachlophoc.php" target="iframe">Danh sách lớp học</a></li>
							</ul>
						</div>
					</form>
					<iframe src="" name = "iframe" class="col-lg-9 col-xs-9">
					
					</iframe>
					
				</div>
			</div>
			
		</main>
	<?php 
	} 
	else
		{header("location: dangnhap.php");}
	// Ngắt kết nối
	mysqli_close($conn);
		
	?>  	
	
	<!-- phần cuối -->	
	<?php
		include"footer-index.php";
	?>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>	
	</body>
</html>