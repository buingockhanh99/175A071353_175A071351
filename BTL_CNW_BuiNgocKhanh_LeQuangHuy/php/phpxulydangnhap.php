<?php 
    //Xử lý đăng nhập
    if (isset($_POST['dangnhap'])){


        //Lấy dữ liệu nhập vào
        $username = $_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $_SESSION['Username'] = $username;
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$username || !$password) {
            echo "<p style='text-align:center;color:red;'>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.</p>";
        }
        else{
                // mã hóa pasword
                $password = md5($password);
                //Kiểm tra tên đăng nhập có tồn tại không
                $query = mysqli_query($conn,"SELECT USERNAME, PASSWORD FROM login WHERE USERNAME='$username'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<div style='text-align:center;color:red;'>Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.</div>";
                }
                else
                {
                    //Lấy mật khẩu trong database ra
                    $row = mysqli_fetch_array($query);
                     //So sánh 2 mật khẩu có trùng khớp hay không
                    if ($password == $row['PASSWORD']) {
                    {
                       $sql = mysqli_query($conn,"SELECT * from login where USERNAME = '$username'");
                        $row=mysqli_fetch_assoc($sql);                      
                            if($row['LEVEL']==1)
                            {
                                header("location: checktaikhoan.php");
                            }
                            else if($row['LEVEL']==2)
                            {
                                header("location: checktaikhoan.php");
                            }
                            else
                            {
                                header("location: checktaikhoan.php");
                                // ob_enf_fluck();
                            }   
                        
                    }
                    }
                    else{
                        echo "<div style='text-align:center;color:red;'>Mật khẩu không đúng. Vui lòng nhập lại.</div>";      
                    }
                }
            }
}
?>