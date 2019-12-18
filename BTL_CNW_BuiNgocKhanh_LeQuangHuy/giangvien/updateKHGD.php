<?php 
    session_start(); 
    include('../connect.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/dangky.css">
    </head>
    <body>

    <div class="register-photo">
        <div class="form-container">
            <?php 
                $tentk = $_SESSION['Username'];
                $sql1 = mysqli_query($conn,"SELECT * from login where USERNAME = '$tentk'");
                $row1=mysqli_fetch_assoc($sql1);   
                $id = $row1['ID'];

                $sql = mysqli_query($conn,"SELECT * from kehoachgiangday where MAGV = '$id'");
                $row = mysqli_fetch_assoc($sql);
            ?> 

            <form method="post">
                <h2 class="text-center">Cập nhật kế hoạch giảng dạy</h2>

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
                            <p>Môn học</p>
                        </div>
                        <div style="float: right; width: 80%">
                        <?php
                            $sql2 = mysqli_query($conn,"select * from monhoc");
                            if (mysqli_num_rows($sql2) > 0) {
                            $i=0; 
                        ?>   
                        <select class="form-control" name = "txtMonHoc">
                            <option><?php echo $row['TENMONHOC']; ?></option>
                        <?php while($row2=mysqli_fetch_assoc($sql2)) {
                            $i++; ?>
                            <option><?php echo $row2['MONHOC']; ?></option>
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
                                $sql2 = mysqli_query($conn,"select * from hockygiaidoan");
                                if (mysqli_num_rows($sql2) > 0) {
                                $i=0; 
                            ?>   
                            <select class="form-control" name = "txtHocKy1">
                                <option><?php echo $row['GIAIDOANBD']; ?></option>
                            <?php while($row2=mysqli_fetch_assoc($sql2)) {
                                $i++; ?>
                                <option><?php echo $row2['HOCKY']; ?></option>
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
                            $sql2 = mysqli_query($conn,"select * from hockygiaidoan");
                            if (mysqli_num_rows($sql2) > 0) {
                            $i=0; 
                        ?>   
                        <select class="form-control" name = "txtHocKy2">
                            <option><?php echo $row['GIAIDOANKT']; ?></option>
                        <?php while($row2=mysqli_fetch_assoc($sql2)) {
                            $i++; ?>
                            <option><?php echo $row2['HOCKY']; ?></option>
                        <?php }}  ?>
                        </select>
                         </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                        <p>Địa điểm giảng dạy</p>
                    </div>
                    <div style="float: right; width: 80%">
                    <input class="form-control" type="text" name="txtDiadiem" placeholder="Địa điểm giảng dạy" value="<?php echo $row['DIADIEM']; ?>">
                    </div>
                </div>
                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                            <p>Lớp dạy</p>
                        </div>
                        <div style="float: right; width: 80%">
                    <?php 
                        $sql2 = mysqli_query($conn,"select * from loptheonganhhoc");
                        if (mysqli_num_rows($sql2) > 0) {
                        $i=0; 
                    ?>   
                    <select class="form-control" name = "txtlop">
                        <option><?php echo $row['LOPDAY']; ?></option>
                    <?php while($row2=mysqli_fetch_assoc($sql2)) {
                        $i++; ?>
                        <option><?php echo $row2['LOP']; ?></option>
                    <?php }}  ?>
                    </select>
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
        $monhoc       = $_POST['txtMonHoc'];
        $hocky1       = $_POST['txtHocKy1'];  
        $hocky2       = $_POST['txtHocKy2'];
        $diadiem      = $_POST['txtDiadiem'];
        $lop          = $_POST['txtlop'];     
        //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$magv || !$monhoc || !$hocky1 ||!$hocky2 ||!$diadiem || !$lop)
        {
            echo  "<div class='form-group' style='text-align:center;color:red;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
            exit;
        }
        else
        {    
            //Lưu thông tin thành viên vào bảng
            $add_pcgd = mysqli_query($conn, "
            UPDATE kehoachgiangday SET TENMONHOC='$monhoc',GIAIDOANBD='$hocky1',GIAIDOANKT='$hocky2',DIADIEM='$diadiem',LOPDAY='$lop' where MAGV='$magv'");   
            //Thông báo quá trình lưu
            if ($add_pcgd)
            {
                echo "<div class='form-group' style='text-align:center;color:red;'>Cập nhật thành công.</div>";
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