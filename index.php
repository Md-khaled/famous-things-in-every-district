<?php include_once 'inc/header.php';?>
    <!-- bannar-->
    <div class="ps-home-banner" id="slider">
      <div class="ps-carousel--animate ps-carousel-nav">
        <?php 
        $slider=$cat->getActiveslider();
        if ($slider) {
        while ($result=$slider->fetch_assoc()) {
         ?>
        <div class="item">
          <div class="ps-banner--2">
            <div class="ps-banner__content">
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 ">
                  <div class="ps-banner__container">
                    <h5 class="animated" data-animation-in="zoomIn" data-delay-in="0.1" style="display: none;">EVERY DAY WE MAKE</h5>
                    <h3 class="animated" data-animation-in="zoomIn" data-delay-in="0.3"><?php echo($result['title']); ?></h3>
                  </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 "><img src="admin/<?php echo($result['homeimg']);?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }} ?>
      </div>
    </div>
   
    <!-- home-2 product-->
    <main class="ps-shop">
        <div class="ps-shop__wrapper">
            <div class="ps-shop__banners">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    </div>
                </div>
            </div>
            
            <div class="ps-row">
                <?php 
              $getNpd=$pd->getNewProduct();
              if ($getNpd) {
                while ($result=$getNpd->fetch_assoc()) {
               ?>

                <div class="ps-column">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><img src="admin/<?php echo($result['image']); ?>" alt=""><a class="ps-product__overlay" href="details.php?pdId=<?php echo($result['id']); ?>"></a>
                            <ul class="ps-product__actions">
                                <li><a href="details.php?pdId=<?php echo($result['id']); ?>" data-tooltip="Compare"><i class="ba-reload"></i></a></li>
                                <li><a href="details.php?pdId=<?php echo($result['id']); ?>" data-tooltip="Favorite"><i class="ba-heart"></i></a></li>
                                <li><a href="details.php?pdId=<?php echo($result['id']); ?>" data-tooltip="Add to Cart"><i class="ba-shopping"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__content"><a class="ps-product__title" href="details.php?pdId=<?php echo($result['id']); ?>"><?php echo($result['productName']); ?></a>
                            <?php
                              $rating=0; 
                               $getrt=$pd->product_rating($result['id']);
                                $re=$getrt->fetch_assoc(); 
                                
                                $rating=$re['avg'];
                               ?>
                            <select class="ps-rating" disabled>
                             <?php 
                             for ($i=1; $i <=5 ; $i++) { 
                               if ($i<=$rating) {
                              ?>
                                <option value="1" ><?php echo($re['avg']); ?></option>
                                <?php 
                              }else{
                                 ?>
                                <option value="<?php echo($i); ?>" ><?php echo($i); ?></option>
                                <?php }} ?>
                            </select>
                            <p class="ps-product__price">TK <?php echo($result['price']); ?></p>
                        </div>
                    </div>
                </div>
  <?php }} ?>
  </div>
 
    <div class="ps-section__footer text-center"><a class="ps-btn" href="allproducts.php">Load more</a></div>
</div>
<?php include_once 'inc/sidebar.php';?>
        
    </main>
<?php include_once 'inc/footer.php';?>

<script type="text/javascript">
      /*$(document).ready(function() {
        $(".quick_look").on("click", function(e) {
             e.preventDefault();
            var product_id = $(this).data("id");
            var options = {
                    modal: true,
                    height: 'auto',
                    width:'70%'
                };
            $('#demo-modal').load('quick-view.php?id='+product_id).dialog(options).dialog('open');
           // alert(product_id);
         });
      });
      */
</script>