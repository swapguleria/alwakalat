<?php include 'inc/index_header.php';

	if(isset($_SESSION['login'])){
		$obj->locate('myaccount');
	}

/*****************Give the page title*********************/
$title =  $_SERVER['SCRIPT_NAME'];
$title1 = explode('.php',$title);
$title2 = explode('/',$title1[0]);
$title =  end($title2);

?>
<div class="title" style="display:none"><?php echo ucwords($title);?></div>



<div class="popup">
<a href="javascript:void(0)" class="cross" id="cross"><img src="images/cross-icon.png" /></a>
<div class="result1"></div>
</div>

<div class="overlay1" id="popup2" style="display:none;"></div>
<div class="popup1">
<a href="javascript:void(0)" class="cross1" id="cross2"><img src="images/cross-icon.png" /></a>
<div class="result2"></div>
</div>

<div class="content about">
<?php 
	if(isset($_SESSION['error'])){
		echo "<h4 style='color:red;padding:0 20px'>".$_SESSION['error']."</h4>";
		unset($_SESSION['error']);
	}
?>
  <div class="container">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <h1>registration form</h1>
		<form action="process.php" method="post" id="register_form" class="register_form">
		 <input type="hidden" name="action" value="Registration" class="inputbox" />
		
		<div class="blank3"></div>
        <h4 class="underline">Student #1 Information:</h4>
        <br />
        <div class="row">
		  <div class="col-md-5 col-sm-5 col-xs-12">
		    <div class="field1">
		      <label>Student's Name: <span class="red">*</span></label>
			  <input type="text" name="student_firstname" class="student_firstname inputbox" />
		    </div>
			<div class="field1">
		      <label>Student Gender:<span class="red">*</span></label>
			  <select class="inputbox student_gender" name="student_gender">
			    <option value="">--SELECT--</option>
			    <option value="Male">Male</option>
			    <option value="Female">Female</option>
			    
			  </select>
		    </div>
			
			<div class="field1">
		      <label>Parent's Name:<span class="red">*</span></label>
			  <input type="text" name="student_parent_name" class="inputbox" />
		    </div>
			<div class="field1">
		      <label>Home Phone: <span class="red">*</span></label>
			  <input type="text" name="register_phone" class="inputbox" />
		    </div>
			
			<div class="field1">
		      <label>Parent's E-Mail Address: <span class="red">*</span></label>
			  <input type="text" name="student_parent_email" class="inputbox" />
		    </div>
			<div class="field1">
		      <label>Mother's Place of Employment : <span class="red"></span></label>
			  <input type="text" name="student_mother_employment" class="inputbox" />
		    </div>
			<div class="field1">
		      <label>Mother's Cell No.: </label>
			   <input type="text" name="student_mother_cellno" class="inputbox" />
		    </div>
			<div class="field1">
		      <label>Father's Place of Employment : <span class="red"></span></label>
			  <input type="text" name="student_father_employment" class="inputbox" />
		    </div>
			<div class="field1">
		      <label>Father's Cell No.: </label>
			   <input type="text" name="student_father_cellno" class="inputbox" />
		    </div>
			<!--div class="field1"> 
				<label>How many month you want to Attend the class(1-12) </label>
				<input type="text" name="attend_month" id="attend_month" class="inputbox" placeholder="1-12" />					
			</div-->
		  </div>
		  
		  <div class="col-md-5 col-sm-5 col-xs-12 col-sm-push-2">
		  
		    <div class="field1">
		      <label>Age: <span class="red">*</span></label>
			  <input type="text" name="student_age" class="s1ln inputbox" />
		    </div>
			<div class="field1">
		      <label>Student's T-Shirt Size: <span class="red">*</span></label>
			  <input type="text" name="student_tshirt_size" class="inputbox" />
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
		      <label>Address: <span class="red">*</span></label>
			  <textarea name="register_address" rows="3" cols="5" class="inputbox"></textarea>
		    </div>
			
			<div class="field1">
		      <label>Mother's Work No.: </label>
			   <input type="text" name="student_mother_workno" class="inputbox" />
		    </div>
			<div class="field1">
			  <div class="short">
			    <label>City:<span class="red">*</span></label>
			    <input type="text" name="register_city" class="inputbox" />
			  </div>
			  <div class="short">
			    <label>State:<span class="red">*</span></label>
			    <select class="inputbox" name="register_state">
			     <option value="">--select--</option>
				  <option>AK</option>
				  <option>AL</option>
				  <option>AR</option>
				  <option>AZ</option>
				  <option>CA</option>
				  <option>CO</option>
				  <option>CT</option>
				  <option>DC</option>
				  <option>DE</option>
				  <option>FL</option>
				  <option>GA</option>
				  <option>HI</option>
				  <option>IA</option>
				  <option>ID</option>
				  <option>IL</option>
				  <option>IN</option>
				  <option>KS</option>
				  <option>KY</option>
				  <option>LA</option>
				  <option>MA</option>
				  <option>MD</option>
				  <option>ME</option>
				  <option>MI</option>
				  <option>MN</option>
				  <option>MO</option>
				  <option>MS</option>
				  <option>MT</option>
				  <option>NE</option>
				  <option>NC</option>
				  <option>ND</option>
				  <option>NH</option>
				  <option>NJ</option>
				  <option>NM</option>
				  <option>NY</option>
				  <option>NV</option>
				  <option>OH</option>
				  <option>OK</option>
				  <option>OR</option>
				  <option>PA</option>
				  <option>RI</option>
				  <option>SC</option>
				  <option>SD</option>
				  <option>TN</option>
				  <option>TX</option>
				  <option>UT</option>
				  <option>VA</option>
				  <option>VT</option>
				  <option>WA</option>
				  <option>WI</option>
				  <option>WV</option>
				  <option>WY</option>
				  <option>PR</option>
				  <option>VI</option>
			    </select>
			  </div>
			  <div class="short">
			    <label>Zip:<span class="red">*</span></label>
			    <input type="text" name="register_zip" class="inputbox" />
			  </div>
		    </div>
			<div class="field1">
		      <label>Father's Work No.: </label>
			   <input type="text" name="student_father_workno" class="inputbox" />
		    </div>
			<div class="blnk">
			</div>
			
			
		  </div>
		 
		  <div class="col-md-12 col-sm-12 col-xs-12">
			
				
			<div class="field1">
		      <label class="underline">I WISH TO TAKE THE FOLLOWING:   (Please indicate camp, class name, days, and time)</label>
			  <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_1"  />
				<input type="hidden" name="student_class_id_1"  />
				<input type="text" name="student_class_1" id="s1search1" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search1 btn btn-sm btn-default form_btn" data-gender="student_gender" data-iname="s1search1" data-bdate="student_birth" data-sfn="student_firstname" onclick="select('s1search1')">Select class or camp</a>
			  </div>
			   <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_2"  />
				<input type="hidden" name="student_class_id_2"  />
				<input type="text" name="student_class_2" id="s1search2" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search2 btn btn-sm btn-default form_btn"  data-gender="student_gender" data-iname="s1search2" data-bdate="student_birth" data-sfn="student_firstname" data-sln="s1ln" onclick="select('s1search2')">Select class or camp</a>
				
			  </div>
			   <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_3"  />
				<input type="hidden" name="student_class_id_3"  />
				<input type="text" name="student_class_3" id="s1search3" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search3 btn btn-sm btn-default form_btn"  data-gender="student_gender" data-iname="s1search3" data-bdate="student_birth" data-sfn="student_firstname" onclick="select('s1search3')">Select class or camp</a>
				
			  </div>
			   <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_4"  />
				<input type="hidden" name="student_class_id_4" />
				<input type="text" name="student_class_4" id="s1search4" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search4 btn btn-sm btn-default form_btn"  data-gender="student_gender" data-iname="s1search4" data-bdate="student_birth" data-sfn="student_firstname" onclick="select('s1search4')">Select class or camp</a>
				
			  </div>
			  <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_5"  />
				<input type="hidden" name="student_class_id_5" />
				<input type="text" name="student_class_5" id="s1search5" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search5 btn btn-sm btn-default form_btn"  data-gender="student_gender" data-iname="s1search5" data-bdate="student_birth" data-sfn="student_firstname" onclick="select('s1search5')">Select class or camp</a>
				
			  </div>
			   <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_6"  />
				<input type="hidden" name="student_class_id_6"  />
				<input type="text" name="student_class_6" id="s1search6" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search6 btn btn-sm btn-default form_btn"  data-gender="student_gender" data-iname="s1search6" data-bdate="student_birth" data-sfn="student_firstname" onclick="select('s1search6')">Select class or camp</a>
				
			  </div>
			   <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_7"  />
				<input type="hidden" name="student_class_id_7"  />
				<input type="text" name="student_class_7" id="s1search7" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search7 btn btn-sm btn-default form_btn"  data-gender="student_gender" data-iname="s1search7" data-bdate="student_birth" data-sfn="student_firstname" onclick="select('s1search7')">Select class or camp</a>
				
			  </div>
			  
			  <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_8"  />
				<input type="hidden" name="student_class_id_8"  />
				<input type="text" name="student_class_8" id="s1search8" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search8 btn btn-sm btn-default form_btn"  data-gender="student_gender" data-iname="s1search8" data-bdate="student_birth" data-sfn="student_firstname" onclick="select('s1search8')">Select class or camp</a>
				
			  </div>
			  
			  <div class="sclass">
			    <label>Class or Camp, Day(s) / Time </label>
				<input type="hidden" name="student_class_name_9"  />
				<input type="hidden" name="student_class_id_9"  />
				<input type="text" name="student_class_9" id="s1search9" class="inputtext1" />
				<a href="javascript:void(0)" class="s1search9 btn btn-sm btn-default form_btn"  data-gender="student_gender" data-iname="s1search9" data-bdate="student_birth" data-sfn="student_firstname" onclick="select('s1search9')">Select class or camp</a>
				
			  </div>
			  
			</div>
			
		  </div>
		    <div class="col-md-5 col-sm-6 col-xs-12">
			
		     <div class="field1">
		      <label class="underline">PRIVATE LESSONS:</label>
			  <h4>Contact instructor for specific time slot</h4>
			 <?php /* <div class="sclass">
			   <div class="privat"> <label>Private Voice - Instructor</label></div>
				<select class="slect inputbox" name="register_teacher_voice">
			     <option value="">--Select--</option>
					<?php $genre	=	$obj->get_all_data_active_from_teacher('teacher','teacher_name','asc','teacher_active','yes','teacher_professional','voice');	
					if(is_array($genre)){	
						foreach($genre as $value)	
						{	?>	
							<option value="<?php echo $value['teacher_id']; ?>"><?php echo $value['teacher_name']; ?></option>
					<?php }	
					}	?>     
				</select>
					
			  </div>
			   <div class="sclass">
			    <div class="privat"><label>Private Dance - Instructor </label></div>
				<select class="slect inputbox" name="register_teacher_dance">
			    <option value="">--Select--</option>
					<?php $genre	=	$obj->get_all_data_active_from_teacher('teacher','teacher_name','asc','teacher_active','yes','teacher_professional','dance');	
					if(is_array($genre)){	
						foreach($genre as $value)	
						{	?>	
							<option value="<?php echo $value['teacher_id']; ?>"><?php echo $value['teacher_name']; ?></option>
					<?php }	
					}	?>
				</select>
					
			  </div>
			   <div class="sclass">
			    <div class="privat"><label>Private Acting - Instructor</label></div>
				<select class="slect inputbox" name="register_teacher_acting">
			     <option value="">--Select--</option>
					<?php $genre	=	$obj->get_all_data_active_from_teacher('teacher','teacher_name','asc','teacher_active','yes','teacher_professional','acting');	
					if(is_array($genre)){	
						foreach($genre as $value)	
						{	?>	
							<option value="<?php echo $value['teacher_id']; ?>"><?php echo $value['teacher_name']; ?></option>
					<?php }	
					}	?>
				</select>
					
			  </div>
			   <div class="sclass">
			    <div class="privat"><label>Private Piano - Instructor</label></div>
				 <select class="slect inputbox" name="register_teacher_piano">
				  <option value="">--Select--</option>
					<?php $genre	=	$obj->get_all_data_active_from_teacher('teacher','teacher_name','asc','teacher_active','yes','teacher_professional','piano');	
					if(is_array($genre)){	
						foreach($genre as $value)	
						{	?>	
							<option value="<?php echo $value['teacher_id']; ?>"><?php echo $value['teacher_name']; ?></option>
					<?php }	
					}	?>
				</select>
					
				
			  </div>
			  
			  <?php */
					$private = $obj->get_all_data('private_class_price','private_class_name','asc');
			  
			  foreach($private as $value) {
			  ?>
			   <div class="sclass">
			    <div class="privat"><label>Private <?php echo $obj->get_single_field('type','type_name','type_id',$value['private_class_name']); ?> - Instructor</label></div>
				 <select class="slect inputbox" name="<?php echo 'register_teacher_'.$obj->get_single_field('type','type_use_name','type_id',$value['private_class_name']); ?>">
				  <option value="">--Select--</option>
					<?php $genre	=	$obj->get_all_data_active_from_teacher('teacher','teacher_name','asc','teacher_active','yes','teacher_professional',$value['private_class_name']);	
					if(is_array($genre)){	
						foreach($genre as $value)	
						{	?>	
							<option value="<?php echo $value['teacher_id']; ?>"><?php echo $value['teacher_name']; ?></option>
					<?php }	
					}	?>
				</select>
					
				
			  </div>
			  
			  <?php }
			  ?>
			  
			  
		    </div>
			</div>
		  

		  
        </div>

        <div class="blank3"></div>
        
		
		
        <br />

        <div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
		    <div class="blank3"></div>
           <?php $enroll	=	$obj->get_single_result('enroll_fee','enroll_id','1');
		   ?>
			<p class="margint" style="margin: 0 auto;font-weight:600;max-width:912px;text-align:center"><?php echo $enroll['text'];?> <br /><u><?php echo $enroll['underline_text'];?></u></p>
			
			<br />
			<!--h5 class="margint">You can mail this form to:  <strong>Theatre Arts, Inc.;  2034 West Houston;   Broken Arrow, OK  74012</strong></h5>
			<div class="blank3"></div-->
			
			<div class="txt1"><h5 style="float:left;margin-right:3px;">I, the undersigned parent/guardian </h5><input type="text" class="inputtext" name="register_gaurdain"> </div>
			<div class="txt2"><h5 style="float:left;margin-right:3px;">, authorize</h5> <input type="text" class="inputtext" name="register_authorize"></div>
			<div class="txt2">
