<?php
include("includes/header.php");
if(!isset($_SESSION['cart_item']) && empty($_SESSION['cart_item']))
{
   header('Location:cart.php');

}
$country_list = $get->get_country_list('country','','','name','asc');

?>
<div class="overlay"></div>
<div id ="wait" style="position: fixed; padding: 2px;display:none; z-index: 9; top: 25%; width: 270px; left: 40%;"><img src="images/loading-1.gif"></div>
 <form class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" method="post" id="checkount" name="checkount">
 <div class="main checkout-page">
 
 <section class="checkout-container">
            	<div class="container">
            		<div class="checkout-heading">
                    	<div class="row">
                        	<div class="col-sm-6">
                            	<h1>Checkout</h1>
                            </div><!--col-sm-6-->
                            <div class="col-sm-6 text-right return-content">
                            	<!--<img src="images/return-icon.jpg" title="Login" alt="Login" height="14" width="14">Returning customer?
                                <a href="#">Click here to login</a>-->
                            </div><!--col-sm-6-->
                        </div><!--row-->
                	</div><!--checkout-heading-->
                </div><!--container-->
            </section><!--checkout-container-->
            
            <section class="checkout-content">
            	<div class="container">
                	<div class="row">
                    	<div class="col-sm-6 billing-details">
                        	<h2>Billing Details</h2>
                            
                              <div class="form-group">
                              	<div class="col-sm-6 pddng-lft">
                                	<label>First Name *</label>
                                    <input type="text" name="first_name" required="required" id="first_name" class="form-control">
                              	</div><!--col-sm-6-->
                                <div class="col-sm-6 pddng-rft">
                                	<label>Last Name *</label>
                                	<input type="text" name="last_name" required="required" name="last_name" class="form-control">
                                </div><!--col-sm-6-->  
                              </div><!--form-group-->
                              <!--<div class="form-group">
                              	<div class="col-sm-12 pddng-lft pddng-rft">
                                	<label>Company Name </label>
                                    <input type="text" name="company_name" id="company_name" class="form-control">
                                </div>
                              </div>-->
                              <div class="form-group">
                              	<div class="col-sm-6 pddng-lft">
                                	<label>Email Address *</label>
                                    <input type="email" required="required" name="email" id="email" class="form-control">
                              	</div><!--col-sm-6-->
                                <div class="col-sm-6 pddng-rft">
                                	<label>Phone *</label>
                                	<input type="tel" name="phone" required="required" id="phone" class="form-control">
                                </div><!--col-sm-6-->  
                              </div><!--form-group-->
                              <!--<div class="form-group">
                              	<div class="col-sm-12 pddng-lft pddng-rft">
                                	<label>Country *</label>
                                	<select id="country_name" required="required" class="form-control" name="country_name">
                                    	<option value="">Select Option</option>
										<?php 
										  if(!empty($country_list))
										  {
										    foreach($country_list as $list)
											{
										  ?>
										  <option value="<?= $list['id']?>"><?= $list['name']?></option>
										  
										  <?php 
										    }
										  }
										?>
										
                                        </select>
                                </div>
                              </div>-->
                             <!-- <div class="form-group">
                              	<div class="col-sm-12 pddng-lft pddng-rft">
                                	<label>Address *</label>
                                	<input type="text" name="address" id="address" required="required" class="form-control" placeholder="Street address">
                                    <input type="text" name="address" id="address" required="required" class="form-control form-address" placeholder="Apartment, suite, unit etc. (optional)">
                                </div>
                              </div>
                              <div class="form-group">
                              	<div class="col-sm-12 pddng-lft pddng-rft">
                                	<label>Town / City *</label>
                                	<input type="text" name="city" id="city" class="form-control" required="required">
                                </div>
                              </div>
                              <div class="form-group">
                              	<div class="col-sm-6 pddng-lft">
                                	<label>State / County *</label>
                                    <select class="form-control" required="required" id="state_name" name="state_name">
                                    	<option value="">Select an option…</option>
                                    </select>
                              	</div><!--col-sm-6-->
                                <!--<div class="col-sm-6 pddng-rft">
                                	<label>Postcode / ZIP *</label>
                                	<input type="text" name="postcode" id="postcode" class="form-control" >
                                </div> -->
                              </div>
                              <!--<div class="form-group">
                              	<div class="checkbox">
  									<label>
    									<input type="checkbox" value="">Create an account?
  									</label>
								</div>
                              </div><!--form-group-->
							<!--form-horizontal-->
                        <!--</div><!--col-sm-6-->
                        <div class="col-sm-6 billing-details add-info">
                        	<h2>Additional Information</h2>
                            
                            	<div class="form-group">
                                	<label>Order Notes</label>
                                    <textarea class="form-control" name="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div><!--form-group-->
                            
                        </div><!--col-sm-6-->
                    </div><!--row-->
                </div><!--container-->
            </section><!--checkout-content-->
            
            <section class="user-order">
            	<div class="container">
                	<div class="row">
                    	<div class="col-sm-12">
                        	<div class="product-order">
                        		<h2>Your Order</h2>
                                <div class="table-responsive">
                                  <table class="table table-bordered table-striped">
                                  	<thead>
                                    	<tr>
                                        	<th width="90%">Product</th>
                                            <th width="10%">Total</th>
                                      </tr>
                                    </thead>
                                    <tbody>
									<?php 
									
									if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item']))
									{
									  $i = 0;
                                      $item_total = 0;
									  foreach ($_SESSION['cart_item'] as $item)
									  {
									     $item_total += ($item["price"] * $item["quantity"]);
                                         $sub_total = 0;
                                         $sub_total += $item["price"] * $item["quantity"];										 										  										 
									?>
                                    	<tr>										  <td>											<span class="prod-name"><strong>Product Name</strong> <?= $item['name'] ?></span>											<span class="prod-color"><strong>Color:</strong> <?= $item['color'] ?></span>
											<span class="prod-size"><strong>Size:</strong><?= $item['size'] ?></span>											<span class="prod-size"><strong>Price:</strong><?= cur?> <?= $item['price']?></span>
                                           
                                          </td>
                                            <td><?= cur . " " . $sub_total?></td>
                                        </tr>
								     <?php
									   }
									 ?>
                                        <tr class="prod-total">
                                        	<td>Subtotal</td>
                                            <td><?= cur . " " . $item_total; ?></td>
                                        </tr>
                                        <tr class="prod-total">
                                        	<td>Total</td>
                                            <td><?= cur . " " . $item_total; ?></td>
                                        </tr>
										<?php 
										 
										 }
										?>
                                    </tbody>  
                                  </table>
								  <input type="hidden" name="return" value="http://alwakalat.com/thanks.php"/>
                    <input type="hidden" name="cmd" value="_cart"/>
                    <input type="hidden" name="cancel_return" value="http://alwakalat.com/cancel.php" /> 
                    <input type="hidden" name="notify_url" value="http://alwakalat.com/notify_url.php" /> 
                    <input type="hidden" name="business" value="omar@cosettesolutions.com"/>
                    <input type="hidden" name="currency_code" value="USD"/>
                    <input type="hidden" name="upload" value="1"/>
                    <input type="hidden" name="rm" value="2" />
								  
						<?php
					  $j=1; 
					foreach ($_SESSION["cart_item"] as $item)
					{
						
						
					  ?>
                         <input type="hidden" name="item_number_<?php echo $j;?>" value="<?php echo $item['code'] ?>"/>
                         <input type="hidden" name="item_name_<?php echo $j;?>" value="<?php echo $item['name']?>"/>
                         <input type="hidden" name="amount_<?php echo $j;?>" value="<?php echo $item['price']?>"/>
                         <input type="hidden" name="quantity_<?php echo $j;?>" value="<?php echo $item['quantity']?>"/>
                         <input type="hidden" name="size_<?php echo $j;?>" value="<?php echo $item['size']?>"/>
						 <input type="hidden" name="color_<?php echo $j;?>" value="<?php echo $item['color']?>"/>
						  
						  
                      
                      <?php
					  $j++;
					}
					  ?>
        		  
								  
								  
                                  <input type="submit" id="btnpayment" class="btn btn-default"  role="button" value="Proceed to PayPal"/>
								</div><!--table-responsive-->
                            </div><!--product-orser-->
                        </div><!--col-sm-12-->
                    </div><!--row-->
                </div><!--container-->
            </section><!--user-order-->
      </div>
	  </form>
<?php include("includes/footer.php"); ?>







<script type="text/javascript">
$(document).ready(function()
{
  $("#country_name").change(function()
  {
     var country_id = $(this).val();
	 
	 
	 var datastring = 'country_id='+country_id+'&action=country_list';
	 
	 $.ajax({
            type: "POST", // HTTP method POST or GET
            url: "ajax_response.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:datastring, //Form variables
            success:function(response)
			{
			    $("#state_name").html('');
				$("#state_name").append(response);
				
            },
            error:function (xhr, ajaxOptions, thrownError){
                
                alert(thrownError);
            }
            });
	});
	
 $("#checkount").validate({
			rules: {
				first_name: "required",
				last_name: "required",
				
				
			},
			messages: 
			{
				first_name: "Please enter your firstname",
				last_name: "Please enter your last name",
				
				
			}
		});

});
</script>