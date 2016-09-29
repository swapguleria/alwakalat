<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 
if(isset($_GET['del_id']))
{
	$obj->delete_data('video_links','id',$_GET['del_id'],'manage_videos.php');
}

	$video	=	$obj->get_all_data('video_links','id','desc');
?>

<?php $obj->admin_not_login(); ?>

<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Videos

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li><a href="manage_videos.php">Manage Videos</a></li>

    </ul>

    <!-- END Blank Header -->



    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->
<div class="block">			
				<div class="table-responsive">
				   <div class="table-options clearfix">
				   
					<a href="add_video_link.php"><div class="btn-group btn-group-sm pull-left">
						<label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Video Link">
							Add Video Link
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
				<?php if(is_array($video)){ ?>
                    <tr>
						<th>Video Link</th>
						<th>Title</th>
						<th>Duration</th>
                        <th style="width: 150px;" class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($video as $value)
					{
				?>
                    <tr>
                        <td><?php echo $value['address']; ?></td>
                        <td><?php echo $value['title']; ?></td>
						<td><?php echo $value['duration']; ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
								<a href="manage_videos.php?del_id=<?php echo $value['id'];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
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