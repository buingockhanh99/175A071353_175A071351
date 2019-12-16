<?php
session_start();
include'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lịch trình giảng dạy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<link rel="stylesheet" href="css/index1.css">
	<style>
		table, th, td {
		  border: 2px solid #56a4fe;
		  height: 30px;
		  line-height: 30px;
		  text-align: center;
		}
	</style> 
</head>
<body>
	<!-- phần đầu -->
	<?php
	include'header-index.php';
	?>
  <!-- phần chính -->
	<main style="height: 700px">
		<div style="padding-bottom: 20px;">
			<p style="text-align: center; font-weight: bold; font-size:24px ">Thông tin giảng dạy</p>
		</div>

		<div style="height: 700px; width: 90%; padding-left: 10%">
			<table>
				<tr>
					<th width="200px">Mã giáo viên</th>
					<th width="200px">Tên môn học</th>
					<th width="200px">Giai đoạn bắt đầu</th>
					<th width="200px">Giai đoạn kết thúc</th>
					<th width="200px">Địa điểm</th>
					<th width="200px">Lớp dạy</th>
				</tr>
				<tr>
					<?php
						$sql = mysqli_query($conn,"SELECT * from kehoachgiangday where MAGV = '$_GET[magv]'");
						$row=mysqli_fetch_assoc($sql)
					?>
					<td><?php echo "$_GET[magv]" ?></td>
					<td><?php echo $row['TENMONHOC']; ?></td>
					<td><?php echo $row['GIAIDOANBD']; ?></td>
					<td><?php echo $row['GIAIDOANKT']; ?></td>
					<td><?php echo $row['DIADIEM']; ?></td>
					<td><?php echo $row['LOPDAY']; ?></td>
				</tr>
			</table>
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