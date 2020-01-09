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



        if (isset($_GET['key1']))
        {
            if ($_GET['key1']=='xoa1')
            {
                $delete1=mysqli_query($conn,"DELETE FROM tintuc where IDTINTUC = '$_GET[id1]'");
                if($delete1){
                     header("location: danhsachtintuc.php");
                }
                else{
                    echo "Xóa không thành công";
                }
            }
        }
      
?>