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
                <h2 class="text-center">Phân công giảng dạy</h2>
                <div class="form-group">
                    <div style="padding-bottom: 10px"><h4>Mã giảng viên</h4></div>
                    <div>
                        <?php 
                            $sql = mysqli_query($conn,"select * from giangvien") or die(myqli_error($conn));
                            if (mysqli_num_rows($sql) > 0) {
                            $i=0; 
                        ?>   
                        <select class="form-control" name = "txtMaGV">
                        <?php while($row=mysqli_fetch_assoc($sql)) {
                            $i++; ?>
                            <option><?php echo $row['MAGV']; ?></option>
                        <?php }}  ?>
                        </select>
                    </div>
                    
                </div>
                <div class="form-group">
                    <div style="padding-bottom: 10px"><h4>Tên môn học</h4></div>
                    <div>
                    <?php 
                        $sql = mysqli_query($conn,"select * from monhoc") or die(myqli_error($conn));
                        if (mysqli_num_rows($sql) > 0) {
                        $i=0; 
                    ?>   
                    <select class="form-control" name = "txtMonHoc">
                    <?php while($row=mysqli_fetch_assoc($sql)) {
                        $i++; ?>
                        <option><?php echo $row['MONHOC']; ?></option>
                    <?php }}  ?>
                    </select>
                    </div>
                    
                </div>              
                <div class="form-group">
                    <div style="padding-bottom: 10px"><h4>Học kỳ bắt đầu</h4></div>
                    <div>
                    <?php 
                        $sql = mysqli_query($conn,"select * from hockygiaidoan") or die(myqli_error($conn));
                        if (mysqli_num_rows($sql) > 0) {
                        $i=0; 
                    ?>   
                    <select class="form-control" name = "txtHocKy1">
                    <?php while($row=mysqli_fetch_assoc($sql)) {
                        $i++; ?>
                        <option><?php echo $row['HOCKY']; ?></option>
                    <?php }}  ?>
                    </select>                 
                    </div>
                   
                </div>
                <div class="form-group">
                     <div style="padding-bottom: 10px"><h4>Học kỳ kết thúc</h4></div>
                     <div>
                    <?php 
                        $sql = mysqli_query($conn,"select * from hockygiaidoan") or die(myqli_error($conn));
                        if (mysqli_num_rows($sql) > 0) {
                        $i=0; 
                    ?>   
                    <select class="form-control" name = "txtHocKy2">
                    <?php while($row=mysqli_fetch_assoc($sql)) {
                        $i++; ?>
                        <option><?php echo $row['HOCKY']; ?></option>
                    <?php }}  ?>
                    </select>
                     </div>
                    
                </div>
                <div class="form-group">
                    <div style="padding-bottom: 10px"><h4>Địa điểm giảng dạy</h4></div>
                    <div>
                        <input class="form-control" type="text" name="txtDiadiem" placeholder="Địa điểm giảng dạy">
                    </div>
                </div>
                <div class="form-group">
                    <div style="padding-bottom: 10px"><h4>Lớp</h4></div>
                    <div>
                    <?php 
                        $sql = mysqli_query($conn,"select * from loptheonganhhoc") or die(myqli_error($conn));
                        if (mysqli_num_rows($sql) > 0) {
                        $i=0; 
                    ?>   
                    <select class="form-control" name = "txtlop">
                    <?php while($row=mysqli_fetch_assoc($sql)) {
                        $i++; ?>
                        <option><?php echo $row['LOP']; ?></option>
                    <?php }}  ?>
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
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $magv         = $_POST['txtMaGV'];
    $monhoc       = $_POST['txtMonHoc'];
    $hocky1       = $_POST['txtHocKy1'];  
    $hocky2       = $_POST['txtHocKy2'];
    $diadiem      = $_POST['txtDiadiem'];
    $lop          = $_POST['txtlop'];  
   
    
          
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$magv || !$monhoc || !$hocky1 ||!$hocky2 ||!$diadiem || !$lop)
    {
        echo  "<div style='text-align:center;color:#000000;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
          
    //Lưu thông tin thành viên vào bảng
    $add_pcgd = mysqli_query($conn, "
    INSERT INTO kehoachgiangday
    VALUE ('$magv','$monhoc','$hocky1','$hocky2','$diadiem','$lop')");
                          
    //Thông báo quá trình lưu
    if ($add_pcgd)
        echo "<div style='text-align:center;color:#000000;'>Quá trình đăng ký thành công.</div>";
    else
        echo "<div style='text-align:center;color:#000000;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
?>
</body>

</html>