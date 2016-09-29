<?php
include("includes/header.php");
print_r($_POST);
if ($_POST['maker'])
    {
    $mid = $_POST['maker'];
    $title = " For " . $get->get_single_field('tbl_maker', 'name', 'id', $mid);
    }
if (@$_POST['bodyType'])
    {
    $bid = $_POST['bodyType'];
    $title = " For " . $get->get_single_field('tbl_body_type', 'name', 'id', $bid);
    }
if (@$_POST['model'])
    {
    $moid = $_POST['model'];
    }
if (@$_POST['price'])
    {
    $price = $_POST['price'];
    }
$sorting = 'asc';
$order = 'id';
//print_r($_GET);
$results = $get->get_search_result_post($id, $mid, $moid, $smid, $bid, $price, $year, $milage, $sorting, $order);


//echo '<pre>';
//print_r($results);
//echo '</pre>';
?>
<section>		
    <div id="car_search">		
        <div class="container">	
            <div class="row">	
                <div class="car_search_header clearfix">						<div class="col-sm-4 pull-left">				
                        <h3>Car Search <?= $title ?> </h3>						
                    </div>						
                    <div class="col-sm-6 pull-right text-right">							
                        <form role="form">								
                            <!--                            <div class="form-group">						
                                                            <label for="sel1">Show On Page</label>								
                                                            <select class="form-control" id="">									
                                                                <option>01 items</option>									
                                                                <option>02 items</option>									
                                                                <option>03 items</option>									
                                                                <option>04 items</option>							
                                                            </select>		
                                                        </div>		-->
                            <div class="form-group">						

                                <label for="sel1">Sort By</label>									
                                <select class="form-control" id="">									
                                    <option>Last Added</option>										
                                    <option>2</option>									
                                    <option>3</option>									
                                    <option>4</option>									
                                </select>		
                            </div>	
                        </form>	
                    </div>					
                </div>				
            </div>		
            <div class="row">			
                <div id="car_model" class="clearfix">	
                    <div class="col-sm-9 car_model">						
                        <?php
                        if (@$results)
                            {
                            foreach ($results as $key => $val)
                                {
//                            echo '<pre>';
//                            print_r($val);
//                            echo '</pre>';
//                            break;
                                ?><div class="car_model_inner">								
                                    <div class="car_model_content">								
                                        <div class="car_model_img">									
                                            <?php
                                            if ($val['banner_image'])
                                                {
                                                ?>
                                                <img src="http://alwakalat.com/timthumb/timthumb.php?w=275&h=255&src=http://www.alwakalat.com/approvedCars/wdir/uploads/<?php echo $val['banner_image']; ?>"/> <?php
                                                }
                                            else
                                                {
                                                ?><img src="<?php echo $main_url; ?>/approvedCars/themes/basic/images/nocarimage.jpg"/>


                                            <?php } ?>									
                                            <div class="car_model_hover">								
                                                <div class="car_model_hover_inner text-center">									
                                                    <a href="approvedCar.php?id=<?php echo $val[id]; ?>" class="btn btn-default hover_btn " style="background: rgba(49, 39, 131, 0.8) none repeat scroll 0 0;    border: medium none;  border-radius: 0;    color: #fff;    margin-top: 37%;    padding: 14px;    text-transform: uppercase;">View Details</a>							
                                                </div>								
                                            </div>							
                                        </div>									
                                        <div class="car_text">
                                            <h3><?php
                                                echo $get->get_single_field('tbl_maker', 'name', 'id', $val['maker_id'])
                                                , ' '
                                                , $get->get_single_field('tbl_car_model', 'model_name', 'id', $val['model_id'])
                                                , ' '
                                                , $get->get_single_field('tbl_body_type', 'name', 'id', $val['body_type_id']);
                                                ?></h3>										<h4>QAR <?php
                                                echo number_format($val['price']);
                                                ?></h4>		
                                                <?php
//                                              <----------  get the year of worranty Start------------->
                                                $date_parts1 = date('Y');
                                                $date_parts2 = explode("-", $val['warranty_expire_date']);
                                                $year = $date_parts2[0] - $date_parts1;
                                                if (@$year)
                                                    {
                                                    if ($year > '1')
                                                        {
                                                        $year = $year . " Years";
                                                        }
                                                    else
                                                        {
                                                        $year = $year . " Year";
                                                        }
                                                    }
                                                else
                                                    {
                                                    $curdate = strtotime(date("Y-m-d"));
                                                    $mydate = strtotime($val['warranty_expire_date']);
                                                    if ($curdate > $mydate)
                                                        {
                                                        $year = 'Expired';
                                                        }
                                                    else
                                                        {
                                                        $year = 'This Years';
                                                        }
                                                    }
//                                              <----------  get the year of worranty Start------------->
                                                ?>

                                            <div class="car_text_2">
                                                <p>Warranty </p>

                                                <span class="pull-right"><?php echo $year; ?></span>										</div>										
                                            <!--                                            <div class="car_text_2">
                                                                                            <p>Warranty Upto </p>
                                            
                                                                                            <span class="pull-right"><?php echo $val['warranty_expire_date']; ?></span>										</div>										-->
                                            <div class="car_text_2">
                                                <p>Milage</p>						
                                                <span class="pull-right"><?php echo $val['milage'], ' km'; ?></span>						
                                            </div>									</div>								</div>	
                                </div>
                                <?php
                                }
                            }
                        else
                            {
                            ?>
                            <div class="alert alert-danger">
                                <strong>Sorry!</strong> No Car available.
                            </div> 
                        <?php } ?> 




                    </div>						<div class="col-sm-3 add">							<div class="add-inner text-right">								<img src="images/add_1.jpg"/>								<img src="images/add_2.jpg"/>							</div>						</div>					</div>					<div id="buttons" class="text-center">						<div class="car_model_btn">							
                        <div class="car_model_btn_prev">								
<!--                                <p>Previous<i class="fa fa-arrow-left" aria-hidden="true"></i></p>								
                            <p><i class="fa fa-arrow-right" aria-hidden="true"></i>next</p>-->
                        </div>						</div>					</div>				</div>			</div>		</div>   
</section>


<?php include("includes/footer.php") ?>    
