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
        <div style="padding-bottom: 20px;">
          <form method="POST">
            <div style="padding-bottom: 40px">
              <div style="float: left;">Chọn kiểu hiển thị: </div>
              <div style="float: left; padding-left: 20px" ><input type="radio" name="quyen" value="2" id="ql" checked> Quản lý</div>
              <div style="float: left; padding-left: 20px"><input type="radio" name="quyen" value="3" id="gv"> Giảng viên</div>
            </div>
            <div>
              <button name="select" class="btn btn-primary btn-block" type="submit">Hiển thị</button>
            </div>
          </form>
        </div>
        <?php
        if (!isset($_POST['select']))
        {
          die('');
        }
        else
        {
        ?>
          <from method="get">
          <?php

          $sql = mysqli_query($conn,"SELECT * from login WHERE LEVEL = '$_POST[quyen]'");
          if (mysqli_num_rows($sql) > 0)
          $i=0;
          ?>
          <h2 style="text-align: center">Thông tin tài khoản</h2>
          <br>
          <table border="" style="text-align: center; border: 2px solid #56a4fe;">
            <tr class="col-6">
              <th width="300px">ID tài khoản</th>
              <th width="400px">Tên đăng nhập</th>
              <th width="400px">Quyền</th>
              <th width="400px">Trạng thái tài khoản</th>
              <th width="400px">Xóa tài khoản</th>
            </tr>
            <?php while($row=mysqli_fetch_assoc($sql)) {
            $id = $row['ID'];
            ?>
            <tr class="col-6">
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
                echo "Đã kích hoạt";
                ?>
              </td>
              <?php
              echo "<td><a href='#' onclick='xoa()'>Xóa</a></td>";
              ?>
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
        </div>
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
      }
      ?>
    </div>
  </body>
</html>