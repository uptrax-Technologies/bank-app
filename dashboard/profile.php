<?php
session_start();
$connect=mysqli_connect ('localhost', 'kala', 'kala',"test");
if(isset($_SESSION["username"])){
   $id=$_SESSION["username"];
   $check=mysqli_query($connect, 'select * from account where username="'.$id.'"');
   $info=mysqli_fetch_array($check);
    $image = $info['image'];
    $email = $info['email'];
    $address = $info['address'];
    $city = $info['city'];
    $account_type = $info['account_type'];
    $status = $info['status'];
    $name = $info['account_name'];
    $phone_number = $info['mobile'];

   $check2=mysqli_query($connect, 'select * from loan where Account_Name="'.$name.'"');
   $info1=mysqli_fetch_array($check2);
   $loan = $info1['amount'];

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
			  <span><b>Hello <?php echo $name?></b></span>
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
		
		 <li class="active">
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
		
		 <li class="">
          <a href="dom.php">
            <i class="fa fa-folder-open"></i> <span>Domestic Transfers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
		 <li class="">
          <a href="wire.php">
            <i class="fa fa-reply-all"></i> <span>Wire Transfers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		
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
        Customer's Profile
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Customer</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xl-4 col-lg-5">

          <!-- Profile Image -->
          <div class="box bg-yellow bg-deathstar-dark">
            <div class="box-body box-profile">
              <img class="profile-user-img rounded img-fluid mx-auto d-block" src="../admin/dashboard/upload/<?php echo $image?>" alt="User profile picture">

              <h2 class="profile-username text-center mb-0"><?php echo $name; ?></h2>

              <h4 class="text-center mt-0"><i class="fa fa-envelope-o mr-10"></i><?php echo $email; ?></h4>
				
              <div class="row social-states">
				  <div class="col-6 text-right"><a href="#" class="link text-white"><i class="ion ion-ios-people-outline"></i> <?php echo $account_type; ?>:</a></div>
				  <div class="col-6 text-left"><a href="#" class="link text-white"><i class="ion ion-images"></i> <?php echo $status; ?>:</a></div>
			  </div>
            
              <div class="row">
				<div class="col-12">
					<div class="media-list media-list-hover media-list-divided w-p100 mt-30">
						<h4 class="media media-single p-15">
						 
						</h4>
						
					</div>
				</div>
				
				
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-8 col-lg-7">
          <div class="box box-solid bg-black">
			<div class="box-header with-border">
			  <h3 class="box-title">Personal details</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col-12">
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Full Name</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" placeholder="" value="<?php echo $name; ?>">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Email Adress</label>
					  <div class="col-sm-10">
						<input class="form-control" type="email" placeholder="johone@dummy.com" value="<?php echo $email; ?>">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Phone Number</label>
					  <div class="col-sm-10">
						<input class="form-control" type="tel" placeholder="123 456 7890" value="<?php echo $phone_number; ?>">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label"></label>
					  <div class="col-sm-10">
						<button type="submit" class="btn btn-yellow">Submit</button>
					  </div>
					</div>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
          <div class="box box-solid bg-black">
			<div class="box-header with-border">
			  <h3 class="box-title">Personal address</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col-12">
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Street</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" placeholder="A-458, Lorem Ipsum, city" value="<?php echo $address ?>">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">City</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" placeholder="Your City" value="<?php echo $city ?>">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">State</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" placeholder="Your State" value="city">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Post Code</label>
					  <div class="col-sm-10">
						<input class="form-control" type="number" placeholder="123456" value="<?php echo $postal_code; ?>">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label"></label>
					  <div class="col-sm-10">
						<button type="submit" class="btn btn-yellow">Submit</button>
					  </div>
					</div>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
          <div class="box box-solid bg-black">
			<div class="box-header with-border">
			  <h3 class="box-title">Social media</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col-12">
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Facebook</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" placeholder="facebook id">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Instagram</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" placeholder="instagram id">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Twitter</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" placeholder="twitter id">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label">Linkedin</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" placeholder="linkedin id">
					  </div>
					</div>
					<div class="form-group row">
					  <label class="col-sm-2 col-form-label"></label>
					  <div class="col-sm-10">
						<button type="submit" class="btn btn-yellow">Submit</button>
					  </div>
          <?php } ?>
					</div>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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
