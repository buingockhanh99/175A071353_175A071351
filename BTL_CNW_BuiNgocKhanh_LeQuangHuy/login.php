<!DOCTYPE html>
<html>
<head>
	<title>
		Đăng nhập vào hệ thống
	</title>
  <link REL="SHORTCUT ICON" HREF="./images/2.jpg">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Import Boostrap css, js, font awesome here -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link href="./css/dangnhap.css" rel="stylesheet">
</head>
<body>
  <div id="login">
    <div id="login_left">
      <form id="form" action="dangnhap_submit" method="get" accept-charset="utf-8">
    <!--<img src="./images/dhtl.png" id="logo">-->
        <div id="h_1">
           <h1>Đăng Nhập</h1>
        </div>
          <span id="title">Tài Khoản <i class="fas fa-users"></i></span>
            <div id="textbox">
              <input type="text" name="" placeholder="Tên tài khoản">
            </div>          
          <span id="title">Mật khẩu <i class="fas fa-lock"></i></span>
            <div id="textbox">
              <input type="password" placeholder="Password" id="myInput">
                <span id="eye" onclick="myFunction()">
                  <i id="a1" class="fas fa-eye"></i>
                </span>
            </div>
          <br/>
          <button id="button" type="">Đăng Nhập</button><br/>
          <a href="http://www.tlu.edu.vn/">Về trang chủ!!</a>
         </form> 
    </div>
  </div>
    <script>
      function myFunction() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("a1");
        if(x.type === 'password'){
          x.type = "text";
        }
        else {
          x.type = "password";
        }
      }
    </script>
</body>
</html>

  




