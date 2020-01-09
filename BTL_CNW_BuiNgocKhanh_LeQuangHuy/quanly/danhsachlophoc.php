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
			<p style="text-align: center; font-weight: bold; font-size:24px ">Thông tin lớp học</p>
		</div>

		<div style="height: 700px; width: 90%; padding-left: 5%">
			<table>
				<tr>
					<th width="200px">Tên lớp</th>
					<th width="200px">Xóa</th>
				</tr>
					<?php
						$sql = mysqli_query($conn,"SELECT * from loptheonganhhoc ");
						while($row=mysqli_fetch_assoc($sql)){
					?>
					<tr>
						<td><?php echo $row['LOP']; ?></td>
						<td><a href="xulydelete.php?lophoc=<?php echo $row['LOP']; ?>&key3=xoalop">Xóa</a></td>
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