<?php include 'inc/database.php'; ?>
<?php $value	=	$obj->get_single_result('class','class_id',$_GET['id']);
	?>
	<div id="page-content">
    
        <div class="table-responsive">
		 
            
            <table id="general-table" class="table table-striped table-vcenter" border="1" cellspacing="4">
					<tr >
                        <td colspan=2><b>Class Info </b></td>
                    </tr>
                    <tr>                      
                        <td>Class Name</td>	
						<td><?php echo $value['class_name']; ?></td>
					</tr>
                    <tr>                      
                        <td>Summary</td>
						<td><?php echo $value['class_summary']; ?></td>
					</tr>
                    <tr>                      
                        <td>Type</td>	
						<td><?php echo $value['class_type']; ?></td>
					</tr>
                    <tr>                      
                        <td>Genre</td>		
						<td><?php echo $obj->get_single_field('genre','genre_name','genre_id',$value['class_genre']); ?></td>
					</tr>
                    <tr>
						<td>Instructor</td>
						<td><?php echo $obj->get_single_field('teacher','teacher_name','teacher_id',$value['class_teacher']); ?></td>
					</tr>
                    <tr>
						<td>Seat Left</td>  
						<td><?php echo $value['class_open']; ?></td>
					</tr>
                    <tr>
						<td>Session</td> 
						<td><?php echo $obj->get_single_field('session','session_name','session_id',$value['class_session']); ?></td>	
					</tr>
                    <tr>
						<td>Gender</td> 
						<td><?php echo $value['class_gender']; ?></td>
					</tr>
                    <tr>
						<td>Age</td>
						<td><?php if($value['class_ageto'] == 0 && $value['class_agefrom']  == 0){ echo 'N/A';}else {echo $value['class_agefrom'].' - '.$value['class_ageto'];}?></td>
					</tr>
                    <tr>
						<td>Studio</td>
						<td ><?php echo $obj->get_single_field('program','program_name','program_id',$value['class_program']);  ?></td>
					</tr>
                    <tr>						
                        <td>Days</td>	
						<td><?php echo $obj->get_single_field('day','day_name','day_id',$value['class_days']); ?></td>
					</tr>
                    <tr>
                        <td>Time</td>
						<td><?php echo $value['class_start_time'].' - '.$value['class_end_time']; ?></td>
					</tr>
                    <tr >
                        <td colspan=2 onclick="class_select('class',<?php echo $value['class_id'];?>,'<?php echo $_SESSION['field']; ?>','<?php echo $value['class_name']; ?>','<?php echo $obj->get_single_field('day','day_name','day_id',$value['class_days']); ?>','<?php echo $value['class_start_time'].' - '.$value['class_end_time']; ?>')" class="addthis">Add this Class</td>
                    </tr>
                </thead>
                <tbody>
				
                </tbody>
              
            </table>
        </div>
	</div>
	