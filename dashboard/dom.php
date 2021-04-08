<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();
$connect=mysqli_connect('localhost', 'kala', 'kala',"test");
if(isset($_SESSION["username"])){
   $id=$_SESSION["username"];
   $check=mysqli_query($connect, 'select * from account where username="'.$id.'"');
   $info=mysqli_fetch_array($check);
   $name = $info['account_name'];
   $username = $info['username'];
   $email = $info['email'];
   $address = $info['address'];
   $mobile = $info['mobile'];
   $Balance = $info['Balance'];
   $image = $info['image'];
   $check1=mysqli_query($connect, 'select * from loan where Account_Name="'.$name.'"');
   $info1=mysqli_fetch_array($check1);
   $loan = $info1['amount'];

   $image = $info['image'];
   $sender_email = $info['email'];

   $check2=mysqli_query($connect, 'select * from loan where Account_Name="'.$name.'"');
   $info1=mysqli_fetch_array($check2);
   $loan = $info1['amount'];

  $check1=mysqli_query($connect, 'select * from account where username="'.$id.'"');

    if (isset($_POST["submit"])) {

    $transaction_id = uniqid('', true);
    $bef_account = $_POST['bef_acct'];
    $sender_account = $_POST['sender_account'];
    $amount = $_POST['amount'];
    $description = $_POST['remark'];
    $date = date('d-m-yy');

    if ($Balance > 0) {
      if ($Balance > $amount) {
        $Balance = $Balance-$amount;
      }
      else {
        exit('insufficient funds');
      }
    }
    else {
      exit('you have no money in your account');
    }

    $transaction_type = 'debit';

    // retrieve the beneficiary
    $bef_sql = "SELECT * FROM account WHERE account_number='$bef_account'";

    $bef_query = mysqli_query($connect, $bef_sql);

    $bef_result = mysqli_fetch_assoc($bef_query);

    if(!$bef_result){
      echo mysqli_error($connect);
    }

    // $check1=mysqli_query($connect, 'select * from account where account_name="'.$account_name1.'"');
    // $info1=mysqli_fetch_array($check1);
    $receiver_email = $bef_result['email'];
    $Balance1 = $bef_result['Balance'];
    $Balance1 = $Balance + $amount;
    // $Balance1 = $Balance1+$amount;
    // $transaction_type1 = 'credit_alert';

    $transfer = "INSERT INTO fund (account, amount, depositor, date, address, mobile, transaction_type, uid, description, status) VALUES('$bef_account','$amount','$email','$date','$address', '$mobile', '$transaction_type','$transaction_id', '$description', 'pending')";

    $transaction_update_sql = "INSERT INTO transaction_history (transaction_id) VALUES ('$transaction_id')"; 

    $update_sender_sql = "UPDATE account SET Balance = '$Balance' WHERE username ='$username'";
    $update_receiver_sql = "UPDATE account SET Balance = '$Balance1' WHERE account_number ='$bef_account'";


    $transfer_query = mysqli_query($connect, $transfer);
    $transaction_update_query = mysqli_query($connect, $transaction_update_sql);

    if($transfer_query && $transaction_update_query) {
      $_SESSION['transfer'] = [$transaction_id, $description, $Balance, $Balance1, $bef_account, $username, $amount, $receiver_email];
      header('Location: confirm_transfer.php');
    }
    else{
        echo "<script>alert('transfer failed')</script>";
        echo "Error:" .$transfer. "</br>".$connect->error;
    }

}


?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>DASHBOARD</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">
	
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.css">
	
	<link rel="stylesheet" href="assets/vendor_components/lineaicons/linea.css">
    
	<!--amcharts -->
	<link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css" />
	
	<!-- Bootstrap-extend -->
	<link rel="stylesheet" href="css/bootstrap-extend.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="css/master_style.css">
	
	<!-- Crypto_Admin skins -->
	<link rel="stylesheet" href="css/skins/_all-skins.css">
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

     
  </head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	  <b class="logo-mini">
		  <span class="light-logo"><img src="images/logo-light.png" alt="logo"></span>
		  <span class="dark-logo"><img src="images/logo-dark.png" alt="logo"></span>
	  </b>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
		  <img src="images/logo-light-text.png" alt="logo" class="light-logo">
	  	  <img src="images/logo-dark-text.png" alt="logo" class="dark-logo">
	  </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  
		  <!-- <li class="search-box"> -->
            <!-- <a class="nav-link hidden-sm-down" href="javascript:void(0)"><i class="mdi mdi-magnify"></i></a> -->
            <!-- <form class="app-search" style="display: none;"> -->
                <!-- <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a> -->
			<!-- </form> -->
          <!-- </li>			 -->
		  
          <!-- Messages -->
          <!-- <li class="dropdown messages-menu"> -->
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> -->
              <!-- <i class="mdi mdi-email"></i> -->
            <!-- </a> -->
            <!-- <ul class="dropdown-menu scale-up"> -->
              <!-- <li class="header">You have 5 messages</li> -->
              <!-- <li> -->
                <!-- inner menu: contains the actual data -->
                <!-- <ul class="menu inner-content-div"> -->
                  <!-- <li><!-- start message --> 
                    <!-- <a href="#"> -->
                      <!-- <div class="pull-left"> -->
                        <!-- <img src="images/user2-160x160.jpg" class="rounded-circle" alt="User Image"> -->
                      <!-- </div> -->
                      <!-- <div class="mail-contnet"> -->
                         <!-- <h4> -->
                          <!-- Lorem Ipsum -->
                          <!-- <small><i class="fa fa-clock-o"></i> 15 mins</small> -->
                         <!-- </h4> -->
                         <!-- <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- end message -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <div class="pull-left"> -->
                        <!-- <img src="images/user3-128x128.jpg" class="rounded-circle" alt="User Image"> -->
                      <!-- </div> -->
                      <!-- <div class="mail-contnet"> -->
                         <!-- <h4> -->
                          <!-- Nullam tempor -->
                          <!-- <small><i class="fa fa-clock-o"></i> 4 hours</small> -->
                         <!-- </h4> -->
                         <!-- <span>Curabitur facilisis erat quis metus congue viverra.</span> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <div class="pull-left"> -->
                        <!-- <img src="images/user4-128x128.jpg" class="rounded-circle" alt="User Image"> -->
                      <!-- </div> -->
                      <!-- <div class="mail-contnet"> -->
                         <!-- <h4> -->
                          <!-- Proin venenatis -->
                          <!-- <small><i class="fa fa-clock-o"></i> Today</small> -->
                         <!-- </h4> -->
                         <!-- <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <div class="pull-left"> -->
                        <!-- <img src="images/user3-128x128.jpg" class="rounded-circle" alt="User Image"> -->
                      <!-- </div> -->
                      <!-- <div class="mail-contnet"> -->
                         <!-- <h4> -->
                          <!-- Praesent suscipit -->
                        <!-- <small><i class="fa fa-clock-o"></i> Yesterday</small> -->
                         <!-- </h4> -->
                         <!-- <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <div class="pull-left"> -->
                        <!-- <img src="images/user4-128x128.jpg" class="rounded-circle" alt="User Image"> -->
                      <!-- </div> -->
                      <!-- <div class="mail-contnet"> -->
                         <!-- <h4> -->
                          <!-- Donec tempor -->
                          <!-- <small><i class="fa fa-clock-o"></i> 2 days</small> -->
                         <!-- </h4> -->
                         <!-- <span>Praesent vitae tellus eget nibh lacinia pretium.</span> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                <!-- </ul> -->
              <!-- </li> -->
              <!-- <li class="footer"><a href="#">See all e-Mails</a></li> -->
            <!-- </ul> -->
          <!-- </li> -->
          <!-- Notifications -->
          <!-- <li class="dropdown notifications-menu"> -->
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> -->
              <!-- <i class="fa fa-home"></i> -->
            <!-- </a> -->
            <!-- <ul class="dropdown-menu scale-up"> -->
              <!-- <li class="header">You have 7 notifications</li> -->
              <!-- <li> -->
                <!-- inner menu: contains the actual data -->
                <!-- <ul class="menu inner-content-div"> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit. -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <i class="fa fa-warning text-yellow"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere. -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <i class="fa fa-users text-red"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat. -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <i class="fa fa-shopping-cart text-green"></i> In gravida mauris et nisi -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <i class="fa fa-user text-red"></i> Praesent eu lacus in libero dictum fermentum. -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <i class="fa fa-user text-red"></i> Nunc fringilla lorem  -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- <li> -->
                    <!-- <a href="#"> -->
                      <!-- <i class="fa fa-user text-red"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet. -->
                    <!-- </a> -->
                  <!-- </li> -->
                <!-- </ul> -->
              <!-- </li> -->
              <!-- <li class="footer"><a href="#">View all</a></li> -->
            <!-- </ul> -->
          <!-- </li> -->
          <!-- Tasks -->
          <!-- <li class="dropdown tasks-menu"> -->
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"> -->
              <!-- <i class="mdi mdi-message"></i> -->
            <!-- </a> -->
            <!-- <ul class="dropdown-menu scale-up"> -->
              <!-- <li class="header">You have 6 tasks</li> -->
              <!-- <li> -->
                <!-- inner menu: contains the actual data -->
                <!-- <ul class="menu inner-content-div"> -->
                  <!-- <li><!-- Task item --> 
                    <!-- <a href="#"> -->
                      <!-- <h3> -->
                        <!-- Lorem ipsum dolor sit amet -->
                        <!-- <small class="pull-right">30%</small> -->
                      <!-- </h3> -->
                      <!-- <div class="progress xs"> -->
                        <!-- <div class="progress-bar progress-bar-aqua" style="width: 30%" role="progressbar" -->
                             <!-- aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> -->
                          <!-- <span class="sr-only">30% Complete</span> -->
                        <!-- </div> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- end task item -->
                  <!-- <li><!-- Task item --> 
                    <!-- <a href="#"> -->
                      <!-- <h3> -->
                        <!-- Vestibulum nec ligula -->
                        <!-- <small class="pull-right">20%</small> -->
                      <!-- </h3> -->
                      <!-- <div class="progress xs"> -->
                        <!-- <div class="progress-bar progress-bar-danger" style="width: 20%" role="progressbar" -->
                             <!-- aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> -->
                          <!-- <span class="sr-only">20% Complete</span> -->
                        <!-- </div> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- end task item -->
                  <!-- <li><!-- Task item --> 
                    <!-- <a href="#"> -->
                      <!-- <h3> -->
                        <!-- Donec id leo ut ipsum -->
                        <!-- <small class="pull-right">70%</small> -->
                      <!-- </h3> -->
                      <!-- <div class="progress xs"> -->
                        <!-- <div class="progress-bar progress-bar-light-blue" style="width: 70%" role="progressbar" -->
                             <!-- aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> -->
                          <!-- <span class="sr-only">70% Complete</span> -->
                        <!-- </div> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- end task item -->
                  <!-- <li><!-- Task item --> 
                    <!-- <a href="#"> -->
                      <!-- <h3> -->
                        <!-- Praesent vitae tellus -->
                        <!-- <small class="pull-right">40%</small> -->
                      <!-- </h3> -->
                      <!-- <div class="progress xs"> -->
                        <!-- <div class="progress-bar progress-bar-yellow" style="width: 40%" role="progressbar" -->
                             <!-- aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> -->
                          <!-- <span class="sr-only">40% Complete</span> -->
                        <!-- </div> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- end task item -->
                  <!-- <li><!-- Task item --> 
                    <!-- <a href="#"> -->
                      <!-- <h3> -->
                        <!-- Nam varius sapien -->
                        <!-- <small class="pull-right">80%</small> -->
                      <!-- </h3> -->
                      <!-- <div class="progress xs"> -->
                        <!-- <div class="progress-bar progress-bar-red" style="width: 80%" role="progressbar" -->
                             <!-- aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> -->
                          <!-- <span class="sr-only">80% Complete</span> -->
                        <!-- </div> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- end task item -->
                  <!-- <li><!-- Task item --> 
                    <!-- <a href="#"> -->
                      <!-- <h3> -->
                        <!-- Nunc fringilla -->
                        <!-- <small class="pull-right">90%</small> -->
                      <!-- </h3> -->
                      <!-- <div class="progress xs"> -->
                        <!-- <div class="progress-bar progress-bar-primary" style="width: 90%" role="progressbar" -->
                             <!-- aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"> -->
                          <!-- <span class="sr-only">90% Complete</span> -->
                        <!-- </div> -->
                      <!-- </div> -->
                    <!-- </a> -->
                  <!-- </li> -->
                  <!-- end task item -->
                <!-- </ul> -->
              <!-- </li> -->
              <!-- <li class="footer"> -->
                <!-- <a href="#">View all tasks</a> -->
              <!-- </li> -->
            <!-- </ul> -->
          <!-- </li> -->
		  <!-- User Account -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../admin/dashboard/upload/<?php echo $image?>" class="user-image rounded-circle" alt="User Image">
            </a>
            <!-- <ul class="dropdown-menu scale-up"> -->
              <!-- User image -->
              <!-- <li class="user-header"> -->
                <!-- <img src="images/user5-128x128.jpg" class="float-left rounded-circle" alt="User Image"> -->

                <!-- <p> -->
                  <!-- Romi Roy -->
                  <!-- <small class="mb-5">jb@gmail.com</small> -->
                  <!-- <a href="#" class="btn btn-danger btn-sm btn-rounded">View Profile</a> -->
                <!-- </p> -->
              <!-- </li> -->
              <!-- Menu Body -->
              <!-- <li class="user-body"> -->
                <!-- <div class="row no-gutters"> -->
                  <!-- <div class="col-12 text-left"> -->
                    <!-- <a href="#"><i class="ion ion-person"></i> My Profile</a> -->
                  <!-- </div> -->
                  <!-- <div class="col-12 text-left"> -->
                    <!-- <a href="#"><i class="ion ion-email-unread"></i> Inbox</a> -->
                  <!-- </div> -->
                  <!-- <div class="col-12 text-left"> -->
                    <!-- <a href="#"><i class="ion ion-settings"></i> Setting</a> -->
                  <!-- </div> -->
				<!-- <div role="separator" class="divider col-12"></div> -->
				  <!-- <div class="col-12 text-left"> -->
                    <!-- <a href="#"><i class="ti-settings"></i> Account Setting</a> -->
                  <!-- </div> -->
				<!-- <div role="separator" class="divider col-12"></div> -->
				  <!-- <div class="col-12 text-left"> -->
                    <!-- <a href="#"><i class="fa fa-power-off"></i> Logout</a> -->
                  <!-- </div>				 -->
                <!-- </div> -->
                <!-- /.row -->
              <!-- </li> -->
            <!-- </ul> -->
          <!-- </li> -->
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class=""></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
		 <div class="ulogo">
			 <a href="index.php">
			  <!-- logo for regular state and mobile devices -->
			  <span><b>Hello, </b><?php echo $name?></span>
			</a>
		</div>
        <div class="image">
          <img src="../admin/dashboard/upload/<?php echo $image?>" class="rounded-circle" alt="User Image">
        </div>
        <div class="info">
          <p><?php echo $name?></p>
			<a href="profile.php" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="ion ion-gear-b"></i></a>
            <a href="" class="link" data-toggle="tooltip" title="" data-original-title="No Notifications"><i class="fa fa-bell"></i></a>
            <a href="logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ion ion-power"></i></a>
        </div>
      </div>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="nav-devider"></li>
       
        <li class="">
          <a href="index.php">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="">
          <a href="profile.php">
            <i class="fa fa-user"></i> <span>My Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="">
          <a href="statement.php">
            <i class="fa fa-leaf"></i> <span>My Transactions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="active">
          <a href="dom.php">
            <i class="fa fa-folder-open"></i> <span>Domestic Transfers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
        <!-- <li class="">
          <a href="wire.php">
            <i class="fa fa-reply-all"></i> <span>Wire Transfers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li> -->
		
        <li class="">
          <a href="beneficiaries.php">
            <i class="fa fa-group"></i> <span>My Beneficiaries</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="">
          <a href="loan.php">
            <i class="fa fa-shopping-bag"></i> <span>Loans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="">
          <a href="contact.php">
            <i class="fa fa-history"></i> <span>Get Help</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
        <li class="">
          <a href="logout.php">
            <i class="fa fa-sign-out"></i> <span>Log Out</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Internet Banking Portal</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Transactions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		
		<div class="row">
		
		  <div class="col-lg-4 col-md-8 col-lg-3">
            <div class="box box-body bg-hexagons-dark pull-up">
              <div class="media align-items-center p-0">
                <div class="text-center">
				  <a href="#"><i class="fa fa-birthday-cake" title="XRP"></i></a>
			  	</div>
			  	<div>
				  <h3 class="no-margin text-bold">BOOK BALANCE</h3>
				  <span></span>
			  	</div>
              </div>
              <div class="flexbox align-items-center mt-25">
                <div>
				  <p class="no-margin font-weight-600"><span class="text-yellow">$ <?php echo $Balance; ?></span></p>
				  <p class="no-margin">Uncleared</p>
			  	</div>
			  	<div class="text-right">
				  <p class="no-margin font-weight-600"><span class="text-yellow"></span></p>
				  <p class="no-margin"></p>
			 	</div>
              </div>
            </div>			
          </div>
		  
		  <div class="col-lg-4 col-md-8 col-lg-3">
            <div class="box box-body bg-hexagons-dark pull-up">
              <div class="media align-items-center p-0">
                <div class="text-center">
				  <a href="#"><i class="fa fa-birthday-cake" title="BAT"></i></a>
			  	</div>
			  	<div>
				  <h3 class="no-margin text-bold">AVAILABLE BALANCE</h3>
				  <span></span>
			  	</div>
              </div>
              <div class="flexbox align-items-center mt-25">
                <div>
				  <p class="no-margin font-weight-600"><span class="text-yellow">$ <?php echo $Balance; ?></span></p>
				  <p class="no-margin">Cleared</p>
			  	</div>
			  	<div class="text-right">
				  <p class="no-margin font-weight-600"><span class="text-yellow"></span></p>
				  <p class="no-margin"></p>
			 	</div>
              </div>
            </div>			
          </div>
		  
		  <div class="col-lg-4 col-md-8 col-lg-3">
            <div class="box box-body bg-hexagons-dark pull-up">
              <div class="media align-items-center p-0">
                <div class="text-center">
				  <a href="#"><i class="fa fa-birthday-cake" title="ADA"></i></a>
			  	</div>
			  	<div>
				  <h3 class="no-margin text-bold">LOAN BALANCE</h3>
				  <span></span>
			  	</div>
              </div>
              <div class="flexbox align-items-center mt-25">
                <div>
				  <p class="no-margin font-weight-600"><span class="text-yellow">$ <?php echo $loan; ?></span></p>
				  <p class="no-margin">Sponsored</p>
			  	</div>
			  	<div class="text-right">
				  <p class="no-margin font-weight-600"><span class="text-yellow"></span></p>
				  <p class="no-margin"></p>
			 	</div>
              </div>
            </div>			
          </div>
		  
		  
		 	  
	  </div>
		
		<div class="box">
		  <div class="box-body tickers-block">
			  <ul id="webticker-1">
				<li><i class="cc BTC"></i> BTC <span class="text-yellow"> $11.039232</span></li> 
				<li><i class="cc ETH"></i> ETH <span class="text-yellow"> $1.2792</span></li> 
				<li><i class="cc GAME"></i> USD <span class="text-yellow"> $11.039232</span></li> 
				<li><i class="cc LBC"></i> GBP <span class="text-yellow"> $0.588418</span></li> 
				<li><i class="cc NEO"></i> EUR <span class="text-yellow"> $161.511</span></li> 
				<li><i class="cc STEEM"></i> STE <span class="text-yellow"> $0.551955</span></li> 
				<li><i class="cc LTC"></i> LIT <span class="text-yellow"> $177.80</span></li> 
				<li><i class="cc NOTE"></i> NOTE <span class="text-yellow"> $13.399</span></li>
				<li><i class="cc MINT"></i> MINT <span class="text-yellow"> $0.880694</span></li> 
				<li><i class="cc IOTA"></i> IOT <span class="text-yellow"> $2.555</span></li> 
				<li><i class="cc DASH"></i> DAS <span class="text-yellow"> $769.22</span></li>   
			  </ul>
		  </div>
		</div>
      
		
		
		<div class="row">
		 <div class="col-lg-7 col-12">
		
		
		  <!-- vertical wizard -->
      <div class="box box-solid bg-dark">
        <div class="box-header with-border">
          <h5 class="box-title">Complete the domestic transfer form below to begin a transfer process.</h5>
          <h6 class="box-subtitle">Ensure to enter all details correctly as transfers cannot be undone.</h6>

         
        </div>
        <!-- /.box-header -->
        <div class="box-body wizard-content">
			<form action="#" class="tab-wizard vertical wizard-circle" method="POST">
				<!-- Step 1 -->
				
				<section class="bg-hexagons-dark">
					
					
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="location2">Select Account :</label>
								<select class="custom-select form-control" id="location2" name="sender_account">
									<option value="">Select Debit Account</option>
									
									<?php 
                    $st = "SELECT * FROM account WHERE username='$username'";
                    $rt = mysqli_query($connect, $st);
                    while($row=mysqli_fetch_array($rt)){
                      ?>

                   <option value="<?php echo $row["username"];?>"><?php echo $row["username"];?></option>
                   <?php }?>
								</select>
							</div>
						</div>
						
						
						<div class="col-md-6">
							<div class="form-group">
                <label for="location2">Select Beneficiary : <a href="beneficiaries.php"><span style="color:red"><small>Create Beneficiary Now!</small></span></a></label>
                
								<select class="custom-select form-control" id="location2" name="bef_acct">
                  <option value="">Select Account to Credit</option>
                  <?php 
                    $st = "SELECT * FROM account WHERE NOT (username ='$username')";
                    $rt = mysqli_query($connect, $st);
                    while($row=mysqli_fetch_array($rt)){
                      ?>

									 <option value="<?php echo $row["username"];?>"><?php echo $row["username"];?></option>
									 <?php }?>     
								</select>
							</div>
						</div>
						
												
					</div>
					
					
				</section>
				<!-- Step 2 -->
				
				<section class="bg-hexagons-dark">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="jobTitle6">Amount To Transfer :</label>
								<input type="text" class="form-control" id="jobTitle6" name="amount"> </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="videoUrl2">Remark :</label>
								<input type="text" class="form-control" id="videoUrl2" name="remark">
							</div>
						</div>
						
						
						<input type="submit" class="btn btn-success btn-lg" name="submit" value="Transfer">
						
					</div>
					
				</section>
				
				<!-- Step 3 -->
				
				<!-- Step 4 -->
				
			</form>
        </div>
        <!-- /.box-body -->
      </div>
	   </div>
	    </div>
		
			
			
			
			
			
			  
		</div>
		
		
			
		
		
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)"></a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#"></a>
		  </li>
		</ul>
    </div>
	  &copy; 2021 All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-cog fa-spin"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Admin Birthday</h4>

                <p>Will be July 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Jhone Updated His Profile</h4>

                <p>New Email : jhone_doe@demo.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Disha Joined Mailing List</h4>

                <p>disha@demo.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Code Change</h4>

                <p>Execution time 15 Days</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Web Design
                <span class="label label-danger pull-right">40%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Data
                <span class="label label-success pull-right">75%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 75%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Order Process
                <span class="label label-warning pull-right">89%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 89%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Development 
                <span class="label label-primary pull-right">72%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 72%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <input type="checkbox" id="report_panel" class="chk-col-grey" >
			<label for="report_panel" class="control-sidebar-subheading ">Report panel usage</label>

            <p>
              general settings information
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="allow_mail" class="chk-col-grey" >
			<label for="allow_mail" class="control-sidebar-subheading ">Mail redirect</label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="expose_author" class="chk-col-grey" >
			<label for="expose_author" class="control-sidebar-subheading ">Expose author name</label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <input type="checkbox" id="show_me_online" class="chk-col-grey" >
			<label for="show_me_online" class="control-sidebar-subheading ">Show me as online</label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <input type="checkbox" id="off_notifications" class="chk-col-grey" >
			<label for="off_notifications" class="control-sidebar-subheading ">Turn off notifications</label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">              
              <a href="javascript:void(0)" class="text-red margin-r-5"><i class="fa fa-trash-o"></i></a>
              Delete chat history
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<?php } ?>
<!-- ./wrapper -->
  	
	 
	  
	<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.js"></script>
	
	<!-- popper -->
	<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>
	
	<!-- Slimscroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
    <!--amcharts charts -->
	<script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
	<script src="http://www.amcharts.com/lib/3/gauge.js" type="text/javascript"></script>
	<script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
	<script src="http://www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>
	<script src="http://www.amcharts.com/lib/3/pie.js" type="text/javascript"></script>
	<script src="http://www.amcharts.com/lib/3/plugins/animate/animate.min.js" type="text/javascript"></script>
	<script src="http://www.amcharts.com/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
	<script src="http://www.amcharts.com/lib/3/themes/patterns.js" type="text/javascript"></script>
	<script src="http://www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>	
	
	<!-- webticker -->
	<script src="assets/vendor_components/Web-Ticker-master/jquery.webticker.min.js"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="assets/vendor_components/echarts-master/dist/echarts-en.min.js"></script>
	<script src="assets/vendor_components/echarts-liquidfill-master/dist/echarts-liquidfill.min.js"></script>
	
	<!-- This is data table -->
    <script src="assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Sparkline -->
	<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Crypto_Admin App -->
	<script src="js/template.js"></script>
	
	<!-- Crypto_Admin dashboard demo (This is only for demo purposes) -->
	<script src="js/pages/dashboard.js"></script>
	<script src="js/pages/dashboard-chart.js"></script>
	
	<!-- Crypto_Admin for demo purposes -->
	<script src="js/demo.js"></script>

	
</body>
</html>
