<?php
   ob_start();
   session_start(); 
   
   include'connect.php';
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
            $sql = mysqli_query($conn,"select * from login") or die(myqli_error($conn));
            if (mysqli_num_rows($sql) > 0) {
            $i=0; 
         ?>
		<table border="1px soid blue" style="text-align: center">
			<tr>
				<th width="100px">ID tài khoản</th>
				<th width="200px">Tên đăng nhập</th>
				<th width="200px">Quyền</th>
				<th width="200px">Sửa</th>
				<th width="200px">Xóa</th>
				
			</tr>
			<?php while($row=mysqli_fetch_assoc($sql)) {
                  $i++; ?>
			<tr>
				<td><?php echo $row['ID']; ?></td>
                <td ><?php echo $row['TENTK']; ?></td>
                <td ><?php
                if($row['LEVEL']==1)
                echo 'Quản trị'; 
            	else if ($row['LEVEL']==2)
            	echo 'Quản lý'; 
            	else
            	echo 'Giảng viên'
                 ?>	
                </td>
                <td><a href="sua_user.php">Sửa</a></td>
                <td><a href="#">Xóa</a></td>
			</tr>
			  <?php }}  ?>
		</table>
	</from>



</body>
</html>