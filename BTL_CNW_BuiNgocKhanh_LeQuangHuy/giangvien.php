<?php
   
   include'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Đại học Thủy Lợi">
        <meta name="keywords" content="TLU,WRU, Đại học Thủy Lợi">
        <meta name="author" content="Ngọc Khánh Quang Huy">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <!-- khi mở tap ra có ở phần tiêu đề -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" media="screen" type="text/css" href="css/quantri.css">

       
        <link rel="shortcut icon" href="images/fire.jpg">
        <title>Giảng viên</title>

    </head>
<body>
	<header class="page-header">
			
			<div class="logo">
				<img style="height: 100px;" src="images/logoHK.png" alt="Logo">
			</div>
			<div class = "sub-header">
				<p style="padding-bottom: 10px">Xin chào <span style="color: red">Giảng viên</span></p>
				<a href="login.php" style="padding-left: 90px;">Thoát</a>
			</div>
		
	</header>

	<main>
	
		<div class="container-fluid" >
			<div class="row">
					<form action="" method="post">
						<div id = "menu" class="col-3">
							<ul>
								<li><a href="giangvien/nhapdanhsachsinhvien.php" target="iframe">Nhập danh sách sinh viên</a></li>
								<li><a href="giangvien/thietlapdiem.php" target = "iframe">Thiết lập trọng số điểm</a></li>
								<li><a href="giangvien/danhsachsinhvien.php" target="iframe">Danh sách sinh viên</a></li>
							</ul>
						</div>
					</form>
	
				<iframe class="col-9" src="" name = "iframe">
	
				</iframe>

				
			</div>
		</div>
	</main>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-4">
					<img style="height: 90px;" src="images/fire.jpg" alt="">
				</div>
				<div class="col-4">
					<p style="margin-bottom: 5px; padding-top: 15px">Bùi Ngọc Khánh</p>	
					<p style="margin-bottom: 5px;">Email: khanhbn72@wru.vn</p>	
					<p>SDT: 0368699895</p>		 	
				</div>
				<div class="col-4">
					<p style="margin-bottom: 5px; padding-top: 15px">Lê Quang Huy</p>	
					<p style="margin-bottom: 5px;">Email: huylq720@wru.vn</p>	
					<p>SDT: 0969608810</p>		 	
				</div>
			</div>
		</div>
	</footer>
	
</body>
</html>