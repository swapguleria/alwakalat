<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php
include 'inc/page_head.php';

if (isset($_GET['id']))
    {
    $obj->delete_data('finance', 'id', $_GET['id'], 'manage_finance.php');
    }
$results = $obj->get_all_data('finance', 'id', 'asc');

unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>


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
            <h2><strong>Add Provider</strong></h2>
        </div>
        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
        <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
            <input type="hidden" name="action" value="add_banks">

            <fieldset>
                <?php if (isset($_SESSION['success']))
                    { ?>
                    <div style="color: red; font-size: 15px;padding: 5px;"><?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?></div>
<?php } ?>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Provider <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="provider" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Content <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <textarea name="desc" id="ckeditor"></textarea>		

                    </div>
                </div>	
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Minimum Salary(in QR ) <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="minimum_salary" class="form-control">QR 

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Down Payment (%)<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="down_payment" class="form-control">%

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Monthly Payment (in QR )<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="monthly_payment" class="form-control">QR 

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Flat Rate (%)<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="flat_rate" class="form-control">%

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Reducing Rate(%)<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="reducing_rate" class="form-control">%

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Link<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="link" class="form-control">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Arabic Link<span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="arabic_link" class="form-control">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Provider Image Icon <span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="file" id="slider" name="slider">
                        </div>
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

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>List Of Provider</h2>

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
            <table id="general-table" class="table table-striped table-vcenter">
                <thead>
<?php if (is_array($results))
    { ?>
                        <tr>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Provider</th>
                            <th>Minimum Salary</th>
                            <th>Down Payment</th>
                            <th>Monthly Payment</th>
                            <th>Flat Rate</th>
                            <th>Reducing Rate</th>
                            <th style="width: 150px;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($results as $value)
                            {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><img src="../<?php echo $value['full_path']; ?>"></td>
                                <td> <?php echo $value['provider']; ?></td>
                                <td>QR  <?php echo $value['minimum_salary']; ?></td>
                                <td> <?php echo $value['down_payment']; ?>%</td>
                                <td>QR  <?php echo $value['monthly_payment']; ?></td>
                                <td><?php echo $value['flat_rate']; ?>%</td>
                                <td><?php echo $value['reducing_rate']; ?>%</td>

                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="edit_provider.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="manage_finance.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
    <?php }
    }
else
    { ?>
                        <tr>No Makers Here</tr>
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