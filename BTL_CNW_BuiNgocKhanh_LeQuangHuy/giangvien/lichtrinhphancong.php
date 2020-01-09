<?php
 ob_start();
session_start();
require('../Class_phpEX/PHPExcel.php');
require'../connect.php';
  if(isset($_POST['btn_ep'])){
	$objExcel= new PHPExcel;
	$objExcel -> setActiveSheetIndex(0);
	$sheet = $objExcel -> getActiveSheet() -> setTitle('Sheet1');

	$rowCount =1;
	$sheet -> setCellValue('A'.$rowCount,'Tên môn học');
	$sheet -> setCellValue('B'.$rowCount,'Giai đoạn bắt đầu');
	$sheet -> setCellValue('C'.$rowCount,'Giai đoạn kết thúc');
	$sheet -> setCellValue('D'.$rowCount,'Địa điểm');
	$sheet -> setCellValue('E'.$rowCount,'Tiết dạy');
	$sheet -> setCellValue('F'.$rowCount,'Ngày dạy');
	$sheet -> setCellValue('G'.$rowCount,'Lớp dạy');


	//Lấy mã giáo viên
	$username = $_SESSION['Username'];
	$sql1 = mysqli_query($conn, "SELECT * from login where USERNAME = '$username' ");
	$row1 = mysqli_fetch_assoc($sql1);
	$magv = $row1['ID'];


	$sql = mysqli_query($conn,"SELECT TENMONHOC,GIAIDOANBD,GIAIDOANKT,DIADIEM,THOIGIAN,DAY,LOPDAY FROM kehoachgiangday where MAGV = '$magv'");
	while($row = mysqli_fetch_array($sql)){
		// print_r($row);
		$rowCount++;
		$sheet -> setCellValue('A'.$rowCount,$row['TENMONHOC']);
		$sheet -> setCellValue('B'.$rowCount,$row['GIAIDOANBD']);
		$sheet -> setCellValue('C'.$rowCount,$row['GIAIDOANKT']);
		$sheet -> setCellValue('D'.$rowCount,$row['DIADIEM']);
		$sheet -> setCellValue('E'.$rowCount,$row['THOIGIAN']);
		$sheet -> setCellValue('F'.$rowCount,$row['DAY']);
		$sheet -> setCellValue('G'.$rowCount,$row['LOPDAY']);

	}

	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$filename = 'kehoachgiangday.xlsx';
	$objWriter -> save($filename);

	header('Content-Disposition: attachment; filename="' .$filename. '"');
	header('Content-Tyle: Application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
	header('Content-Length: ' .filesize($filename));
	header('Content-Transfer-Encoding: binary');
	header('Cache_Control: must-revalidate');
	header('Pragma: no-cache');
	readfile($filename);
	return;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lịch trình giảng dạy</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">  
	<link rel="stylesheet" href="../css/index1.css">
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
	<form method="post">
		<div style="margin-left: 50px;"><button class="btn btn-primary"  name="btn_ep" type="submit">Xuất file</button></div>
	</form>

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
					<th width="200px">Ngày dạy</th>
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
					<td><?php echo $row['DAY']; ?></td>
					<td><a href='updateKHGD.php?id=<?php echo $id?>'>Sửa</a></td>
					
				</tr>
			<?php } ?>
			</table>
		</div>		

	</main>


  <?php
	mysqli_close($conn);
  ?>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>