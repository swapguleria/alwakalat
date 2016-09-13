<?php include("includes/header.php");
 
    
    //$provider_data1 = $get->get_single_image_field('product', 'p_id');
     // $provider_data1 = $get->get_all_data('product', 'p_id',asc);
      
	  
     if(isset($_GET['pid']) && !empty($_GET['pid']))
	 {
	     $p_id = base64_decode($_GET['pid']);
		 
		 $get_single_products  = $get->get_single_product_details('product','p_id',$p_id);
		 
		 $get_single_product_details = $get->get_single_productdetails('product_details','p_id',$p_id);
		 
		 $single_price_get = $get->get_products_details('product_details','p_id',$p_id,'0','1');
		 
		 $color_name = $get->get_product_color_names('product_details','color','p_id',$p_id);
		
		 
	}
?>
<div class="overlay"></div>
        <div id ="wait" style="position: fixed; padding: 2px;display:none; z-index: 9; top: 25%; width: 270px; left: 40%;"><img src="images/loading-1.gif"></div>
		 <div class="main product-detail-page">
		 
            
            <section class="product-section-row">
            	<div class="container">
                	<div class="row">
                    	<div class="col-sm-12">
                            <div class="product-section">
                                <div class="row">
                                    <div class="col-sm-6 product-img text-center thumb-image">
                                        <a href="#"><img src="<?php echo $get_single_products['full_path'];?>" data-zoom-image="<?php echo $get_single_products['full_path'];?>" id="zoom_01" title="Featured Image" alt="Featured Image" height="500" width="500"></a>
                                    </div><!--col-sm-6-->
                                    <div class="col-sm-6 product-detail">
                                    	<h2><?= $get_single_products['product_name']?></h2>
										
										
                                        <h3><span><?= cur?></span> <?= $single_price_get['price'];?></h3>
										
										
                                        <div class="product-form">
                                        	<form class="form-horizontal" method="post" id="cart_form" action="cart.php?action=add">
                                              <div class="form-group">
                                              	<label class="control-label col-sm-3">Color:</label>
                                                <div class="col-sm-9">
                                                    <select required="required" class="form-control" name="color_name" id="color_name">
                                                        <option value="">Choose an Option</option>
														<?php
                                                         foreach($color_name as $get_colors)
                                                         {	

                                                             
                                                             
														?>
														        <option value="<?= $get_colors['color']?>"><?= $get_colors['color']?></option>
														<?php
														    
														 }
														?>
                                                    </select>
                                              	</div><!--col-sm-9-->  
                                              </div><!--form-group-->
                                              <div class="form-group">
                                              	<label class="control-label col-sm-3">Quantity:</label>
                                                <div class="col-sm-9">
                                                	<input type="number" min="1" max="100" required="required" name="qty" id="qty" class="form-control" value="1">
                                              	</div><!--col-sm-9-->  
                                              </div><!--form-group-->
                                              <div class="form-group">
                                              	<label class="control-label col-sm-3">Size:</label>
                                                <div class="col-sm-9">
                                                    <select required="required" class="form-control" id="product_size" name="product_size">
                                                        <option value="">Choose an Option</option>
														
													  </select>
													   <input type="hidden" name="product_id" value="<?= $get_single_products['p_id'];?>"/>
													 
													   <div id="hidden_fields"> </div>
													   
                                              	</div><!--col-sm-9-->  
                                              </div><!--form-group-->	
                                              <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                  <button type="type" id="cart_btn" name="cart_btn" class="btn btn-default">Add to cart</button>
                                                </div>
                                              </div><!--form-group-->
											</form>
                                        </div><!--product-form-->
                                    </div><!--col-sm-6-->
                                </div><!--row-->
                            </div><!--product-section-->
                    	</div><!--col-sm-12-->     
                	</div><!--row-->          
                </div><!--container-->
            </section><!--product-section-->
           <!--below-clients-->
</div>
</div>

<?php include("includes/footer.php"); ?> 
<script type="text/javascript" src="js/zoom.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$('#zoom_01').elevateZoom(
	{
             zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 300,
			zoomWindowFadeOut: 300
			
 });
 
 $("#color_name").change(function()
 {
     var color_name = $(this).val();
	 var product_id = "<?php echo $p_id?>";
	 
	 var datastring = 'color_name='+color_name+'&product_id='+product_id+'&action=color_select';
	 
	 $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "ajax_response.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:datastring, //Form variables
            success:function(response)
			{
			    $("#product_size").html('');
				$("#product_size").append('<option value="">Choose an option</option>');
                $("#product_size").append(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                
                alert(thrownError);
            }
            });
	});
	
	$("#product_size").change(function()
	{
	   var product_size = $(this).val(); 
	   var product_id = "<?php echo $p_id?>";
	   
	   var data_string = 'product_size='+product_size+'&product_id='+product_id+'&action=select_size';
	  
	   $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "ajax_response.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:data_string, //Form variables
            success:function(response)
			{
			   
               $("#hidden_fields").html('');
			   $("#hidden_fields").append(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                
                alert(thrownError);
            }
            });
	
	
	});
	

 });
 
  
</script>
	
