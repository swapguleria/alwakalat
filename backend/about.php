<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('page','id',$_GET["id"]);
?>
<?php $obj->admin_not_login(); ?>

<!-- Page content -->
    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>About

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
                    <h2><strong>Page Content</strong></h2>
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
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Page Title <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="title" name="page_title" value="<?php if(isset($results['page_title'])) {echo $results['page_title'];} ?>" class="form-control" >
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Page Title(Arabic) <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="title" name="page_title_arabic" value="<?php if(isset($results['page_title_arabic'])) {echo $results['page_title_arabic'];} ?>" class="form-control" >
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