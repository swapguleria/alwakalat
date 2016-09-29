<?php include 'inc/config.php'; 
include 'inc/template_start.php';
?>
<?php include 'inc/page_head.php'; 
if(isset($_GET['id']))	{		
$obj->delete_data('product','p_id',$_GET['id'],'shop_product.php');	}	
$results=$obj->get_all_data('product','p_id','asc');
//$results = $obj->get_join_data('provider_social_icon','provider_id','providers','id','provider_name','asc');
unset($_SESSION['success']);?>
<?php $obj->admin_not_login(); ?>
<div id="page-content">
    <div class="content-header">	<div class="header-section">                <h1>				
	<i class="gi gi-brush"></i>Shop Product <br><small></small>
            </h1>			</div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Dashboard</li>
        <li>Homepage</li>
        <li><a href="">Shop product</a></li>
    </ul>
    <div class="block">
        <div class="block-title">
            <h2><strong>Add shop</strong></h2>
        </div>

        <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
           <input type="hidden" name="action" value="shop_product">
            <div class="form-group">
                <label class="col-md-3 control-label" for="logo">Product Category <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <select name="c_id" class="maker form-control">
                        <option value="">Select category  name</option>                        
						<option value="5">Cloths</option>
                                                <option value="6">Accessories</option>
						
                        
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="logo">Product Name <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="product_name" name="product_name">
                    </div>
                </div>
            </div>
           
           <div class="form-group">
                <label class="col-md-3 control-label" for="logo">product image <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="file" id="product_image" name="product_image">
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
                    <th>Product Name</th>	<th>Product Image</th>					                        
		<th style="width: 150px;" class="text-center">Actions</th>                    </tr>                </thead>                
		<tbody>				
		<?php foreach($results as $value) 	{?>                    
		<tr>   
                    <td>
                    <?php echo $value['product_name']; ?>
                </td> 
		<td><?php if($value['product_name']!='') { ?>							
		<img width='200px' height='200px' src="../<?php echo $value['full_path']; ?>">	
                	
		<?php }?>
		</td> 
                
		<td class="text-center">                            
		<div class="btn-group btn-group-xs">                                
                    <a href="shop_product.php?id=<?php echo $value['id'];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>                            </div>                        </td>                    </tr>					
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