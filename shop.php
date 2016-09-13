<?php include("includes/header.php");
 
    
    //$provider_data1 = $get->get_single_image_field('product', 'p_id');
      //$provider_data1 = $get->get_all_data('product', 'p_id',asc);
     // $provider_data1 = $get->get_join_data('product','p_id','product_details','p_id','price','asc');
	  
	 
	 
	 
	 
	    $get_cat  =  $get->get_product_cat('category','' ,'' ,'c_id','asc');
	    if(isset($_GET['cat']) && !empty($_GET['cat']))
		{
		    $get_cat_name  =  $get->get_product_cat('category','c_id' ,$_GET['cat'] ,'c_id','asc');  
		
		}
		
	
	 
	 
	 if(isset($_GET['cat'])  && !empty($_GET['cat']))
	 {
	      
	    $provider_data1 = $get->get_products('product','c_id' ,$_GET['cat'],'product_name','ASC');

	 
	 }
	 else
	 {
	    $provider_data1 = $get->get_products('product' , '' ,'','product_name' ,'ASC');
 
	 }
	 
	 
	 
	 
	 
?>



<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop.css" rel="stylesheet">
     <link href="fonts/webfontkit-20160629-043125/stylesheet.css" rel="stylesheet">
<div class="shop-category">
<div class="container">
<div class="row">

<div class="col-sm-3 list-category">
<div class="shop-list">
<h3>Shop by categories</h3>
<ul>
<?php
  foreach($get_cat as $cat )
  {
  
?>
      <li><a href="shop.php?cat=<?= $cat['c_id']?>"><?= $cat['cat_name'] ?></a></li>
<?php
  }
?>
</ul>
</div>

</div>

<div class="col-sm-9 new-shop">
<div class="product-main">
<div class="cloth-top">
<h4><?php 
if(isset($get_cat_name) &&  !empty($get_cat_name)) 
{
   foreach($get_cat_name as $cat)
   {
      echo $cat['cat_name'];
   }
}
else
{
   echo "All Products";
}
?></h4>
</div>
   
    
    
<div class="shop-product clearfix">

<?php 
if(isset($provider_data1) && !empty($provider_data1))
{
foreach ($provider_data1 as $data)
{
    $result = $get->get_products_details('product_details','p_id',$data['p_id'],'0','1');
   

 ?>
<div class="col-sm-4 product-shop">
    
  

<div class="name-pro">

<div class="pro-image">
    
<!--<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">-->
    <img width='200px' height='200px' src="<?php echo $data['full_path']; ?>">
<!--<img src="images/seach-icon.png" alt="">-->
</div>
</div>
<div class="name-text">
<!--<h3>product name</h3>-->
<h3><?php echo $data['product_name']; ?></h3>
<!--<h4>$00.00</h4>-->

<h4>Price: <?php echo cur." ".$result['price']; ?></h4>

<a href="product_details.php?pid=<?= base64_encode($data['p_id'])?>">Add to cart</a>
</div>


</div>
<?php } }

else
{
   echo "<p>There is no product</p>";
}

?>
    

</div>
    
<!--<div class="col-sm-4 product-shop">

<div class="name-pro">

<div class="pro-image">
<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">
<img src="images/seach-icon.png" alt="">
</div>
</div>
<div class="name-text">
<h3>product name</h3>
<h4>$00.00</h4>
<a href="#">Add to cart</a>
</div>


</div>



</div>
<div class="col-sm-4 product-shop">

<div class="name-pro">

<div class="pro-image">
<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">
<img src="images/seach-icon.png" alt="">
</div>
</div>
<div class="name-text">
<h3>product name</h3>
<h4>$00.00</h4>
<a href="#">Add to cart</a>
</div>


</div>



</div>

<div class="col-sm-4 product-shop">

<div class="name-pro">

<div class="pro-image">
<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">
<img src="images/seach-icon.png" alt="">
</div>
</div>
<div class="name-text">
<h3>product name</h3>
<h4>$00.00</h4>
<a href="#">Add to cart</a>
</div>


</div>



</div>


<div class="col-sm-4 product-shop">

<div class="name-pro">

<div class="pro-image">
<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">
<img src="images/seach-icon.png" alt="">
</div>
</div>
<div class="name-text">
<h3>product name</h3>
<h4>$00.00</h4>
<a href="#">Add to cart</a>
</div>


</div>



</div>


<div class="col-sm-4 product-shop">

<div class="name-pro">

<div class="pro-image">
<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">
<img src="images/seach-icon.png" alt="">
</div>
</div>
<div class="name-text">
<h3>product name</h3>
<h4>$00.00</h4>
<a href="#">Add to cart</a>
</div>


</div>



</div>



<div class="col-sm-4 product-shop">

<div class="name-pro">

<div class="pro-image">
<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">
<img src="images/seach-icon.png" alt="">
</div>
</div>
<div class="name-text">
<h3>product name</h3>
<h4>$00.00</h4>
<a href="#">Add to cart</a>
</div>


</div>



</div>


<div class="col-sm-4 product-shop">

<div class="name-pro">

<div class="pro-image">
<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">
<img src="images/seach-icon.png" alt="">
</div>
</div>
<div class="name-text">
<h3>product name</h3>
<h4>$00.00</h4>
<a href="#">Add to cart</a>
</div>


</div>



</div>


<div class="col-sm-4 product-shop">

<div class="name-pro">

<div class="pro-image">
<img src="images/Product-image.jpg" alt=""><div class="porduct-hover">
<img src="images/seach-icon.png" alt="">
</div>
</div>
<div class="name-text">
<h3>product name</h3>
<h4>$00.00</h4>
<a href="#">Add to cart</a>
</div>


</div>



</div>-->




























</div>





</div>

<!--<div class="page-list">
<Ul>
<li><A href="#"><img src="images/left-icon.png" alt=""></A></li>
<li><A href="#">1</A></li>
<li><A href="#">2</A></li>
<li><A href="#">3</A></li>
<li><A href="#">4</A></li>
<li><A href="#">10</A></li>
<li><A href="#"><img src="images/right-icon.png" alt=""></A></li>


</Ul>

</div>-->







</div>







</div>
</div>

<?php include("includes/footer.php"); ?>   