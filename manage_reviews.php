<?php include '../includes/header.php'; ?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('page','id',$_GET["id"]);
$makers = $get->get_all_data('maker', 'id', 'desc');
if (isset($_GET['id']) && $_GET['id'] != "") {
    $car_id = $_GET['id'];
    $car_data = $get->get_single_result('car_data', 'id', $car_id);
}
?>
<?php $obj->admin_not_login(); ?>

<!-- Page content -->
    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Reviews

            </h1>

        </div>

    </div>

<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Dashboard</li>
        <li>Manage Pages</li>
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-12">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Reviews</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="about_page">
              <input type="hidden" name="slider_id" value="<?php echo $results['id']; ?>">
              <input type="hidden" name="slider_name1" value="<?php echo $results['image_name']; ?>">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;
    font-size: 15px;
    padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
<!---------------------------------------->
<div class="comparison">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row comparison-list">
                    <div class="label-text col-sm-3"> Make : </div>
                    <div class="label-modal col-sm-3">
                        <select name="maker" id="maker">
                            <option value="">Select Maker</option>
<?php foreach ($makers as $maker) { ?>

                                <option value="<?php echo $maker['id']; ?>" <?php if ($maker['id'] == $car_data['maker_id']) {
                                echo"selected";
                            } ?>><?php echo $maker['name']; ?></option>
<? } ?>
                        </select>
                    </div>
                    <div class="label-make col-sm-3">
                        <select name="maker" id="maker2">
                            <option value="">Select Maker</option>
                            <?php foreach ($makers as $maker) { ?>

                                <option value="<?php echo $maker['id']; ?>"><?php echo $maker['name']; ?></option>
<? } ?>
                        </select>
                    </div>
                    <div class="label-make col-sm-3">
                        <select name="maker" id="maker3">
                            <option value="">Select Maker</option>
                            <?php foreach ($makers as $maker) { ?>

                                <option value="<?php echo $maker['id']; ?>"><?php echo $maker['name']; ?></option>
<? } ?>
                        </select>
                    </div>
                </div>
                <div class="row comparison-list">
                    <div class="label-text col-sm-3"> Model : </div>
                    <div class="label-modal col-sm-3">
                        <select name="model" id="model_sel">
<?php if (isset($_GET['id']) && $_GET['id'] != "") { ?>
                                <option value="<?php echo $car_data['model']; ?>" selected="selected"><?php echo $get->get_single_field('model', 'model_name', 'model_id', $car_data['model']); ?></option><?php } else { ?>
                                <option selected="selected">Select Maker First</option><?php } ?>

                        </select>
                    </div>
                    <div class="label-make col-sm-3">
                        <select name="model" id="model_sel2">

                            <option selected="selected">Select Maker First</option>

                        </select>
                    </div>
                    <div class="label-make col-sm-3">
                        <select name="model" id="model_sel3">

                            <option selected="selected">Select Maker First</option>

                        </select>
                    </div>
                </div>
                <div class="row comparison-list">
                    <div class="label-text col-sm-3">Sub-model : </div>
                    <div class="label-modal col-sm-3">
                        <select name="sub_model" id="sub_model_sel">
                            <?php if (isset($_GET['id']) && $_GET['id'] != "") { ?>
                                <option value="<?php echo $car_id; ?>" selected="selected"><?php echo $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $car_data['sub_model']); ?> <?php echo $car_data['bodyType'] ?></option><?php } else { ?>
                                <option selected="selected">Select Model First</option>
<?php } ?>
                        </select>
                    </div>
                    <div class="label-make col-sm-3">
                        <select name="sub_model" id="sub_model_sel2">

                            <option selected="selected">Select Model First</option>

                        </select>
                    </div>
                    <div class="label-make col-sm-3">
                        <select name="sub_model" id="sub_model_sel3">


                            <option selected="selected">Select Model First</option>

                        </select>
                    </div>
                </div>
                <div class="row comparison-list">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3 comprasion"></div>
                    <div class="col-sm-3 comprasion"><a href="javascript:void(0);" onclick="compare();">COMPARE</a></div>
                    <div class="col-sm-3 comprasion"></div>
                </div>
                <!--div class="row comparison-list">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-3 comprasion"></div>
                  <div class="col-sm-3 comprasion">
                    <h1>M6 Convertible</h1>
                    <img src="images/model.jpg" alt="">
                    <p>2015 Model</p>
                  </div>
                  <div class="col-sm-3 comprasion"></div>
                </div-->
            </div>
        </div>
    </div>
</div>
<!---------------------------------------->
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Review Title <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="title" name="review_title" value="<?php if(isset($results['review_title'])) {echo $results['review_title'];} ?>" class="form-control" >
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Review Title(Arabic) <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="title" name="review_title_arabic" value="<?php if(isset($results['review_title_arabic'])) {echo $results['review_title_arabic'];} ?>" class="form-control" >
								</div>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div>												
						<div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Content<span class="text-danger">*</span></label> 
						<div class="col-md-6">
						
						<textarea name="content" id="ckeditor"><?php if(isset($results['content'])) {echo $results['content'];} ?></textarea>		
						</div>                        
						</div>											
						<div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Content(Arabic)<span class="text-danger">*</span></label> 
						<div class="col-md-6">
						
						<textarea name="content_arabic" id="ckeditor2"><?php if(isset($results['content_arabic'])) {echo $results['content_arabic'];} ?></textarea>		
						</div>                        
						</div>												
						   
                      </fieldset>
               
                   
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                           
                        </div>
                    </div>
					<div class="form-group">
					<?php if($results['image_name'] !='') {?>
							<img src="../<?php echo $results['full_path'];?> ">
					<?php } ?>
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