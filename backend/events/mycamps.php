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
	    <h1>My Camps</h1>
		<form id="student_select_form" action="process.php" method="POST">
			<input type="hidden" name="action" value="Camp_student" />
			<div class="field2">
				<label>Student</label>
				<select name="student_id" id="student_select">
					<option value="0">All</option>
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
		
			$result =$obj->get_my_data('student_camp',$_GET['student_id']);
			
		?>
		<div class="classes">
			<div class="table-responsive">            
			<table id="general-table" class="table table-striped table-vcenter">
                <thead>
				<?php if(is_array($result)){ ?>
                    <tr>                      
                        <th>Student Name</th>
                        <th>Camp</th>
                        <th>Start Date</th>	
						<th>End Date</th>										
                        <th>Camp Time</th>						
                        <!--th>Preschool Camp</th-->	                       
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($result as $value)
					{ $results = $obj->get_single_result('camp','camp_id',$value['student_camp_id']);
				?>
                    <tr>
                        
                       
                       <td><?php echo $value['student_name']; ?></td>
                       <td><?php echo $results['camp_name'];	?></td>
                        <td><?php echo $obj->setdate($results['camp_start_date']); ?></td>
                        <td><?php echo $obj->setdate($results['camp_end_date']); ?></td>
                        <td><?php echo $results['camp_start_time'].' - '.$results['camp_end_time']; ?></td>
                     <?   /* <td><?php echo $results['camp_preschool']; ?></td> */?>
						    
                        
                    </tr>
					<?php } }else{ ?>
					<tr>No Camps Here</tr>
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
 
 
 <script>
	$('#student_select').change(function () {
		$('#student_select_form').submit();
	});
 
 </script>
 
 <?php include 'inc/footer.php'; ?>