<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include_once'../classes/Cart.php'; ?>


<?php
$ct=new Cart(); 
$fm=new Format(); 
$cat=new Catagory(); 
if (isset($_GET['coid'])) {
    // $id=$_GET['coid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['coid']);
    $delPd=$pd->updateDelivery($id);
}
?>
<style type="text/css">
    td .test {
    border-bottom: 1px solid black;
    
}
</style>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Order List</h4>
             
          <?php if(isset($delPd)) {?>
            <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: red;">Warning!</strong> <?php echo($delPd);?>
            </div>
          <?php }?>
                
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table <span class="pull-right"><a href="catadd.php" class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></a></span></h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>OrderID</th>
                                    <th>PurchaseItems</th>
                                    <th>Total anount</th>
                                    <th>Delivery_date</th>
                                    <th>Status</th>
                                    <th>Billing_address</th>
                                    <th>Setting</th>
                               </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                     <th>OrderID</th>
                                    <th>PurchaseItems</th>
                                    <th>Total anount</th>
                                    <th>Delivery_date</th>
                                    <th>Status</th>
                                    <th>Billing_address</th>
                                    <th>Setting</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               <?php 
                                $getPd=$pd->getAllDelivery();
                               if ($getPd) {
                                    $i=0;
                                    while ($result=$getPd->fetch_assoc()) {
                                        $i++;
                                    

                                 ?>
                                <tr>
                                    <td><?php echo($result['orderId']) ;?></td>
                                    <td>
                                        
                                        <?php 
                                $getItem=$pd->getAllOrderItems($result['orderId']);
                               if ($getItem) {
                                    $i=0;
                                    while ($resultItem=$getItem->fetch_assoc()) {
                                       
       
                                 ?>
                                 <div class="test">

                                    <p><img height="40px" width="60px" src="<?php echo($resultItem['image']); ?>"></p>
                                    <p>Name: <?php echo($resultItem['productName']); ?></p>
                                    <p>price <?php echo($resultItem['price']); ?></p>
                                    <p>quantity <?php echo($resultItem['quantity']); ?></p>
                                 </div>
            
                                           

                                      <?php }} ?>      
                                    </td>
                                   
                                    <td>
                                        <?php echo($result['amount']); ?>
                                    
                                     </td>
                                    <td><?php echo($result['delivery_date']); ?></td>
                                    <?php if ($result['status']=='1') {?>
                                     <td>Pending</td>
                                     <?php }else{?>
                                     <td>Completed</td>
                                     <?php } ?>
                                     <td>
                                        <a href="billing_address.php?cusId=<?php echo($result['address_id']); ?>">view address</a><br/>
                                     </td>
                                    <td class="pull-right">
                                       
                                    <a class="btn btn-primary " title="Click to Complete order" onclick="return confirm('Your order is completed!')" href="?coid=<?php echo($result['orderId']) ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                   
                                    </td>
                                </tr>
                                <?php }}else{echo("catagory not found");} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form role="form" method="POST">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Add Category</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="catname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="modal-footer d-flex justify-content-center">
                                
                                <input class="btn btn-primary" type="submit" name="submit" Value="Save" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
<script type="text/javascript">

   /*
   $( document ).ready(function() {
   $('.test').hide();
    $('#swt').on('click',function(e) {
        e.preventDefault();
        console.log($(this).children('a').attr('id'));
        this('.test').show();
    });
});
    $('#swt').on('click',function() {
        //alert('oh');
        Swal.fire({
            type:'success',
            title:'check',
            text:'insert'
        })
    });
    */
</script>