<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tra cứu lịch giảng dạy</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">  
	<link rel="stylesheet" href="css/index1.css">
</head>
<body>
      <!-- phần đầu -->
	 <header>
		<div class="head-top">
			<div class="head-top-left"><h1>HỆ THÔNG ĐĂNG KÝ HỌC - ĐẠI HỌC THỦY LỢI</h1></div>
			<div class="head-top-right">
				
			</div>
		</div>
		<div class="main-top">
			<div class="left-top" style="font-size: 14px; padding-top: 5px;">
				<i class="fas fa-home"></i>
				<a href="">Tra cứu lịch trình giảng dạy</a>
			</div>
        
			<div class="right-top">
				<div id="menu">
					<ul>
						<li><a href="index.php" style="border-left: none">Trang chủ</a></li>
						<li><a href="dangnhap.php">Đăng nhập</a></li>
						<li><a href="#">Hỏi đáp</a></li>
						<li><a href="#">Trợ giúp</a></li>
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
  <!-- phần chính -->
	<main style="height: 500px">
		<div>
			<form method="post">
				<div>
					<label>Thông tin giảng viên (Họ tên)</label>
					<input id="tk_2" type="text" name="">
					<button type="submit">Tìm</button>
				</div>
			</form>
		</div>
			

			<img id="img_2" src="images/3.jpg" alt="">
		</div>
	</main>

  <!-- phần cuối -->
  <?php
    include"footer-index.php";
  ?>


	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</body>
</html>
