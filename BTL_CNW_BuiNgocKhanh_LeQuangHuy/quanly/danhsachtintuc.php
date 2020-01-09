<?php
ob_start();
session_start();
require('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
          <from method="get">
          <?php
          $sql = mysqli_query($conn,"SELECT * from tintuc");
          ?>
          <h2 style="text-align: center">Cập nhật tin tức</h2>
          <br>
          <table border="" style="text-align: center; border: 2px solid #56a4fe;">
            <tr>
              <th width="300px">ID tin tức</th>
              <th width="400px">Tiêu đề</th>
              <th width="400px">Sửa</th>
              <th width="400px">Xóa</th>
            </tr>
            <?php while($row=mysqli_fetch_assoc($sql)) {
            $id = $row['IDTINTUC'];
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td ><?php echo $row['TIEUDE']; ?></td>
              <td><a href="updatetintuc.php?id=<?php echo $id; ?>">Sửa</a></td>
              <td><a href="xulydelete.php?id1=<?php echo $id; ?>&key1=xoa1">Xóa</a></td>
            </tr>
            <?php }  ?>
          </table>
          </from>

    </div>
  </body>
</html>