﻿<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Frontpage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="Comp_css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="Comp_css/business-frontpage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Home2.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="Sign_up.html">Sign up</a>
                    </li>
                    <li>
                        <a href="Login.html">Login</a>
                    </li>

                    <li>
                        <a href="Acc_Inf.html">About</a>
                    </li>
                    <li>
                        <a href="#">Posts</a>
                    </li>
                    <li>
                        <a href="Offers.html">Offers</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php 
include("Controller.php");
$controller=new controller();
session_start();
$result=$controller->View_s_Company();
$row = mysqli_fetch_assoc($result);


?>
    <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
    <!--<header class="business-header">-->
      <div  style="height: 400px">
        <?php  echo '<img src="upload/'.$row["img"].'.jpg"  style="width: 100%;max-height: 100%" height="500"/>';?>
	  </div>
	  <div class="container">
            <div class="row">
                <div class="col-lg-12">
				     
              <strong>      <h1 class="tagline"><?php echo $row["Name"]?></h1></strong >
					
                </div>
            </div>
        </div>
		
    <!--</header>-->

    <!-- Page Content -->
    <div class="container">

        <hr>

        <div class="row">
            <div class="col-sm-8">
                <h2>About our company</h2>
                <p><?php echo $row["description"]?></p>
              
                    <a class="btn btn-default btn-lg" href="#">Call to Action &raquo;</a>
                </p>
            </div>
            <div class="col-sm-4">
                <h2>Contact Us</h2>
                <address>
                    <br>3481 Melrose Place
                    <br>Beverly Hills, CA 90210
                    <br>
                </address>
                <address>
                    <abbr title="Phone">P:</abbr><?php echo $row["Phone_Num"]?>
                    <br>
                    <abbr title="Email">E:</abbr> <a href="mailto:#"><?php echo $row["Email"]?></a>
         
  </address>
            </div>
        </div>
        <!-- /.row -->
        <hr>

        <div class="row">
            <div class="col-sm-4">
              
                <h2>Gallary 1</h2>
                <p><abbr title="Phone">Phone:</abbr>(123) 456-7890
                    <br>
                    <abbr title="address">address:</abbr>
                    <br>
                    </p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="2.jpg" alt="">
                <h2>Gallary 2</h2>
                <p><abbr title="Phone">Phone:</abbr>(123) 456-7890
                    <br>
                    <abbr title="address">address:</abbr>ui.</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="3.png" alt="">
                <h2>Gallary 3</h2>
                <p><abbr title="Phone">Phone:</abbr>(123) 456-7890
                    <br>
                    <abbr title="address">address:</abbr></p>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
