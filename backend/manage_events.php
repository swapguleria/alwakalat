<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php
include 'inc/page_head.php';

if (isset($_GET['del_id'])) {
    $obj->delete_data('events', 'id', $_GET['del_id'], 'manage_events.php');
}
//$results	=	$obj->get_all_data('maker','id','ASC');
$result_model = $obj->get_all_data('events', 'id', 'ASC');
//print_r($result_mode);

if (isset($_GET['id'])) {
    $model = $obj->get_single_result('events', 'id', $_GET['id']);
    $action = 'edit_event';
} else {
    $action = 'add_car_event';
}
unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>


<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Model<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="manage_events.php">Manage Events</a></li>

    </ul>

    <!-- END Blank Header -->
    <div class="block">
        <!-- Form Validation Example Title -->
        <div class="block-title">
            <h2><strong>Add Event</strong></h2>
        </div>
        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
        <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
            <input type="hidden" name="action" value="<?php echo $action; ?>">
            <input type="hidden" name="event_id" value="<?php if (isset($_GET['id'])) { echo $_GET['id']; } ?>">

            <fieldset>
                    <?php if (isset($_SESSION['success'])) { ?>
                    <div style="color: red; font-size: 15px;padding: 5px;">
                    <?php echo $_SESSION['success'];
                    unset($_SESSION['success']); ?>
                    </div>
<?php } ?>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Image <span class="text-danger">
					<?php if (isset($_GET['id'])) {	} else { echo "*"; } ?></span></label>
                    
                    <div class="col-md-6">
                      <input type="file" name="slider" id="slider" 
					  <?php if (isset($_GET['id'])) {	} else { echo "required "; } ?> 
					  value = "<?php if (isset($model['image'])) { echo $model['image']; }?>" >
                      
                       <?php if (isset($model['thumb'])) { ?>
						<img src="../<?php echo $model['thumb']; ?>" style="height:80px;width:80px;">
					 <?php } ?>
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Event Title <span class="text-danger">*</span></label>   
                    <div class="col-md-6">
                        <input type="text" required="required" name="event_title" class="form-control" value="<?php
if (isset($model['event_title'])) {
    echo $model['event_title'];
}
?>">
                    </div></div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Event Title(arabic) <span class="text-danger">*</span></label>   
                    <div class="col-md-6">
                        <input type="text" name="ar_title" class="form-control" required="required" value="<?php
if (isset($model['title_arabic'])) {
    echo $model['title_arabic'];
}
?>">
                    </div></div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Event Location <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" name="event_location" class="form-control" required="required" value="<?php
                        if (isset($model['event_location'])) {
                            echo $model['event_location'];
                        }
                        ?>">
                    </div></div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Event Location(arabic) <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" name="ar_location" class="form-control" required="required" value="<?php
                        if (isset($model['location_arabic'])) {
                            echo $model['location_arabic'];
                        }
                        ?>">
                    </div></div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Event Description <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <textarea  name="event_desc" class="form-control" required="required"><?php
                        if (isset($model['event_description'])) {
                            echo $model['event_description'];
                        }
                        ?></textarea>
                    </div></div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Event Description(arabic) <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <textarea  name="ar_desc" class="form-control" required="required"><?php
                        if (isset($model['desc_arabic'])) {
                            echo $model['desc_arabic'];
                        }
                        ?></textarea>
                    </div></div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Test Drive</label>
                    <div class="col-md-6">
                        <textarea  name="test_drive" class="form-control" ><?php
                            if (isset($model['test_drive'])) {
                                echo $model['test_drive'];
                            }
                        ?></textarea>
                    </div></div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Test Drive(arabic)</label>
                    <div class="col-md-6">
                        <textarea  name="ar_drive" class="form-control" ><?php
                               if (isset($model['drive_arabic'])) {
                                   echo $model['drive_arabic'];
                               }
                        ?></textarea>
                    </div></div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Event Start Date <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input title="Start Date" type="text" id="datepicker1" required="required" name="event_start_date" value="<?php
                               if (isset($model['event_start_date'])) {
                                   echo $model['event_start_date'];
                               }
                        ?>" data-content-clone="channel:cc-date_start" data-min-max-type="max">

<!--   <input type="text" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" class="form-control input-datepicker-close" name="example-datepicker5" id="example-datepicker5" value="<?php //if(isset($model['event_start_date'])){ echo $model['event_start_date'];}  ?>">-->

        <!--<input type="text" name="start_date" class="form-control" value="<?php //if(isset($model['event_start_date'])){ echo $model['event_start_date'];}  ?>">-->
                    </div></div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Event Close Date <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input title="End Date" type="text" id="datepicker2" required="required" name="event_end_date" value="<?php
                    if (isset($model['event_end_date'])) {
                        echo $model['event_end_date'];
                    }
                    ?>" data-content-clone="channel:cc-date_end" data-min-max-type="max">



  <!--<input type="text" name="close_date" class="form-control" value="<?php //if(isset($model['event_end_date'])){ echo $model['event_end_date'];}  ?>">-->
                    </div></div>





            </fieldset>


            <div class="form-group form-actions">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
<?php if ($_GET['id'] != '') { ?>
                        <a class="btn btn-sm btn-primary" href="event_images.php?id=<?php echo $model['id']; ?>">Manage Images</a>

<?php }
?>
                </div>
            </div>
        </form>
        <!-- END Form Validation Example Content -->


    </div>


    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>List Of Events</h2>

        </div>

        <!-- END Example Title -->



        <!-- Example Content -->

        <div class="table-responsive">

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
                        <th>Image</th>
                        <th>Event Title</th>
                        <th>Event Location</th>
                        <th>Event Start date</th>
                        <th>Event End date</th>


                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
<?php
$i = 0;
foreach ($result_model as $value) {
    $i++;
    //print_r($value);
    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td ><img src="../<?php echo $value['thumb']; ?>" style="height:80px;width:80px;"></td>
                            <td><?php echo $value['event_title'] ?></td>
                            <td><?php echo $value['event_location']; ?></td>
                            <td><?php echo $value['event_start_date']; ?></td>
                            <td><?php echo $value['event_end_date']; ?></td>

                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <a href="manage_events.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                    <a href="manage_events.php?del_id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
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