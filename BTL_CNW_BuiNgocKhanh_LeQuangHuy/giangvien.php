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
        <link rel="stylesheet" type="text/css" href="css/quantri.css">


        <title>Giảng viên</title>

    </head>
<body>
	<header>
		<div class="head-top">
			<div class="head-top-left"><h1>HỆ THÔNG ĐĂNG KÝ HỌC - ĐẠI HỌC THỦY LỢI</h1></div>
			<div class="head-top-right">
				<?php 
					$tentk = $_SESSION['TENTK'];
					$sql1 = mysqli_query($conn,"SELECT * from login where TENTK = '$tentk'");
					$row1=mysqli_fetch_assoc($sql1);   
					$id = $row1['ID'];
					$sql = mysqli_query($conn,"SELECT * from giangvien where MAGV = '$id'");
		        	$row=mysqli_fetch_assoc($sql);    
				?> 
				<?php 
				echo "<div style='color:blue; padding:5px 30px;'>" .$row['HODEM']." ".$row['TEN']. "(".$id. ") <span style='color:#000'>Vai trò:</span> Giảng viên</div>";
				?>
			</div>
		</div>
		<div class="main-top">
			<div class="left-top"></div>
			<div class="right-top">
				<div id="menu1">
					<ul>
						<li><a href="index.php" style="border-left: none">Trang chủ</a></li>
						<li><a href="">Hỏi đáp</a></li>
						<li><a href="">Trợ giúp</a></li>
						<li><a href="logout.php">Thoát</a></li>
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