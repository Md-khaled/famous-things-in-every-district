<?php ob_start(); ?>
<?php 
include 'lib/Session.php'; 
Session::init();
include_once 'lib/Database.php';
include_once 'helpers/Format.php'; 

spl_autoload_register(function($class){
include_once"classes/".$class.".php";
});
$db=new Database();
$fm=new Format();
$pd=new Product();
$cat=new Catagory();
$ct=new Cart();	
$ur=new User();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
  
<!-- Mirrored from nouthemes.net/html/bready/homepage-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Oct 2019 16:50:21 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Rokomary</title>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script%7CLora:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/plugins/bakery-icon/style.css">
    <link rel="stylesheet" href="css/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="css/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="css/plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="css/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="css/plugins/lightGallery-master/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="css/plugins/style.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
    <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
    <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
      <style type="text/css">
        .f-nav{  /* To fix main menu container */
           background-color: #B6DADA !important;
          z-index: 9999;
          position: fixed;
          left: 0;
          top: 0;
          width: 100%;
          padding: 0px 0 !important;
      }
     
      </style>
  </head>
  <body>
    <div class="ps-search">
      <div class="ps-search__content"><a class="ps-search__close" href="#"><span></span></a>
        <form class="ps-form--search-2" action="search.php" method="post">
          <h3>Enter your keyword</h3>
          <div class="form-group">
            <input class="form-control" type="text" name="search" placeholder="Search by productName or category or color">
            <button class="ps-btn active ps-btn--fullwidth">Search</button>
          </div>
        </form>
      </div>
    </div>
    <!-- header-->
    <header class="header header--3" data-sticky="false">
      
      <nav class="navigation top">
        <div class="ps-container"><a class="ps-logo" href="homepage-3.html"><img src="admin/upload/logo.PNG" alt=""></a>
          <div class="menu-toggle"><span></span></div>
          <div class="header__actions">
            <a class="ps-search-btn" href="#"><i class="ba-magnifying-glass"></i></a>
            
            <div class="ps-cart">
              <a class="ps-cart__toggle" href="#">
                <span>
                  <i><?php 
                $getData=$ct->checkCartTable();
                if ($getData) {
                   $qty=session::get("qty");
                echo($qty);
                }else{
                  echo("0");
                }
                
                 ?></i>
                </span><i class="ba-shopping"></i></a>
              <div class="ps-cart__listing">
                <div class="ps-cart__content">
                  <?php 
                $getData=$ct->checkCartTable();
                if ($getData) {
                 $i=0;
                $sum=0;
                $qty=0;
                while ($result=$getData->fetch_assoc()) {
                  $i++;
                  
                 ?>
                  <div class="ps-cart-item"><a class="ps-cart-item__close" href="#"></a>
                    <div class="ps-cart-item__thumbnail"><a href="details.php?pdId=<?php echo($result['product_id']); ?>"></a><img src="admin/<?php echo($result['image']); ?>" alt="">
                    </div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="details.php?pdId=<?php echo($result['product_id']); ?>"><?php echo($result['productName']); ?></a>
                      <p><span>Quantity:<i><?php echo($result['quantity']); ?></i></span><span>Total:<i>TK <?php echo($result['price']); ?></i></span></p>
                    </div>
                  </div>
                   <?php 
                       $total=$result['price']*$result['quantity'];
                      $qty=$qty+$result['quantity'];
                      $sum=$sum+$total;
                     
                       ?>
                  <?php }}else{?>
                    <div class="ps-cart-item">
                      <div class="ps-cart-item__thumbnail">
                        </div>
                      <div class="ps-cart-item__content">
                            <p style="color: white;">Cart is empty</p>
                    
                    </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="ps-cart__total">
                  <?php 
                  $getData=$ct->checkCartTable();
                if ($getData) {
                   ?>
                  <p>Number of items:<span><?php echo($i);?></span></p>
                  <p>Item Total:<span>TK <?php echo($sum); ?></span></p>
                  <?php } ?>
                </div>
                <div class="ps-cart__footer"><a href="cart.php">View Cart</a></div>
                <div class="ps-cart__footer"><a href="payment.php">Check out</a></div>
              </div>
            </div>
          </div>
          <ul class="menu">
            <li class="current-menu-item menu-item-has-children"><a href="#">Homepage</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              <ul class="sub-menu">
                <li><a href="index.php">Homepage</a></li>
              </ul>
            </li>
            <li><a href="about.php">About</a></li>
            <li class="menu-item-has-children"><a href="product-listing.html">product</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              <ul class="sub-menu">
                <li><a href="allproducts.php">Product List</a></li>
              </ul>
            </li>
            <li><a href="contact.php">Contact Us</a></li>
            <li class="menu-item-has-children"><a href="contact.php"><i class="ba-profile"></i></a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
              <ul class="sub-menu">
              	<?php
		         $login= Session::get("userlogin");
		        if ($login==false) {?>
                 <li><a href="login.php">Log in</a></li>
                 <?php }else{?>
                 <li><a href="?uid=<?php Session::get('userId') ?>">Log Out</a></li>
                 <?php } ?>
                 <?php 
			      if (isset($_GET['uid'])) {
			      	$userid= Session::get("userId");
			      	$deldata=$ct->delUserCart();
			      	$delCom=$pd->delCompareData($userid);
			      	Session::destroy();
			      }

			       ?>
                 <li><a href="orderdetails.php">Your Order</a></li>
                <li><a href="payment.php">Checkout</a></li>
                <li><a href="whishlist.php">Whishlist</a></li>
                <li><a href="compare.php">Compare</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>