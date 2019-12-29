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
			<p style="text-align: center; font-weight: bold; font-size:24px ">Thông tin môn học</p>
		</div>

		<div style="height: 700px; width: 90%; padding-left: 5%">
			<table>
				<tr>
					<th width="200px">Tên môn học</th>
				</tr>
					<?php
						$sql = mysqli_query($conn,"SELECT * from monhoc ");
						while($row=mysqli_fetch_assoc($sql)){
					?>
					<tr>
					<td><?php echo $row['MONHOC']; ?></td>
					
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