<h5 style="float:left;margin-right:3px;">(Phone # </h5><input type="text" class="inputtext" name="register_authorize_phone"></div><div class="txt3"><h5 style="float:left;margin-right:3px;">) to pick up my student at Theatre Arts.</h5></div>
			
			<br />
			<br />
	<?php $regtext = $obj->get_single_result('regtext','id',1); ?>
			<p class="margint" style="clear:both;"><?php echo $regtext['p1'];?> </p>
			
			<br />
			
			<p class="margint"><?php echo $regtext['p2'];?></p>
			
			<br />
			
			<p class="margint"><?php echo $regtext['p3'];?></p>
			
		  </div>
        </div> 

        <div class="row">
		  <div class="col-md-5 col-sm-5 col-xs-12">
		    <div class="field1">
			<input type="text" class="inputtext1" name="register_parents_signature"><br />
		      <label>Parent or Guardian's Signature </label>
			  
		    </div>
		  </div>
		  <div class="col-md-5 col-sm-5 col-xs-12 col-sm-push-2">
		     <div class="field1">
			<input type="text" class="register_date inputtext" name="register_date" ><br />
		      <label>Date </label>
			  
		    </div>
		  </div>
        </div>
		<div class="row">
		  <div class="col-md-5 col-sm-5 col-xs-12">
		    <div class="field1">
			<label>Check box if previously attended Theatre Arts. </label>
			<input type="checkbox" class="inputtext" name="register_before">  
		    </div>
		  </div>
		  <!--div class="col-md-5 col-sm-5 col-xs-12 col-sm-push-2">
		     <div class="field1">
			  <h5><b>Question?</b>Please call <b>(918) 258-2543 </b> <br /><br />or e-mail <strong>info@theatreartstulsa.com</strong></h5>
			</div>
		  </div-->
        </div>
		<div class="row">
		  <div class="col-md-10 col-sm-5 col-xs-12">
		   
			<div class="field1">
		     <div style="width:200px; float:left"> <label>How did you hear about us?<span class="red">*</span></label></div>
			   <div style="width: 155px; float: left;"> <select id="active" name="register_findus" class="slect  inputbox">    
					<option value="">--Select--</option>
					<?php $genre	=	$obj->get_all_data_active('find','find_name','asc','find_active','yes');	
					if(is_array($genre)){	
						foreach($genre as $value)	
						{	?>	
							<option value="<?php echo $value['find_id']; ?>"><?php echo $value['find_name']; ?></option>
					<?php }	
					}	?>     
				</select><br /> </div> 
				<div style="width: 200px; float: left;"><input type="text" class="inputtext" name="register_findus_quote"></div>
				 
			</div>
		   <div class="field1">
				<input type="submit" class="submti_btn" name="payment_submit" value="Submit" />
		   </div>
			  
			
		  </div>
        </div>
		</form>
	  </div>
	</div>
  </div>
</div>
<script src="js/jquery.validate.js"></script>

<?php include 'inc/footer.php'; ?>