
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dangky.css">
</head>

<body>

    <div class="register-photo">
        <div class="form-container">
            <form method="post">
                <h2 class="text-center">Tạo tài khoản</h2>
                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                        <p>ID tài khoản</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="text" name="txtID" placeholder="ID tài khoản">
                    </div>
                </div>

                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                            <p>Tên đăng nhập</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="email" name="txtUsername" placeholder="Tên đăng nhập">
                    </div>
                </div>

                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                        <p>Quyền tài khoản</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <select name="txtLevel" class="form-control" >
                            <option></option>
                            <option value="2">Quản lý</option>
                            <option value="3">Giảng viên</option>
                        </select>
                    </div>
                </div>
                <div class="form-group"><button name="signup" class="btn btn-primary btn-block" type="submit">Tạo tài khoản</button></div>
            </form>
        </div>
    </div>

   
<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['signup'])){
        die('');
    }
    else
    { 
        //Nhúng file kết nối với database
        require('../connect.php');       
        //Khai báo utf-8 để hiển thị được tiếng việt
        header('Content-Type: text/html; charset=UTF-8');  

        $id         = $_POST['txtID'];
        $username   = $_POST['txtUsername'];
        $password   = '12345678';
        $password1  = '12345678';
        $level      = $_POST['txtLevel'];
        $email      = $_POST['txtUsername'];

        //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$id || !$username || !$password ||!$level)
        {
            echo  "<div style='text-align:center;color:#000000;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
            exit;
        }
        else
        {  
            // Mã khóa mật khẩu
            $password = password_hash($password,PASSWORD_DEFAULT);
            //Kiểm tra id có trùng hay không
            if (mysqli_num_rows(mysqli_query($conn,"SELECT ID FROM login WHERE ID='$id'")) > 0)
            {
                echo "<div style='text-align:center;color:red;'>ID trùng. Vui lòng chọn lại ID khác. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
            }
            else
            {     
                //Kiểm tra tên đăng nhập này đã có người dùng chưa
                if (mysqli_num_rows(mysqli_query($conn,"SELECT USERNAME FROM login WHERE USERNAME='$username'")) > 0)
                {
                    echo "<div style='text-align:center;color:#000000;'>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
                    exit;
                }
                else
                {
                        //Lưu thông tin thành viên vào bảng
                        $addlogin = mysqli_query($conn, "
                        INSERT INTO login (ID,USERNAME,PASSWORD,LEVEL,STATUS)
                        VALUE ('$id','$username','$password','$level','0')");  
                       

                        if($level =="2")
                        {
                            $add = mysqli_query($conn, "
                            INSERT INTO quanly (MAQL,LIENHE) VALUE ('$id','$email')");
                        }
                        else{
                            $add1 = mysqli_query($conn, "
                            INSERT INTO giangvien (MAGV,LIENHE) VALUE ('$id','$email')");
                            $add = mysqli_query($conn, "
                            INSERT INTO kehoachgiangday (MAGV) VALUE ('$id')");
                        }
                        
                        //Thông báo quá trình lưu
                        if ($add)
                        {
                             //Nhũng xử lý gửi gmail
                            $body = 'Vui lòng truy cập <a href="http://localhost/175A071353_175A071351/BTL_CNW_BuiNgocKhanh_LeQuangHuy/index.php"';
                            include('../php/guimail.php');
                            echo "<div style='text-align:center;color:red;'>Đăng ký thành công.</div>";
                           
                            
                        }
                        else
                            echo "<div style='text-align:center;color:red;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
                }
            }
        }
    }
?>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>