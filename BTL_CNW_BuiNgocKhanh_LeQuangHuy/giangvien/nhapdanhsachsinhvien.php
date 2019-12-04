<?php 
//Nhúng file kết nối với database
    include('../connect.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dangky.css">
    <link rel="stylesheet" href="../css/quantri1.css">
</head>

<body>

    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post">

                <h2 class="text-center">Đăng ký</h2>
                <div class="form-group"><input class="form-control" type="text" name="txtMSV" placeholder="Mã Sinh Viên"></div>
                <div class="form-group"><input class="form-control" type="text" name="txtName" placeholder="Họ Tên"></div>
                <?php 
                    $sql = mysqli_query($conn,"select * from loptheonganhhoc") or die(myqli_error($conn));
                    if (mysqli_num_rows($sql) > 0) {
                    $i=0; 
                ?>
                <div class="form-group">
                    <select class="form-control" name = "txtLop">
                        <?php while($row=mysqli_fetch_assoc($sql)) {
                        $i++; ?>
                        <option><?php echo $row['LOP']; ?></option>
                      <?php }}  ?>
                    </select>
                </div>

                <div class="form-group"><input class="form-control" type="text" name="txtDQT" placeholder="Điểm quá trình"></div>
                <div class="form-group"><input class="form-control" type="text" name="txtDT" placeholder="Điểm thi"></div>
                <div class="form-group"><input class="form-control" type="text" name="txtDTK" placeholder="Điểm tổng kết"></div>
                
                <div class="form-group"><button name="signup" class="btn btn-primary btn-block" type="submit">Tạo tài khoản</button></div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['signup'])){
        die('');
    }
     
    //Nhúng file kết nối với database
    include('connect.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $masv        = $_POST['txtMSV'];
    $name        = $_POST['txtName'];
    $class       = $_POST['txtLop'];  
    $dqt         = $_POST['txtDQT'];
    $dt          = $_POST['txtDT'];
    $dtk         = $_POST['txtDTK'];  
 
    
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$masv || !$name || !$class ||!$dqt ||!$dt || !$dtk)
    {
        echo  "<div style='text-align:center;color:#000000;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
             
    //Kiểm tra msv có trùng hay không
    if (mysqli_num_rows(mysqli_query($conn,"SELECT MASV FROM sinhvien WHERE MASV='$masv'")) > 0)
    {
        echo "<div style='text-align:center;color:#000000;'>Mã sinh viên trùng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }     

    //Lưu thông tin thành viên vào bảng
    $addsv = mysqli_query($conn, " INSERT INTO sinhvien 
    VALUE ('$masv','$name','$class','$dqt','$dt','$dtk')");
    
                          
    //Thông báo quá trình lưu
    if ($addsv)
        echo "<div style='text-align:center;color:#000000;'>Quá trình đăng ký thành công.</div>";
    else
        echo "<div style='text-align:center;color:#000000;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
?>
</body>

</html>