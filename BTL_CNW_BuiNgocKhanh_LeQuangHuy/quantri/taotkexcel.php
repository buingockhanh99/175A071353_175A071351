<?php 
require('../connect.php');
require('../Class_phpEX/PHPExcel.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dangky.css">
</head>
<body>
	  <div class="register-photo">
	  	<div class="form-container">
	  		<form method="post" enctype="multipart/form-data">
			    <input type="file" name="file" />
			    <br />
			    <input type="submit" name="import" class="btn btn-primary btn-block" value="Import" />
  			 </form>
		</div>
<?php
	if(!isset($_POST['import']))
	{
		die('');
	}
	else{
			try{
				$file = $_FILES['file']['tmp_name'];
				
				$objReader =PHPExcel_IOFactory::createReaderForFile($file);
				$objReader -> setLoadSheetsOnly('Sheet1');

				$objEX = $objReader->load($file);
				$sheetData = $objEX -> getActiveSheet()->toArray('null',true,true,true);

				//print_r($sheetData);
				$highRow = $objEX->setActiveSheetIndex()-> getHighestRow();
				//echo $highRow;

				for($row =2; $row <= $highRow; $row++ )
				{
					$id = $sheetData[$row]['A'];
					$username = $sheetData[$row]['B'];
					$password = $sheetData[$row]['C'];
					$password1 = $sheetData[$row]['C'];
					$level = $sheetData[$row]['D'];
					$email = $sheetData[$row]['B'];


					$password = password_hash($password,PASSWORD_DEFAULT);
					if (mysqli_num_rows(mysqli_query($conn,"SELECT USERNAME FROM login WHERE USERNAME='$username'")) > 0)
	                {
	                    echo "<div style='text-align:center;color:#000000;'>Tên đăng nhập ".$username. " đã có người dùng. Vui lòng chọn tên đăng nhập khác.</div>";
	                    
	                }
	                else{

					$sql = mysqli_query($conn, "INSERT INTO login (ID,USERNAME,PASSWORD,LEVEL,STATUS)
			        VALUE ('$id','$username','$password','$level','0')");
			        
	                    if($level =="2")
	                    {
	                        $add = mysqli_query($conn, "
	                        INSERT INTO quanly (MAQL,LIENHE) VALUE ('$id','$email')");
	                    }
	                    else{
	                        $add1 = mysqli_query($conn, "
	                        INSERT INTO giangvien (MAGV,LIENHE) VALUE ('$id','$email')");
	                        $add = mysqli_query($conn, "
	                        INSERT INTO kehoachgiangday (MAGV) VALUE ('$id')");
	                    }

					}


				}
				if($sql)
				{	
			    	echo  "<div style='text-align:center;color:#4285f4;'>Import thành công tài khoản </div></div>";
			    	$body = 'Vui lòng truy cập <a href="https://khanhbn72.000webhostapp.com/dangnhap.php">tại đây</a> để đăng nhập <br> 
                            Đăng nhập với <label style="color:red">username:</label> '.$username. '    <label style="color:red">password:</label>   '.$password1. '';
                            
			    	include('../php/guimail2.php');
				}
			    else
			    	echo "Thất bại";
			}
			catch(Exception $e) {
    		  echo  "<div style='text-align:center;color:red;'>Chưa có dữ liệu</div></div>";
			}
	} 
?>



     <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>