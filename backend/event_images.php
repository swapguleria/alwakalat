<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php';
if(isset($_GET['del_sid']))
{

	$obj->delete_data('event_images','id',$_GET['del_sid'],'event_images.php?id='.$_GET["id"].'');
}
	$results	=	$obj->get_all_data_active('event_images','id','asc','event_id',$_GET["id"]);
unset($_SESSION['success']);
 ?>
<?php $obj->admin_not_login(); ?>
<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Slider<br><small></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Dashboard</li>
        <li><a href="event_images.php">Manage Event Images</a></li>
        
      
    </ul>
    <!-- END Table Styles Header -->

    <!-- Table Styles Block -->
    <div class="block">
        <!-- Table Styles Title -->
       
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
        
        <div class="table-responsive">
		   <div class="table-options clearfix">
           
            <a href="add_event_slide.php?id=<?php echo $_GET["id"];?>"><div class="btn-group btn-group-sm pull-left">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Slider">
                    Add Event Slide
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
				<?php if(is_array($results)){ ?>
                    <tr>
						<th>Slider Image</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($results as $value)
					{
				?>
                    <tr>
                        
                       
                        <td><?php if($value['image_name']!='') { ?>
							<img src="../<?php echo $value['thumb_path']; ?>">
						<?php }?></td>
                        
                        
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                               
                                <a href="event_images.php?del_sid=<?php echo $value['id'];?>&id=<?php echo $_GET["id"];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
					<?php } }else{ ?>
					<tr>No Sliders Here</tr>
                    <?php } ?>
                </tbody>
              
            </table>
        </div>
        <!-- END Table Styles Content -->
    </div>
    <!-- END Table Styles Block -->

    <!-- Row Styles Block -->
    
    <!-- END Row Styles Block -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>