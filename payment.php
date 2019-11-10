<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
 <?php 
 if (isset($_GET['orderid'])&& $_GET['orderid']=='order') {
  $uid= Session::get("userId");
  $insertOrder=$ct->orderProduct($uid);
  print_r($insertOrde);
   $deldata=$ct->delUserCart();
   header("Location: success.php");
 }
  ?>
  <?php
     $id=Session::get("userId");
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
        
       $updateData= $ct->insertBillingAddress($_POST,$id);

       }
  ?>
<div class="ps-hero bg--cover" data-background="images/hero/about.jpg">
      <div class="ps-hero__content">
        <h1>Checkout</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Checkout</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="ps-checkout pt-40 pb-40">
      <div class="ps-container">
        <form class="ps-form--checkout" action="" method="post">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
              <div class="ps-checkout__billing">
                <h3>Billing Details</h3>
                
                   <div class="form-group form-group--inline">
                      <label> Name<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="name">
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Phone<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="mobile">
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Email Address<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="email" name="email">
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>City<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="city">
                      </div>
                    </div>
                    
                    <div class="form-group form-group--inline">
                      <label>Zip Code<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="zipcode">
                      </div>
                    </div>
                    
                    <div class="form-group form-group--inline">
                      <label>Address<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="address">
                      </div>
                    </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
              <div class="ps-checkout__order">
                <header>
                  <h3>Your Order</h3>
                </header>
                <div class="content">
                  <table class="table ps-checkout__products">
                    <thead>
                      <tr>
                        <th class="text-uppercase">Product</th>
                        <th class="text-uppercase">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                     $sum=0;
                      $qty=0;
                     $getPd=$ct->getCartProduct();
                     if ($getPd) {
                      $i=0;
                     
                      while ($result=$getPd->fetch_assoc()) {
                        $i++;
                     
                     ?>
                      <tr>
                        <td><?php echo($result['productName']) ;?> x    <?php echo($result['quantity']) ;?></td>
                        <td>Tk. <?php echo($result['price']); ?></td>
                      </tr>
                       <?php 
                       $total=$result['price']*$result['quantity'];
                      $qty=$qty+$result['quantity'];
                      $sum=$sum+$total;
                     
                       ?>
                      <?php }} ?>

                      <tr>
                        <td><span>Card Subtitle</span></td>
                        <td>Tk.<?php echo($sum) ;?></td>
                      </tr>
                      <tr>
                        <td><span>Vat</span></td>
                        <td>10%</td>
                      </tr>
                      <tr>
                        <td><span>Order Total</span></td>
                        <td>
                          Tk.<?php 
                      $vat    =$sum * .1;
                      $gtotal =$sum + $vat;
                      echo($gtotal);
                       ?> 
                    </td>
                      </tr>
                     </tbody>
                  </table>
                </div>
                <footer>
                  <h3>Payment Method</h3>
                  <div class="form-group cheque">
                    <div class="ps-radio ps-radio--small">
                      <input class="form-control" type="radio" id="rdo01" name="payment" checked value="Cash">
                      <label for="rdo01">Cheque Payment</label>
                    </div>
                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                  </div>
                  <div class="form-group paypal">
                    <div class="ps-radio ps-radio--small">
                      <input class="form-control" type="radio" name="payment" id="rdo02" value="Bkash">
                      <label for="rdo02">Paypal</label>
                      <p>
                      Bkash Payment
                      Bkash No : 017512383336
                      Account Type: Personal

                      Please send the above money to this Bkash No and write your transaction code below there..
                      <input id="transaction" class="form-control" type="text" placeholder="Enter transaction ID here " name="transactionid">
                    </p>

                    </div>
                    
                    <button class="ps-btn ps-btn--fullwidth ps-btn--yellow" name="submit">ORDER  NOW</button>
                  </div>
                </footer>
              </div>
              <div class="ps-shipping">
                <h3>FREE SHIPPING</h3>
                <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> <a href="#"> Singup </a> for free shipping on every order, every time.</p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    


<?php include("inc/footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#transaction").hide();
    $('input[type="radio"]').click(function(){
      if($(this).val() == "Bkash") {
             $("#transaction").show();
        }
        else {
             $("#transaction").hide();
        }
      
    });
});
</script>