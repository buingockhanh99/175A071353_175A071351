<?php
   session_start();	
   include'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
				<div class="col-3">
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

					<div class="lkhi">
						<div class="p-lkhi">
							<p>Liên kết hữu ích</p>
						</div>
						
					</div>
					<div class="tdyk">
						<div class="p-lkhi">
							<p>Thăm dò ý kiến</p>
						</div>
						
					</div>
					<div class="lkhi">
						<div class="p-lkhi">
							<p>Hỏi đáp</p>
						</div>
						
					</div>
					<div class="tdyk">
						<div class="p-lkhi">
							<p>Điều tra việc làm</p>
						</div>
					</div>
				</div>

				<div class="col-9">
					<div class="body-main" style="height: 337px">
						<div class="p-lkhi">
							<h1>LIÊN THÔNG</h1>
						</div>
						<div class="noidung" style="height: 100px">
							<h1>[THÔNG TIN ĐÁNG CHÚ Ý]</h1>
							<ul>
								<li><a href="#"> &#62 Chương trình đào tạo theo học chế tín chỉ trình độ liên thông từ cao đẳng lên đại học hệ chính quy áp dụng từ K55LT trở đi (17/12/2013)</a></li>
							</ul>
						</div>
						<div>
							<div style="width: 50%; float: left"><p style="color: #000000; font-weight: bold;padding-left: 20px">Chưa có dữ liệu</p></div>
							<div style="width: 50%; float: right"><a href="" style="padding-left: 400px; text-decoration: none; font-size: 14px">Xem chi tiết</a></div>
						</div>
					</div>
					<div class="body-main" style="height: 337px">
						<<div class="p-lkhi">
							<h1>CAO HỌC</h1>
						</div>
						<div class="noidung" style="height: 196px">
							<h1>[THÔNG TIN ĐÁNG CHÚ Ý]</h1>
							<ul>
								<li><a href="#"> &#62 Thông báo thi Tiếng Anh B1 đợt 4 năm 2019 (10/10/2019)</a></li>
								<li><a href="#"> &#62 QUY ĐỊNH TRÌNH BÀY LUẬN VĂN THẠC SĨ, ĐƠN XIN BẢO VỆ LUẬN VĂN (04/05/2016)</a></li>
								<li><a href="#"> &#62 Quy định về đào tạo trình độ thạc sĩ (27/11/2015)</a></li>
								<li><a href="#"> &#62 Thông báo về chấn chỉnh học viên thực hiện Nội quy học tập của Nhà trường (19/11/2015)</a></li>
							</ul>
						</div>
						<div>
							<div style="width: 50%; float: left"><p style="color: #0066cc; font-weight: bold;padding-left: 20px; font-size: 14px;">Mẫu trình bày đề cương luận văn (07/10/2019)</p></div>
							<div style="width: 50%; float: right"><a href="" style="padding-left: 400px; text-decoration: none; font-size: 14px">Xem chi tiết</a></div>
						</div>
					</div>
					<div class="body-main" style="height: 550px">
						<div class="p-lkhi">
							<h1>ĐẠI HỌC CHÍNH QUY</h1>
						</div>
						<div class="noidung" style="height: 196px">
							<h1>[THÔNG TIN ĐÁNG CHÚ Ý]</h1>
							<ul>
								<li><a href="#"> &#62 Thông báo thi Tiếng Anh B1 đợt 4 năm 2019 (10/10/2019)</a></li>
								<li><a href="#"> &#62 QUY ĐỊNH TRÌNH BÀY LUẬN VĂN THẠC SĨ, ĐƠN XIN BẢO VỆ LUẬN VĂN (04/05/2016)</a></li>
								<li><a href="#"> &#62 Quy định về đào tạo trình độ thạc sĩ (27/11/2015)</a></li>
								<li><a href="#"> &#62 Thông báo về chấn chỉnh học viên thực hiện Nội quy học tập của Nhà trường (19/11/2015)</a></li>
							</ul>
						</div>
						<div>
							<div style="width: 50%; float: left"><p style="color: #0066cc; font-weight: bold;padding-left: 20px; font-size: 14px;">Mẫu trình bày đề cương luận văn (07/10/2019)</p></div>
							<div style="width: 50%; float: right"><a href="" style="padding-left: 400px; text-decoration: none; font-size: 14px">Xem chi tiết</a></div>
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