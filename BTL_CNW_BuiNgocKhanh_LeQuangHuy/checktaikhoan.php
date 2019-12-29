<?php
    ob_start();
   session_start();	
require'connect.php';

   $Username = $_SESSION['Username'];
   $sql = mysqli_query($conn,"SELECT * from login where USERNAME = '$Username'");
   $row=mysqli_fetch_assoc($sql);   
   if($row['STATUS'] ==0)
   {	
   		if($row['LEVEL']==1)
   		header("location: quantri.php");
   		else if ($row['LEVEL']==2)
   		header("location: quanly/updateTT.php");
   		else
   		header("location: giangvien/updateTT.php");
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