<?php
ob_start();
session_start();
require'../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
          <from method="get">
          <?php
          $sql = mysqli_query($conn,"SELECT * from login WHERE LEVEL = '$_GET[quyen]'");
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
              <td ><?php
                if($row['LEVEL']==1)
                echo 'Quản trị';
                else if ($row['LEVEL']==2)
                echo 'Quản lý';
                else
                echo 'Giảng viên'
                ?>
              </td>
              <td>
                <?php
                if($row['STATUS']==0)
                echo "Chưa kích hoạt";
                else
                echo "<div style='color:red'>Đã kích hoạt</div>";
                ?>
              </td>
              <td><a href='#' onclick='xoa()'>Xóa</a></td>

              <script type="text/javascript">
              function xoa(){
              var r=confirm("Bạn chắc chắn muốn xóa tài khoản này!!")
              if(r==true){
              window.location="thongtintaikhoan.php?id=<?php echo $id;?>&key=xoa";
              }
              }
              </script>
            </tr>
            <?php }  ?>
          </table>
          </from>
        <?php
        if (isset($_GET['key'])&&($_GET['key']!=''))
        {
        if ($_GET['key']=='xoa')
        {
        $sql = mysqli_query($conn,"SELECT LEVEL from login where ID = '$_GET[id]'");
        $row=mysqli_fetch_assoc($sql);
        if($row['LEVEL']==3)
        {
        $delete2 = mysqli_query($conn, " DELETE FROM kehoachgiangday where MAGV='$_GET[id]'");
        $delete = mysqli_query($conn, " DELETE FROM giangvien where MAGV='$_GET[id]'");
        $delete1 = mysqli_query($conn, " DELETE FROM login where ID='$_GET[id]'");
        if ($delete1)
        {
        echo header("refresh:0");
        }
        else
        echo "<div style='text-align:center;color:red;'> Xóa không thành công</div>";
        }
        else if ($row['LEVEL']==2)
        {
        $delete = mysqli_query($conn, " DELETE FROM quanly where MAQL='$_GET[id]'");
        $delete1 = mysqli_query($conn, " DELETE FROM login where ID='$_GET[id]'");
        if ($delete1){
        echo header("refresh:0");
        }
        else
        { echo "<div style='text-align:center;color:red;'> Xóa không thành công.</div>";}
        }
        else if($row['LEVEL']==1)
        {
        echo "<div style='text-align:center;color:red;'>Không thể xóa tài khoản này.</div>";
        }
        }
        }
      

      // Ngắt kết nối
      mysqli_close($conn);
      ?>
    </div>
  </body>
</html>