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
            <div class="image-holder"></div>
            <form method="post">
                <h2 class="text-center">Đăng ký</h2>
                <div class="form-group"><input class="form-control" type="text" name="txtID" placeholder="Mã Giáo Viên"></div>
                <div class="form-group"><input class="form-control" type="text" name="txtUsername" placeholder="Tên tài khoản"></div>
                <div class="form-group"><input class="form-control" type="password" name="txtPassword" placeholder="Password"></div>

                <div class="form-group"><input class="form-control" type="text" name="txtHoDem" placeholder="Họ + Tên Đệm"></div>
                <div class="form-group"><input class="form-control" type="text" name="txtTen" placeholder="Tên"></div>
                <div class="form-group"><input class="form-control" type="date" name="txtDate" placeholder=""></div>
                <div class="form-group"><input class="form-control" type="text" name="txtDonvi" placeholder="Đơn vị"></div>
                <div class="form-group"><input class="form-control" type="text" name="txtLienHe" placeholder="Email hoặc SDT"></div>
                
                
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
          
    //Lấy dữ liệu từ file dangky.php
    $id         = addslashes($_POST['txtID']);
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);  
    $hodem      = addslashes($_POST['txtHoDem']);
    $ten        = addslashes($_POST['txtTen']);
    $date       = addslashes($_POST['txtDate']);  
    $donvi      = addslashes($_POST['txtDonvi']);
    $lienhe     = addslashes($_POST['txtLienHe']);
    
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$id || !$username || !$password ||!$hodem ||!$ten || !$date || !$donvi || !$lienhe)
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
    if (mysqli_num_rows(mysqli_query($conn,"SELECT TENTK FROM login WHERE TENTK='$username'")) > 0)
    {
        echo "<div style='text-align:center;color:#000000;'>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }

    //Lưu thông tin thành viên vào bảng
    $addlogin = mysqli_query($conn, "
    INSERT INTO login (ID,TENTK,MATKHAU,LEVEL)
    VALUE ('$id','$username','$password','3')");

    $addql = mysqli_query($conn, " INSERT INTO giangvien (MAGV,HODEM,TEN,NAMSINH,DONVI,LIENHE)
    VALUE ('$id','$hodem','$ten','$date','$donvi','$lienhe')");
    
                          
    //Thông báo quá trình lưu
    if ($addlogin)
        echo "<div style='text-align:center;color:#000000;'>Quá trình đăng ký thành công.</div>";
    else
        echo "<div style='text-align:center;color:#000000;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
?>
</body>

</html>