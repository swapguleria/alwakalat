<?php include 'inc/database.php'; ?>
<?php /* $results	=	$obj->get_select_class_data('class','asc',$_GET['age'],'class_gender',$_GET['gender']); 
$result	=	$obj->get_select_camp_data('camp','asc',$_GET['age']);
 */
 $results	=	$obj->get_select_class_data('class','asc'); 
$result	=	$obj->get_select_camp_data('camp','asc');
$_SESSION['field'] = $_GET['field']; ?>
<title>DataTables example - Server-side processing</title>
	<link rel="stylesheet" type="text/css" href="datatables/media/css/jquery.dataTables.css">
	
	


	
	<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="datatables/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable(); 
} );

	</script>
<div id="page-content">
    
        <div class="table-responsive">
		   <h2>Classes</h2>
            <label>Search Class Type:</label>
            <table id="example" class="table table-striped table-vcenter" border="1" cellspacing="4">
                <thead>
				<?php if(is_array($results)){ ?>
                    <tr>
                        
                       
                        <th>Class Name</th>						                       
                        <th>Class Type</th>						                       
						<th>Instructor</th>  
						<th>Session</th>  
						<th>Gender</th>  
						<th>Age</th>	
						<th>Studio</th>
                        <!--th>Date</th-->						
                        <th>Days</th>						
                        <th>Time</th>	
                        <!--th>Seat Left</th-->	
                        <th>Action</th>	
						
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($results as $value)
					{
					
					
					
				?>
                    <tr >
                     
                       
                        <td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $value['class_name']; ?></td>
                        <td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $obj->get_single_field('type','type_name','type_id',$value['class_type']); ?></td>						                
						<td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $obj->get_single_field('teacher','teacher_name','teacher_id',$value['class_teacher']); ?></td>						                
						<td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $obj->get_single_field('session','session_name','session_id',$value['class_session']); ?></td>	
						<td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $value['class_gender']; ?></td>						
						<td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php if($value['class_ageto'] == 0 && $value['class_agefrom']  == 0){ echo 'N/A';}else {echo $value['class_agefrom'].' - '.$value['class_ageto'];}?></td>
						
						
						<td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $obj->get_single_field('program','program_name','program_id',$value['class_program']);  ?></td>								
						<?php /* <td><?php echo $value['class_start_date'].' - '.$value['class_end_date']; ?></td> */ ?>
						<td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $obj->get_single_field('day','day_name','day_id',$value['class_days']); ?></td>
						<td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $value['class_start_time'].' - '.$value['class_end_time']; ?></td>
					<?php /*	<td onclick="classinfo(<?php echo $value['class_id'];?>)"><?php echo $value['class_open']; ?></td>*/ ?>
						<td onclick="class_select('class',<?php echo $value['class_id'];?>,'<?php echo $_GET['field']; ?>','<?php echo $value['class_name']; ?>','<?php echo $obj->get_single_field('day','day_name','day_id',$value['class_days']); ?>','<?php echo $value['class_start_time'].' - '.$value['class_end_time']; ?>')" class="addthis">Add this Class</td>
						
						
                       
                    </tr>
					<?php } }else{ ?>
					<tr>No Classes Here</tr>
                    <?php } ?>
                </tbody>
              
            </table>
        </div>
		<div class="table-responsive">
		   <h2>Camps</h2>
            
            <table id="general-table" class="table table-striped table-vcenter" border="1" cellspacing="4">
                <thead>
				<?php if(is_array($result)){ ?>
                    <tr>
                        
                       
                        <th>Camp Name</th>                      
						<!--th>Preschool Camp</th-->
                        <th>Days</th>
						<th>Age</th>	
                        <th>Dates</th>						
                        <!--th>Seats Left</th-->						
                        <th>Time</th>						                        	
                        <th>Action</th>						                        	
						
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($result as $value)
					{
					
					
					
				?>
                    <tr >
                     
                       
                        <td onclick="campinfo(<?php echo $value['camp_id'];?>)"><?php echo $value['camp_name']; ?></td>                        
					<?php /*	<td onclick="campinfo(<?php echo $value['camp_id'];?>)"><?php echo $value['camp_preschool']; ?></td>*/?>
                         <td onclick="campinfo(<?php echo $value['camp_id'];?>)"><?php echo $obj->get_single_field('day','day_name','day_id',$value['camp_days']);  ?></td>
						<td onclick="campinfo(<?php echo $value['camp_id'];?>)"><?php echo $value['camp_agefrom'].' - '.$value['camp_ageto']; ?></td>
						<td onclick="campinfo(<?php echo $value['camp_id'];?>)"><?php echo $obj->setdate($value['camp_start_date']).' - '.$obj->setdate($value['camp_end_date']); ?></td>
                        <?php /*<td onclick="campinfo(<?php echo $value['camp_id'];?>)"><?php echo $value['camp_seat']; ?></td>*/ ?>
                        <td onclick="campinfo(<?php echo $value['camp_id'];?>)"><?php echo $value['camp_start_time'].' - '.$value['camp_end_time']; ?></td>
                        <td onclick="class_select('camp',<?php echo $value['camp_id'];?>,'<?php echo $_GET['field']; ?>','<?php echo $value['camp_name']; ?>','<?php echo $obj->get_single_field('day','day_name','day_id',$value['camp_days']); ?>','<?php echo $value['camp_time']; ?>')" class="addthis">Add this Camp</td>
                    </tr>
					<?php } }else{ ?>
					<tr>No Camps Here</tr>
                    <?php } ?>
                </tbody>
              
            </table>
        </div>
</div>

