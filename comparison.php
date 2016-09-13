<?php
include("includes/header.php");

$makers = $get->get_all_data('maker', 'id', 'desc');

if (isset($_GET['id']) && $_GET['id'] != "")
    {
    $car_id = $_GET['id'];
    $car_data = $get->get_single_result('car_data', 'id', $car_id);
    }
?>   

<div class="comparison">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">

                <div class="row comparison-list">

                    <div class="label-text col-sm-3"> Make : </div>

                    <div class="label-modal col-sm-3">

                        <select name="maker" id="maker">

                            <option value="">Select Maker</option>

                            <?php
                            foreach ($makers as $maker)
                                {
                                ?>



                                <option value="<?php echo $maker['id']; ?>" <?php
                                if ($maker['id'] == $car_data['maker_id'])
                                    {

                                    echo"selected";
                                    }
                                ?>><?php echo $maker['name']; ?></option>

<?php } ?>

                        </select>

                    </div>

                    <div class="label-make col-sm-3">

                        <select name="maker" id="maker2">

                            <option value="">Select Maker</option>

                            <?php
                            foreach ($makers as $maker)
                                {
                                ?>



                                <option value="<?php echo $maker['id']; ?>"><?php echo $maker['name']; ?></option>

<?php } ?>

                        </select>

                    </div>

                    <div class="label-make col-sm-3">

                        <select name="maker" id="maker3">

                            <option value="">Select Maker</option>

                            <?php
                            foreach ($makers as $maker)
                                {
                                ?>



                                <option value="<?php echo $maker['id']; ?>"><?php echo $maker['name']; ?></option>

<?php } ?>

                        </select>

                    </div>

                </div>

                <div class="row comparison-list">

                    <div class="label-text col-sm-3"> Model : </div>

                    <div class="label-modal col-sm-3">

                        <select name="model" id="model_sel">

<?php
if (isset($_GET['id']) && $_GET['id'] != "")
    {
    ?>

                                <option value="<?php echo $car_data['model']; ?>" selected="selected"><?php echo $get->get_single_field('model', 'model_name', 'model_id', $car_data['model']); ?></option><?php
                            }
                        else
                            {
                            ?>

                                <option value="">Select Maker First</option><?php } ?>



                        </select>

                    </div>

                    <div class="label-make col-sm-3">

                        <select name="model" id="model_sel2">



                            <option value="">Select Maker First</option>



                        </select>

                    </div>

                    <div class="label-make col-sm-3">

                        <select name="model" id="model_sel3">
                            <option value="">Select Maker First</option>  </select>
                    </div>
                </div>
                <div class="row comparison-list">

                    <div class="label-text col-sm-3">Sub-model : </div>

                    <div class="label-modal col-sm-3">

                        <select name="sub_model" id="sub_model_sel">

                            <?php
                            if (isset($_GET['id']) && $_GET['id'] != "")
                                {
                                ?>

                                <option value="<?php echo $car_id; ?>" selected="selected"><?php echo $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $car_data['sub_model']); ?> <?php echo $car_data['bodyType'] ?></option><?php
                            }
                        else
                            {
                            ?>

                                <option value="">Select Model First</option>

<?php } ?>

                        </select>

                    </div>

                    <div class="label-make col-sm-3">

                        <select name="sub_model" id="sub_model_sel2">



                            <option value="">Select Model First</option>



                        </select>

                    </div>

                    <div class="label-make col-sm-3">

                        <select name="sub_model" id="sub_model_sel3">
                            <option value="">Select Model First</option>
                        </select>

                    </div>

                </div>

                <div class="row comparison-list">

                    <div class="col-sm-3"></div>

                    <div class="col-sm-3 comprasion"></div>

                    <div class="col-sm-3 comprasion"><a href="javascript:void(0);" onclick="compare();">COMPARE</a></div>

                    <div class="col-sm-3 comprasion"></div>

                </div>


            </div>

        </div>

    </div>

</div>

<div class="fields compare-cars">

    <div class="container">

        <div id="return">

            <div class="row field" >

            </div>

        </div>

    </div>

</div>

<?php include ("includes/footer.php"); ?>   