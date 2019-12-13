
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
                        <input class="form-control" type="text" name="txtUsername" placeholder="Tên đăng nhập">
                    </div>
                </div>

                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                        <p>Mật khẩu</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="password" name="txtPassword" placeholder="Password">
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

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['signup'])){
        die('');
    }
     
    //Nhúng file kết nối với database
    include('../connect.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    $id         = $_POST['txtID'];
    $username   = $_POST['txtUsername'];
    $password   = $_POST['txtPassword'];  
    $level      = $_POST['txtLevel'];
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$id || !$username || !$password ||!$level)
    {
        echo  "<div style='text-align:center;color:#000000;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
          
    // Mã khóa mật khẩu
    $password = md5($password);
    
    //Kiểm tra id có trùng hay không
    if (mysqli_num_rows(mysqli_query($conn,"SELECT ID FROM login WHERE ID='$id'")) > 0)
    {
        echo "<div style='text-align:center;color:#000000;'>ID trùng. Vui lòng chọn lại ID khác. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }     
    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    if (mysqli_num_rows(mysqli_query($conn,"SELECT USERNAME FROM login WHERE USERNAME='$username'")) > 0)
    {
        echo "<div style='text-align:center;color:#000000;'>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }

    //Lưu thông tin thành viên vào bảng
   
        $addlogin = mysqli_query($conn, "
        INSERT INTO login (ID,USERNAME,PASSWORD,LEVEL,STATUS)
        VALUE ('$id','$username','$password','$level','0')");  
        
        if($level =="2")
        {
            $addqt = mysqli_query($conn, "
            INSERT INTO quanly (MAQL) VALUE ('$id')");
        }
        else{
            $addgv1 = mysqli_query($conn, "
            INSERT INTO giangvien (MAGV) VALUE ('$id')");
            $addgv2 = mysqli_query($conn, "
            INSERT INTO kehoachgiangday (MAGV) VALUE ('$id')");
        }
    //Thông báo quá trình lưu
    if ($addlogin)
        echo "<div style='text-align:center;color:#000000;'>Đăng ký thành công.</div>";
    else
        echo "<div style='text-align:center;color:#000000;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
?>
</body>

</html>