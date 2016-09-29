<?php
include("includes/header.php");

$makers = $get->get_all_data('tbl_maker', 'id', 'desc');
?>   


<div class="comparison">
    <div class="container">
        <div class="row">
            <div class="comparison_header">
                <h2>مقارنة السيارات المعتمدة</h2>
            </div>
        </div>

        <div class="row">
            <div class="comparison_inner">
                <div class="col-sm-12">

                    <div class="row comparison-list">

                        <div class="label-text col-sm-3"> الصنع : </div>

                        <div class="label-modal col-sm-3">

                            <select name="app_maker" id="app_maker">

                                <option value="">اختيار الصنع</option>

                                <?php
                                foreach ($makers as $maker) {
                                    ?>



                                    <option value="<?php echo $maker['id']; ?>" ><?php echo $maker['name']; ?></option>

                                <?php } ?>

                            </select>

                        </div>

                        <div class="label-make col-sm-3">

                            <select name="maker" id="app_maker2">

                                <option value="">اختيار الصنع</option>

                                <?php
                                foreach ($makers as $maker) {
                                    ?>



                                    <option value="<?php echo $maker['id']; ?>"><?php echo $maker['name']; ?></option>

<?php } ?>

                            </select>

                        </div>

                        <div class="label-make col-sm-3">

                            <select name="maker" id="app_maker3">

                                <option value="">اختيار الصنع</option>

<?php
foreach ($makers as $maker) {
    ?>



                                    <option value="<?php echo $maker['id']; ?>"><?php echo $maker['name']; ?></option>

<?php } ?>

                            </select>

                        </div>

                    </div>

                    <div class="row comparison-list">

                        <div class="label-text col-sm-3"> الفئة : </div>

                        <div class="label-modal col-sm-3">

                            <select name="model" id="app_model">

                                <option value="">اختار الصنع اولا</option>



                            </select>

                        </div>

                        <div class="label-make col-sm-3">

                            <select name="model" id="app_model2">



                                <option value="">اختار الصنع اولا</option>



                            </select>

                        </div>

                        <div class="label-make col-sm-3">

                            <select name="model" id="app_model3">
                                <option value="">اختار الصنع اولا</option>  </select>
                        </div>
                    </div>
                    <div class="row comparison-list">

                        <div class="label-text col-sm-3">النوع : </div>

                        <div class="label-modal col-sm-3">

                            <select name="sub_model" id="app_Smodel">


                                <option value="">اختار الفئة اولا</option>


                            </select>

                        </div>

                        <div class="label-make col-sm-3">

                            <select name="sub_model" id="app_Smodel2">



                                <option value="">اختار الفئة اولا</option>



                            </select>

                        </div>

                        <div class="label-make col-sm-3">

                            <select name="sub_model" id="app_Smodel3">
                                <option value="">اختار الفئة اولا</option>
                            </select>

                        </div>

                    </div>

                    <div class="row comparison-list">

                        <div class="col-sm-3"></div>

                        <div class="col-sm-3 comprasion"></div>

                        <div class="col-sm-3 comprasion"><a href="javascript:void(0);" onclick="app_compare();">قارن</a></div>

                        <div class="col-sm-3 comprasion"></div>

                    </div>
                </div>


            </div>
        </div>

    </div>

</div>

</div>

<div class="fields compare-cars" id="fields_1">

    <div class="container">

        <div id="return">

            <div class="row field" >

            </div>

        </div>

    </div>

</div>

<?php include ("includes/footer.php"); ?>   