<?php
   session_start();	
   include'connect.php';

   $Username = $_SESSION['Username'];
   $sql = mysqli_query($conn,"SELECT * from login where USERNAME = '$Username'");
   $row=mysqli_fetch_assoc($sql);   
   if($row['STATUS'] ==0)
   {	
   		if($row['LEVEL']==1)
   		header("location: quantri.php");
   		else if ($row['LEVEL']==2)
   		header("location: quanly.php");
   		else
   		header("location: giangvien/capnhatthongtin.php");
   }
   else{
   		if($row['LEVEL']==1)
   		header("location: quantri.php");
   		else if ($row['LEVEL']==2)
   		header("location: quanly.php");
   		else
   		header("location: giangvien.php");
   }



?>