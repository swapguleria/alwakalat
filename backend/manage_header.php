<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 
if(isset($_GET['del_id']))
{
	$obj->delete_data('social_links','id',$_GET['del_id'],'manage_header.php');
}

	$logo	=	$obj->get_single_result('logo','id','1');
	$social	=	$obj->get_all_data('social_links','id','desc');
?>
<?php $obj->admin_not_login(); ?>


<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Header<br><small>A clean page to help you start!</small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

		<li>Dashboard</li>
		
        <li><a href="">Manage Header</a></li>

    </ul>

    <!-- END Blank Header -->



    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>Header Content</h2>

        </div>

        <!-- END Example Title -->



        <!-- Example Content -->

			<form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
			<input type="hidden" name="action" value="edit_logo">
              <input type="hidden" name="slider_id" value="<?php echo $logo['id']; ?>">
              <input type="hidden" name="slider_name1" value="<?php echo $logo['name']; ?>">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo"> Logo Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div>												
						
               
                   
                    
					<div class="form-group">
					<?php if($logo['name'] !='') {?>
							<img src="../<?php echo $logo['full_path'];?> ">
					<?php } ?>
					</div>
					<div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                           
                        </div>
                    </div>
                </form>
			</div>
<div class="block">			
				<div class="table-responsive">
				   <div class="table-options clearfix">
				   
					<a href="add_link.php"><div class="btn-group btn-group-sm pull-left">
						<label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Slider">
							Add Social Link
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
				<?php if(is_array($social)){ ?>
                    <tr>
						<th>Social Icon</th>
						<th>Address</th>
                        <th>Active</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($social as $value)
					{
				?>
                    <tr>
                        
                       
                        <td><?php if($value['name']!='') { ?>
							<img src="../<?php echo $value['full_path']; ?>">
						<?php }?></td>
                        <td><?php echo $value['address']; ?></td>
                        <td><?php echo $value['active']; ?></td>
                        
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="edit_links.php?id=<?php echo $value['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="manage_header.php?del_id=<?php echo $value['id'];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
					<?php } }else{ ?>
					<tr>No data Here</tr>
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