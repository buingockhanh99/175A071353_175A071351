<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Đại học Thủy Lợi">
		<meta name="keywords" content="TLU,WRU, Đại học Thủy Lợi">
		<meta name="author" content="Ngọc Khánh Quang Huy">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trường Đại Học Thủy Lợi</title>
		
		<!-- khi mở tap ra có ở phần tiêu đề -->
		<link rel="shortcut icon" href="images/Logo-Thuy_loi.png"> <!-- Chèn logo cho trang wep -->
		<!--boostrap 4-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
		<!--css-->
		<link rel="stylesheet" media="screen" type="text/css" href="css/index.css">
		<link rel="stylesheet" media="screen" type="text/css" href="css/bootstrap.min.css">
		
	</head>
	<body>
		<div class="home">
			<!-- phần đầu -->
			<?php
				include"topIndex.php";
			?>
			<!-- phần chính -->
			<?php
				include("mainIndex.php");
			?>
			<br>
			<!-- phần cuối -->
			<?php
				include"footerIndex.php";
			?>
			
		</div>
	</body>
</html>