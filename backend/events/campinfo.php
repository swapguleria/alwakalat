<?php include 'inc/database.php'; 
 $value	=	$obj->get_single_result('camp','camp_id',$_GET['id']); ?>
	<div id="page-content">
		<div class="table-responsive">
            
            <table id="general-table" class="table table-striped table-vcenter" border="1" cellspacing="4">
                
				
                    <tr >
                        <td colspan=2><b>Camp Info </b></td>
                    </tr>
					<tr>
                        <td>Camp Name</td> 	
						<td ><?php echo $value['camp_name']; ?></td>  
					</tr>
					<tr>
						<td>Preschool Camp</td>
						<td><?php echo $value['camp_preschool']; ?></td>
                    </tr>
					<tr>
						<td>Days</td>
						<td ><?php echo $obj->get_single_field('day','day_name','day_id',$value['camp_days']);  ?></td>
					</tr>
					<tr>
						<td>Age</td>	
						<td ><?php echo $value['camp_agefrom'].' - '.$value['camp_ageto']; ?></td>
                    </tr>
					<tr>
						<td>Dates</td>	
						<td ><?php echo $obj->setdate($value['camp_start_date']).' - '.$obj->setdate($value['camp_end_date']); ?></td>
                    </tr>
					<tr>
						<td>Time</td>	
						<td><?php echo $value['camp_start_time'].' - '.$value['camp_end_time']; ?></td>					
                    </tr>
					<tr >
                        <td colspan=2 onclick="class_select('camp',<?php echo $value['camp_id'];?>,'<?php echo $_SESSION['field']; ?>','<?php echo $value['camp_name']; ?>','<?php echo $obj->get_single_field('day','day_name','day_id',$value['camp_days']); ?>','<?php echo $value['camp_start_time'].' - '.$value['camp_end_time']; ?>')" class="addthis">Add this Camp</td>
                    </tr>
					
                
              
            </table>
        </div>
</div>
	