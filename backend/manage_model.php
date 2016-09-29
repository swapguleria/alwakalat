<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php
include 'inc/page_head.php';

if (isset($_GET['del_id']))
    {
    $obj->delete_data('model', 'model_id', $_GET['del_id'], 'manage_model.php');
    }
$results = $obj->get_all_data('maker', 'id', 'ASC');
$result_model = $obj->get_all_data('model', 'model_id', 'ASC');

if (isset($_GET['id']))
    {
    $model = $obj->get_single_result('model', 'model_id', $_GET['id']);
    $action = 'edit_model';
    }
else
    {
    $action = 'add_model';
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

        <li><a href="">Manage Model</a></li>

    </ul>

    <!-- END Blank Header -->
    <div class="block">
        <!-- Form Validation Example Title -->
        <div class="block-title">
            <h2><strong>Add Model</strong></h2>
        </div>
        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
        <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
            <input type="hidden" name="action" value="<?php echo $action; ?>">
            <input type="hidden" name="model_id" value="<?php
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
                    <div style="color: red; font-size: 15px;padding: 5px;"><?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?></div>
<?php } ?>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Model <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <input type="text" name="model" class="form-control" value="<?php
                        if (isset($model['model_name']))
                            {
                            echo $model['model_name'];
                            }
                        ?>">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="logo">Maker <span class="text-danger">*</span></label>
                    <div class="col-md-6">

                        <select name="maker" class="form-control">
                            <option value="">Select Maker</option>
                            <?php
                            foreach ($results as $maker)
                                {
                                ?>

                                <option value="<?php echo $maker['id']; ?>"  <?php
                                if ($model['maker_id'] == $maker['id'])
                                    {
                                    echo "selected";
                                    }
                                ?>><?php echo $maker['name']; ?></option>
<?php } ?>
                        </select>

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

            <h2>List Of Model</h2>

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
<?php
if (is_array($results))
    {
    ?>
                        <tr>
                            <th>S.No</th><th>Maker</th>
                            <th>Model</th>

                            <th style="width: 150px;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($result_model as $value)
                            {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>

                                <td><?php echo $obj->get_single_field('maker', 'name', 'id', $value['maker_id']); ?></td>
                                <td><?php echo $value['model_name']; ?></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="manage_model.php?id=<?php echo $value['model_id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="manage_model.php?del_id=<?php echo $value['model_id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    else
                        {
                        ?>
                        <tr>No Model Here</tr>
<?php } ?>
                </tbody>

            </table>
        </div>
        <!-- END Example Content -->

    </div>

    <!-- END Example Block -->

</div>

<!-- END Page Content -->



<?php
include 'inc/page_footer.php';

include 'inc/template_scripts.php';
include 'inc/template_end.php';
?>
