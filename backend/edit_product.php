<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';

	$results	=	$obj->get_single_result('products','product_id',$_GET['id']);
	
	$results_cat	=	$obj->get_all_data('category','cat_id','desc');

 ?>



<!-- Page content -->

<div id="page-content">

    <!-- Validation Header -->

    

    <ul class="breadcrumb breadcrumb-top">

        <li>Product</li>

        

    </ul>

    <!-- END Validation Header -->



    <div class="row">

        <div class="col-md-9">

            <!-- Form Validation Example Block -->

            <div class="block">

                <!-- Form Validation Example Title -->

                <div class="block-title">

                    <h2><strong>Edit Product Page</strong></h2>

                </div>

                <!-- END Form Validation Example Title -->



                <!-- Form Validation Example Content -->

                <form action="process.php" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">

				<input type="hidden" name="action" value="edit_product">

                <input type="hidden" name="product_id" value="<?php echo $results['product_id']; ?>">

                    <fieldset>

                        <legend><i class="fa fa-angle-right"></i> Product Info</legend>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="category_name">Product Name <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Product Name.." value="<?php if(isset($results['product_name'])){echo $results['product_name'];} ?>">

                                </div>

                            </div>

                        </div>
						
                        <div class="form-group">

                            <label class="col-md-4 control-label" for="category_name">Product Description <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <textarea class="form-control" rows="9" cols="50" name="product_description" id="product_description" placeholder="Product Name.."><?php if(isset($results['product_description'])){echo $results['product_description'];} ?></textarea>

                                </div>

                            </div>

                        </div>
						
                        <div class="form-group">

                            <label class="col-md-4 control-label" for="category_name">Product Specifications <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <textarea class="form-control" rows="9" cols="50" name="product_specification" id="product_specification" placeholder="Product Name.."><?php if(isset($results['product_specification'])){echo $results['product_specification'];} ?></textarea>

                                </div>

                            </div>

                        </div>
						
                        <div class="form-group">

                            <label class="col-md-4 control-label" for="category_name">Product Price <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="product_price" name="product_price" class="form-control" placeholder="Product Price.." value="<?php if(isset($results['product_price'])){echo $results['product_price'];} ?>">

                                </div>

                            </div>

                        </div>
						
                        <div class="form-group">

                            <label class="col-md-4 control-label" for="category_name">Product Featured Image <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="file" id="featured_image" name="featured_image1">

                                </div>

                            </div>

                        </div>
						<div class="form-group">

                            <label class="col-md-4 control-label" for="category_active">Category<span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <select id="active" name="category" class="form-control">
								<option value="">---</option>
								<? foreach($results_cat as $result){?>
                                    <option value="<? echo $result['category_name']?>" <? if($result['category_name']==$results['category']){echo"selected";}else{echo"";}?>><? echo $result['category_name']?></option>

                                   <?}?>

                                </select>

                            </div>

                        </div>
						
						<div class="form-group">

                            <label class="col-md-4 control-label" for="category_name">Banner Images <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="file" id="banner_image1" name="banner_image1">

                                </div>
                                <div class="input-group">

                                    <input type="file" id="banner_image2" name="banner_image2" >

                                </div>
                                <div class="input-group">

                                    <input type="file" id="banner_image3" name="banner_image3">

                                </div>

                            </div>

                        </div>

                      

                       

                      <div class="form-group">

                            <label class="col-md-4 control-label" for="category_active">Active<span class="text-danger">*</span></label>

                            <div class="col-md-6">

							<?php if(isset($results['active']) && $results['active']=='yes'){

								$yes	= 'selected'; 

							}else{

								$yes	= ''; 

							} if(isset($results['active']) && $results['active']=='no'){

								$no	= 'selected'; 

							}else{

								$no	= ''; 

							} ?>

                                <select id="active" name="category_active" class="form-control">

                                    <option <?php echo $yes; ?> value="yes">Yes</option>

                                    <option <?php echo $no; ?> value="no">No</option>

                                   

                                </select>

                            </div>

                        </div>

                    </fieldset>

               

                   

                    <div class="form-group form-actions">

                        <div class="col-md-8 col-md-offset-4">

                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>

                        </div>

                    </div>

                </form>

                <!-- END Form Validation Example Content -->



               

            </div>

            <!-- END Validation Block -->

        </div>

       

    </div>

</div>

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>



<!-- Load and execute javascript code used only in this page -->

<?php include 'inc/template_end.php'; ?>