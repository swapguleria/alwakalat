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
			$result =$obj->get_single_result('register','register_id',$_SESSION['login']);
			if(is_array($result)){ 
						$result['register_payment'];
						if($result['register_payment'] == 'paid' )
						{
							/* if($result['payment_type'] == 'Pay At Studio')
							{
								$table = 'payatstudio';
							}
							
							if($result['payment_type'] == 'One Time Payment')
							{
								$table = 'onetime_payment';
							} */
							if($result['payment_type'] == 'Reoccurring Payment')
							{
								$style = 'style="display:none;"';
							}
							$results =$obj->get_all_payments('allpayments','user_register_id',$_SESSION['login'],'date','DESC');
							$pay_type =$obj->get_field_dual_field_check('allpayments','payment_type','user_register_id',$_SESSION['login'],'payment_type','Reoccurring Payment'); 
							$maxdate =date('Y-m-d',strtotime($obj->get_single_field('allpayments','MAX(expiry_date)','user_register_id',$_SESSION['login'])));
							  $now = time(); // or your date as well
							 $your_date = strtotime($maxdate);
							 $datediff = $your_date - $now ;
							$day = floor($datediff/(60*60*24));
							
							//echo $diff=date_diff(strtotime('Y-m-d',$maxdate),strtotime('Y-m-d',$maxdate));
							if($pay_type != '')
							{
								$style = 'style="display:none;"';
							}
							if($day > 30)
							{
								$style = 'style="display:none;"';
							}
							if(is_array($result)){
						
							
				
				?>
<div class="content about">
  <div class="container">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <h1>Payment</h1>
		<?php if(isset($_SESSION['error'])) { ?>
		<h3 class="feedback" style="color:red"><?php  echo $_SESSION['error']; 
		unset($_SESSION['error']);
		?></h3> <?php } ?>
		<?php if(isset($_SESSION['success'])) { ?>
		<h3 class="feedback" style="color:green"><?php  echo $_SESSION['success']; 
		unset($_SESSION['success']);
		?></h3> <?php } ?>
		<a <?php echo $style; ?> href="javascript:void(0)" class="pay_next_month btn btn-sm btn-primary">Pay for Next Month</a>
		<?php if($result['payment_type'] == 'Reoccurring Payment')
							{?>
								<a  href="cancel_subscription.php" class="cancel_subscription btn btn-sm btn-primary">Cancel My Subscription</a>
						<?php	} ?>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-6 col-sm-6 col-xs-12 col-sm-push-3">
			<form action="process.php" method="post" id="user_payment" class="user_payment" style="display:none">
		 <input type="hidden" name="action" value="User_payment"  />
		 <input type="hidden" name="register_id" value="<?php echo $_SESSION['login']; ?>"  />
		 <input type="hidden" name="amount" value="<?php echo $result['total_payment'];?>" />
		   <div class="blank3"></div>
         <h4 class="underline">Credit Card Verification:</h4>
        <br />
        <div class="row">
		  <div class="col-md-5 col-sm-5 col-xs-12">
		    <div class="field1">
		      <label>Card Number: <span class="red">*</span></label>
			  <input type="text" name="ccnum" class="card_no inputbox" />
		    </div>
			<div class="field1">
			  <div class="card">
			    <label>Card Expiration : <span class="red">*</span></label>
			    <select class="inputbox card_month" name="expm" >
			      <option value="">Month</option>
			      <option value="01">01</option>
			      <option value="02">02</option>
			      <option value="03">03</option>
			      <option value="04">04</option>
			      <option value="05">05</option>
			      <option value="06">06</option>
			      <option value="07">07</option>
			      <option value="08">08</option>
			      <option value="09">09</option>
			      <option value="10">10</option>
			      <option value="11">11</option>
			      <option value="12">12</option>
				  
			    </select>
			  </div>
		    </div>
			<div class="field1">
			  <div class="card">
			    <select class="inputbox card_year" name="expy">
			       <option value="">Year</option>
			       <option value="2015">2015</option>
			       <option value="2016">2016</option>
			       <option value="2017">2017</option>			      
			       <option value="2018">2018</option>
			       <option value="2019">2019</option>
			       <option value="2020">2020</option>
			       <option value="2021">2021</option>
			       <option value="2022">2022</option>
			       <option value="2023">2023</option>
			       <option value="2024">2024</option>
			       <option value="2025">2025</option>
			       <option value="2026">2026</option>
			       <option value="2027">2027</option>
			       <option value="2028">2028</option>
			      
				  
			    </select>
			  </div>
		    </div>
			<div class="field1">
		      <label>cvv: <span class="red">*</span></label>
			  <input type="password" name="cvv" class="pay_cvv inputbox" />
		    </div>
			<!--div class="field1">
		      <label>Nickname: <span class="red">*</span></label>
			  <input type="text" name="nickname" class="nickname inputbox" />
		    </div-->
			<div class="field1">
			  <div class="card">
			    <label>City: <span class="red">*</span></label>
			    <input type="text" value="<?php echo $result['register_city'];?>" name="pay_city" class="pay_city inputbox" />
			  </div>
			</div>
			<div class="field1">
			  <div class="card">
			    <label>State: <span class="red">*</span></label>
			    <select class="inputbox pay_state" name="pay_state">
			      <option value="">--select--</option>
				  <option <?php if ($result['register_state'] == 'AK') echo ' selected="selected"'; ?>>AK</option>
				  <option <?php if ($result['register_state'] == 'AL') echo ' selected="selected"'; ?>>AL</option>
				  <option <?php if ($result['register_state'] == 'AR') echo ' selected="selected"'; ?>>AR</option>
				  <option <?php if ($result['register_state'] == 'AZ') echo ' selected="selected"'; ?>>AZ</option>
				  <option <?php if ($result['register_state'] == 'CA') echo ' selected="selected"'; ?>>CA</option>
				  <option <?php if ($result['register_state'] == 'CO') echo ' selected="selected"'; ?>>CO</option>
				  <option <?php if ($result['register_state'] == 'CT') echo ' selected="selected"'; ?>>CT</option>
				  <option <?php if ($result['register_state'] == 'DC') echo ' selected="selected"'; ?>>DC</option>
				  <option <?php if ($result['register_state'] == 'DE') echo ' selected="selected"'; ?>>DE</option>
				  <option <?php if ($result['register_state'] == 'FL') echo ' selected="selected"'; ?>>FL</option>
				  <option <?php if ($result['register_state'] == 'GA') echo ' selected="selected"'; ?>>GA</option>
				  <option <?php if ($result['register_state'] == 'HI') echo ' selected="selected"'; ?>>HI</option>
				  <option <?php if ($result['register_state'] == 'IA') echo ' selected="selected"'; ?>>IA</option>
				  <option <?php if ($result['register_state'] == 'ID') echo ' selected="selected"'; ?>>ID</option>
				  <option <?php if ($result['register_state'] == 'IL') echo ' selected="selected"'; ?>>IL</option>
				  <option <?php if ($result['register_state'] == 'IN') echo ' selected="selected"'; ?>>IN</option>
				  <option <?php if ($result['register_state'] == 'KS') echo ' selected="selected"'; ?>>KS</option>
				  <option <?php if ($result['register_state'] == 'KY') echo ' selected="selected"'; ?>>KY</option>
				  <option <?php if ($result['register_state'] == 'LA') echo ' selected="selected"'; ?>>LA</option>
				  <option <?php if ($result['register_state'] == 'MA') echo ' selected="selected"'; ?>>MA</option>
				  <option <?php if ($result['register_state'] == 'MD') echo ' selected="selected"'; ?>>MD</option>
				  <option <?php if ($result['register_state'] == 'ME') echo ' selected="selected"'; ?>>ME</option>
				  <option <?php if ($result['register_state'] == 'MI') echo ' selected="selected"'; ?>>MI</option>
				  <option <?php if ($result['register_state'] == 'MN') echo ' selected="selected"'; ?>>MN</option>
				  <option <?php if ($result['register_state'] == 'MO') echo ' selected="selected"'; ?>>MO</option>
				  <option <?php if ($result['register_state'] == 'MS') echo ' selected="selected"'; ?>>MS</option>
				  <option <?php if ($result['register_state'] == 'MT') echo ' selected="selected"'; ?>>MT</option>
				  <option <?php if ($result['register_state'] == 'NE') echo ' selected="selected"'; ?>>NE</option>
				  <option <?php if ($result['register_state'] == 'NC') echo ' selected="selected"'; ?>>NC</option>
				  <option <?php if ($result['register_state'] == 'ND') echo ' selected="selected"'; ?>>ND</option>
				  <option <?php if ($result['register_state'] == 'NH') echo ' selected="selected"'; ?>>NH</option>
				  <option <?php if ($result['register_state'] == 'NJ') echo ' selected="selected"'; ?>>NJ</option>
				  <option <?php if ($result['register_state'] == 'NM') echo ' selected="selected"'; ?>>NM</option>
				  <option <?php if ($result['register_state'] == 'NY') echo ' selected="selected"'; ?>>NY</option>
				  <option <?php if ($result['register_state'] == 'NV') echo ' selected="selected"'; ?>>NV</option>
				  <option <?php if ($result['register_state'] == 'OH') echo ' selected="selected"'; ?>>OH</option>
				  <option <?php if ($result['register_state'] == 'OK') echo ' selected="selected"'; ?>>OK</option>
				  <option <?php if ($result['register_state'] == 'OR') echo ' selected="selected"'; ?>>OR</option>
				  <option <?php if ($result['register_state'] == 'PA') echo ' selected="selected"'; ?>>PA</option>
				  <option <?php if ($result['register_state'] == 'RI') echo ' selected="selected"'; ?>>RI</option>
				  <option <?php if ($result['register_state'] == 'SC') echo ' selected="selected"'; ?>>SC</option>
				  <option <?php if ($result['register_state'] == 'SD') echo ' selected="selected"'; ?>>SD</option>
				  <option <?php if ($result['register_state'] == 'TN') echo ' selected="selected"'; ?>>TN</option>
				  <option <?php if ($result['register_state'] == 'TX') echo ' selected="selected"'; ?>>TX</option>
				  <option <?php if ($result['register_state'] == 'UT') echo ' selected="selected"'; ?>>UT</option>
				  <option <?php if ($result['register_state'] == 'VA') echo ' selected="selected"'; ?>>VA</option>
				  <option <?php if ($result['register_state'] == 'VT') echo ' selected="selected"'; ?>>VT</option>
				  <option <?php if ($result['register_state'] == 'WA') echo ' selected="selected"'; ?>>WA</option>
				  <option <?php if ($result['register_state'] == 'WI') echo ' selected="selected"'; ?>>WI</option>
				  <option <?php if ($result['register_state'] == 'WV') echo ' selected="selected"'; ?>>WV</option>
				  <option <?php if ($result['register_state'] == 'WY') echo ' selected="selected"'; ?>>WY</option>
				  <option <?php if ($result['register_state'] == 'PR') echo ' selected="selected"'; ?>>PR</option>
				  <option <?php if ($result['register_state'] == 'VI') echo ' selected="selected"'; ?>>VI</option>
			    </select>
			  </div>
			  
		    </div>
		  </div>
		  
		  <div class="col-md-5 col-sm-5 col-xs-12 col-sm-push-2">
		    <div class="field1">
		      <label>First Name: <span class="red">*</span></label>
			  <input type="text" name="bfname" class="card_name inputbox" />
		    </div>
			<div class="field1">
		      <label>Last Name: <span class="red">*</span></label>
			  <input type="text" name="blname" class="card_name inputbox" />
		    </div>
			<div class="field1">
			    <label>Amount: <span class="red">*</span></label>
			    <input type="text" name="amt" class="inputbox" value="<?php echo '$'.$result['total_payment'];?>" disabled="disabled" />
			</div>
			<div class="field1">
			    <label>Address: <span class="red">*</span></label>
			    <textarea name="address" rows="3" cols="5" class="inputbox"><?php echo $result['register_address']; ?></textarea>
			</div>
			<div class="field1">
			    <label>Zip: <span class="red">*</span></label>
			    <input type="text" value="<?php echo $result['register_zip'];?>" name="zipcode" class="pay_zip inputbox" />
			</div>
			
		  </div>
		  <div class="field1">
		  <input type="submit" value="payment" name="register_submit" class="btn btn-default btn-sm morebtn submitpay" />
        </div>
        </div>
		</form>
		</div>
		</div>
			<div class="blank"></div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		  	  <div class="classes">
			<div class="table-responsive">            
			<table id="general-table" class="table table-striped table-vcenter">
                <thead>
				
                    <tr>                      
                        <th>Payment </th>
                        <th>Payment Amount</th>
                        <?php if($result['payment_type'] != 'Reoccurring Payment') { ?><th>Payment For Month</th><?php } ?>
                        <th>Date</th>
                        <th>Status</th>
                        		
                        <!--th>Preschool Camp</th-->	                       
                    </tr>
                </thead>
                <tbody>
							<?php foreach ($results as $value) { ?>
                    <tr>
                        
                       
                       <td><?php echo $value['payment_type']; ?></td>
                       <td><?php echo $value['payment'];	?></td>
                    <?php if($result['payment_type'] != 'Reoccurring Payment') { ?>    <td><?php $date =$value['expiry_date'];
								echo $month = date('M',strtotime('-28 days',strtotime($date))); ?></td><?php } ?>
                        <td><?php echo  $obj->setdate($value['date']);?></td>
                        <td>paid</td>
                        
						    
                        
                    </tr>
					<?php } } } } else{ ?>
					<div class="blank"></div>
					<tr><h1>No Payment Here</h1></tr>
                    <?php } ?>
                </tbody>
              
            </table>
        </div>
		
		
		
		</div>		
</div>		
		<div class="blank"></div>
		
	  </div>
	</div>
  </div>
</div>
 <div class="blank"></div>

 
 
 <?php include 'inc/footer.php'; ?>