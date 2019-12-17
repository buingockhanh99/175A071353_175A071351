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
	<?php
	if(isset($_SESSION['Username']))
	{
	?>
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
	<?php 
	} 
	else
		{echo "<div style='color:red; text-align:center;height:500px;line-height:500px;font-size:50px '> Vui lòng đăng nhập </div>";}
		
	?>  	
	
	<!-- phần cuối -->	
	<?php
		include"footer-index.php";
	?>
		
	</body>
</html>