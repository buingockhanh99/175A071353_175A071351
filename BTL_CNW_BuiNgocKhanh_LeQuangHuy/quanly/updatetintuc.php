<?php 
    ob_start();
    require'../connect.php';
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
<?php
$sql = mysqli_query($conn,"SELECT * from tintuc where IDTINTUC = '$_GET[id]'");
$row = mysqli_fetch_assoc($sql); 
?>
    <div class="register-photo">
        <div class="form-container">
            <form method="post">
                <h2 class="text-center">Update tin tức</h2>
                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                        <p>Tiêu đề bài viết</p>
                    </div>
                    <div style="float: right; width: 80%">
                        <input class="form-control" type="text" name="TIEUDE" value="<?php echo $row['TIEUDE']; ?>">
                    </div>
                </div>

                <div class="form-group" style="padding-bottom: 40px;">
                    <div style="float: left;width: 20%">
                            <p>Nội dung bài viết</p>
                    </div>
                    <div style="float: right; width: 80%">
                       <textarea  name="NOIDUNG"  rows="10" cols="84"  ><?php echo $row['NOIDUNG']; ?></textarea>
                    </div>
                </div>

                <div class="form-group"><button name="signup" class="btn btn-primary btn-block" type="submit">Cập nhật</button></div>
            </form>
        </div>
    </div>

    <?php
        if (!isset($_POST["signup"])) {
            die('');}
        else{
                //lấy thông tin từ các form bằng phương thức POST
                $TIEUDE = $_POST["TIEUDE"];
                $NOIDUNG = $_POST["NOIDUNG"];


                if(!$TIEUDE || !$NOIDUNG)
                {
                  echo "<div style='text-align:center;color:red;'>Vui lòng nhập đủ thông tin</div>";  
                }
                else
                {
                $sql =mysqli_query($conn,"UPDATE tintuc SET TIEUDE = '$TIEUDE', NOIDUNG = '$NOIDUNG' where IDTINTUC = '$_GET[id]'");
                // thực thi câu $sql với biến conn lấy từ file connection.php
                if($sql)
                {
                echo "<div style='text-align:center;color:red;'>Cập nhật tin tức thành công</div>";
                header("location: danhsachtintuc.php");
                }
                else
                {
                echo "<div style='text-align:center;color:red;'>Đăng bài viết thất bại, vui lòng làm lại.</div>";
                }
            }
        }
 
    ?>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>