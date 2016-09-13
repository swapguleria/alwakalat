<?php
include("includes/header.php");
$makers = $get->get_all_data('maker', 'id', 'asc');
//$cars = $get->get_join_data('maker', 'id', 'car_data', 'maker_id', 'bodyType', 'asc');
$cars = $get->get_join_data('maker', 'id', 'car_data', 'maker_id', 'name', 'asc');
//print_r($cars);



if (isset($_GET['id']) && $_GET['id'] != "")
    {
    $cars	=	$get->get_all_data_active('car_data','id','asc','maker_id',$_GET['id']); 
    }
else
    {
    $cars	=	$get->get_all_data('car_data','id','asc'); 
    }
    
?>   


<div class="col-sm-12 left-contact" id="find_car" style="display:none;width:400px;">
    <div class="find_car_form">
        <h1>Find Your Car</h1>
        <form action="search_result.php" method="POST" id="feedback" novalidate="novalidate">
            <select name="maker" id="maker_">
                <option value="">--Select Maker--</option>
                <?php
                foreach ($makers as $maker)
                    {
                    ?>
                    <option value="<?php echo $maker['id']; ?>"><?php echo $maker['name']; ?></option>
<?php } ?>
            </select>
            <!--select name="model" id="model_sel">
                    <option selected="selected">Select Maker First</option>
            </select>
            <select name="sub_model" id="sub_model_sel">
                    <option selected="selected">Select Model First</option>
            </select-->
            <select id="filter_bodytype" name="bodyType" ><option value="">--Select BodyType--</option>
                <option value="Sedan">Sedan</option>
                <option value="Coupe">Coupe</option>
                <option value="Saloon">Saloon</option>
                <option value="SUV">SUV</option>
                <option value="Hatchback">Hatchback</option>
            </select>
            <select id="filter_price" name="price" required="required" ><option value="">--Select Price--</option>
                <option value="<=65000">Below QR 65,000</option>
                <option value="<=100000">Below QR 100,000</option>
                <option value="<=125000">Below QR 125,000</option>
                <option value="<=150000">Below QR 150,000</option>
                <option value="<=200000">Below QR 200,000</option>
                <option value="<=250000">Below QR 250,000</option>
                <option value="<=350000">Below QR 350,000</option>
                <option value="<=500000">Below QR 500,000</option>
                <option value=">=500000">More than QR 500,000</option>
            </select>
            <!--a href="javascript:void(0);" id="find_car_btn" >Find Car</a-->
            <input type="submit" name="submit" value="Find Car">
        </form>
        <div class="result"></div>
    </div>
</div> 
<!--<div class="inner-banner">
    <div id="demo">
        <div id="owl-demo" class="owl-carousel">
<?php // foreach ($result->data as $post): ?>
                 Renders images. @Options (thumbnail,low_resoulution, high_resolution) 
                <div class="item"><a  class="fancybox" data-fancybox-group="gallery" href="<?php // echo $post->images->standard_resolution->url ?>"><img src="<?php // echo $post->images->thumbnail->url ?>" alt="" title=""></a></div>

<?php // endforeach ?>


        </div>
    </div>
</div>-->
<div class="about-section">
    <div class="car-finder">
        <a class="find fancybox" href="#find_car">find your car</a> 
    </div>
</div>
<div class="about-section">
    <div class="container">
        <div class="inner-about all_car-list">

            <table id="example-datatable">
                <thead><tr>
                        <th class="pro"></th></thead>
                <tbody>

                    <?php
                    foreach ($cars as $data)
                        {
                        ?>
                        <tr class="load-items" style="display:none;" >
                        <!--<tr class="load-items" style="display: none">-->
                            <td>
                                <?php
                                // echo "<pre>"; 
//                 print_r($data) ;
                                ?>
                                <a href="car-brands.php?id=<?php echo $data['id']; ?>"><img src="http://alwakalat.com/timthumb/timthumb.php?w=200&h=121&src=http://alwakalat.com/<?= $data['full_path']; ?>" class="" style="width: 200px;height:121px;"><br />
                                    <span>
                                        <?php echo $data['name']; ?>
                                        <?php echo $data['bodyType'] ; ?>
    <?php echo $get->get_single_field('model', 'model_name', 'model_id', $data['model']); ?>
    <?php echo $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $data['sub_model']); ?>
                                    </span><br>

                                    <span><?php
                                        if (@$data['price'])
                                            {
                                            echo $data['price'];

                                            if (@$data['full_price'])
                                                {
                                                echo " - " . $data['full_price'];
                                                }
                                            echo " QR";
                                            }
                                        ?></span>
                                </a>
                                <!--<span><?= $data['full_path']; ?></span>-->
                            </td>
                        </tr>
<?php } ?>

                </tbody>
            </table>
            <div class="col-md-12">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="more_list_item">
                        <a href="javascript:void(0)" id="ViewMoreListItem">Load More</a>
                    </div>
                </div>
            </div>
            <?php /* ?><table id="example-datatable1">
              <thead>
              <tr>
              <th class="pro">Maker</th>
              <th class="min">Model</th>
              <th class="down">Sub-Model</th>
              <th class="flat">Price</th>
              <th class="rate">Warranty</th>
              <th class="rate">Special Features</th>
              <th class="rate">&nbsp;</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach($cars as $data){?>
              <tr>
              <td><?php echo $get->get_single_field('maker','name','id',$data['maker_id']) ; ?></td>
              <td><?php echo $get->get_single_field('model','model_name','model_id',$data['model']) ; ?></td>
              <td><?php echo $get->get_single_field('sub_model','sub_model_name','sub_id',$data['sub_model']) ; ?>  <?php echo $data['bodyType'];?></td>
              <td>QAR <?php echo number_format($data['price']);?></td>
              <td><?php echo $data['Warranty'];?></td>
              <td><?php echo $data['specialFeatures'];?></td>
              <td><a href="car-brands.php?id=<?php echo $data['id'];?>">View Details</a></td>
              </tr>
              <?php } ?>

              </tbody>
              </table><?php */ ?>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>   