<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 

	if(isset($_GET['id']))
	{
		$obj->delete_data('category','c_id',$_GET['id'],'manage_shop_category.php');
	}
	$results	=	$obj->get_all_data('category','c_id','asc');
	
	unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>


<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Shop Category<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Manage  shop category</a></li>

    </ul>

    <!-- END Blank Header -->
	<div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Add Category</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="add_shop_category">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red; font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        
                                                <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Category Name <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="cat_name" class="form-control">
								
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

            <h2>List Of Shop Category</h2>

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
				<?php if(is_array($results)){ ?>
                    <tr>
						<th>C_Id</th>
						<th>Cat Name</th>
                                                
                                                
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
				//$i=0;
					foreach($results as $value)
					{ //$i++;
				?>
                    <tr>
						<td><?php echo $value['c_id']; ?></td>
                                                
                        <td><?php echo $value['cat_name']; ?></td>
                        
                        
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <!--<a href="edit_shop_category.php?id=<?php echo $value['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>-->
                                <a href="manage_shop_category.php?id=<?php echo $value['c_id'];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
					<?php } }else{ ?>
					<tr>No Shop Category Here</tr>
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