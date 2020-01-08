<?php 
//Nhúng file kết nối với database
    require('../connect.php');
?>
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
        <div>
            
        </div>
        <div class="form-container">
            <form method="post">
                <h4 class="text-center">Phân công giảng dạy</h4>
                <div class="form-group" style="padding-bottom: 40px; ma">
                        <div style="float: left;width: 20%">
                            <p>Mã giảng viên</p>
                        </div>
                        <div style="float: right; width: 80%">
                            <?php 
                                $sql = mysqli_query($conn,"SELECT * from giangvien ,login WHERE giangvien.MAGV = login.ID AND login.STATUS = 1");
                                if (mysqli_num_rows($sql) > 0) {
                                $i=0; 
                            ?> 
                            <select class="form-control" name = "txtMaGV">
                            <?php while($row=mysqli_fetch_assoc($sql)) {
                                $i++; ?>
                                <option><?php echo $row['MAGV']; ?></a>
                            <?php }}  ?>
                            </select>
                        </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                        <div style="float: left;width: 20%">
                            <p>Môn học</p>
                        </div>
                        <div style="float: right; width: 80%">
                        <?php 
                            $sql = mysqli_query($conn,"select * from monhoc") or die(myqli_error($conn));
                          //  $sql = mysqli_query($conn,"select * from monhoc where NGANHHOC =(select DONVI from giangvien where MAGV ='".$_POST['txtMaGV']."')") or die(myqli_error($conn));
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
                <div class="form-group" style="padding-bottom: 40px;">
                        <div style="float: left;width: 20%">
                            <p>Giai đoạn bắt đầu</p>
                        </div>
                        <div style="float: right; width: 80%">
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
                <div class="form-group" style="padding-bottom: 40px;">
                     <div style="float: left;width: 20%">
                        <p>Giai đoạn kết thúc</p>
                    </div>
                    <div style="float: right; width: 80%">
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
                <div class="form-group" style="padding-bottom: 40px;">
                   <div style="float: left;width: 20%">
                        <p>Địa điểm giảng dạy</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="text" name="txtDiadiem" placeholder="Địa điểm giảng dạy">
                    </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                   <div style="float: left;width: 20%">
                        <p>Tiết dạy</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="text" name="txtThoigian" placeholder="VD: 1,2,3">
                    </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                   <div style="float: left;width: 20%">
                        <p>Các ngày dạy</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="text" name="txtDay" placeholder="VD: Thứ 2 -> Thứ 7">
                    </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                   <div style="float: left;width: 20%">
                        <p>Lớp dạy</p>
                    </div>
                    <div style="float: right; width: 80%">
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
                
                <div class="form-group"><button name="signup" class="btn btn-primary btn-block" type="submit">Phân công</button></div>
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
    else{      
        //Lấy dữ liệu từ file dangky.php
        $magv         = $_POST['txtMaGV'];
        $monhoc       = $_POST['txtMonHoc'];
        $hocky1       = $_POST['txtHocKy1'];  
        $hocky2       = $_POST['txtHocKy2'];
        $diadiem      = $_POST['txtDiadiem'];
        $thoigian     = $_POST['txtThoigian'];
        $day          = $_POST['txtDay'];
        $lop          = $_POST['txtlop'];  
        
        //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$magv || !$monhoc || !$hocky1 ||!$hocky2 ||!$diadiem||!$thoigian || !$lop ||!$day)
        {
            echo  "<div style='text-align:center;color:red;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
            exit;
        }
        else{
        //Lưu thông tin thành viên vào bảng
        $add_pcgd = mysqli_query($conn, " INSERT INTO `kehoachgiangday` VALUES ('','$magv','$monhoc','$hocky1','$hocky2','$diadiem','$thoigian','$day','$lop')");
                              
        //Thông báo quá trình lưu
        if ($add_pcgd){

            $sql = mysqli_query($conn,"SELECT * from login where ID = '$magv'");
            $row = mysqli_fetch_assoc($sql);
            $body = '<div>Tài khoản của bạn đã được phân công giảng dạy.</div> 
                    <div>Vui lòng vào tài khoản để xem và cập nhật thông tin. </div>';
            $email = $row['USERNAME'];
            include('../php/guimail.php');
            echo "<div style='text-align:center;color:red;'>Phân công thành công.</div>";}
        else{
            echo "<div style='text-align:center;color:red;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
        }
        }
        
    }      
    // Ngắt kết nối
mysqli_close($conn);
?>
</body>

</html>