<?php
    ob_start();
session_start();
require'../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lịch trình giảng dạy</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<link rel="stylesheet" href="css/index1.css">
	<style>
		table, th, td {
		  border: 1px solid #56a4fe;
		  height: 30px;
		  line-height: 30px;
		  text-align: center;
		}
	</style> 
</head>
<body>

	<main style="height: 700px">
		<div style="padding-bottom: 20px;">
			<p style="text-align: center; font-weight: bold; font-size:24px ">Thông tin giảng dạy</p>
		</div>

		<div style="height: 700px; width: 90%; padding-left: 5%">
			<table>
				<tr>
					<th width="200px">Tên môn học</th>
					<th width="200px">Giai đoạn bắt đầu</th>
					<th width="200px">Giai đoạn kết thúc</th>
					<th width="200px">Địa điểm</th>
					<th width="200px">Tiết dạy</th>
					<th width="200px">Lớp dạy</th>
					<th width="200px">Sửa</th>
				</tr>
					<?php
						$username = $_SESSION['Username'];
						$sql1 = mysqli_query($conn, "SELECT * from login where USERNAME = '$username' ");
						$row1 = mysqli_fetch_assoc($sql1);
						$magv = $row1['ID'];

						$sql = mysqli_query($conn,"SELECT * from kehoachgiangday where MAGV = '$magv'");
						while($row=mysqli_fetch_assoc($sql)){
							$id = $row['ID'];
					?>
					<tr>
					
					<td><?php echo $row['TENMONHOC']; ?></td>
					<td><?php echo $row['GIAIDOANBD']; ?></td>
					<td><?php echo $row['GIAIDOANKT']; ?></td>
					<td><?php echo $row['DIADIEM']; ?></td>
					<td><?php echo $row['THOIGIAN']; ?></td>
					<td><?php echo $row['LOPDAY']; ?></td>
					<td><a href='updateKHGD.php?id=<?php echo $id?>'>Sửa</a></td>
					
				</tr>
			<?php } ?>
			</table>
		</div>
			

	</main>


  <?php
  
	mysqli_close($conn);
  ?>



</body>
</html>