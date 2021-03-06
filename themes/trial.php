<?php
session_start();
if (isset($_SESSION["bmanager"])) {
    header("location: ../branchmanagers/branch1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login as</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Gret'z Paul Branch managers</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="login.php"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
              <br/><br/><br/>
                <div class="col-lg-12 text-center">
                    <h2>Login as:</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">

                        <div class="caption">
                            <div class="caption-content">
                              <h4 align="center">Gret'z Paul Isulan</h4>
                              <br/>
                              <h4 align="center">Branch Manager</h4>
                            </div>
                        </div>
                        <img src="../img/user1.png" class="img-responsive" alt="">
                    </a>
                </div>
                    <div class="col-sm-3 portfolio-item">
                        <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                  <h4 align="center">Gret'z Paul Isulan</h4>

                                  <h4 align="center">Branch Manager</h4>
                                </div>
                            </div>
                            <img src="../img/user1.png" class="img-responsive" alt="">
                        </a>
                    </div>
                        <div class="col-sm-3 portfolio-item">
                            <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                                <div class="caption">
                                    <div class="caption-content">
                                      <h4 align="center">Gret'z Paul Isulan 2</h4>
                                      <h4 align="center">Branch Manager</h4>
                                    </div>
                                </div>
                                <img src="../img/user1.png" class="img-responsive" alt="">
                            </a>
                        </div>
                            <div class="col-sm-3 portfolio-item">
                                <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                                    <div class="caption">
                                        <div class="caption-content">
                                          <h4 align="center">Legre Isulan</h4>
                                          <h4 align="center">Branch Manager</h4>
                                        </div>
                                    </div>
                                    <img src="../img/user1.png" class="img-responsive" alt="">
                                </a>
                            </div>
                          <div class="col-sm-3 portfolio-item">
                              <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                                  <div class="caption">
                                      <div class="caption-content">
                                        <h4 align="center">Bid'z Isulan</h4>
                                        <h4 align="center">Branch Manager</h4>
                                      </div>
                                  </div>
                                  <img src="../img/user1.png" class="img-responsive" alt="">
                              </a>
                          </div>
                      <div class="col-sm-3 portfolio-item">
                          <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                              <div class="caption">
                              <div class="caption-content">
                                <h4 align="center">Julson 1</h4>
                                <h4 align="center">Branch Manager</h4>
                            </div>
                        </div>
                        <img src="../img/user1.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-3 portfolio-item">
                    <a href="#portfolioModal8" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                              <h4 align="center">Bid'z Tacurong</h4>
                              <h4 align="center">Branch Manager</h4>
                            </div>
                        </div>
                        <img src="../img/user1.png" class="img-responsive" alt="">
                    </a>
                </div>
                    <div class="col-sm-3 portfolio-item">
                        <a href="#portfolioModal8" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                  <h4 align="center">Bid'z Tacurong</h4>
                                  <h4 align="center">Branch Manager</h4>
                                </div>
                            </div>
                            <img src="../img/user1.png" class="img-responsive" alt="">
                        </a>
                    </div>
    </section>


    <!-- Footer -->
    <footer class="text-center">
           <div class="footer-above">
               <div class="container">
                   <div class="row">
                       <div class="footer-col col-md-4">
                           <h4>Location</h4>
                           <p>Brgy. Kudanding, Isulan</br>Sultan Kudarat</p>
                       </div>
                       <div class="footer-col col-md-4">
                           <h4>Around the Web</h4>
                           <ul class="list-inline">
                               <li>
                                   <a href="facebook.com" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                               </li>
                               <li>
                                   <a href="gmail.com" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                               </li>
                               <li>
                                   <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                               </li>
                               <li>
                                   <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                               </li>
                               <li>
                                   <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                               </li>
                           </ul>
                       </div>
                       <div class="footer-col col-md-4">
                           <h4>About the Programming Language</h4>
                           <p>KeMitch is appreciating the open source webtool <a href="http://getbootstrap.com">Bootstrap 3</a>.</p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="footer-below">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-12">
                           Copyright &copy; KeMitch 2016
                       </div>
                   </div>
               </div>
           </div>
         </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">

                          <?php

                          if (isset($_POST["username"]) && isset($_POST["password"])) {

                              $bmanager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
                              $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
                              include "../storescripts/dbconnect.php";
                              $sql = mysql_query("SELECT id FROM admin WHERE username='$bmanager' AND password='$password' LIMIT 1");
                              $existCount = mysql_num_rows($sql);
                              if ($existCount == 1) {
                                 while($row = mysql_fetch_array($sql)){
                                       $id = $row["id"];
                               }
                               $_SESSION["id"] = $id;
                               $_SESSION["bmanager"] = $bmanager;
                               $_SESSION["password"] = $password;
                               header("location: ../branchmanagers/branch1.php");
                                   exit();
                              } else {
                              echo 'That information is incorrect, try again <a href="../branchmanagers/branch1.php"><input type="submit" name="button" id="button" value="Click Here" /></a>';
                              exit();
                            }
                          }
                          ?>

                          <h2>Log in and Manage</h2>
                          <form id="form1" name="form1" method="post" action="bmlogin.php">
                            User Name:<br />
                              <input name="username" type="text" id="username" size="40" />
                            <br /><br />
                            Password:<br />
                           <input name="password" type="password" id="password" size="40" />
                           <br />
                           <br />
                           <br />

                             <input type="submit" name="button" class="btn btn-default btn-xs" id="button" value="Log In" />

                          </form>
                          <br/><br/><br/><br/>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                          <?php

                          if (isset($_POST["username"]) && isset($_POST["password"])) {

                              $bmanager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
                              $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
                              include "../storescripts/dbconnect.php";
                              $sql = mysql_query("SELECT id FROM admin WHERE username='$bmanager' AND password='$password' LIMIT 1");
                              $existCount = mysql_num_rows($sql);
                              if ($existCount == 1) {
                                 while($row = mysql_fetch_array($sql)){
                                       $id = $row["id"];
                               }
                               $_SESSION["id"] = $id;
                               $_SESSION["bmanager"] = $bmanager;
                               $_SESSION["password"] = $password;
                               header("location: ../branchmanagers/branch1.php");
                                   exit();
                              } else {
                              echo 'That information is incorrect, try again <a href="../branchmanagers/branch1.php"><input type="submit" name="button" id="button" value="Click Here" /></a>';
                              exit();
                            }
                          }
                          ?>

                          <h2>Log in and Manage</h2>
                          <form id="form1" name="form1" method="post" action="bmlogin.php">
                            User Name:<br />
                              <input name="username" type="text" id="username" size="40" />
                            <br /><br />
                            Password:<br />
                           <input name="password" type="password" id="password" size="40" />
                           <br />
                           <br />
                           <br />

                             <input type="submit" name="button" class="btn btn-default btn-xs" id="button" value="Log In" />

                          </form>
                          <br/><br/><br/><br/>
                          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                          <?php

                          if (isset($_POST["username"]) && isset($_POST["password"])) {

                              $bmanager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
                              $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
                              include "../storescripts/dbconnect.php";
                              $sql = mysql_query("SELECT id FROM admin WHERE username='$bmanager' AND password='$password' LIMIT 1");
                              $existCount = mysql_num_rows($sql);
                              if ($existCount == 1) {
                                 while($row = mysql_fetch_array($sql)){
                                       $id = $row["id"];
                               }
                               $_SESSION["id"] = $id;
                               $_SESSION["bmanager"] = $bmanager;
                               $_SESSION["password"] = $password;
                               header("location: ../branchmanagers/branch1.php");
                                   exit();
                              } else {
                              echo 'That information is incorrect, try again <a href="../branchmanagers/branch1.php"><input type="submit" name="button" id="button" value="Click Here" /></a>';
                              exit();
                            }
                          }
                          ?>

                          <h2>Log in and Manage</h2>
                          <form id="form1" name="form1" method="post" action="bmlogin.php">
                            User Name:<br />
                              <input name="username" type="text" id="username" size="40" />
                            <br /><br />
                            Password:<br />
                           <input name="password" type="password" id="password" size="40" />
                           <br />
                           <br />
                           <br />

                             <input type="submit" name="button" class="btn btn-default btn-xs" id="button" value="Log In" />

                          </form>
                          <br/><br/><br/><br/>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                          <?php

                          if (isset($_POST["username"]) && isset($_POST["password"])) {

                              $bmanager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
                              $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
                              include "../storescripts/dbconnect.php";
                              $sql = mysql_query("SELECT id FROM admin WHERE username='$bmanager' AND password='$password' LIMIT 1");
                              $existCount = mysql_num_rows($sql);
                              if ($existCount == 1) {
                                 while($row = mysql_fetch_array($sql)){
                                       $id = $row["id"];
                               }
                               $_SESSION["id"] = $id;
                               $_SESSION["bmanager"] = $bmanager;
                               $_SESSION["password"] = $password;
                               header("location: ../branchmanagers/branch1.php");
                                   exit();
                              } else {
                              echo 'That information is incorrect, try again <a href="../branchmanagers/branch1.php"><input type="submit" name="button" id="button" value="Click Here" /></a>';
                              exit();
                            }
                          }
                          ?>

                          <h2>Log in and Manage</h2>
                          <form id="form1" name="form1" method="post" action="bmlogin.php">
                            User Name:<br />
                              <input name="username" type="text" id="username" size="40" />
                            <br /><br />
                            Password:<br />
                           <input name="password" type="password" id="password" size="40" />
                           <br />
                           <br />
                           <br />

                             <input type="submit" name="button" class="btn btn-default btn-xs" id="button" value="Log In" />

                          </form>
                          <br/><br/><br/><br/>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                          <?php

                          if (isset($_POST["username"]) && isset($_POST["password"])) {

                              $bmanager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
                              $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
                              include "../storescripts/dbconnect.php";
                              $sql = mysql_query("SELECT id FROM admin WHERE username='$bmanager' AND password='$password' LIMIT 1");
                              $existCount = mysql_num_rows($sql);
                              if ($existCount == 1) {
                                 while($row = mysql_fetch_array($sql)){
                                       $id = $row["id"];
                               }
                               $_SESSION["id"] = $id;
                               $_SESSION["bmanager"] = $bmanager;
                               $_SESSION["password"] = $password;
                               header("location: ../branchmanagers/branch1.php");
                                   exit();
                              } else {
                              echo 'That information is incorrect, try again <a href="../branchmanagers/branch1.php"><input type="submit" name="button" id="button" value="Click Here" /></a>';
                              exit();
                            }
                          }
                          ?>

                          <h2>Log in and Manage</h2>
                          <form id="form1" name="form1" method="post" action="bmlogin.php">
                            User Name:<br />
                              <input name="username" type="text" id="username" size="40" />
                            <br /><br />
                            Password:<br />
                           <input name="password" type="password" id="password" size="40" />
                           <br />
                           <br />
                           <br />

                             <input type="submit" name="button" class="btn btn-default btn-xs" id="button" value="Log In" />

                          </form>
                          <br/><br/><br/><br/>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                          <?php

                          if (isset($_POST["username"]) && isset($_POST["password"])) {

                              $bmanager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
                              $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
                              include "../storescripts/dbconnect.php";
                              $sql = mysql_query("SELECT id FROM admin WHERE username='$bmanager' AND password='$password' LIMIT 1");
                              $existCount = mysql_num_rows($sql);
                              if ($existCount == 1) {
                                 while($row = mysql_fetch_array($sql)){
                                       $id = $row["id"];
                               }
                               $_SESSION["id"] = $id;
                               $_SESSION["bmanager"] = $bmanager;
                               $_SESSION["password"] = $password;
                               header("location: ../branchmanagers/branch1.php");
                                   exit();
                              } else {
                              echo 'That information is incorrect, try again <a href="../branchmanagers/branch1.php"><input type="submit" name="button" id="button" value="Click Here" /></a>';
                              exit();
                            }
                          }
                          ?>

                          <h2>Log in and Manage</h2>
                          <form id="form1" name="form1" method="post" action="bmlogin.php">
                            User Name:<br />
                              <input name="username" type="text" id="username" size="40" />
                            <br /><br />
                            Password:<br />
                           <input name="password" type="password" id="password" size="40" />
                           <br />
                           <br />
                           <br />

                             <input type="submit" name="button" class="btn btn-default btn-xs" id="button" value="Log In" />

                          </form>
                          <br/><br/><br/><br/>>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                          <?php

                          if (isset($_POST["username"]) && isset($_POST["password"])) {

                              $bmanager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
                              $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
                              include "../storescripts/dbconnect.php";
                              $sql = mysql_query("SELECT id FROM admin WHERE username='$bmanager' AND password='$password' LIMIT 1");
                              $existCount = mysql_num_rows($sql);
                              if ($existCount == 1) {
                                 while($row = mysql_fetch_array($sql)){
                                       $id = $row["id"];
                               }
                               $_SESSION["id"] = $id;
                               $_SESSION["bmanager"] = $bmanager;
                               $_SESSION["password"] = $password;
                               header("location: ../branchmanagers/branch1.php");
                                   exit();
                              } else {
                              echo 'That information is incorrect, try again <a href="../branchmanagers/branch1.php"><input type="submit" name="button" id="button" value="Click Here" /></a>';
                              exit();
                            }
                          }
                          ?>

                          <h2>Log in and Manage</h2>
                          <form id="form1" name="form1" method="post" action="bmlogin.php">
                            User Name:<br />
                              <input name="username" type="text" id="username" size="40" />
                            <br /><br />
                            Password:<br />
                           <input name="password" type="password" id="password" size="40" />
                           <br />
                           <br />
                           <br />

                             <input type="submit" name="button" class="btn btn-default btn-xs" id="button" value="Log In" />

                          </form>
                          <br/><br/><br/><br/>>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                          <?php

                          if (isset($_POST["username"]) && isset($_POST["password"])) {

                              $bmanager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
                              $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
                              include "../storescripts/dbconnect.php";
                              $sql = mysql_query("SELECT id FROM admin WHERE username='$bmanager' AND password='$password' LIMIT 1");
                              $existCount = mysql_num_rows($sql);
                              if ($existCount == 1) {
                                 while($row = mysql_fetch_array($sql)){
                                       $id = $row["id"];
                               }
                               $_SESSION["id"] = $id;
                               $_SESSION["bmanager"] = $bmanager;
                               $_SESSION["password"] = $password;
                               header("location: ../branchmanagers/branch1.php");
                                   exit();
                              } else {
                              echo 'That information is incorrect, try again <a href="../branchmanagers/branch1.php"><input type="submit" name="button" id="button" value="Click Here" /></a>';
                              exit();
                            }
                          }
                          ?>

                          <h2>Log in and Manage</h2>
                          <form id="form1" name="form1" method="post" action="bmlogin.php">
                            User Name:<br />
                              <input name="username" type="text" id="username" size="40" />
                            <br /><br />
                            Password:<br />
                           <input name="password" type="password" id="password" size="40" />
                           <br />
                           <br />
                           <br />

                             <input type="submit" name="button" class="btn btn-default btn-xs" id="button" value="Log In" />

                          </form>
                          <br/><br/><br/><br/>>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="../js/classie.js"></script>
    <script src="../js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/freelancer.js"></script>

</body>

</html>
