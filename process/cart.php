<?include_once('css.php');
?>
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "../storescripts/dbconnect.php";
?>
<?php
if (isset($_POST['productid'])) {
    $productid = $_POST['productid'];
  $wasFound = false;
  $i = 0;

  if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {

    $_SESSION["cart_array"] = array(0 => array("productid" => $productid, "quantity" => 1));
  } else {

    foreach ($_SESSION["cart_array"] as $each_item) {
          $i++;
          while (list($key, $value) = each($each_item)) {
          if ($key == "productid" && $value == $productid) {

            array_splice($_SESSION["cart_array"], $i-1, 1, array(array("productid" => $productid, "quantity" => $each_item['quantity'] + 1)));
            $wasFound = true;
          }
          }
         }
       if ($wasFound == false) {
         array_push($_SESSION["cart_array"], array("productid" => $productid, "quantity" => 1));
       }
  }

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
          if ($key == "productid" && $value == $item_to_adjust) {

            array_splice($_SESSION["cart_array"], $i-1, 1, array(array("productid" => $item_to_adjust, "quantity" => $quantity)));
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


  $i = 0;
    foreach ($_SESSION["cart_array"] as $each_item) {
    $productid = $each_item['productid'];
    $sql = mysql_query("SELECT * FROM products WHERE productid='$productid' LIMIT 1");
    while ($row = mysql_fetch_array($sql)) {
      $name = $row["name"];
      $price = $row["price"];
      $description = $row["description"];
    }
    $pricetotal = $price * $each_item['quantity'];
    $cartTotal = $pricetotal + $cartTotal;


    $x = $i + 1;
    $pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $name . '">
        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';

    $product_id_array .= "$productid-".$each_item['quantity'].",";

    $cartOutput .= "<tr>";
    $cartOutput .= '<td><a href="product.php?productid=' . $productid . '">' . $name . '</a><br /><img src="../inventory_images/' . $productid . '.jpg" alt="' . $name. '" width="40" height="52" border="1" /></td>';
    $cartOutput .= '<td>' . $description . '</td>';
    $cartOutput .= '<td>Php' . $price . '</td>';
    $cartOutput .= '<td><form action="cart.php" method="post">
    <input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" /> &nbsp;
    <input name="adjustBtn' . $productid . '" type="submit" class="btn-default" value="CHANGE" />
    <input name="item_to_adjust" type="hidden" value="' . $productid . '" />
    </form></td>';

    $cartOutput .= '<td>' . $pricetotal . '</td>';
    $cartOutput .= '<td><form action="cart.php" method="post"><input name="deleteBtn' . $productid . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
    $cartOutput .= '</tr>';
    $i++;
    }
  $cartTotal = "<div style='font-size:18px; margin-top:12px;' align='right'>Cart Total : ".$cartTotal." PHP</div>";

  $pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
  <input type="hidden" name="notify_url" value="/storescripts/my_ipn.php">
  <input type="hidden" name="return" value="https://www.yoursite.com/checkout_complete.php">
  <input type="hidden" name="rm" value="2">
  <input type="hidden" name="cbt" value="Return to The Store">
  <input type="hidden" name="cancel_return" value="https://www.yoursite.com/paypal_cancel.php">
  <input type="hidden" name="lc" value="Php">
  <input type="hidden" name="currency_code" value="">
  <input type="button" name="submit" class="btn btn-default" value="Purchase">
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/mediaquery.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../js/jquery.easing.min.js" rel="stylesheet" type="text/css">
    <link href="js/jsfontaccurate.js" rel="stylesheet" type="text/css">
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                  <li>
                    <a href="branch1.php">Back to Products</a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>
</br>
</br>
</br>
</br>
</br>
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                      <div class="modal-body">
                          <h2 align="center">My Cart</h2>
                          <hr class="star-primary">


                          <div align="center" id="mainWrapper">
                            <div id="container">
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
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                              </table>
                              <?php echo $cartTotal; ?>
                              <br />
                          <br />
                          <?php echo $pp_checkout_btn; ?>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="cartt.php?cmd=emptycart"><button type="submit" class="btn btn-default">Empty Cart</button>
</a>
                              </div>
                             <br />
                            </div>
                          </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        <script src="js/jquery-1.11.0.js"></script>

                        <!-- Bootstrap Core JavaScript -->
                        <script src="js/bootstrap.min.js"></script>

                        <!-- Plugin JavaScript -->
                        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
                        <script src="js/classie.js"></script>
                        <script src="js/cbpAnimatedHeader.js"></script>

                        <!-- Contact Form JavaScript -->
                        <script src="js/jqBootstrapValidation.js"></script>
                        <script src="js/contact_me.js"></script>

                        <!-- Custom Theme JavaScript -->
                        <script src="js/freelancer.js"></script>

                        <footer class="text-center">
                               <div class="footer-above">
                                   <div class="container">
                                       <div class="row">
                                           <div class="footer-col col-md-4">
                                               <h3>Location</h3>
                                               <p>Brgy. Kudanding, Isulan,<br>Sultan Kudarat</p>
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
                                               <p>KJM Media is appreciating the open source webtool <a href="http://getbootstrap.com">Bootstrap 3</a>.</p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="footer-below">
                                   <div class="container">
                                       <div class="row">
                                           <div class="col-lg-12">
                                               Copyright &copy; KJM Media 2014
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </footer>
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
