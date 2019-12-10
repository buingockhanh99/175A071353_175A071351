<?php 
//Nhúng file kết nối với database
    include('../connect.php');
?>
<!DOCTYPE html>
<html lang="en">
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
                <h2 class="text-center">Xóa tài khoản giảng viên</h2>
                <div class="form-group"><input class="form-control" type="text" name="txtMGV" placeholder="Nhập mã giảng viên cần xóa"></div>
                <div class="form-group"><button name="delete" class="btn btn-primary btn-block" type="submit">Xóa</button></div>
            </form> 

        </div>

    </div>
<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['delete'])){
        die('');
    }
     
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $magv       = $_POST['txtMGV'];
 
    //kiểm tra xem có mã gv cần xóa không
    if (mysqli_num_rows(mysqli_query($conn,"SELECT MAGV FROM giangvien WHERE MAGV='$magv'")) > 0)
    {   
        $delete2 = mysqli_query($conn, " DELETE FROM kehoachgiangday where MAGV='$magv'");
        $delete = mysqli_query($conn, " DELETE FROM giangvien where MAGV='$magv'");
        $delete1 = mysqli_query($conn, " DELETE FROM login where ID='$magv'");
        if ($delete)
        echo "<div style='text-align:center;color:#000000;'>Xóa thành công.</div>";
        else
        echo "<div style='text-align:center;color:#000000;'> Lỗi.</div>";
    }     
    else{
        echo "<div style='text-align:center;color:#000000;'> Không có mã giảng viên cần xóa </div>";
    }
    
?>


    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>

</body>
</html>