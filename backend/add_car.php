<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php
include 'inc/page_head.php';
$results = $obj->get_all_data('maker', 'id', 'desc');
?>

<?php $obj->admin_not_login(); ?>

<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Makers<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Manage Cars</a></li>

    </ul>

    <!-- END Blank Header -->
    <div class="block">
        <!-- Form Validation Example Title -->
        <div class="block-title">
            <h2><strong>Add Maker</strong></h2>
        </div>
        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
        <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
            <input type="hidden" name="action" value="add_car">

            <fieldset>
                <?php if (isset($_SESSION['success'])) { ?>
                    <div style="color: red; font-size: 15px;padding: 5px;"><?php echo $_SESSION['success'];
                    unset($_SESSION['success']); ?></div>
<?php } ?>


                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Image <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="file" id="slider" name="slider">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Pdf English <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="file" id="pdf_english" name="pdf_english">
                        </div>
                    </div>
                </div>
               <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Pdf Arabic <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="file" id="pdf_arabic" name="pdf_arabic">
                        </div>
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Thumb width <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" id="thumb_width" name="thumb_width">
                        </div>
                    </div>
                </div>-->

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Maker <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <select name="maker" class="maker form-control">
                            <option value="">Select Maker</option>
                            <?php foreach ($results as $maker) { ?>

                                <option value="<?php echo $maker['id']; ?>"><?php echo $maker['name']; ?></option>
<?php } ?>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Model <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <select name="model" class="model form-control">

                            <option selected="selected">Select Maker First</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Sub-Model<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <select name="sub_model" class="sub_model form-control">

                            <option selected="selected">Select Model First</option>

                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">BodyType <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <select name="bodyType" class="form-control">
                            <option value="">Select Body Type</option>
                            <option value="Convertible">Convertible</option>
                            <option value="Coupe">Coupe</option>
                            <option value="Coupe/Convertible">Coupe/Convertible</option>
                            <option value="Crossover">Crossover</option>
                            <option value="Minivan">Minivan</option>
                            <option value="Pickup">Pickup</option>
                            <option value="Roadster">Roadster</option>
                            <option value="SUV">SUV</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Hatchback">Hatchback</option>
                            <option value="Saloon">Saloon</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Year<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="year" class="form-control">

                    </div><div class="col-md-3">

                        <span> Eg. 2015</span>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Color<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="color" class="form-control">

                    </div><div class="col-md-3">

                        <span>Add colors seperated by comma. Eg. red,green....</span>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Price<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="price" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Warranty<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="Warranty" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Acceleration<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="acceleration" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Top Speed<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="top_speed" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Engine Size<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="engineSize" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Horse Power<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="h_power" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Clyinders<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="clyinders" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Driven Wheels<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="drivenWheels" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Special Features<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="specialFeatures" class="form-control">

                    </div>
                </div>


            </fieldset>


            <div class="form-group form-actions">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                </div>
                <div class="col-md-8 col-md-offset-4">
                    <a class="btn btn-sm btn-primary" href="other_slider.php">Manage Slider</a>

                </div>
            </div>
        </form>
        <!-- END Form Validation Example Content -->


    </div>


    <!-- Example Block -->


</div>

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>