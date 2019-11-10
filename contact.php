<?php include("inc/header.php"); ?>
<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
        $addcontact=$ur->contactUs($_POST);
    }
?>
 <div class="ps-hero bg--cover" data-background="images/hero/contact.jpg">
      <div class="ps-hero__content">
        <h1>Contact Us</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Contact Us</li>
          </ol>
        </div>
      </div>
    </div>
<div class="ps-contact">
      <div class="ps-container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
            <form class="ps-form--contact" action="" method="post">
              <div class="row">
              	<h1>Contact info</h1>
              	<?php if(isset($addcontact)&& $addcontact!='success') {?>
                    <div class="alert alert-warning" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: red;">Warning!</strong> <?php echo($addcontact);?>
                    </div>
                  <?php }?>
                     <?php if(isset($addcontact) && $addcontact=='success') {?>
                    <div class="alert alert-warni alert-success" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: green;">Success!</strong> <?php echo("<span> user data inserted successfully! please check your mail</span>");?>
                    </div>
                  <?php }?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">

                  <div class="form-group">
                    <label>Name <sup>*</sup></label>
                    <input class="form-control" type="text" name="name" placeholder="Enter  name">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                  <div class="form-group">
                    <label>Mobile <sup>*</sup></label>
                    <input class="form-control" type="text" name="mobile" placeholder="Enter mobile number">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                  <div class="form-group">
                    <label>Email <sup>*</sup></label>
                    <input class="form-control" type="text" name="email" placeholder="Enter Email Address">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Your Message <sup>*</sup></label>
                <textarea class="form-control" rows="7" name="body"></textarea>
              </div>
              <div class="form-group submit">
              	<input class="ps-btn ps-btn--yellow" type="submit" name="submit" value="Send"/>
                
              </div>
            </form>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
            <div class="ps-contact__info">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                  <div class="ps-block--contact-2">
                    <h3>OFFICE AT AMERICA</h3>
                    <h4>BASEMENT COMPANY, NEW YORK</h4>
                    <p><i class="fa fa-envelope-o"></i><a href="#"><span class="__cf_email__" data-cfemail="543c3138383b14312c35392438317a373b39">[email&#160;protected]</span></a></p>
                    <p><i class="fa fa-phone"></i> +1 650-253-0000</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                  <div class="ps-block--contact-2">
                    <h3>OFFICE AT VIETNAM</h3>
                    <h4>189/32 BASEMENT COMPANY, ABC, VIET NAM</h4>
                    <p><i class="fa fa-envelope-o"></i><a href="#"><span class="__cf_email__" data-cfemail="553d3039393a153734263c267b363a38">[email&#160;protected]</span></a></p>
                    <p><i class="fa fa-phone"></i> +1 650-253-0000</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                  <div class="ps-block--contact-2">
                    <h3>OFFICE AT PARIS</h3>
                    <h4>189/32 BASEMENT COMPANY, PARIS, FRANCE</h4>
                    <p><i class="fa fa-envelope-o"></i><a href="#"><span class="__cf_email__" data-cfemail="97fff2fbfbf8d7f5f6e4fee4b9f4f8fa">[email&#160;protected]</span></a></p>
                    <p><i class="fa fa-phone"></i> +1 650-253-0000</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                  <div class="ps-block--contact-2">
                    <h3>FOLLOW US</h3>
                    <ul class="ps-list--social ps-list--social-simple">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-feed"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include("inc/footer.php"); ?>