<!-- Cart Srcipts -->
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "../admin/storescripts/connect_to_mysql.php";
?>
<?php
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
  $wasFound = false;
  $i = 0;

  if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {

    $_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
  } else {

    foreach ($_SESSION["cart_array"] as $each_item) {
          $i++;
          while (list($key, $value) = each($each_item)) {
          if ($key == "item_id" && $value == $pid) {

            array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
            $wasFound = true;
          }
          }
         }
       if ($wasFound == false) {
         array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
       }
  }
  header("location: cart.php");
    exit();
}
?>
<?php
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>
<?php
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {

  $item_to_adjust = $_POST['item_to_adjust'];
  $quantity = $_POST['quantity'];
  $quantity = preg_replace('#[^0-9]#i', '', $quantity);
  if ($quantity >= 100) { $quantity = 99; }
  if ($quantity < 1) { $quantity = 1; }
  if ($quantity == "") { $quantity = 1; }
  $i = 0;
  foreach ($_SESSION["cart_array"] as $each_item) {
          $i++;
          while (list($key, $value) = each($each_item)) {
          if ($key == "item_id" && $value == $item_to_adjust) {

            array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
          }
          }
  }
}
?>
<?php
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {

  $key_to_remove = $_POST['index_to_remove'];
  if (count($_SESSION["cart_array"]) <= 1) {
    unset($_SESSION["cart_array"]);
  } else {
    unset($_SESSION["cart_array"]["$key_to_remove"]);
    sort($_SESSION["cart_array"]);
  }
}
?>
<?php
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {

  $pp_checkout_btn .= '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <input type="hidden" name="business" value="you@youremail.com">';

  $i = 0;
    foreach ($_SESSION["cart_array"] as $each_item) {
    $item_id = $each_item['item_id'];
    $sql = mysql_query("SELECT * FROM products WHERE id='$item_id' LIMIT 1");
    while ($row = mysql_fetch_array($sql)) {
      $product_name = $row["product_name"];
      $price = $row["price"];
      $details = $row["details"];
    }
    $pricetotal = $price * $each_item['quantity'];
    $cartTotal = $pricetotal + $cartTotal;


    $x = $i + 1;
    $pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';

    $product_id_array .= "$item_id-".$each_item['quantity'].",";

    $cartOutput .= "<tr>";
    $cartOutput .= '<td><a href="product.php?id=' . $item_id . '">' . $product_name . '</a><br /><img src="../inventory_images/' . $item_id . '.jpg" alt="' . $product_name. '" width="40" height="52" border="1" /></td>';
    $cartOutput .= '<td>' . $details . '</td>';
    $cartOutput .= '<td>$' . $price . '</td>';
    $cartOutput .= '<td><form action="cart.php" method="post">
    <input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
    <input name="adjustBtn' . $item_id . '" class="btn default" type="submit" value="change" />
    <input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
    </form></td>';

    $cartOutput .= '<td>' . $pricetotal . '</td>';
    $cartOutput .= '<td><form action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
    $cartOutput .= '</tr>';
    $i++;
    }
  $cartTotal = "<div style='font-size:18px; margin-top:12px;' align='right'>Cart Total : ".$cartTotal." PHP</div>";

  $pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
  <input type="hidden" name="notify_url" value="https://www.yoursite.com/storescripts/my_ipn.php">
  <input type="hidden" name="return" value="https://www.yoursite.com/checkout_complete.php">
  <input type="hidden" name="rm" value="2">
  <input type="hidden" name="cbt" value="Return to The Store">
  <input type="hidden" name="cancel_return" value="https://www.yoursite.com/paypal_cancel.php">
  <input type="hidden" name="lc" value="US">
  <input type="hidden" name="currency_code" value="USD">
  <input type="button" name="submit" class="btn btn-success btn-lg" value="Purchase">
  </form>';
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

    <title>Gretz Paul Food Corporation</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/freelancer.css" rel="stylesheet">
    <link href="../css/mediaquery.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../js/jquery.easing.min.js" rel="stylesheet" type="text/css">
    <link href="../js/jsfontaccurate.js" rel="stylesheet" type="text/css">
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/font.css" rel="stylesheet" type="text/css">
    <link href="../css/fontfamily.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="../index.php">Gretz Paul Food Corporation</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>

                   <li class="page-scroll">
                        <a href="#breads">Breads</a>
                    </li>
                 <li class="page-scroll">
                        <a href="#pastries">Pastries</a>
                      </li>
                      <li>
                  <a href="#portfolioModal0" class="portfolio-link" data-toggle="modal">
                      <img src="../img/cart2.png" class="img-responsive" alt="">
                  </a>
                   </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
  <!--  <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Truly Yours</span>
                        <hr class="star-light">
                        <span class="skills">Red Dragon Emperor</span>
                    </div>
                </div>
            </div>
        </div>
    </header> -->

    <!-- Portfolio Grid Section -->
    <section id="breads">
        <div class="container">
            <div class="row">
            </br>
            </br>
            </br>
                <div class="col-lg-12 text-center">
                    <h2>Isulan Branch</h2>
                    <hr class="star-primary">

                  <h2>Breads</h2>
                </div>
              </div>
                  <?php
                  error_reporting(E_ALL);
                  ini_set('display_errors', '1');
                  ?>
                  <?php
                  include "../admin/storescripts/connect_to_mysql.php";
                  $dynamicListShirts = "";
                  $dynamicListPants = "";
                  $sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
                  $productCount = mysql_num_rows($sql);
                  if ($productCount > 0) {
                    while($row = mysql_fetch_array($sql)){
                               $id = $row["id"];
                         $product_name = $row["product_name"];
                         $price = $row["price"];
                         $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
                         $category = $row["category"];

                         if ($category=='Shirts')
                         {

                         $dynamicListShirts .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
                          <tr>
                            <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="../inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
                            <td width="83%" valign="top">' . $product_name . '<br />
                              Php' . $price . '<br />
                              <a href="product.php?id=' . $id . '"><button type="button" class="btn-default">VIEW</button></a></td>
                          </tr>
                        </table>';
                          }
                        if ($category=='Pants')
                         {

                         $dynamicListPants .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
                          <tr>
                            <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="../inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
                            <td width="83%" valign="top">' . $product_name . '<br />
                              Php' . $price . '<br />
                              <a href="product.php?id=' . $id . '"><button type="button" class="btn-default">VIEW</button></a></td>
                          </tr>
                        </table>';
                          }
                      }
                  } else {
                    $dynamicList = "We have no products listed in our store yet";
                  }
                  mysql_close();
                  ?>
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                  <div align="center" id="mainWrapper">

                    <div id="pageContent">
                    <table width="100%" border="0" cellspacing="10" cellpadding="10">
                    <tr>
                      <td width="50%" valign="top"><h3>SHIRTS</h3>
                        <p><?php echo $dynamicListShirts; ?><br />
                          </p>
                        <p><br />
                        </p></td>
                         <td width="50%" valign="top"><h3>PANTS</h3>
                        <p><?php echo $dynamicListPants; ?><br />
                          </p>
                        <p><br />
                        </p></td>
                    </tr>
                  </table>

              </div>
          </div>
      </div>






    </section>

    <!-- About Section -->
    <section id="pastries">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                  <h2>Pastries</h2>

                            </div>
                          </div>
                              <?php
                              error_reporting(E_ALL);
                              ini_set('display_errors', '1');
                              ?>
                              <?php
                              include "../admin/storescripts/connect_to_mysql.php";
                              $dynamicListShirts = "";
                              $dynamicListPants = "";
                              $sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6");
                              $productCount = mysql_num_rows($sql);
                              if ($productCount > 0) {
                                while($row = mysql_fetch_array($sql)){
                                           $id = $row["id"];
                                     $product_name = $row["product_name"];
                                     $price = $row["price"];
                                     $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
                                     $category = $row["category"];

                                     if ($category=='Shirts')
                                     {

                                     $dynamicListShirts .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
                                      <tr>
                                        <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="../inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
                                        <td width="83%" valign="top">' . $product_name . '<br />
                                          Php' . $price . '<br />
                                          <a href="product.php?id=' . $id . '"><button type="button" class="btn-default">VIEW</button></a></td>
                                      </tr>
                                    </table>';
                                      }
                                    if ($category=='Pants')
                                     {

                                     $dynamicListPants .= '<table width="100%" border="0" cellspacing="0" cellpadding="6">
                                      <tr>
                                        <td width="17%" valign="top"><a href="product.php?id=' . $id . '"><img style="border:#666 1px solid;" src="../inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102" border="1" /></a></td>
                                        <td width="83%" valign="top">' . $product_name . '<br />
                                          Php' . $price . '<br />
                                          <a href="product.php?id=' . $id . '"><button type="button" class="btn-default">VIEW</button></a></td>
                                      </tr>
                                    </table>';
                                      }
                                  }
                              } else {
                                $dynamicList = "We have no products listed in our store yet";
                              }
                              mysql_close();
                              ?>
                              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                              <div align="center" id="mainWrapper">

                                <div id="pageContent">
                                <table width="100%" border="0" cellspacing="10" cellpadding="10">
                                <tr>
                                  <td width="50%" valign="top"><h3>SHIRTS</h3>
                                    <p><?php echo $dynamicListShirts; ?><br />
                                      </p>
                                    <p><br />
                                    </p></td>
                                     <td width="50%" valign="top"><h3>PANTS</h3>
                                    <p><?php echo $dynamicListPants; ?><br />
                                      </p>
                                    <p><br />
                                    </p></td>
                                </tr>
                              </table>

                          </div>
                      </div>

    </section>

    <!-- Contact Section -->
<!--    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Drop tho Message!</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
  <!--                  <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Footer -->
 <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Blk 5 Lot 7 Phase 3B<br>General Santos City</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
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
                        <h3>About the Programming Language</h3>
                        <p>KJS Media is appreciating the open source webtool <a href="http://getbootstrap.com">Bootstrap 3</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; KJS Media 2014
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

    <div class="portfolio-modal modal fade" id="portfolioModal0" tabindex="-1" role="dialog" aria-hidden="true">
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
                              <h2>My Cart</h2>
                              <hr class="star-primary">


                              <div align="center" id="mainWrapper">
                                <div id="pageContent">
                                  <div class="responsive">
                                    <div style="margin:24px; text-align:left;">

                                  <br />
                                  <table width="100%" border="1" cellspacing="0" cellpadding="6">
                                    <tr>
                                      <td width="18%" bgcolor="#C5DFFA"><strong>Product</strong></td>
                                      <td width="45%" bgcolor="#C5DFFA"><strong>Product Description</strong></td>
                                      <td width="10%" bgcolor="#C5DFFA"><strong>Unit Price</strong></td>
                                      <td width="9%" bgcolor="#C5DFFA"><strong>Quantity</strong></td>
                                      <td width="9%" bgcolor="#C5DFFA"><strong>Total</strong></td>
                                      <td width="9%" bgcolor="#C5DFFA"><strong>Remove</strong></td>
                                    </tr>
                                   <?php echo $cartOutput; ?>
                                   <!-- <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr> -->
                                  </table>
                                  <?php echo $cartTotal; ?>
                                  <br />
                              <br />
                              <?php echo $pp_checkout_btn; ?>
                                  <br />
                                  <br />
                                  <a href="cart.php?cmd=emptycart">Click Here to Empty Your Shopping Cart</a>
                                  </div>
                                 <br />
                                </div>
                              </div>
                            </div>


                              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>


    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                  <div class="lr">
                    <a href="branch1.php"></a>
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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/cake.png" class="img-responsive img-centered" alt="">
                            <p>Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing.</p>
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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                            <p>Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing.</p>

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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
                            <p>Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing.</p>

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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                            <p>Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing.</p>

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
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                            <p>Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing Karl is amazing.</p>
                            <ul class="list-inline item-details">
                                <li>Client:
                                    <strong><a href="http://startbootstrap.com">Start Bootstrap</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href="http://startbootstrap.com">April 2014</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href="http://startbootstrap.com">Web Development</a>
                                    </strong>
                                </li>
                            </ul>
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
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/classie.js"></script>
    <script src="../js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/freelancer.js"></script>

</body>

</html>
