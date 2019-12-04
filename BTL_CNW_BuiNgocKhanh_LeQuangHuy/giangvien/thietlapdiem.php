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
                <?php 
                    $sql = mysqli_query($conn,"select * from monhoc") or die(myqli_error($conn));
                    if (mysqli_num_rows($sql) > 0) {
                    $i=0; 
                ?>   
                <h2 class="text-center">Đăng ký</h2>
                <div class="form-group">
                    <select class="form-control" name = "txtMonhoc">
                        <?php while($row=mysqli_fetch_assoc($sql)) {
                        $i++; ?>
                        <option><?php echo $row['MONHOC']; ?></option>
                      <?php }}  ?>
                    </select>
                </div>
                <div class="form-group"><input class="form-control" type="text" name="txtDQT" placeholder="Hệ số điểm quá trình(%)"></div>
                <div class="form-group"><input class="form-control" type="text" name="txtDT" placeholder="Hệ số điểm thi(%)"></div>
                <div class="form-group"><button name="signup" class="btn btn-primary btn-block" type="submit">Tạo</button></div>
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
          
    //Lấy dữ liệu từ file dangky.php
    $monhoc      = $_POST['txtMonhoc'];
    $dqt         = $_POST['txtDQT'];
    $dt          = $_POST['txtDT'];
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$monhoc || !$dqt || !$dt)
    {
        echo  "<div style='text-align:center;color:#000000;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
    
    //Kiểm tra xem có môn học này chưa ?
    if (mysqli_num_rows(mysqli_query($conn,"SELECT MONHOC FROM thietlaphesodiem WHERE MONHOC='$monhoc'")) > 0)
    {
        echo "<div style='text-align:center;color:#000000;'>Đã thiết lập hệ số điểm cho môn học này. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }     

    //Lưu thông tin thành viên vào bảng
    $add_abc = mysqli_query($conn, "
    INSERT INTO thietlaphesodiem 
    VALUE ('$monhoc','$dqt','$dt')");
    
                          
    //Thông báo quá trình lưu
    if ($add_abc)
        echo "<div style='text-align:center;color:#000000;'>Quá trình đăng ký thành công.</div>";
    else
        echo "<div style='text-align:center;color:#000000;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
?>
</body>

</html>