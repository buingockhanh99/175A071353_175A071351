<?php
   ob_start();
   session_start();	
   require'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index1.css">
</head>
<body>
	<!-- phần đầu -->
	<?php
		include"header-index.php";
	?>
		
	<!-- phần chính -->
		<main class="main">
		<div class="container-fluid" style="padding-top: 6px">
			<div class="row">
				<div class="col-lg-3 col-xs-3">
					<div class="top-dmc">
						<div class="dmc">
							<p>DANH MỤC CHÍNH</p> 
						</div>
						<div id="menu1">
							<ul>
								<?php

								if(isset($_SESSION['Username']))
								{	$Username = $_SESSION['Username'];
									$sql = mysqli_query($conn,"SELECT * from login where USERNAME = '$Username'");
	                       			$row=mysqli_fetch_assoc($sql);
	                       			if($row['LEVEL']==1) 
	                       			{
	                       				echo '<li><a href="quantri.php">Về trang quản trị</a></li>';
	                       			}
	                       			else if($row['LEVEL']==2)
	                       			{
	                       				echo '<li><a href="quanly.php">Về trang quản lý</a></li>';
	                       			}
	                       			else{
	                       				echo '<li><a href="giangvien.php">Về trang giảng viên</a></li>';
	                       			}    
	                       		}
	                       		else
	                       		{
	                       			echo '<li><a href="lichgiangday.php">Tra cứu lịch giảng dạy</a></li>';
									echo '<li><a href="">Chương trình đào tạo</a></li>';
									echo '<li><a href="">Giảng đường trực tuyến</a></li>';
	                       		}             	
	                            ?>
							</ul>
						</div>
					</div>

					<div class="tt_tin">
						<div class="td">
							<p>Liên kết hữu ích</p>
						</div>
						
					</div>
					<div class="tdyk">
						<div class="td">
							<p>Thăm dò ý kiến</p>
						</div>
						
					</div>
					<div class="tt_tin">
						<div class="td">
							<p>Hỏi đáp</p>
						</div>
						
					</div>
					<div class="tdyk">
						<div class="td">
							<p>Điều tra việc làm</p>
						</div>
					</div>
				</div>
				<?php
					$sql = mysqli_query($conn,"SELECT * from tintuc where IDTINTUC = '$_GET[id]' ");
					$row = mysqli_fetch_assoc($sql);
				?>
				<div class="col-lg-9 col-xs-9">
					<div class="body-main" style="height: 337px">
						<div class="td">
							<h1>THÔNG TIN</h1>
						</div>
						<div class="noidung" style="height: 100px">
							<h1>[THÔNG TIN ĐÁNG CHÚ Ý]</h1>
							<ul>
								<li style="color: #000"><?php echo $row['NOIDUNG']; ?></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</main>
	<!-- phần cuối -->
	<?php
		
		include"footer-index.php";
		// Ngắt kết nối
		mysqli_close($conn);
	?>




</body>
</html>