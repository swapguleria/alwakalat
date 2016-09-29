<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 

	if(isset($_GET['id']))
	{
		$obj->delete_data('providers','id',$_GET['id'],'providers.php');
	}
	$results	=	$obj->get_all_data('providers','id','desc');
	
	unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>


<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Providers<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Providers Section</a></li>

    </ul>

    <!-- END Blank Header -->



    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>Providers</h2>

        </div>

        <!-- END Example Title -->



        <!-- Example Content -->

       <div class="table-responsive">
		   <div class="table-options clearfix">
           
            <a href="add_providers.php"><div class="btn-group btn-group-sm pull-left">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Slider">
                    Add  Provider
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
            <table id="example-datatable" class="table table-striped table-vcenter">
                <thead>
				<?php if(is_array($results)){ ?>
                    <tr>
						<th>Image</th>
						<th>Provider Name</th>
                        <th>Show on Homepage</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($results as $value)
					{
				?>
                    <tr>
                        
                       
                        <td><?php if($value['provider_image']!='') { ?>
							<img src="../<?php echo $value['thumb']; ?>">
						<?php }?></td>
                        
                        <td><?php echo $value['provider_name']; ?></td>
                        <td><?php echo $value['show']; ?></td>
                        
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="edit_providers.php?id=<?php echo $value['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="providers.php?id=<?php echo $value['id'];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
					<?php } }else{ ?>
					<tr>No Provider Here</tr>
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