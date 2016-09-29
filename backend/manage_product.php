<?php include 'inc/config.php'; 
include 'inc/template_start.php';
?>
<?php include 'inc/page_head.php'; 
if(isset($_GET['id']))	{		
$obj->delete_data('product_details','pd_id',$_GET['id'],'manage_product.php'); 	}	
//$results=$obj->get_all_data('product_details','pd_id','asc');

$results = $obj->get_join_data('product_details','p_id','product','p_id','product_name','asc');

$product_details = $obj->get_product_details('product','product_name','asc');



unset($_SESSION['success']);?>
<?php $obj->admin_not_login(); ?>
<div id="page-content">
    <div class="content-header">	<div class="header-section">                <h1>				
	<i class="gi gi-brush"></i>Product Details <br><small></small>
            </h1>			</div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Dashboard</li>
        <li>Homepage</li>
        <li><a href="">product Detalis</a></li>
    </ul>
    <div class="block">
        <div class="block-title">
            <h2><strong>Add Product Details</strong></h2>
        </div>

        <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
           <input type="hidden" name="action" value="add_product_details">
            <div class="form-group">
                <label class="col-md-3 control-label" for="logo">Product Name <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <select name="p_id" class="maker form-control" required="required" >
                        <option value="">Select Product  name</option>
                        <?php
						  foreach($product_details as $product)
                          {						  
						?>
                           <option value="<?= $product['p_id']?>"><?= $product['product_name']?></option>
                        <?php
						   }
						?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="logo">Product price <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="price" name="price" required="required">
                    </div>
                </div>
            </div>
           
           <div class="form-group">
                <label class="col-md-3 control-label" for="logo">product Color<span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                       <select name="color" class="maker form-control" required="required">
                        <option value="">Select Product Color</option>                        
						<option value="Black">Black</option>						
						<option value="Fire Red">Fire Red</option>						
						<option value="Lime Green">Lime Green</option>
						<option value="Navy Blue">Navy Blue</option>
                        
                    </select>
                        
                    </div>
                </div> 
            </div>
			
			
			<div class="form-group">
                <label class="col-md-3 control-label" for="logo">Product SKU<span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                       <input type="text" name="product_sku" id="product_sku" value="<?= uniqid();?>" readonly=""/>
					   
                        
                    </div>
                </div> 
            </div>
			
			
           
           <div class="form-group">
                <label class="col-md-3 control-label" for="logo">product Size<span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                      <select name="size" class="maker form-control">
                        <option value="">Select Product Size</option>                        
						<option value="S">S</option>						
						<option value="M">M</option>						
						<option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                        
                    </select>
                        
                    </div>
                </div> 
            </div>
           
           
           
           

            <div class="form-group form-actions">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                </div>
            </div>
        </form>				<table id="example-datatable" class="table table-striped table-vcenter">                <thead>				<?php if(is_array($results)){ ?>                    
		<tr>					
                    <th>Product name</th>		<th>Product price</th>	<th>Product Color</th>	<th>Product Size</th>		                        
		<th style="width: 150px;" class="text-center">Actions</th>                    </tr>                </thead>                
		<tbody>				
		<?php foreach($results as $value) 	{?>                    
		<tr>   
                    <td>
                    <?php echo $value['product_name']; ?>
                </td>
		
                <td>
                    <?php echo $value['price']; ?>
                </td>
                <td>
                    <?php echo $value['color']; ?>
                </td>
                <td>
                    <?php echo $value['size']; ?>
                </td>
		<td class="text-center">                            
		<div class="btn-group btn-group-xs">                                
                    <a href="manage_product.php?id=<?php echo $value['pd_id'];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>                            </div>                        </td>                    </tr>					
		<?php } }else{ ?>					
		<tr>No Product Here</tr>                    
		<?php } ?>                
		</tbody>                          
		</table>
    </div>


</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include "inc/template_end.php" ?>