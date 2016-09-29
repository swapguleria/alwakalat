<?php include 'inc/index_header.php';
/*****************Give the page title*********************/
$title =  $_SERVER['SCRIPT_NAME'];
$title1 = explode('.php',$title);
$title2 = explode('/',$title1[0]);
$title =  end($title2);

?>
<div class="title" style="display:none"><?php echo ucwords($title);?></div>

<?php if(!isset($_SESSION['login']))
			{
				$obj->locate('login');			
			}
			$results	=	$obj->get_all_data_user('register','register_id',$_SESSION['login']);
			?>
<div class="content about">
  <div class="container">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <h1>My Classes</h1>
		<form id="student_select_form" action="process.php" method="POST">
			<input type="hidden" name="action" value="Class_student" />
			<div class="field2">
			<label>Student</label>
				<select name="student_id" id="student_select">
					<option value="">All</option>
					<?php $genre	=	$obj->get_all_data_active('student','student_id','asc','register_id',$_SESSION['login']);	
					if(is_array($genre)){	
						foreach($genre as $value)	
						{	?>	
							<option <?php if($_GET['student_id'] == $value['student_id']) { echo "selected";} ?> value="<?php echo $value['student_id']; ?>"><?php echo $value['student_name']; ?></option>
					<?php }	
					}	?>
				
				<select>
				<input type="submit" style="display:none">
			</div>
		</form>
		<?php 
			$result =$obj->get_my_data('student_class',$_GET['student_id']);
			
		?>
		<div class="classes">
			<div class="table-responsive">            
			<table id="general-table" class="table table-striped table-vcenter">
                <thead>
				<?php if(is_array($result)){ ?>
                    <tr>                      
                        <th>Student Name</th>
                        <th>Session</th>
                        <th>Class</th>		
						<th>Days</th>
                        <th>Class Time</th>						
                        <th>Instructor</th>	
						<th>Studio</th>                        
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($result as $value)
					{
						$results = $obj->get_single_result('class','class_id',$value['student_class_id']);
					
				?>
                    <tr>
                        
                       
                        <td><?php echo $value['student_name']; ?></td>
                        
                        <td><?php echo $obj->get_single_field('session','session_name','session_id',$results['class_session']);	?></td>
						<td><?php echo $results['class_name'];	?></td>
                        <td><?php echo $obj->get_single_field('day','day_name','day_id',$results['class_days']);	?></td>
                        <td><?php echo $results['class_start_time'].' - '.$results['class_end_time']; ?></td>
						<td><?php echo $obj->get_single_field('teacher','teacher_name','teacher_id',$results['class_teacher']);	?></td>
						<td><?php echo $obj->get_single_field('program','program_name','program_id',$results['class_program']);	?></td>                     
                    </tr>
					<?php } }else{ ?>
					<tr>No Classes Here</tr>
                    <?php } ?>
                </tbody>
              
            </table>
        </div>
		
		
		
		</div>		   
		<div class="blank"></div>
	  </div>
	</div>
  </div>
</div>
 
 
 
 
 <?php include 'inc/footer.php'; ?>