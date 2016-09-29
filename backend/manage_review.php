<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php
include 'inc/page_head.php';

if (isset($_GET['del_id']))
    {
    $obj->delete_data('reviews', 'cat_id', $_GET['del_id'], 'manage_review.php');
    }
//$results	=	$obj->get_all_data('maker','id','ASC');
$result_model = $obj->get_all_data('reviews', 'id', 'ASC');
//print_r($result_mode);

if (isset($_GET['id']))
    {
    $model = $obj->get_single_result('reviews', 'cat_id', $_GET['id']);
    if (@$model)
        {
        $action = 'edit_review';
        }
    else
        {
        $action = 'add_review';
        }
    $car_details = $obj->get_single_result('car_data', 'id', $_GET['id']);
    $model_detail = $obj->get_single_result('model', 'model_id', $car_details['model']);
    $sub_model_detail = $obj->get_single_result('sub_model', 'sub_id', $car_details['sub_model']);
    $name = $model_detail['model_name'] . " " . $sub_model_detail['sub_model_name'] . " " . $car_details['bodyType'];
    }
//else
//    {
//    $action = 'add_review';
//    }
unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>


<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Reviews<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="manage_review.php">Manage Reviews</a></li>

    </ul>

    <!-- END Blank Header -->
    <?php
    if (isset($_GET['id']))
        {
        ?>
        <div class="block">
            <!-- Form Validation Example Title -->
            <div class="block-title">
                <h2><strong>Add Review</strong></h2>
            </div>
            <!-- END Form Validation Example Title -->

            <!-- Form Validation Example Content -->
            <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                <input type="hidden" name="action" value="<?php echo $action; ?>">
                <input type="hidden" name="review_id" value="<?php
                if (isset($_GET['id']))
                    {
                    echo $_GET['id'];
                    }
                ?>">

                <fieldset>
                    <?php
                    if (isset($_SESSION['success']))
                        {
                        ?>
                        <div style="color: red; font-size: 15px;padding: 5px;">
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Title <span class="text-danger">*</span></label>   
                        <div class="col-md-6">
                            <lable><b><?php echo $name
                    ?></b></lable>
                            <input type="hidden" name="cat_id" value="<?php echo $_GET['id']; ?>">
                        </div></div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Sub Title <span class="text-danger">*</span></label>   
                        <div class="col-md-6">
                            <input type="text" required="required" name="sub_title" class="form-control" value="<?php
                            if (isset($model['sub_title']))
                                {
                                echo $model['sub_title'];
                                }
                            ?>" required>
                        </div></div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Sub Title (Arabic) <span class="text-danger">*</span></label>   
                        <div class="col-md-6">
                            <input type="text" required="required" name="sub_title_ar" class="form-control" value="<?php
                            if (isset($model['sub_title_ar']))
                                {
                                echo $model['sub_title_ar'];
                                }
                            ?>" required>
                        </div></div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Description Section 1<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <textarea  name="description" class="form-control" required="required"><?php
                                if (isset($model['description']))
                                    {
                                    echo $model['description'];
                                    }
                                ?></textarea>
                        </div></div> 
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Description Section 1(Arabic)<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <textarea  name="description_ar" class="form-control" required="required"><?php
                                if (isset($model['description_ar']))
                                    {
                                    echo $model['description_ar'];
                                    }
                                ?></textarea>
                        </div></div> 
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Description Section 2<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <textarea  name="description2" class="form-control" required="required"><?php
                                if (isset($model['description2']))
                                    {
                                    echo $model['description2'];
                                    }
                                ?></textarea>
                        </div></div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Description Section 2 (Arabic)<span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <textarea  name="description2_ar" class="form-control" required="required"><?php
                                if (isset($model['description2_ar']))
                                    {
                                    echo $model['description2_ar'];
                                    }
                                ?></textarea>
                        </div></div>
                    <!--                    <div class="form-group">
                                            <label class="col-md-3 control-label" for="logo">Image <span class="text-danger">
                    <?php
                    if (isset($_GET['id']))
                        {
                        
                        }
                    else
                        {
                        echo "*";
                        }
                    ?></span></label>
                    
                                            <div class="col-md-6">
                                                <input type="file" name="slider" id="slider" 
                    <?php
                    if (isset($_GET['id']))
                        {
                        
                        }
                    else
                        {
                        echo "required ";
                        }
                    ?> 
                                                       value = "<?php
                    if (isset($model['image']))
                        {
                        echo $model['image'];
                        }
                    ?>" required>
                    
                    <?php
                    if (isset($model['thumb']))
                        {
                        ?>
                                                                                        <img src="../<?php echo $model['thumb']; ?>" style="height:80px;width:80px;">
                    <?php } ?>
                                            </div>
                                        </div> -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Video Url<span class="text-danger">*</span></label>   
                        <div class="col-md-6">
                            <input type="text" required="required" name="video" class="form-control" value="<?php
                            if (isset($model['video']))
                                {
                                echo $model['video'];
                                }
                            ?>" required >
                        </div></div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Photo By<span class="text-danger">*</span></label>   
                        <div class="col-md-6">
                            <input type="text" required="required" name="photo_by" class="form-control" value="<?php
                            if (isset($model['photo_by']))
                                {
                                echo $model['photo_by'];
                                }
                            ?>" required >
                        </div></div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo">Photo By (Arabic)<span class="text-danger">*</span></label>   
                        <div class="col-md-6">
                            <input type="text" required="required" name="photo_by_ar" class="form-control" value="<?php
                            if (isset($model['photo_by_ar']))
                                {
                                echo $model['photo_by_ar'];
                                }
                            ?>" required >
                        </div></div> </fieldset>


                <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                        <?php
                        if ($_GET['id'] != '')
                            {
                            ?>
                            <a class="btn btn-sm btn-primary" href="event_images.php?id=<?php echo $model['id']; ?>">Manage Images</a>

                            <?php
                            }
                        ?>
                    </div>
                </div>
            </form>
            <!-- END Form Validation Example Content -->


        </div>
    <?php } ?>

    <!-- Example Block -->
    <?php
    if (isset($_GET['id']))
        {
        
        }
    else
        {
        ?>
        <div class="block">

            <!-- Example Title -->

            <div class="block-title">

                <h2>List Of Reviews</h2>

            </div>

            <!-- END Example Title -->



            <!-- Example Content -->

            <div class="table-responsive">
                <a href="add_review.php"><div class="btn-group btn-group-sm pull-left">
                        <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Review">
                            Add  Review
                    </div>
                </a>  <br>
                <!--
                Available Table Classes:
                    'table'             - basic table
                    'table-bordered'    - table with full borders
                    'table-borderless'  - table with no borders
                    'table-striped'     - striped table
                    'table-condensed'   - table with smaller top and bottom cell padding
                    'table-hover'       - rows highlighted on mouse hover
                    'table-vcenter'     - middle align content vertically
                -->
                <table id="example-datatable" class="table table-striped table-vcenter">
                    <thead>

                        <tr>
                            <th>S.No</th>
                            <th>Title </th>
                            <th>Sub Title </th>
                            <th>Sub Title Arabic </th>
                            <th>Video Url</th>
                            <th>Photo By</th>


                            <th style="width: 150px;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($result_model as $value)
                            {
                            $i++;
                            //print_r($value);
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <?php
                                $car_detail = $obj->get_single_result('car_data', 'id', $value['cat_id']);
//    echo "<pre>";  
//    echo $car_details['model'];
//    print_r($car_details);
                                $model_detail = $obj->get_single_result('model', 'model_id', $car_detail['model']);
//    print_r($model_detail);
                                $sub_model_detail = $obj->get_single_result('sub_model', 'sub_id', $car_detail['sub_model']);
//    print_r($sub_model_detail);

                                $names = $model_detail['model_name'] . " " . $sub_model_detail['sub_model_name'] . " " . $car_detail['bodyType'];
                                ?>
                                <td><?php echo $names ?></td>
                                <td><?php echo $value['sub_title']; ?></td>
                                <td><?php echo $value['sub_title_ar']; ?></td>
                                <td><?php echo $value['video']; ?></td>
                                <td><?php echo $value['photo_by']; ?></td>

                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="manage_review.php?id=<?php echo $value['cat_id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                        <a href="manage_review.php?del_id=<?php echo $value['cat_id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
            <!-- END Example Content -->

        </div>

        <!-- END Example Block -->
    <?php } ?>

</div>

<!-- END Page Content -->




<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>

<script>
    $(function () {
        $("#datepicker1").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function (selectedDate) {
                $("#datepicker2").datepicker("option", "minDate", selectedDate);
                $("#datepicker2").datepicker("option", "dateFormat", "yy-mm-dd");
            }
        });
        $("#datepicker2").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function (selectedDate) {
                $("#datepicker1").datepicker("option", "maxDate", selectedDate);
                $("#datepicker1").datepicker("option", "dateFormat", "yy-mm-dd");
            }
        });
    });

    $("#datepicker1").click(function () {
        $("#refine_search_btn").removeClass("is-disabled");
        $("#refine_search_btn").removeClass("btn-secondary");
        $("#refine_search_btn").addClass("btn-primary");
    });
    $("#datepicker2").click(function () {
        $("#refine_search_btn").removeClass("is-disabled");
        $("#refine_search_btn").removeClass("btn-secondary");
        $("#refine_search_btn").addClass("btn-primary");
    });
</script>