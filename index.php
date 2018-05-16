<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EdWinner - Start Building your Vocab</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.min.css" rel="stylesheet">

  </head>

  <body id="page-top">
     
      <?php 
include 'php_src/lib/util.php';
$code = $_GET["code"];
$price =  getCostArray();
if($code == "3") {
    $type = "alert-success";
} else {
    $type = "alert-danger";
}

if($code != "" && $code != NULL) {
    echo "<div class=\"alert ".$type."\">";
echo getMessage($code);
echo "</div>";
}
?>
      
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#page-top">EdWinner</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#page-top">Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#services">Levels</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#callout">Start Subscription</a>
        </li>

      </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1">EdWinner</h1>
        <h3 class="mb-5">
          <em>Start improving your vocabulary, with small steps</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Let's start from Today</a>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="about">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>EdWinner is the perfect buddy for improving your skills!</h2>
            <p class="lead mb-5">We will help you in learning and improve your vocabulary. As a buddy will make sure you learn things by putting them for your revision.
            <br>So let's begin!</p>
            <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Levels -->
    <section class="content-section bg-primary text-white text-center" id="services">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Training Level</h3>
          <h2 class="mb-5">Which level do you want to start with?</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-screen-smartphone"></i>
            </span>
            <h4>
              <strong>Beginner</strong>
            </h4>
            <p class="text-faded mb-0">If you are new to the English Language!</p>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-pencil"></i>
            </span>
            <h4>
              <strong>Intermediate</strong>
            </h4>
            <p class="text-faded mb-0">If you are in college and trying to improve your vocabulary.</p>
          </div>

          <div class="col-lg-4 col-md-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-mustache"></i>
            </span>
            <h4>
              <strong>Graduate</strong>
            </h4>
            <p class="text-faded mb-0">Specially designed for the enthusiastic Graduates</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Callout -->
    <section class="callout" id="callout">
      <div class="container text-center">
        <h2 class="mb-4">Start <em>Subscription</em> from Today</h2>
        <a href="#" class="btn btn-xl btn-light mr-4" data-toggle="modal" data-target="#yearly">Yearly Subscription!</a>
        <a href="#" class="btn btn-xl btn-dark" data-toggle="modal" data-target="#monthly">Monthly Subscription!</a>
      </div>
    </section>

    <!-- Modal -->
<div class="modal fade" id="monthly" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <form method="POST" action="php_src/registerMonthly.php">
              <div class="modal-header">
                  <!--button type="button" class="close" data-dismiss="modal">&times;</button-->
                  <h4 class="modal-title">Monthly Subscription</h4>
              </div>
              <div class="modal-body">
                  <p>Please enter few details for the monthly subscription.</p>
                  <p>

                  <div class="form-group">
                      <input type="text" class="form-control" name="mo-usr" placeholder="Enter Name" required>
                  </div>
                  <div class="form-group">
                      <input type="email" class="form-control" name="mo-email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                      <input type="number" class="form-control" name="mo-mob" placeholder="Enter Mobile Number" required>
                  </div>

                   <?php 
                foreach ($price["monthly"] as $key => $value) {
                ?> 
                  <div class="form-group">
                      <label><input type="radio" name="mo-opt" value=<?php echo $key."|".$value["double"] ?>> <?php echo "".$key." (".$value["str"].")"?></label>
                  </div>
                <?php 
                }
                ?> 

                  </p>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Pay & Subscribe</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </form>
      </div>
      
     
      
    </div>
</div>
    
    
    
    
    <!--Model Yearly-->
    <div class="modal fade" id="yearly" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <form method="POST" action="php_src/registerYearly.php">
              <div class="modal-header">
                  <!--button type="button" class="close" data-dismiss="modal">&times;</button-->
                  <h4 class="modal-title">Yearly Subscription</h4>
              </div>
              <div class="modal-body">
                  <p>Please enter few details for the yearly subscription.</p>
                  <div class="form-group">
                      <input type="text" class="form-control" name="yr-usr" placeholder="Enter Name" required>
                  </div>
                  <div class="form-group">
                      <input type="email" class="form-control" name="yr-email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                      <input type="tel" class="form-control "  name="yr-mob" placeholder="Enter Mobile Number" required>
                  </div>

                <?php 
                foreach ($price["yearly"] as $key => $value) {

                ?> 
                  <div class="form-group">
                      <label><input type="radio" name="yr-opt" value=<?php echo $key."|".$value["double"] ?>> <?php echo "".$key." (".$value["str"].")"?></label>
                  </div>
                <?php 
                }
                ?> 
                
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Pay & Subscribe</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </form>
      </div>
      
    </div>
  </div>
    
    <!-- Modal warning -->
   <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-twitter"></i>
            </a>
          </li>

        </ul>
        <p class="text-muted small mb-0">Copyright &copy; EdWinner 2018</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.min.js"></script>
 
  </body>

</html>
