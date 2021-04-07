<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();
	 include("dbconnection.php");
 if(isset($_POST['btnsignin'])){
	 $username = $_POST['username'];
	 $password = $_POST['pass'];
	 $result = mysqli_query ($con, 'select * from account where username="'.$username.'" and password="'.$password.'"');
	 $row = mysqli_fetch_array($result);
	 $email = $row['email'];
	
	 if(mysqli_num_rows($result)==1){
		 $_SESSION['username'] = $username;
		 
		 echo "<script>window.open('dashboard/index.php','_self')</script>";
		 
		require_once "../admin/dashboard/PHPMailer/PHPMailer.php";
        require_once "../admin/dashboard//PHPMailer/SMTP.php";
        require_once "../admin/dashboard//PHPMailer/Exception.php";
        
        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "mail.voguetrust.net";
        $mail->SMTPAuth = true;
        $mail->Username = "info@voguetrust.net";
        $mail->Password = 'voguetrustmail';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        
        $mail->setFrom('info@voguetrust.net', 'E-Banking');			
        $mail->AddAddress(''.$email.'');	
        
        //$mail->addAttachment('upload/'.$package_image.'');
                                                
        $mail->isHTML(true);
        $mail->Subject = 'E-BANK LOGIN NOTIFICATION';			
        $mail->Body = '<span class="background:yellow">
        YOUR ACCOUNT HAS BEEN LOGGED INTO, KINDLY CONFIRMED YOU AUTHORISED THE LOGIN, ELSE, CONTACT US FOR IMMEDIATE ACTION</span>';
        
                        

        if ($mail->send()) {
           // echo "<script>alert('mail sent success')</script>";
        
        } else {
            echo "<script>alert('failed')</script>";
          echo  $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
	}
	 //else
	// echo "<script>alert('Invalid Login details entered..')</script>";		
	
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login V3</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="POST">
          <span class="login100-form-logo">
            <i class="zmdi zmdi-landscape"></i>
          </span>

          <span class="login100-form-title p-b-34 p-t-27">
            Log in
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
              Remember me
            </label>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="btnsignin">
              Login
            </button>
          </div>

          <div class="text-center p-t-90">
            <a class="txt1" href="#">
              Forgot Password?
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>