<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Category</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Add Category Page</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="Insert_category">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Category Info</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="category_name">Category Name <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category Name..">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                      
                       
                      <div class="form-group">
                            <label class="col-md-4 control-label" for="category_active">Active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="active" name="category_active" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                   
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