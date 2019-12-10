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

        <link rel="stylesheet" media="screen" type="text/css" href="css/quantri1.css">

       
        <link rel="shortcut icon" href="images/fire.jpg">
        <title>Giảng viên</title>

    </head>
<body>
	<header class="page-header">
		<div class="logo">
			<img style="height: 100px;" src="images/logoHK.png" alt="Logo">
		</div>
		<div class = "sub-header" style="float: right; padding-top:0">
		 <?php 
			$tentk = $_SESSION['TENTK'];
			$sql1 = mysqli_query($conn,"SELECT * from login where TENTK = '$tentk'");
			$row1=mysqli_fetch_assoc($sql1);   
			$id = $row1['ID'];
			$sql = mysqli_query($conn,"SELECT * from giangvien where MAGV = '$id'");
        	$row=mysqli_fetch_assoc($sql);    
		?> 
			<p style="padding-bottom: 10px;">Xin chào <span style="color: red"> <?php echo"" .$row['HODEM']. " " .$row['TEN']. ""   ?></span></p>
			<a href="logout.php" style="padding-left: 75px;">Thoát</a>
		</div>
	</header>

	<main>
	
		<div class="container-fluid" >
			<div class="row">
					<form action="" method="post">
						<div id = "menu" class="col-3">
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