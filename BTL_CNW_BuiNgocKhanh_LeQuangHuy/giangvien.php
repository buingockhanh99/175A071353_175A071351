<?php
   session_start();	
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
        <link rel="stylesheet" type="text/css" href="css/quantri1.css">
        <title>Giảng viên</title>

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
								<li><a href="giangvien/capnhatthongtin.php" target="iframe">Cập nhật thông tin KHGD</a></li>
							</ul>
						</div>
					</form>
				<iframe class="col-9" src="" name = "iframe">
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