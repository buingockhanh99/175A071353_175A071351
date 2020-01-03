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
          $sql = mysqli_query($conn,"SELECT * from kehoachgiangday");
          ?>
          <h2 style="text-align: center">Thông tin phân công giảng dạy</h2>
          <br>
          <table border="" style="text-align: center; border: 2px solid #56a4fe;">
              <tr>
                <th width="750px">Mã giáo viên</th>
                <th width="750px">Tên môn học</th>
                <th width="550px">Giai đoạn BĐ</th>
                <th width="550px">Giai đoạn KT</th>
                <th width="550px">Địa điểm</th>
                <th width="400px">Tiết dạy</th>
                <th width="400px">Lớp dạy</th>
                <th width="550px">Xóa lịch trình</th>
              </tr>
                <?php
                  while($row=mysqli_fetch_assoc($sql)) {
                  $id = $row['ID'];
                ?>
                <tr>
                <td><?php echo $row['MAGV']; ?></td>
                <td><?php echo $row['TENMONHOC']; ?></td>
                <td><?php echo $row['GIAIDOANBD']; ?></td>
                <td><?php echo $row['GIAIDOANKT']; ?></td>
                <td><?php echo $row['DIADIEM']; ?></td>
                <td><?php echo $row['THOIGIAN']; ?></td>
                <td><?php echo $row['LOPDAY']; ?></td>
                <td><a href="xulydelete.php?id=<?php echo $id; ?>&key=xoa">Xóa</a></td>

                
              </tr>
            <?php }  ?>
          </table>
          </from>

    </div>
  </body>
</html>