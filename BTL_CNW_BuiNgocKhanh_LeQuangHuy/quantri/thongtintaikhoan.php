<?php
ob_start();
session_start();

include'../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <from method="get">
        <?php
        $sql = mysqli_query($conn,"select * from login") or die(myqli_error($conn));
        if (mysqli_num_rows($sql) > 0) {
        $i=0;
        ?>
        <table border="" style="text-align: center; border: 2px solid #56a4fe;">

          <tr class="col-6">
            <th width="300px">ID tài khoản</th>
            <th width="400px">Tên đăng nhập</th>
            <th width="400px">Quyền</th>
          </tr>
          <?php while($row=mysqli_fetch_assoc($sql)) {
          $i++; ?>
          <tr class="col-6">
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
          </tr>
          <?php }}  ?>
        </table>

        </from>
      </div>
    </div>
  </body>
</html>