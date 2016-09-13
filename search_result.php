<?php include("includes/header.php"); ?>
<style>
    .search-main-product{padding:10px 10px;}</style>
<?php

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>
<div class="searches">
    <div class="container inner-container"><h1><?php echo $get->get_single_field('maker', 'name', 'id', $_POST['maker']) ?> Cars with prices Below QAR <?php echo number_format(clean($_POST['price'])); ?></h1> 
        <div class="search-products clearfix" id="filter">
            <?php
            $maker = $_POST['maker'];
            $price = $_POST['price'];
            $bodyType = $_POST['bodyType'];
            $where = "";
            if ($maker != "") {
                if ($where != "") {
                    $where .= " and maker_id =" . $maker . "";
                } else {
                    $where .= " where maker_id =" . $maker . "";
                }
            }
            if ($price != "") {
                if ($where != "") {
                    $where .= " and price " . $price . "";
                } else {
                    $where .= " where price " . $price . "";
                }
            }
            if ($bodyType != "") {
                if ($where != "") {
                    $where .= " and bodyType ='" . $bodyType . "'";
                } else {
                    $where .= " where bodyType ='" . $bodyType . "'";
                }
            }

            $query = "SELECT * from `car_data` " . $where . "";
           
            $run_query = mysql_query($query) or die(mysql_error());
            $num = mysql_num_rows($run_query);
            if ($num > 0) {

                while ($car = mysql_fetch_array($run_query)) {
                    ?>
            <div class="search-main-product">
                        <div class=""> <a href="car-brands.php?id=<?php echo $car['id']; ?>"><img src="<?php echo $car['full_path']; ?>" alt="" title=""></a> </div>
                        <div class="search-product-text">
                            <h2><a href="car-brands.php?id=<?php echo $car['id']; ?>"><?php echo $get->get_single_field('model', 'model_name', 'model_id', $car['model']); ?> <?php echo $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $car['sub_model']); ?>  <?php echo $car['bodyType']; ?></a></h2>
                            <h2><a href="car-brands.php?id=<?php echo $car['id'];?>"><span> QAR-</span><?php echo $car['price'];?>   </a></h2>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo"Sorry No record found!";
            }
            ?>







        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>