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



        else if (isset($_GET['key1']))
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

        else if (isset($_GET['key2']))
        {
            if ($_GET['key2']=='xoamon')
            {
                $delete1=mysqli_query($conn,"DELETE FROM kehoachgiangday where TENMONHOC = '$_GET[monhoc]'");
                $delete2=mysqli_query($conn,"DELETE FROM monhoc where MONHOC = '$_GET[monhoc]'");
                if($delete2){
                     header("location: danhsachmonhoc.php");
                }
                else{
                    echo "Xóa không thành công";
                }
            }
        }

        else{
                $delete1=mysqli_query($conn,"DELETE FROM kehoachgiangday where LOPDAY = '$_GET[lophoc]'");
                $delete2=mysqli_query($conn,"DELETE FROM loptheonganhhoc where LOP = '$_GET[lophoc]'");
                if($delete2){
                     header("location: danhsachlophoc.php");
                }
                else{
                    echo "Xóa không thành công";
                }
        }
      
?>