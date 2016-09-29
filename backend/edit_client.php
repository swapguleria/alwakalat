<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php
include 'inc/page_head.php';
$results = $obj->get_single_result('clients', 'id', $_GET['id']);
?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->

    <ul class="breadcrumb breadcrumb-top">
        <li>Edit Client</li>

    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Client</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <input type="hidden" name="action" value="edit_client">
                    <input type="hidden" name="slider_id" value="<?php echo $results['id']; ?>">
                    <input type="hidden" name="slider_name1" value="<?php echo $results['client_image']; ?>">

                    <fieldset>
                        <?php
                        if (isset($_SESSION['success']))
                            {
                            ?>
                            <div style="color: red;
                                 font-size: 15px;
                                 padding: 5px;"><?php
                                 echo $_SESSION['success'];
                                 unset($_SESSION['success']);
                                 ?></div>
                        <?php } ?>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Client Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
                                </div>
                            </div>
                        </div>												
                        <div class="form-group">                           
                            <label class="col-md-3 control-label" for="slider_active">Client Name<span class="text-danger"></span></label> 
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="text" value="<?php
                                if (isset($results['client_name']))
                                    {
                                    echo $results['client_name'];
                                    }
                                ?>">									                            
                            </div>                        
                        </div>	

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Website <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="website" value="<?php
                                    if (isset($results['website']))
                                        {
                                        echo $results['website'];
                                        }
                                    ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4><strong>Service Center 1</strong></h4>
                        </div>




                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                            <div class="col-md-6">										 					
                                <input type="text" class="form-control" name="name_service" value="<?php
                                if (isset($results['s_name']))
                                    {
                                    echo $results['s_name'];
                                    }
                                ?>">									
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Title<span class="text-danger"></span></label>
                            <div class="col-md-6">										 					
                                <input type="text" class="form-control" name="s_title" value="<?php
                                if (isset($results['s_title']))
                                    {
                                    echo $results['s_title'];
                                    }
                                ?>">									
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="mobile_service" value="<?php
                                if (isset($results['s_mob']))
                                    {
                                    echo $results['s_mob'];
                                    }
                                ?>">									
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="email_service"  value="<?php
                                if (isset($results['s_email']))
                                    {
                                    echo $results['s_email'];
                                    }
                                ?>">									
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="line1_service"  value="<?php
                                if (isset($results['s_address1']))
                                    {
                                    echo $results['s_address1'];
                                    }
                                ?>">									
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="line2_service" value="<?php
                                if (isset($results['s_address2']))
                                    {
                                    echo $results['s_address2'];
                                    }
                                ?>">									
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="line3_service" value="<?php
                                if (isset($results['s_address3']))
                                    {
                                    echo $results['s_address3'];
                                    }
                                ?>">									
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="iframe_service" value='<?php
                                if (isset($results["sr_map"]))
                                    {
                                    echo $results["sr_map"];
                                    }
                                ?>'>									
                            </div>
                        </div>
                        <div class="form-group">
                            <h4><strong>Showroom 1</strong></h4>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Title<span class="text-danger"></span></label>
                            <div class="col-md-6">										 					
                                <input type="text" class="form-control" name="sr_title" value="<?php
                                if (isset($results['sr_title']))
                                    {
                                    echo $results['sr_title'];
                                    }
                                ?>">									
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="name_showroom" value="<?php
                                if (isset($results['sr_name']))
                                    {
                                    echo $results['sr_name'];
                                    }
                                ?>" >									
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="mobile_showroom" value="<?php
                                if (isset($results['sr_mob']))
                                    {
                                    echo $results['sr_mob'];
                                    }
                                ?>">									
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="email_showroom" value="<?php
                                if (isset($results['sr_email']))
                                    {
                                    echo $results['sr_email'];
                                    }
                                ?>">									
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="line1_showroom" value="<?php
                                if (isset($results['sr_address1']))
                                    {
                                    echo $results['sr_address1'];
                                    }
                                ?>">									
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="line2_showroom" value="<?php
                                if (isset($results['sr_address2']))
                                    {
                                    echo $results['sr_address2'];
                                    }
                                ?>">									
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="line3_showroom" value="<?php
                                if (isset($results['sr_address3']))
                                    {
                                    echo $results['sr_address3'];
                                    }
                                ?>">									
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="iframe_showroom" value='<?php
                                if (isset($results["sr_map"]))
                                    {
                                    echo $results["sr_map"];
                                    }
                                ?>'>									
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Show on Homepage<span class="text-danger">*</span></label>
                            <div class="col-md-6">

                                <select id="active" name="slider_active" class="form-control">
                                    <?php
                                    if (isset($results['show']) && $results['show'] == 'yes')
                                        {
                                        $yes = 'selected';
                                        }
                                    else
                                        {
                                        $yes = '';
                                        } if (isset($results['show']) && $results['show'] == 'no')
                                        {
                                        $no = 'selected';
                                        }
                                    else
                                        {
                                        $no = '';
                                        }
                                    ?>
                                    <option <?php echo $yes; ?>  value="yes">Yes</option>
                                    <option <?php echo $no; ?> value="no">No</option>

                                </select>
                            </div>
                        </div>
                        <!--                        <div class="form-group">
                                                    <label class="col-md-3 control-label" for="slider_active">Have Multiple Showroom/Service Center<span class="text-danger">*</span></label>
                                                    <div class="col-md-6">
                        
                                                        <input type="radio" name="gender" class="service_center" value="0" checked> No<br>
                                                        <input type="radio" name="gender" class="service_center" value="1"> Yes<br>
                                                    </div>
                                                </div>-->
                        <div id="div_showroom">
                            <div class="form-group">
                                <h4><strong>Service Center 2</strong></h4>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Title<span class="text-danger"></span></label>
                                <div class="col-md-6">										 					
                                    <input type="text" class="form-control" name="s_title_2" value="<?php
                                    if (isset($results['s_title_2']))
                                        {
                                        echo $results['s_title_2'];
                                        }
                                    ?>">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                                <div class="col-md-6">										 					
                                    <input type="text" class="form-control" name="name_service_2" value="<?php
                                    if (isset($results['s_name_2']))
                                        {
                                        echo $results['s_name_2'];
                                        }
                                    ?>">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="mobile_service_2" value="<?php
                                    if (isset($results['s_mob_2']))
                                        {
                                        echo $results['s_mob_2'];
                                        }
                                    ?>">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="email_service_2"  value="<?php
                                    if (isset($results['s_email_2']))
                                        {
                                        echo $results['s_email_2'];
                                        }
                                    ?>">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line1_service_2"  value="<?php
                                    if (isset($results['s_address1_2']))
                                        {
                                        echo $results['s_address1_2'];
                                        }
                                    ?>">									
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line2_service_2" value="<?php
                                    if (isset($results['s_address2_2']))
                                        {
                                        echo $results['s_address2_2'];
                                        }
                                    ?>">									
                                </div>


                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line3_service_2" value="<?php
                                    if (isset($results['s_address3_2']))
                                        {
                                        echo $results['s_address3_2'];
                                        }
                                    ?>">									
                                </div>

                            </div>
                            <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="iframe_service_2" value='<?php
                                if (isset($results["s_map_2"]))
                                    {
                                    echo $results["s_map_2"];
                                    }
                                ?>'>									
                            </div>
                        </div>

                            <div class="form-group">
                                <h4><strong>Showroom 2</strong></h4>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Title<span class="text-danger"></span></label>
                                <div class="col-md-6">										 					
                                    <input type="text" class="form-control" name="sr_title_2" value="<?php
                                    if (isset($results['sr_title_2']))
                                        {
                                        echo $results['sr_title_2'];
                                        }
                                    ?>">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="name_showroom_2" value="<?php
                                    if (isset($results['sr_name_2']))
                                        {
                                        echo $results['sr_name_2'];
                                        }
                                    ?>" >									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="mobile_showroom_2" value="<?php
                                    if (isset($results['sr_mob_2']))
                                        {
                                        echo $results['sr_mob_2'];
                                        }
                                    ?>">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="email_showroom_2" value="<?php
                                    if (isset($results['sr_email_2']))
                                        {
                                        echo $results['sr_email_2'];
                                        }
                                    ?>">									
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line1_showroom_2" value="<?php
                                    if (isset($results['sr_address1_2']))
                                        {
                                        echo $results['sr_address1_2'];
                                        }
                                    ?>">									
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line2_showroom_2" value="<?php
                                    if (isset($results['sr_address2_2']))
                                        {
                                        echo $results['sr_address2_2'];
                                        }
                                    ?>">									
                                </div>


                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line3_showroom_2" value="<?php
                                    if (isset($results['sr_address3_2']))
                                        {
                                        echo $results['sr_address3_2'];
                                        }
                                    ?>">									
                                </div>

                            </div>
<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                            <div class="col-md-6">															
                                <input type="text" class="form-control" name="iframe_showroom_2" value='<?php
                                if (isset($results["sr_map_2"]))
                                    {
                                    echo $results["sr_map_2"];
                                    }
                                ?>'>									
                            </div>
                        </div>


                        </div>
                    </fieldset>


                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php
                        if ($results['client_image'] != '')
                            {
                            ?>
                            <img src="../<?php echo $results['thumb']; ?> ">
                        <?php } ?>
                    </div>
                </form>
                <!-- END Form Validation Example Content -->


            </div>
            <!-- END Validation Block -->
        </div>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!--<script>-->
<!--
//    $(document).ready(function () {
//        $(".service_center").change(function () {
//            var val = $(this).val();
//            if (val == 0) {
//                $("#div_showroom").slideUp('slow');
//            } else {
//                $("#div_showroom").slideDown('slow');
//            }
//        });
//    });-->
<!--</script>-->
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<?php include 'inc/template_end.php'; ?>