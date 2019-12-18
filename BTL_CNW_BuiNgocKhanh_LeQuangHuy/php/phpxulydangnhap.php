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
                //Kiểm tra tên đăng nhập có tồn tại không
                $query = mysqli_query($conn,"SELECT USERNAME, PASSWORD FROM login WHERE USERNAME='$username'");
                if (mysqli_num_rows($query) == 0) {
                    echo "<div style='text-align:center;color:red;'>Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.</div>";
                }
                else
                {
                    $row = mysqli_fetch_array($query);
                     //So sánh mât khâủ
                    //Ưu điểm của password_verify()
                    //Sử dụng các phương thức so sánh password không an toàn, như toán tử == (toán tử chỉ so sánh giá trị bằng nhau, ví dụ khi so sánh 0 với 0x123 sẽ trả vể true)
                    #2: So sánh password trực tiếp bằng câu lệnh SELECT trên SQL, vd: SELECT * FROM users WHERE email = $email, password = $password (rất dễ bị SQL Injection)

                    
                    if (password_verify($password, $row['PASSWORD'])) {
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