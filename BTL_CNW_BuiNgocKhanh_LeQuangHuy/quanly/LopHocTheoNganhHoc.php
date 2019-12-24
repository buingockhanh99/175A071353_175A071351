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
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post">
                <h2 class="text-center">Tạo Lớp</h2>
                <?php 
                    $sql = mysqli_query($conn,"select * from nganhhoc") or die(myqli_error($conn));
                    if (mysqli_num_rows($sql) > 0) {
                    $i=0; 
                ?>   
                <div class="form-group">
                    <select class="form-control" name = "txtNganhhoc">
                        <?php while($row=mysqli_fetch_assoc($sql)) {
                        $i++; ?>
                        <option><?php echo $row['NGANHHOC']; ?></option>
                      <?php }}  ?>
                    </select>
                </div>

                <div class="form-group"><input class="form-control" type="text" name="txtLophoc" placeholder="Lớp học"></div>
                <div class="form-group"><button name="signup" class="btn btn-primary btn-block" type="submit">Tạo</button></div>
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
    else
    {
          
        //Khai báo utf-8 để hiển thị được tiếng việt
        header('Content-Type: text/html; charset=UTF-8');
              
        //Lấy dữ liệu từ file dangky.php
        $nganhhoc    = addslashes($_POST['txtNganhhoc']);
        $lophoc    = addslashes($_POST['txtLophoc']);
              
        //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$lophoc)
        {
            echo  "<div style='text-align:center;color:#000000;'>Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
           
        }
        else
        {
        //Kiểm tra xem có lớp học này chưa ?
        if (mysqli_num_rows(mysqli_query($conn,"SELECT LOP FROM loptheonganhhoc WHERE LOP='$lophoc'")) > 0)
        {
            echo "<div style='text-align:center;color:#000000;'>Đã có nghành học này. <a href='javascript: history.go(-1)'>Trở lại</a></div>";
        } 
        else{  
        //Lưu thông tin thành viên vào bảng
        $add_lophoc = mysqli_query($conn, "
        INSERT INTO loptheonganhhoc 
        VALUE ('$nganhhoc','$lophoc')");
        
                              
        //Thông báo quá trình lưu
        if ($add_lophoc)
            echo "<div style='text-align:center;color:#000000;'>Quá trình đăng ký thành công.</div>";
        else
            echo "<div style='text-align:center;color:#000000;'> Có lỗi xảy ra trong quá trình đăng ký.</div>";
            }
        }
    }


    // Ngắt kết nối
mysqli_close($conn);
?>
</body>

</html>