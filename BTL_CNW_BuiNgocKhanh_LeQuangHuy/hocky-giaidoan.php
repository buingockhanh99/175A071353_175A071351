<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dangky.css">
    <link rel="stylesheet" href="css/quantri1.css">
    <title>Học kỳ - Giai đoạn</title>
</head>

<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder">
              
            </div>
            <form method="post">
                <h2 class="text-center">Đăng ký</h2>
                <div class="form-group"><input class="form-control" type="text" name="txtHocky" placeholder="Học Kỳ (VD: 2019 - 2020)"></div>
                <div class="form-group"><input class="form-control" type="text" name="txtGiaidoan" placeholder="Giai Đoạn (VD: 1 -2)"></div>
                <div class="form-group"><button name="signup" class="btn btn-primary btn-block" type="submit">Tạo tài khoản</button></div>
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
     
    //Nhúng file kết nối với database
    include('connect.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          

    $hocky      = $_POST['txtHocky'];
    $giaidoan   = $_POST['txtGiaidoan'];

          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$hocky || !$giaidoan )
    {
        echo  "<div style='text-align:center;color:#000000;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }

    //SELECT FROM hockygiaidoan WHERE HOCKY='$hocky' and GIAIDOAN ='$giaidoan'"
     if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM hockygiaidoan WHERE HOCKY='$hocky' and GIAIDOAN ='$giaidoan'")) > 0)
    {
        echo "<div style='text-align:center;color:#000000;'>Đã có học kỳ và giai đoạn này <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }  

   
    //Lưu thông tin thành viên vào bảng
    
    $add_hkgd = mysqli_query($conn, "
    INSERT INTO hockygiaidoan 
    VALUE ('$hocky','$giaidoan')");
    
                          
    //Thông báo quá trình lưu
    if ($add_hkgd)
         echo "<div style='text-align:center;color:#000000;'>Quá trình đăng ký thành công.</div>";
    else
        echo "<div style='text-align:center;color:#000000;'> Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a> </div>";
?>
</body>

</html>