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
    $word = $_SESSION['home']['user'] ;
    include 'php_src/lib/util.php';
    $word=array();
    if (array_key_exists("id",$_GET)) {
      $uid = $_GET["id"]; 
      $word = getExWord($uid);
      $readonly = "readonly";
      if($word==NULL) {
        header('Location: ' . "./index.php");
      }
    }else {
       $readonly = "";
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
        <p><?php echo $word["userInfo"]["name"] ?></p>
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
        Word Edit
        <small>Word  panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Word</li>
      </ol>
    </section>

    <!-- Main content -->
    

    <!-- Main content -->
    <section class="content">

     <!-- User data Forms -->
     <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Word Data</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col">
            <form novalidate="" method="POST" action="./php_src/exword.php" />
            <div class="form-group">
              <h5>Id <span class="text-danger">*</span></h5>
              <div class="controls">
                <input type="text" name="id" class="form-control" <?php echo $readonly;?> required="" data-validation-required-message="This field is required" value=<?php echo $word["id"]?> /> </div>
              </div>

              <div class="form-group">
                <h5>Role <span class="text-danger">*</span></h5>
                <div class="controls">
                  <input type="text" name="role" class="form-control" <?php echo $readonly;?> required="" data-validation-required-message="This field is required" value=<?php echo $word["role"]?> /> </div>
                </div>

                <div class="form-group">
                  <h5>Data <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <textarea type="text" name="data" class="form-control"  required="" data-validation-required-message="This field is required"  ><?php echo $word["data"]?> </textarea></div>
                  </div>

                  <div class="form-group">
                    <h5>Message <span class="text-danger">*</span></h5>
                    <div class="controls">
                      <textarea name="message" class="form-control" required="" data-validation-required-message="This field is required"  ><?php echo $word["message"]?></textarea> </div>
                    </div>

                       

                      <div class="form-group">
                        <h5>Type <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <textarea name="type" class="form-control" required="" data-validation-required-message="This field is required"  ><?php echo $word["type"]?></textarea> </div>
                        </div>    

                        <div class="form-group">
                          <h5>Created Date <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <textarea name="createdDate" class="form-control" required="" data-validation-required-message="This field is required" ><?php echo $word["createdDate"]?></textarea></div>
                          </div>    

                          <div class="form-group">
                            <h5>Send Date <span class="text-danger">*</span></h5>
                            <div class="controls">
                              <input type="text" name="sendDate" class="form-control" required="" data-validation-required-message="This field is required" value="<?php echo $word["sendDate"]?>" /> </div>
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



                  </body>
                  </html>
