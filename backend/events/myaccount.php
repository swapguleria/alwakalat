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
			<?php 
					foreach($results as $value)
					{
				?>
<div class="content about">
  <div class="container">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <h1>My Account</h1>
		   <form action="process.php" method="post" id="Edit_add">
			  <input type="hidden" name="action" value="Edit_add" class="inputbox" />
			  
				  <!--h5 class="text-center">To access your secure account, please enter the Username we have sent you in you E-mail along with your Password:</h5-->
			  
			
				<div class="col-md-5 col-sm-5 col-xs-12">  
					<div class="field1">
					  <label>Address: </label>
					  <textarea name="register_address" rows="3" cols="5" class="inputbox"><?php echo $value['register_address']; ?></textarea>
					</div>
					<div class="field1">
					  <label>Home Phone: <span class="red">*</span></label>
					  <input type="text" name="register_phone" class="inputbox" value="<?php echo $value['register_phone']; ?>" />
					</div>
					
				  
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12 col-sm-push-2">
					<div class="field1">
					  	<label>City:<span class="red">*</span></label>
						<input type="text" name="register_city" class="inputbox" value="<?php echo $value['register_city']; ?>" />
					</div>					
					<div class="field1">			  
					  <div class="short">
						<label>State:<span class="red">*</span></label>
						<select class="inputbox" name="register_state">
						<option value="">--select--</option>
				  <option <?php if ($value['register_state'] == 'AK') echo ' selected="selected"'; ?>>AK</option>
				  <option <?php if ($value['register_state'] == 'AL') echo ' selected="selected"'; ?>>AL</option>
				  <option <?php if ($value['register_state'] == 'AR') echo ' selected="selected"'; ?>>AR</option>
				  <option <?php if ($value['register_state'] == 'AZ') echo ' selected="selected"'; ?>>AZ</option>
				  <option <?php if ($value['register_state'] == 'CA') echo ' selected="selected"'; ?>>CA</option>
				  <option <?php if ($value['register_state'] == 'CO') echo ' selected="selected"'; ?>>CO</option>
				  <option <?php if ($value['register_state'] == 'CT') echo ' selected="selected"'; ?>>CT</option>
				  <option <?php if ($value['register_state'] == 'DC') echo ' selected="selected"'; ?>>DC</option>
				  <option <?php if ($value['register_state'] == 'DE') echo ' selected="selected"'; ?>>DE</option>
				  <option <?php if ($value['register_state'] == 'FL') echo ' selected="selected"'; ?>>FL</option>
				  <option <?php if ($value['register_state'] == 'GA') echo ' selected="selected"'; ?>>GA</option>
				  <option <?php if ($value['register_state'] == 'HI') echo ' selected="selected"'; ?>>HI</option>
				  <option <?php if ($value['register_state'] == 'IA') echo ' selected="selected"'; ?>>IA</option>
				  <option <?php if ($value['register_state'] == 'ID') echo ' selected="selected"'; ?>>ID</option>
				  <option <?php if ($value['register_state'] == 'IL') echo ' selected="selected"'; ?>>IL</option>
				  <option <?php if ($value['register_state'] == 'IN') echo ' selected="selected"'; ?>>IN</option>
				  <option <?php if ($value['register_state'] == 'KS') echo ' selected="selected"'; ?>>KS</option>
				  <option <?php if ($value['register_state'] == 'KY') echo ' selected="selected"'; ?>>KY</option>
				  <option <?php if ($value['register_state'] == 'LA') echo ' selected="selected"'; ?>>LA</option>
				  <option <?php if ($value['register_state'] == 'MA') echo ' selected="selected"'; ?>>MA</option>
				  <option <?php if ($value['register_state'] == 'MD') echo ' selected="selected"'; ?>>MD</option>
				  <option <?php if ($value['register_state'] == 'ME') echo ' selected="selected"'; ?>>ME</option>
				  <option <?php if ($value['register_state'] == 'MI') echo ' selected="selected"'; ?>>MI</option>
				  <option <?php if ($value['register_state'] == 'MN') echo ' selected="selected"'; ?>>MN</option>
				  <option <?php if ($value['register_state'] == 'MO') echo ' selected="selected"'; ?>>MO</option>
				  <option <?php if ($value['register_state'] == 'MS') echo ' selected="selected"'; ?>>MS</option>
				  <option <?php if ($value['register_state'] == 'MT') echo ' selected="selected"'; ?>>MT</option>
				  <option <?php if ($value['register_state'] == 'NE') echo ' selected="selected"'; ?>>NE</option>
				  <option <?php if ($value['register_state'] == 'NC') echo ' selected="selected"'; ?>>NC</option>
				  <option <?php if ($value['register_state'] == 'ND') echo ' selected="selected"'; ?>>ND</option>
				  <option <?php if ($value['register_state'] == 'NH') echo ' selected="selected"'; ?>>NH</option>
				  <option <?php if ($value['register_state'] == 'NJ') echo ' selected="selected"'; ?>>NJ</option>
				  <option <?php if ($value['register_state'] == 'NM') echo ' selected="selected"'; ?>>NM</option>
				  <option <?php if ($value['register_state'] == 'NY') echo ' selected="selected"'; ?>>NY</option>
				  <option <?php if ($value['register_state'] == 'NV') echo ' selected="selected"'; ?>>NV</option>
				  <option <?php if ($value['register_state'] == 'OH') echo ' selected="selected"'; ?>>OH</option>
				  <option <?php if ($value['register_state'] == 'OK') echo ' selected="selected"'; ?>>OK</option>
				  <option <?php if ($value['register_state'] == 'OR') echo ' selected="selected"'; ?>>OR</option>
				  <option <?php if ($value['register_state'] == 'PA') echo ' selected="selected"'; ?>>PA</option>
				  <option <?php if ($value['register_state'] == 'PR') echo ' selected="selected"'; ?>>PR</option>
				  <option <?php if ($value['register_state'] == 'RI') echo ' selected="selected"'; ?>>RI</option>
				  <option <?php if ($value['register_state'] == 'SC') echo ' selected="selected"'; ?>>SC</option>
				  <option <?php if ($value['register_state'] == 'SD') echo ' selected="selected"'; ?>>SD</option>
				  <option <?php if ($value['register_state'] == 'TN') echo ' selected="selected"'; ?>>TN</option>
				  <option <?php if ($value['register_state'] == 'TX') echo ' selected="selected"'; ?>>TX</option>
				  <option <?php if ($value['register_state'] == 'UT') echo ' selected="selected"'; ?>>UT</option>
				  <option <?php if ($value['register_state'] == 'VA') echo ' selected="selected"'; ?>>VA</option>
				  <option <?php if ($value['register_state'] == 'VT') echo ' selected="selected"'; ?>>VT</option>
				  <option <?php if ($value['register_state'] == 'WA') echo ' selected="selected"'; ?>>WA</option>
				  <option <?php if ($value['register_state'] == 'WI') echo ' selected="selected"'; ?>>WI</option>
				  <option <?php if ($value['register_state'] == 'WV') echo ' selected="selected"'; ?>>WV</option>
				  <option <?php if ($value['register_state'] == 'WY') echo ' selected="selected"'; ?>>WY</option>				  
				  <option <?php if ($value['register_state'] == 'VI') echo ' selected="selected"'; ?>>VI</option>
						</select>
					  </div>
					  <div class="short">
						<label>Zip:<span class="red">*</span></label>
						<input type="text" name="register_zip" class="inputbox" value="<?php echo $value['register_zip']; ?>" />
					  </div>
					</div>
					<div class="field1">
					  <label style="display: unset;">Registeration Date: </label>
					  <span><b><?php echo $obj->setdate($value['register_date']); ?></b></span>			  
					</div>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12">  
					<div class="field1">
						<input type="submit" class="submti_btn" name="submit" value="Save" />
					</div>
				</div>
			
			</form>
		
	  </div>
	</div>
  </div>
</div>
 <div class="blank"></div>
<?php } ?>
 
 
 <?php include 'inc/footer.php'; ?>