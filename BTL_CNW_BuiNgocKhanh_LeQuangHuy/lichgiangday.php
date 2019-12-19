<?php
session_start();
require'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tra cứu lịch giảng dạy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<link rel="stylesheet" href="css/index1.css">
	<style>
		table, th, td {
		  border: 2px solid #56a4fe;
		  height: 30px;
		  line-height: 30px;
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
		<div>
			<form method="post">
				<div style="padding-bottom: 20px">
					<label>Thông tin giảng viên (Họ tên)</label>
					<input id="tk_2" type="text" name="search" >
					<button name="btn-search" type="submit" class="btn btn-primary" style="height: 25px; line-height: 12px">Tìm</button>
				</div>
			</form>
		</div>

		<div style="height: 700px;">

			<?php
				if(!isset($_POST['btn-search']))
				{
					die('');
				}
				else
				{
				   $search = $_POST['search'];
				   $sql = mysqli_query($conn,"SELECT * from giangvien where HODEM like '$search%' or TEN like '$search%'");
				    if (mysqli_num_rows($sql) > 0)
		          	$i=0;
		          ?>
		          <p style="text-align: center; font-weight: bold; font-size: 20px">Kết quả tìm kiếm</p>
		          <br>
		          <table style="text-align: center;">
		            <tr>
		              <th width="300px">Mã giảng viên</th>
		              <th width="400px">Họ đệm</th>
		              <th width="400px">Tên</th>
		              <th width="400px">Đơn vị</th>
		              <th width="400px">Thông tin liên hệ</th>
		              <th width="400px">Xem lịch giảng dạy</th>
		            </tr>
		            <?php while($row=mysqli_fetch_assoc($sql)) 
		            {
		            ?>
		            <tr>
		              <td><?php echo $row['MAGV']; ?></td>
		              <td ><?php echo $row['HODEM']; ?></td>
		              <td ><?php echo $row['TEN']; ?></td>
		              <td><?php echo $row['DONVI']; ?></td>
		              <td><?php echo $row['LIENHE']; ?></td>
		              <td><a href="kehoachgiangday.php?magv=<?php echo $row['MAGV']; ?>">Xem</a></td>

		            </tr>
		            <?php }}  ?>
          		 </table>

		</div>
			

	</main>

  <!-- phần cuối -->
  <?php
    include"footer-index.php";
    // Ngắt kết nối
	mysqli_close($conn);
  ?>


	<script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</body>
</html>
