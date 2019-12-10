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
                <h2 class="text-center">Xóa tài khoản quản lý</h2>
                <div class="form-group"><input class="form-control" type="text" name="txtMQL" placeholder="Nhập mã quản lý cần xóa"></div>
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
    $maql       = $_POST['txtMQL'];
 
    //kiểm tra xem có mã gv cần xóa không
    if (mysqli_num_rows(mysqli_query($conn,"SELECT MAQL FROM quanly WHERE MAQL='$maql'")) > 0)
    {   
        $delete = mysqli_query($conn, " DELETE FROM quanly where MAQL='$maql'");
        $delete1 = mysqli_query($conn, " DELETE FROM login where ID='$maql'");
        if ($delete)
        echo "<div style='text-align:center;color:red;'>Xóa thành công.</div>";
        else
        echo "<div style='text-align:center;color:red;'> Xóa không thành công.</div>";
    }     
    else{
        echo "<div style='text-align:center;color:red;'> Không có mã quản lý cần xóa </div>";
    }
    
?>


    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>

</body>
</html>