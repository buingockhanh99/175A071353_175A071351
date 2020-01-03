<?php
        ob_start();
        require('../connect.php');

        if (isset($_GET['key']))
        {
            if ($_GET['key']=='xoa')
            {
                $delete=mysqli_query($conn,"DELETE FROM kehoachgiangday where ID = '$_GET[id]'");
                if($delete){
                     header("location: dsphanconggiangday.php");
                }
                else{
                    echo "Xóa không thành công";
                }
            }
        }
      
      ?>