<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php';
if(isset($_GET['del_cid']))
{
	$obj->delete_data('camp','camp_id',$_GET['del_cid'],'camp.php');
}
	$results	=	$obj->get_all_data('camp','camp_id','desc');
 ?>

<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Camps<br><small></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Camps</li>
      
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
           
            <a href="add_camp.php"><div class="btn-group btn-group-sm pull-left">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Class">
                    Add Camp
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
                        
                       
                        <th>Camp Name</th>
                        <th>Days</th>
						<th>Age</th>	
                        <th>Dates</th>						
                        <th>Time</th>						                       
                        <th>Seats</th>						                       
						 <th>Preschool</th> 
                        <th>Active</th>
                        
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($results as $value)
					{
				?>
                    <tr>
                        
                       
                        <td><?php echo $value['camp_name']; ?></td>
                         <td><?php echo $obj->get_single_field('day','day_name','day_id',$value['camp_days']);  ?></td>
						<td><?php echo $value['camp_agefrom'].' - '.$value['camp_ageto']; ?></td>
						<td><?php echo $obj->setdate($value['camp_start_date']).' - '.$obj->setdate($value['camp_end_date']); ?></td>
                        <td><?php echo $value['camp_start_time'].' - '.$value['camp_end_time']; ?></td>
						<td><?php echo $value['camp_seat']; ?></td>	   
						<td><?php echo $value['camp_preschool']; ?></td>	   
						<td><?php echo $value['camp_active']; ?></td>    
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="edit_camp.php?id=<?php echo $value['camp_id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="delete_camp('<?php echo $value['camp_id'];?>')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
					<?php } }else{ ?>
					<tr>No Camps Here</tr>
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