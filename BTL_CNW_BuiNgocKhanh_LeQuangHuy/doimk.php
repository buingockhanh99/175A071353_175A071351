<?php 
    require('connect.php');
     session_start();   
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dangky.css">

</head>

<body>

    <div class="register-photo">
        <div>
            
        </div>
        <div class="form-container">
            <form method="post">
                <h4 class="text-center">Đổi mật khẩu</h4>

                <div class="form-group" style="padding-bottom: 40px; ">
                        <div style="float: left;width: 20%">
                            <p>Mật khẩu cũ</p>
                        </div>
                        <div style="float: right; width: 80%">
                            <input class="form-control" type="password" name="txtpassold">
                        </div>
                </div>

                 <div class="form-group" style="padding-bottom: 40px; ">
                        <div style="float: left;width: 20%">
                            <p>Mật khẩu mới</p>
                        </div>
                        <div style="float: right; width: 80%">
                            <input class="form-control" type="password" name="txtpassnew">
                        </div>
                </div>

               
                
                <div class="form-group"><button name="signup" class="btn btn-primary btn-block" type="submit">Đổi mật khẩu</button></div>
            </form>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<?php
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['signup'])){
        die('');
    }
    else{      
        //Lấy dữ liệu từ file dangky.php
        $tentk         = $_SESSION['Username'];
        $mkold       = $_POST['txtpassold'];
        $mknew       = $_POST['txtpassnew'];  
        
        //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$mkold || !$mknew )
        {
            echo  "<div style='text-align:center;color:red;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
            exit;
        }
        else{

            $query = mysqli_query($conn,"SELECT PASSWORD FROM login WHERE USERNAME='$tentk'");
            $row = mysqli_fetch_array($query);
            if(password_verify($mkold, $row['PASSWORD']))
            {
                // Mã khóa mật khẩu
                $mknew = password_hash($mknew,PASSWORD_DEFAULT);
                //Lưu thông tin thành viên vào bảng
                $doimk = mysqli_query($conn,"
                UPDATE login SET PASSWORD='$mknew'where USERNAME='$tentk'");
                                      
                //Thông báo quá trình lưu
                if ($doimk){
                    echo "<div style='text-align:center;color:red;'>Đổi mật khẩu thành công.</div>";}
                else{
                    echo "<div style='text-align:center;color:red;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
                    } 
            }
            else
            {
                echo "<div style='text-align:center;color:red;'>Mật khẩu không đúng. Vui lòng nhập lại</div>";
            }
        }
        
    }      
    // Ngắt kết nối
mysqli_close($conn);
?>
</body>

</html>