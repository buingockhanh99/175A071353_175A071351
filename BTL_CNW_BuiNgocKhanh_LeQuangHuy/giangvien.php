<?php
    ob_start();
   session_start();	
   require'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Đại học Thủy Lợi">
        <meta name="keywords" content="TLU,WRU, Đại học Thủy Lợi">
        <meta name="author" content="Ngọc Khánh Quang Huy">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- khi mở tap ra có ở phần tiêu đề -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/quantri1.css">
        <title>Giảng viên</title>

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
									<li><a href="giangvien/lichtrinhphancong.php" target="iframe">Xem lịch trình được phân công</a></li>
									<!-- <li><a href="giangvien/updateKHGD.php" target="iframe">Cập nhật thông tin KHGD</a></li> -->
								</ul>
							</div>
						</form>
					<iframe class="col-lg-9 col-xs-9" src="" name = "iframe">
					</iframe>
				</div>
			</div>
		</main>
	<?php 
	} 
	else
		{header("location: dangnhap.php");}
		
	?>  	

	<!-- phần cuối -->
	<?php
		include"footer-index.php";
		// Ngắt kết nối
		mysqli_close($conn);
	?>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>	
</body>
</html>