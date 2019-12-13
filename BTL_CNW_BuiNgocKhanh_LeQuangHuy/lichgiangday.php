<?php
session_start();
include'connect.php';
?>

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
	<?php
	include'header-index.php';
	?>
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
