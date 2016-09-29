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
			$results	=	$obj->get_all_data_user('student','register_id',$_SESSION['login']);

	if(isset($_SESSION['success']))
	{
		echo "<h3 class='feedback'>".$_SESSION['success']."</h3>";
		unset($_SESSION['success']);
	}
	if(isset($_SESSION['error']))
	{
		echo "<h3 class='feedback' style='color:red'>".$_SESSION['error']."</h3>";
		unset($_SESSION['error']);
	}
		?>
		
<div class="popup add_student_popup">
<a href="javascript:void(0)" class="cross" id="cross"><img src="images/cross-icon.png" /></a>
	<form action="process.php" method="post" id="addStudent_form" class="addStudent_form">
	 <input type="hidden" name="action" value="Add_student" class="inputbox" />
	 <input type="hidden" name="register_id" value="<?php echo $_SESSION['login'];?>" class="inputbox" />
		<div class="field1">
		      <label>Student Name:<span class="red">*</span></label>
			  <input type="text" name="student_name" class="inputbox" />
		    </div>
			<div class="field1">
		      <label>Birth Date: <span class="red">*</span></label>
			  <div class="popup_short">
			  <label>Month: <span class="red">*</span></label>
				 <select class="inputbox" name="bmonth">
					 <option value="">--select--</option>				 
					<option value='1'>January</option>
					<option value='2'>February</option>
					<option value='3'>March</option>
					<option value='4'>April</option>
					<option value='5'>May</option>
					<option value='6'>June</option>
					<option value='7'>July</option>
					<option value='8'>August</option>
					<option value='9'>September</option>
					<option value='10'>October</option>
					<option value='11'>November</option>
					<option value='12'>December</option>			  
					
				 </select>
			</div>
			<div class="popup_short">
				<label>Date: <span class="red">*</span></label>
				 <select class="inputbox" name="bdate">
					 <option value="">--select--</option>
					   <?php  for($i=1;$i<=31;$i++) 
						{  ?>
					  <option><?php echo $i; ?></option>				  
					 <?php } ?>
				 </select>
			</div>
			<div class="popup_short" style="margin-right:0px;">
				<label>Year: <span class="red">*</span></label>
				 <select class="inputbox" name="byear">
					 <option value="">--select--</option>
					   <?php  for($i=1990;$i<=2014;$i++) 
						{  ?>
					  <option><?php echo $i; ?></option>				  
					 <?php } ?>
				 </select>
			 </div>
		    </div>
			
			<div class="field1">
		      <label>Student Gender:<span class="red"></span></label>
			  <select class="inputbox" name="student_gender">
			    <option value="">--SELECT--</option>
			    <option value="male">Male</option>
			    <option value="female">Female</option>
			    
			  </select>
		    </div>
			<div class="field1">
		      <label>Age: <span class="red">*</span></label>
			  <input type="text" name="student_age" class="s1ln inputbox" />
		    </div>
			<div class="field1">
			   <input type="submit" name="submit" value="Submit" class="submti_btn" />
		    </div>



	</form>
</div>
<div class="content about">
  <div class="container">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <h1>My Student</h1>
		<!--div class="col-md-12 col-sm-12 col-xs-12">
			<button class="add_student btn btn-sm btn-default register_btn header_btns">Add New Student</button>
		</div-->
		  <div class="col-md-3 col-sm-3 col-xs-3">
			<?php $i=1; foreach($results as $value)
					{ ?>
			
				<div class="sname" id="student<?php echo $i;?>"><?php echo $value['student_name']; ?></div>
				
			  
		  <?php $i++;}?>
			</div>
			<div class="col-md-9 col-sm-9 col-xs-9">
		  <?php $i=1; foreach($results as $value)
					{ ?>
		  
		  
		  
			<div class="sinfo student<?php echo $i;?>" <?php if($i != 1){ echo "style='display:none'"; }?>>
			<table>
			<tr><td>Name :</td><td><?php echo $value['student_name']; ?></td></tr>
			<tr><td>Gender :</td><td><?php echo $value['student_gender']; ?></td></tr>
			<tr><td>Birth Date :</td><td><?php echo $obj->setdate($value['student_birthdate']); ?></td></tr>
			<tr><td>Age :</td><td><?php echo $value['student_age']; ?></td></tr>
			</table>
			
			
			
			</div>
		
			<?php $i++; } ?>
		  </div>
		<div class="blank"></div>
	  </div>
	</div>
  </div>
</div>
 
 
 
 
 <?php include 'inc/footer.php'; ?>