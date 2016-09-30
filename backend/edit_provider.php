<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php
include 'inc/page_head.php';

$results = $obj->get_single_result('finance', 'id', $_GET['id']);
?>



<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Finance Page<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Manage Finance Page</a></li>

    </ul>

    <!-- END Blank Header -->
    <div class="block">
        <!-- Form Validation Example Title -->
        <div class="block-title">
            <h2><strong>Edit Provider</strong></h2>
        </div>
        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
        <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
            <input type="hidden" name="action" value="edit_banks">
            <input type="hidden" name="id" value="<?php echo $results['id']; ?>">
            <input type="hidden" name="slider_name1" value="<?php echo $results['image_name']; ?>">

            <fieldset>
                <?php if (isset($_SESSION['success']))
                    { ?>
                    <div style="color: red; font-size: 15px;padding: 5px;"><?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?></div>
<?php } ?>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Provider <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="provider" class="form-control" value="<?php echo $results['provider']; ?>">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Content <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <textarea name="desc" id="ckeditor"><?php if (isset($results['desc']))
    {
    echo $results['desc'];
} ?></textarea>							
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Minimum Salary(in AED) <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="minimum_salary" class="form-control" value="<?php echo $results['minimum_salary']; ?>">AED

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Down Payment (%)<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="down_payment" class="form-control" value="<?php echo $results['down_payment']; ?>">%

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Monthly Payment (in AED)<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="monthly_payment" class="form-control" value="<?php echo $results['monthly_payment']; ?>">AED

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Flat Rate (%)<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="flat_rate" class="form-control" value="<?php echo $results['flat_rate']; ?>">%

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Reducing Rate(%)<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="reducing_rate" class="form-control" value="<?php echo $results['reducing_rate']; ?>">%

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Provider Image Icon <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="file" id="slider" name="slider" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Link<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="link" class="form-control" value="<?php echo $results['link']; ?>">

                    </div>
                </div>


            </fieldset>


            <div class="form-group form-actions">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                </div>
            </div>
        </form>
        <!-- END Form Validation Example Content -->


    </div>


    <!-- Example Block -->



    <!-- END Example Block -->

</div>

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>