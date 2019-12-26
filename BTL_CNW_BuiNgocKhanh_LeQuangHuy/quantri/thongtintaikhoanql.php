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
          $sql = mysqli_query($conn,"SELECT * from login WHERE LEVEL = '2'");

          ?>
          <h2 style="text-align: center">Thông tin tài khoản</h2>
          <br>
          <table border="" style="text-align: center; border: 2px solid #56a4fe;">
            <tr>
              <th width="300px">ID tài khoản</th>
              <th width="400px">Tên đăng nhập</th>
              <th width="400px">Quyền</th>
              <th width="400px">Trạng thái tài khoản</th>
              <th width="400px">Xóa tài khoản</th>
            </tr>
            <?php while($row=mysqli_fetch_assoc($sql)) {
            $id = $row['ID'];
            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td ><?php echo $row['USERNAME']; ?></td>
              <td ><?php echo 'Quản lý';?>
              </td>
              <td>
                <?php
                if($row['STATUS']==0)
                echo "Chưa kích hoạt";
                else
                echo "<div style='color:red'>Đã kích hoạt</div>";
                ?>
              </td>
              <td><a href='xulyDelete.php?id=<?php echo $id ?>&key=xoa' onclick='xoa()'>Xóa</a></td>
              <script type="text/javascript">
              function xoa(){
              var r=confirm("Bạn chắc chắn muốn xóa tài khoản này!!")
              if(r==true){
              window.location="";
              }
              }
              </script>
            </tr>
            <?php }  ?>
          </table>
          </from>

    </div>
  </body>
</html>