<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php';
/* if(isset($_GET['del_pid']))
{
	$obj->delete_data('pages','pages_id',$_GET['del_pid'],'pages.php');
} */
	$results	=	$obj->get_all_data('cancel_subscription','id','desc');
 ?>
 
<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Cancel Subscription Requests<br><small></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Cancel Subscription Requests</li>
      
    </ul>
    <!-- END Table Styles Header -->

    <!-- Table Styles Block -->
    <div class="block">
        <!-- Table Styles Title -->
       
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
        
        <div class="table-responsive">
		   <!--div class="table-options clearfix">
           
            <a href="add_pages.php"><div class="btn-group btn-group-sm pull-left">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add page">
                    Add Pages
			</div>
			</a>
        </div-->
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
                        
                       
                        <th>User Email</th>
                        <th>Subscription Id</th>
                        <th>Request Date</th>
                        
                       
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($results as $value)
					{
				?>
                    <tr>
                        
                       
                        <td><?php echo $value['user_email']; ?></td>
                        <td><?php echo $value['subscription_id']; ?></td>
                        
                        <td><?php echo $obj->setdate($value['date']);?></td>
                       
                    </tr>
					<?php } }else{ ?>
					<tr>No Request Here</tr>
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