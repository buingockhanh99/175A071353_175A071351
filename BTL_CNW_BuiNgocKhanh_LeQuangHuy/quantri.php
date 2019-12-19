<?php 
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
	<?php
	if(isset($_SESSION['Username']))
	{
	?>
	<main>

		<div class="container-fluid" >
			<div class="row">
				<form  method="get">
					<div id = "menu1" class="col-3">
							<div class="dropdown" style="padding-bottom: 10px;">
							  <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="border-radius: 15px;">Quản lý tài khoản</button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							    <a class="dropdown-item btn-a" href="quantri/thongtintaikhoanql.php" target = "iframe" >Quản lý tài khoản quản lý</a>
							    <a class="dropdown-item btn-a" href="quantri/thongtintaikhoangv.php" target = "iframe" >Quản lý tài khoản giảng viên</a>
							  </div>
							</div>
							<ul>
								<li><a href="quantri/taotaikhoan.php" target = "iframe" style="padding-left: 40px;">Tạo tài khoản</a></li>
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
		{
			echo "<div style='color:red; text-align:center;height:500px;line-height:500px;font-size:50px '> Vui lòng đăng nhập </div>";
		}

		
	// Ngắt kết nối
	 mysqli_close($conn);
	//Tự động thực thi khi kết thúc mã lệnh nhờ cơ chế tự động thu rác (garbage collector) - PHP4,5
	?> 
	 	
	<!-- phần cuối -->
	<?php
		include"footer-index.php";
	?>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>	s
	</body>
</html>