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

if (!isset($_GET['id'])||$_GET['id']==NULL ||$_GET['id']!=$_GET['id']) {
    echo "<script>window.location = 'index.php';</script>";
}else{
    // $id=$_GET['id'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['id']);

}
 $product=$pd->getPdById($id);
 if (! empty($product)) {
 while ($result=$product->fetch_assoc()) {
 ?>
<div class="preview-image">
    <img src="admin/<?php echo($result['image']) ;?>" />
     
</div>
<div class="product-info">
    <div class="product-title"><?php echo($result['productName']) ;?></div>
</div>
 <?php }}  ?>
