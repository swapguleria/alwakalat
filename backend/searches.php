<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php
include 'inc/page_head.php';

if (isset($_GET['id']))
    {
    $obj->delete_data('searches', 'id', $_GET['id'], 'searches.php');
    }
$results = $obj->get_all_data('searches', 'order', 'asc');

unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>


<!-- Page content -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">   
<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Search<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Top 10 Search Section</a></li>

    </ul>

    <!-- END Blank Header -->



    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>Top 10 Searchs</h2>

        </div>

        <!-- END Example Title -->



        <!-- Example Content -->

        <div class="table-responsive">
            <div class="table-options clearfix">

                <a href="add_search.php"><div class="btn-group btn-group-sm pull-left">
                        <label id="style-default" class="btn btn-primary active" >
                            Add Top Search 
                    </div>
                </a>
            </div>
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
                    <?php
                    if (is_array($results))
                        {
                        ?>
                        <tr>
                            <th colspan="2" style="width:">Order</th>
                            <th>Image</th>
                            <th>Search Name</th>
                            <th style="width: 150px;" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($results as $value)
                            {
                            ?>
                            <tr id="set_<?php echo $value['id']?>" class="sortablehandler">
                                <td class="handle" style="cursor: move; width: 20px;"><i class=" fa fa-th fa-2x"></i></td>
                                <td><?php echo $value['order']+1; ?></td>

                                <td><?php
                                    if ($value['search_image'] != '')
                                        {
                                        ?>
                                        <img src="http://alwakalat.com/timthumb/timthumb.php?w=117&h=115&src=http://alwakalat.com/<?php echo $value['full_path']; ?>" >
                                        <!--<img src="../<?php echo $value['full_path']; ?>">-->
                                    <?php } ?></td>

                                <td><?php echo strtoupper($obj->get_single_field('maker', 'name', 'id', $value['maker_id'])); ?>
                                    <?php // echo $value['search_name']; ?></td>
                                

                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="edit_search.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="searches.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    else
                        {
                        ?>
                        <tr>No search Here</tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
        <!-- END Example Content -->

    </div>

    <!-- END Example Block -->

</div>

<!-- END Page Content -->

<script type="text/javascript">
    $(document).ready(function () {
        $("#tbody").sortable({
            handle: '.handle',
            axis: 'y',
            update: function (event, ui) {
                var Order = $(this).sortable('serialize');
//                alert(Order);

//                var dataString = 'Order=' + Order + '&action=order';

                $.ajax
                        ({
                            type: "POST",
                            url: "get_model.php",
                            data: Order,
                            cache: false,
                            success: function (html)
                            {
                             window.location.reload();
                            }
                        });

            }
        });
        $("#tbody").disableSelection();
    });//ready
</script>

<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>