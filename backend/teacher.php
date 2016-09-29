<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php';
if(isset($_GET['del_tid']))
{
	$obj->delete_data('teacher','teacher_id',$_GET['del_tid'],'teacher.php');
}
	$results	=	$obj->get_all_data('teacher','teacher_id','asc');
 ?>

<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Teacher List<br><small></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Teachers</li>
      
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
           
            <a href="add_teacher.php"><div class="btn-group btn-group-sm pull-left">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Teacher">
                    Add Teacher
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
                        
                       
                        <th>Name</th>
                        <th>Text With Name</th>
                        <th>Text Below Name</th>
                        <th>Professional</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Image</th>
                        <th>Price</th>
                       
                        
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($results as $value)
					{
				?>
                    <tr>
                        
                       
                        <td><?php echo $value['teacher_name']; ?></td>
                        <td><?php echo $value['teacher_option']; ?></td>
                        <td><?php echo $value['teacher_below_text']; ?></td>
                        <?php /*<td><?php echo $value['teacher_professional']; ?></td>*/?>
						<td><?php 
							$teacher_professional = explode(',',$value['teacher_professional']);$i=0;$pro="";
							foreach($teacher_professional as $prof)
							{
								if($i>0){$pro .= ','; }
								$pro .= $obj->get_single_field('type','type_name','type_id',$prof);
							$i++;							
							}
							echo $pro;
						?></td>
						<?php /*<td><?php echo $obj->get_single_field('type','type_name','type_id',$value['teacher_professional'])	?></td> */ ?>
                        <td><?php echo $value['teacher_email']; ?></td>
                        <td><?php echo $value['teacher_active']; ?></td>
                        <td><?php if($value['teacher_image']!='') { ?>
							<img src="../<?php echo $value['teacher_thumb_path']; ?>">
						<?php }?></td>
                        <td><?php echo $value['teacher_price']; ?></td>
                        
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="edit_teacher.php?id=<?php echo $value['teacher_id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="delete_teacher('<?php echo $value['teacher_id'];?>')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
					<?php } }else{ ?>
					<tr>No Teacher Here</tr>
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