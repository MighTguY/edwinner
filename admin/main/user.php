<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="../images/favicon.ico" />

    <title>EdWinner Admin - Dashboard</title>
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css" />
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css" />
	
	<!-- theme style -->
	<link rel="stylesheet" href="./css/master_style.css" />
	
	<!-- Lion_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="./css/skins/_all-skins.css" />
	
	<!-- Morris charts -->
	<link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css" />
	
	<!-- weather weather -->
	<link rel="stylesheet" href="../assets/vendor_components/weather-icons/weather-icons.css" />
	
	<!-- date picker -->
	<link rel="stylesheet" href="../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" />
	
	<!-- daterange picker -->
	<link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css" />
	
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css" />
	
	<!-- Morris charts -->
	<link rel="stylesheet" href="../assets/vendor_components/morris.js/morris.css" />
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

     
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>  

<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="./index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
	 
      <!-- logo for regular state and mobile devices -->
     
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		
		  
         
		 
        </ul>
      </div>
    </nav>
  </header>


  <?php 
  session_start();
  $user = $_SESSION['home']['user'] ;
  include 'php_src/lib/util.php';
  $uid = $_GET["id"]; 
  $user = getUSER($uid);
   $role = getRoleArray();
 if($user==NULL) {
  header('Location: ' . "./index.php");
 }
  ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
		 <div class="ulogo">
			 <a href="./index.php">
			  <!-- logo for regular state and mobile devices -->
			  <span><b>EdWinner </b>Admin</span>
			</a>
		</div>
        
        <div class="info">
          <p><?php echo $user["userInfo"]["name"] ?></p>
            <a href="./php_src/logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ion ion-power"></i></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="nav-devider"></li>
        <li class="header nav-small-cap">PERSONAL</li>
        <li >
          <a href="./index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>

         <li >
          <a href="./words.php">
            <i class="fa fa-file-word-o"></i> <span>Words</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>

        <li >
          <a href="./users.php">
            <i class="fa fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>

             <li >
          <a href="./exwords.php">
            <i class="fa fa-file-word-o"></i> <span>ExWords</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        
        <li >
          <a href="./changepassword.php">
            <i class="fa fa-file-word-o"></i> <span>ChangePassword</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>

        <!--li >
          <a href="./index.php">
            <i class="fa fa-dashboard"></i> <span>Page</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li-->
           
        
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Edit
        <small>User  panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    
      
    <!-- Main content -->
    <section class="content">
     
     <!-- User data Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Data</h3>
         
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
              <form novalidate="" method="POST" action="./php_src/userData.php" />
          <div class="form-group">
            <h5>Id <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="id" class="form-control" readonly required="" data-validation-required-message="This field is required" value=<?php echo $user["userData"]["id"]?> /> </div>
          </div>

          <div class="form-group">
            <h5>UserId <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="userId" class="form-control" readonly required="" data-validation-required-message="This field is required" value=<?php echo $user["userData"]["userId"]?> /> </div>
          </div>

          <div class="form-group">
            <h5>Role <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="role" class="form-control" <?php echo $disabled; ?> >
                                                <?php
                                               
                                                foreach ($role as $key => $value) {
                                                    $selected = "";
                                                    if ( $user["userData"]["role"] == $key) {
                                                        $selected = "selected=\"selected\"";
                                                        ?> 
                                                        <option value=<?php echo $key ?> $selected> <?php echo $value ?></option>
                                                        <?php
                                                    } 
                                                }
                                                ?>
                                            </select>
                        </div>
          </div>

          <div class="form-group">
            <h5>CheckPoint <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="checkPoint" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userData"]["checkPoint"]?> /> </div>
          </div>

          <div class="form-group">
            <h5>Monthly CheckPoint <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="monthlyCheckpoint" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userData"]["monthlyCheckpoint"]?> /> </div>
          </div>
          <div class="form-group">
            <h5>SubscriptionType <span class="text-danger">*</span></h5>
            <div class="controls">    <select name="subscriptionType" id="select" required="" class="form-control">
                <option value="monthly" <?php echo $user["userData"]["subscriptionType"]=="monthly"? "selected=true" : "" ?> /> Monthly
                <option value="yearly" <?php echo $user["userData"]["subscriptionType"]=="yearly"? "selected=true" : "" ;?>  />Yearly
              </select>
            </div>
          </div>       
          
           <div class="form-group">
            <h5>EndDate <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="endDate" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userData"]["endDate"]?> /> </div>
          </div>    
          
           <div class="form-group">
            <h5>StartDate <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="startDate" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userData"]["startDate"]?> /> </div>
          </div>    
          
           <div class="form-group">
            <h5>DaysToSend <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="daysToSend" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userData"]["daysToSend"]?> /> </div>
          </div>    
          
           <div class="form-group">
            <h5>DaysLeft <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="daysLeft" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userData"]["daysLeft"]?> /> </div>
          </div>    


          
          <div class="text-xs-right">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

          <!-- User Info Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Info</h3>
         
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
              <form novalidate="" method="POST" action="./php_src/userInfo.php"/>
          <div class="form-group">
            <h5>Id <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="id" class="form-control" readonly required="" readonly data-validation-required-message="This field is required" value=<?php echo $user["userInfo"]["id"]?> /> </div>
          </div>

          <div class="form-group">
            <h5>IsValid <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="isValid" class="form-control" readonly required="" data-validation-required-message="This field is required" value=<?php echo $user["userInfo"]["isValid"]?> /> </div>
          </div>

          <div class="form-group">
            <h5>Role <span class="text-danger">*</span></h5>
            <div class="controls">
                         <select name="role" class="form-control" <?php echo $disabled; ?> >
                                                <?php
                                               
                                                foreach ($role as $key => $value) {
                                                    $selected = "";
                                                    if ( $user["userInfo"]["role"] == $key) {
                                                        $selected = "selected=\"selected\"";
                                                        ?> 
                                                        <option value=<?php echo $key ?> $selected> <?php echo $value ?></option>
                                                        <?php
                                                    } 
                                                }
                                                ?>
                                            </select>
            </div>
                       </div>

          <div class="form-group">
            <h5>Name <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="name" class="form-control" required="" readonly data-validation-required-message="This field is required" value=<?php echo $user["userInfo"]["name"]?> /> </div>
          </div>

          <div class="form-group">
            <h5>Email <span class="text-danger">*</span></h5>
             <div class="controls">
              <input type="text" name="email" class="form-control"  required="" readonly data-validation-required-message="This field is required" value=<?php echo $user["userInfo"]["email"]?> /> </div>
          </div>       
          
           <div class="form-group">
            <h5>Password <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="password" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userInfo"]["password"]?> /> </div>
          </div>    
          
           <div class="form-group">
            <h5>CreatedDate <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="createdDate" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userInfo"]["createdDate"]?> /> </div>
          </div>    
          
           <div class="form-group">
            <h5>Mobile <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="mobile" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userInfo"]["mobile"]?> /> </div>
          </div>    
          
           


          
          <div class="text-xs-right">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      
    <!-- User Subscription Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">User Subscription</h3>
         
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
              <form novalidate="" method="POST" action="./php_src/userSubscription.php"/>
          <div class="form-group">
            <h5>Id <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="id" class="form-control" readonly required="" data-validation-required-message="This field is required" value=<?php echo $user["userSubscription"]["id"];?>  /> </div>
          </div>

          <div class="form-group">
            <h5>UserId <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="userId" class="form-control" readonly required="" data-validation-required-message="This field is required" value=<?php echo $user["userSubscription"]["userId"];?> /> </div>
          </div>


          <div class="form-group">
            <h5>EmailConfirmation <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="emailConfirmation" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userSubscription"]["emailConfirmation"]."";?> /> </div>
          </div>

          <div class="form-group">
            <h5>PaymentConfirmation <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="paymentConfirmation" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userSubscription"]["paymentConfirmation"]."";?> /> </div>
          </div>

          <div class="form-group">
            <h5>Active <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="active" class="form-control" required="" data-validation-required-message="This field is required" value=<?php echo $user["userSubscription"]["active"]." ";?> /> </div>
          </div>

          
          <div class="text-xs-right">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
		  </li>
		</ul>
    </div>
	  &copy; 2018 <a href="#">EdWinner</a>. All Rights Reserved.
  </footer>

  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	  
	<!-- jQuery 3 -->
	<script src="../assets/vendor_components/jquery/dist/jquery.js"></script>
	
	<!-- popper -->
	<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>
	
	<!-- Morris.js charts -->
	<script src="../assets/vendor_components/raphael/raphael.min.js"></script>
	<script src="../assets/vendor_components/morris.js/morris.min.js"></script>	
	
	<!-- weather for demo purposes -->
	<script src="../assets/vendor_plugins/weather-icons/WeatherIcon.js"></script>
	
	<!-- Sparkline -->
	<script src="../assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
	
	<!-- daterangepicker -->
	<script src="../assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- datepicker -->
	<script src="../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	
	<!-- Bootstrap WYSIHTML5 -->
	<script src="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
	
	<!-- Slimscroll -->
	<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- peity -->
	<script src="../assets/vendor_components/jquery.peity/jquery.peity.js"></script>
	
	<!-- Lion_admin App -->
	<script src="./js/template.js"></script>
	
	<!-- Lion_admin dashboard demo (This is only for demo purposes) -->
	<script src="./js/pages/dashboard.js"></script>
	
	<!-- Lion_admin for demo purposes -->
	<script src="./js/demo.js"></script>


 <!-- DataTables -->
  <script src="../assets/vendor_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  

  <!-- This is data table -->
    <script src="../assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
    
    <!-- start - This is for export functionality only -->
    <script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
    <script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
    <script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
    <script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
    <script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
  
  <!-- Lion_admin for Data Table -->
  <script src="js/pages/data-table.js"></script>

	
</body>
</html>
