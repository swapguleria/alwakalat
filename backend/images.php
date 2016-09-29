<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php';
/* if(isset($_GET['del_yid']))
{
	$obj->delete_data('video','video_id',$_GET['del_yid'],'video.php');
} */
	$results	=	$obj->get_all_data('images','images_id','desc');
 ?>

<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Images<br><small></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Images</li>
      
    </ul>
    <!-- END Table Styles Header -->

    <!-- Table Styles Block -->
    <div class="block">
	<?php 
					if(isset($_SESSION['success'])){
						echo "<b style='color:red'>".$_SESSION['success']."</b>";
						unset($_SESSION['success']);
					}
				?>
        <!-- Table Styles Title -->
       
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
        
        <div class="table-responsive">
		   <div class="table-options clearfix">
           
            <a href="add_images.php"><div class="btn-group btn-group-sm pull-left">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Images">
                    Add Images
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
                        
                       
                        <th> Copy Images Path</th>
                        <th> Thumbnail</th>
                        
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($results as $value)
					{
				?>
                    <tr>
                        
                       
                        <td>images/<?php echo $value['images_name']; ?></td>
                        <td><a href="<?php echo FRONTSITEURL.'images/'.$value['images_name']; ?>"><img width="150" height="100" src="<?php echo FRONTSITEURL.'images/'.$value['images_name']; ?>" /></a></td>
                        
                    </tr>
					<?php } }else{ ?>
					<tr>No Video Here</tr>
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