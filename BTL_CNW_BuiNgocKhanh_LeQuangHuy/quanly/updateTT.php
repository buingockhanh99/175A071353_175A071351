<?php 
    session_start(); 
    include('../connect.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/dangky.css">
        <title>Cập nhật thông tin</title>
    </head>
    <body>

    <div class="register-photo">
        <div class="form-container">
            <?php 
                $tentk = $_SESSION['Username'];
                $sql1 = mysqli_query($conn,"SELECT * from login where USERNAME = '$tentk'");
                $row1=mysqli_fetch_assoc($sql1);   
                $id = $row1['ID'];

                $sql = mysqli_query($conn,"SELECT * from quanly where MAQL = '$id'");
                $row = mysqli_fetch_assoc($sql);
            ?> 

            <form method="post">
                <h2 class="text-center">Tài khoản của bạn chưa kích hoạt vui lòng cập nhật để kích hoạt</h2>

                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%;">
                        <p>Mã quản lý</p>
                    </div>
                    <div style="float: right; width: 80%">
                    <input class="form-control" type="text" name="txtMQL" placeholder="" value="<?php echo $id?>" readonly>
                    </div>
                </div>

                 <div class="form-group" style="padding-bottom: 40px;">
                        <div style="float: left;width: 20%">
                            <p>Họ Tên</p>
                        </div>
                        <div style="float: right; width: 80%">
                            <input class="form-control" type="text" placeholder="VD: Bùi Ngọc Khánh" name="txtTen">      
                        </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                        <div style="float: left;width: 20%">
                                <p>Địa chỉ</p>
                        </div>
                        <div style="float: right; width: 80%">
                            <input class="form-control" type="text" placeholder="VD: 175 Tây Sơn - Đống Đa - Hà Nội" name="txtDC">
                         </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                        <p>Liên hệ</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="text" placeholder="VD: email hoặc sdt" name="txtLH">
                    </div>
                </div>

                <div class="form-group"><button name="update" class="btn btn-primary btn-block" type="submit">Cập nhật</button></div>
           
<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['update'])){
        die('');
    }      
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $maql         = $_POST['txtMQL'];
    $ten          = $_POST['txtTen'];  
    $diachi       = $_POST['txtDC'];
    $lienhe       = $_POST['txtLH'];
   
    
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$maql || !$ten || !$diachi ||!$lienhe)
    {
        echo  "<div class='form-group' style='text-align:center;color:red;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
          
    //Lưu thông tin thành viên vào bảng
    $add_pcgd = mysqli_query($conn, "
    UPDATE quanly SET HOTEN='$ten',DIACHI='$diachi',LIENHE='$lienhe'where MAQL='$maql'");
    
    $kichhoattaikhoan =mysqli_query($conn, "
    UPDATE login SET STATUS='1'where ID ='$maql'");               
    //Thông báo quá trình lưu
    if ($add_pcgd)
    {
        echo "<div class='form-group' style='text-align:center;color:red;'>Cập nhật thành công.</div>";
        header("location: ../quanly.php");
    }

    else
        echo "<div class='form-group' style='text-align:center;color:red;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
?>


            </form> 

        </div>

    </div>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>

</body>
</html>