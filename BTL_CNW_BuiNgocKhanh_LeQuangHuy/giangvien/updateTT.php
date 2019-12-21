<?php 
    session_start(); 
    require('../connect.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

                $sql = mysqli_query($conn,"SELECT * from giangvien where MAGV = '$id'");
                $row = mysqli_fetch_assoc($sql);
            ?> 

            <form method="post">
                <h2 class="text-center">Vui lòng cập nhật thông tin</h2>

                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%;">
                        <p>Mã giảng viên</p>
                    </div>
                    <div style="float: right; width: 80%">
                    <input class="form-control" type="text" name="txtMGV" placeholder="" value="<?php echo $id?>" readonly>
                    </div>
                </div>

                <div class="form-group" style="padding-bottom: 40px;">
                       <div style="float: left;width: 20%">
                            <p>Họ đệm</p>
                        </div>
                        <div style="float: right; width: 80%">
                            <input class="form-control" type="text" placeholder="VD: Bùi Ngọc" name="txtHD">
                        </div>
                </div>  

                 <div class="form-group" style="padding-bottom: 40px;">
                        <div style="float: left;width: 20%">
                            <p>Tên</p>
                        </div>
                        <div style="float: right; width: 80%">
                            <input class="form-control" type="text" placeholder="VD: Khánh" name="txtTen">      
                        </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                        <div style="float: left;width: 20%">
                                <p>Đơn vị</p>
                        </div>
                        <div style="float: right; width: 80%">
                            <input class="form-control" type="text" placeholder="VD: Khoa công nghệ thông tin" name="txtDV">
                         </div>
                </div>

                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                        <p>Mật khẩu mới</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="password" name="txtPassword" placeholder="Password">
                    </div>
                </div>


                <div class="form-group"><button name="update" class="btn btn-primary btn-block" type="submit">Cập nhật</button></div>
           
<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['update'])){
        die('');
    }
    else
    {  
        //Khai báo utf-8 để hiển thị được tiếng việt
        header('Content-Type: text/html; charset=UTF-8'); 
        //Lấy dữ liệu từ file dangky.php
        $magv         = $_POST['txtMGV'];
        $hodem       = $_POST['txtHD'];
        $ten       = $_POST['txtTen'];  
        $donvi       = $_POST['txtDV'];
        $password   = $_POST['txtPassword'];
        //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$magv || !$hodem || !$ten ||!$donvi||!$password)
        {
            echo  "<div class='form-group' style='text-align:center;color:red;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
            exit;
        }
        else
        {    
            // Mã khóa mật khẩu
            $password = password_hash($password,PASSWORD_DEFAULT);
            //Lưu thông tin thành viên vào bảng
            $doimk = mysqli_query($conn, "
            UPDATE login SET PASSWORD='$password'where ID='$magv'");

            $add_pcgd = mysqli_query($conn, "
            UPDATE giangvien SET HODEM='$hodem',TEN='$ten',DONVI='$donvi'where MAGV='$magv'");
            
            $kichhoattaikhoan =mysqli_query($conn, "
            UPDATE login SET STATUS='1'where ID ='$magv'");               
            //Thông báo quá trình lưu
            if ($add_pcgd)
            {
                echo "<div class='form-group' style='text-align:center;color:red;'>Cập nhật thành công.</div>";
                header("location: ../giangvien.php");
            }

            else
                echo "<div class='form-group' style='text-align:center;color:red;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
        }
    }
    // Ngắt kết nối
mysqli_close($conn);
?>


            </form> 

        </div>

    </div>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>

</body>
</html>