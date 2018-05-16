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
  $data = getUSERS();
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
        Users 
        <small>User  panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    
      <section class="content">
      <div class="row">
        <div class="col-12">
         
   
          <!-- /.box -->
         
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Hover Export Data Table</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive w-p100">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Payment</th>
            <th>Subscribed</th>
            <th>Start date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          foreach ($data as $key => $value) {
            

            $name = $value["userInfo"]["name"];
            $email = $value["userInfo"]["email"];
            $payment = ($value["userSubscription"]["paymentConfirmation"]!="1")?"<span class=\"label label-danger\">Pending</span>":"<span class=\"label label-success\">Done</span>";
            $subscribed = $value["userSubscription"]["active"]!="1"?"<span class=\"label label-danger\">Pending</span>":"<span class=\"label label-success\">Done</span>";
            $startDate = $value["userData"]["startDate"];
            $action = "<a class=\"btn btn-block btn-warn btn-lg\" href=\"user.php?id=".$value["userInfo"]["id"]."\">
                <i class=\"fa fa-edit\"></i> 
              </a>";
          
          ?>
          <tr>
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $payment; ?></td>
            <td><?php echo $subscribed; ?></td>
            <td><?php echo $startDate; ?></td>
            <td><?php echo $action; ?></td>
          </tr>
          <?php 
        }
          ?>
        </tbody>          
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Payment</th>
            <th>Subscribed</th>
            <th>Start date</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>

              
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
