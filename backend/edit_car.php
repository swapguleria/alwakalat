<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 

$results	=	$obj->get_all_data('maker','id','desc');
$car_data	=	$obj->get_single_result('car_data','id',$_GET['id']);
?>



<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Makers<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Manage Cars</a></li>

    </ul>

    <!-- END Blank Header -->
	<div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Add Maker</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="edit_car">
				<input type="hidden" name="id" value="<?php echo $car_data['id'];?>">
				<input type="hidden" name="slider_name1" value="<?php echo $car_data['image_name'];?>">
                                <input type="hidden" name="pdf_english1" value="<?php echo $car_data['pdf_english']; ?>">
                                <input type="hidden" name="pdf_arabic1" value="<?php echo $car_data['pdf_arabic']; ?>">

                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red; font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div>
                         <div class="form-group">
            <label class="col-md-3 control-label" for="logo">Car Pdf English <span class="text-danger"></span></label>
            <div class="col-md-6">
            <div class="input-group">
                <input type="file" id="pdf_english" name="pdf_english" >
                                            </div>
                <div class="form-group">
                        <?php if($car_data['pdf_english']!='') { ?>
                        <a href="http://development.dexterousteam.com/alwakalat/pdf/<?php echo $car_data['pdf_english']; ?>"target="_blank">Check pdf English </a>
                    
                        <?php } ?>

                    </div>
            </div>
            </div> 
                                                
                  <div class="form-group">
            <label class="col-md-3 control-label" for="logo">Car Pdf Arabic <span class="text-danger"></span></label>
            <div class="col-md-6">
            <div class="input-group">
                <input type="file" id="pdf_arabic" name="pdf_arabic" >
                                            </div>
                <div class="form-group">
                        <?php if($car_data['pdf_arabic']!='') { ?>
                        <a href="http://development.dexterousteam.com/alwakalat/pdf_arabic/<?php echo $car_data['pdf_arabic']; ?>"target="_blank">Check pdf Arabic </a>
                    
                        <?php } ?>

                    </div>
            </div>
            </div>                               
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Maker <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <select name="maker" class="form-control">
									<option value="">Select Maker</option>
									<?php foreach($results as $maker){?>
									
									<option value="<?php echo $maker['id'];?>" <?php if($car_data['maker_id']==$maker['id']){ echo "selected";} ?>><?php echo $maker['name'];?></option>
									<?php }?>
									</select>
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">BodyType <span class="text-danger">*</span></label>
                            <div class="col-md-6">
									
                                    <select name="bodyType" class="form-control">
					<option value="" <?php if($car_data['bodyType']==""){ echo "selected";} ?>>Select Body Type</option>
                                        <option value="Convertible" <?php if($car_data['bodyType']=="Convertible"){ echo "selected";} ?>>Convertible</option>
                                        <option value="Coupe" <?php if($car_data['bodyType']=="Coupe"){ echo "selected";} ?>>Coupe</option>
                                        <option value="Coupe/Convertible" <?php if($car_data['bodyType']=="Coupe/Convertible"){ echo "selected";} ?>>Coupe/Convertible</option>
                                        <option value="Crossover" <?php if($car_data['bodyType']=="Crossover"){ echo "selected";} ?>>Crossover</option>
                                        <option value="Hatchback" <?php if($car_data['bodyType']=="Hatchback"){ echo "selected";} ?>>Hatchback</option>
                                        <option value="Minivan" <?php if($car_data['bodyType']=="Minivan"){ echo "selected";} ?>>Minivan</option>
                                        <option value="Pickup" <?php if($car_data['bodyType']=="Pickup"){ echo "selected";} ?>>Pickup</option>
                                        <option value="Roadster" <?php if($car_data['bodyType']=="Roadster"){ echo "selected";} ?>>Roadster</option>
                                        <option value="Saloon" <?php if($car_data['bodyType']=="Saloon"){ echo "selected";} ?>>Saloon</option>
                                        <option value="Sedan" <?php if($car_data['bodyType']=="Sedan"){ echo "selected";} ?>>Sedan</option>
                                        <option value="SUV" <?php if($car_data['bodyType']=="SUV"){ echo "selected";} ?>>SUV</option>
									</select>
								
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Model<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="model" value="<?php echo $car_data['model'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Sub-Model<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="sub_model" value="<?php echo $car_data['sub_model'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Year<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="year" value="<?php echo $car_data['year'];?>" class="form-control">
								
                            </div><div class="col-md-3">
                                
							<span> Eg. 2015</span>
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Color<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="color" value="<?php echo $car_data['color'];?>" class="form-control">
								
                            </div><div class="col-md-3">
                                
							<span>Add colors seperated by comma. Eg. red,green....</span>
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Price<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="price" value="<?php echo $car_data['price'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Warranty<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="Warranty" value="<?php echo $car_data['Warranty'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Acceleration<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="acceleration" value="<?php echo $car_data['acceleration'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Top Speed<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="top_speed" value="<?php echo $car_data['top_speed'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Engine Size<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="engineSize" value="<?php echo $car_data['engineSize'];?>"  class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Horse Power<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="h_power"  value="<?php echo $car_data['h_power'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Clyinders<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="clyinders"  value="<?php echo $car_data['clyinders'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Driven Wheels<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="drivenWheels" value="<?php echo $car_data['drivenWheels'];?>" class="form-control">
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Special Features<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="specialFeatures" value="<?php echo $car_data['specialFeatures'];?>" class="form-control">
								
                            </div>
                        </div>
						
						
                      </fieldset>
               
                   
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button> <a class="btn btn-sm btn-primary" href="other_slider.php?id=<?php echo $car_data['id'];?>">Manage Car Slider</a>
                           
                        </div>
						
                    </div>
                </form>
                <!-- END Form Validation Example Content -->

               
            </div>


    <!-- Example Block -->


</div>

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>