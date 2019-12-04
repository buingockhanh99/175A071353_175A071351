<?php
   ob_start();
   session_start(); 
   
   include'../connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin tài khoản</title>
</head>
<body>
	<from method="get">
		<?php 
            $sql = mysqli_query($conn,"select * from sinhvien") or die(myqli_error($conn));
            if (mysqli_num_rows($sql) > 0) {
            $i=0; 
         ?>
		<table border="1px soid blue" style="text-align: center">
			<tr>
				<th width="200px">Mã sinh viên</th>
				<th width="200px">Họ và tên</th>
				<th width="200px">Lớp</th>
				<th width="200px">Điểm quá trình</th>
				<th width="200px">Điểm thi</th>
				<th width="200px">Điểm tổng kết</th>
				
			</tr>
			<?php while($row=mysqli_fetch_assoc($sql)) {
                  $i++; ?>
			<tr>
				<td><?php echo $row['MASV']; ?></td>
                <td ><?php echo $row['HOTEN']; ?></td>
            	<td ><?php echo $row['LOP']; ?></td>
                <td ><?php echo $row['DQT']; ?></td>
                <td ><?php echo $row['DT']; ?></td>
                <td ><?php echo $row['DTK']; ?></td>
			</tr>
			  <?php }}  ?>
		</table>
	</from>



</body>
</html>