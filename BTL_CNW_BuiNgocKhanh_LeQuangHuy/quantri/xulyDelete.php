<?php
        ob_start();
        require('../connect.php');

        if (isset($_GET['key'])&&($_GET['key']!=''))
        {
        if ($_GET['key']=='xoa')
        {
        $sql = mysqli_query($conn,"SELECT LEVEL from login where ID = '$_GET[id]'");
        $row=mysqli_fetch_assoc($sql);
        if($row['LEVEL']==3)
        {
        $delete1 = mysqli_query($conn, " DELETE FROM kehoachgiangday where MAGV='$_GET[id]'");
        $delete2 = mysqli_query($conn, " DELETE FROM giangvien where MAGV='$_GET[id]'");
        $delete3 = mysqli_query($conn, " DELETE FROM login where ID='$_GET[id]'");
        if ($delete3)
        {
       header("location: thongtintaikhoangv.php");
        }
        else
        echo "<div style='text-align:center;color:red;'> Xóa không thành công</div>";
        }
        else if ($row['LEVEL']==2)
        {
        $delete4 = mysqli_query($conn, " DELETE FROM quanly where MAQL='$_GET[id]'");
        $delete5 = mysqli_query($conn, " DELETE FROM login where ID='$_GET[id]'");
        if ($delete5){
         header("location: thongtintaikhoanql.php");
        }
        else
        { echo "<div style='text-align:center;color:red;'> Xóa không thành công.</div>";}
        }
        }
        }
      
      ?>