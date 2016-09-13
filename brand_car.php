<?php
include("includes/header.php");
if (isset($_GET['id']) && $_GET['id'] != "")
    {
    $cars = $get->get_all_data_active('car_data', 'id', 'asc', 'maker_id', $_GET['id']);
    $car_id = $_GET['id'];
    $_SESSION['id'] = $car_id;
    }
?> 
<style>
    .search-main-product{padding:10px 10px;}</style>
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
<div class="searches">
    <div class="container inner-container">

        <h1><?php echo $get->get_single_field('maker', 'name', 'id', $_GET['id']); ?> </h1> 

        <div class="filter">
            <form id="filterform" action=" " type="post">
                <label>Body Type</label>
                <input type="hidden" name="id" id="maker"  value="<?= $_SESSION['id']; ?>">
                <select name="body_type" id="filter_bodytype">
                    <?= $body_selected ?>
                    <option value="All">--Select--</option>
                    <?php
                    if ($_GET['body_type'] == 'Convertible')
                        {
                        $body_selected = "selected = 'selected'";
                    }
                    else
                        {
                        $body_selected = "";
                    }
                    ?>
                    <option value="Convertible" <?= $body_selected ?>>Convertible</option>
                    <?php
                    if ($_GET['body_type'] == 'Coupe')
                        {
                        $body_selected = "selected = 'selected'";
                    }
                    else
                        {
                        $body_selected = "";
                    }
                    ?>
                    <option value="Coupe" <?= $body_selected ?>>Coupe</option>
                    <?php
                    if ($_GET['body_type'] == 'Coupe/Convertible')
                        {
                        $body_selected = "selected = 'selected'";
                    }
                    else
                        {
                        $body_selected = "";
                    }
                    ?>
                    <option value="Coupe/Convertible" <?= $body_selected ?>>Coupe/Convertible</option>
                    <?php
                    if ($_GET['body_type'] == 'Crossover')
                        {
                        $body_selected = "selected = 'selected'";
                    }
                    else
                        {
                        $body_selected = "";
                    }
                    ?>
                    <option value="Crossover" <?= $body_selected ?>>Crossover</option>
<?php
if ($_GET['body_type'] == 'Hatchback')
    {
    $body_selected = "selected = 'selected'";
}
else
    {
    $body_selected = "";
}
?>
                    <option value="Hatchback" <?= $body_selected ?>>Hatchback</option>
                    <?php
                    if ($_GET['body_type'] == 'Minivan')
                        {
                        $body_selected = "selected = 'selected'";
                    }
                    else
                        {
                        $body_selected = "";
                    }
                    ?>
                    <option value="Minivan" <?= $body_selected ?>>Minivan</option>
                    <?php
                    if ($_GET['body_type'] == 'Pickup')
                        {
                        $body_selected = "selected = 'selected'";
                    }
                    else
                        {
                        $body_selected = "";
                    }
                    ?>
                    <option value="Pickup" <?= $body_selected ?>>Pickup</option>
                    <?php
                    if ($_GET['body_type'] == 'Roadster')
                        {
                        $body_selected = "selected = 'selected'";
                    }
                    else
                        {
                        $body_selected = "";
                    }
                    ?>
                    <option value="Roadster" <?= $body_selected ?>>Roadster</option>
<?php
if ($_GET['body_type'] == 'SUV')
    {
    $body_selected = "selected = 'selected'";
}
else
    {
    $body_selected = "";
}
?>
                    <option value="SUV" <?= $body_selected ?>>SUV</option>
<?php
if ($_GET['body_type'] == 'Sedan')
    {
    $body_selected = "selected = 'selected'";
}
else
    {
    $body_selected = "";
}
?>
                    <option value="Sedan" <?= $body_selected ?>>Sedan</option>
<?php
if ($_GET['body_type'] == 'Saloon')
    {
    $body_selected = "selected = 'selected'";
}
else
    {
    $body_selected = "";
}
?>
                    <option value="Saloon" <?= $body_selected ?>>Saloon</option>
                </select>
                <label>Price Filter</label>
                <select name="price" id="filter_price"><option value="All">--Select--</option>
            <?php
            if ($_GET['price'] == '<=65000')
                {
                $price_selected = "selected = 'selected'";
            }
            else
                {
                $price_selected = "";
            }
            ?>
                    <option value="<=65000" <?= $price_selected ?>>Below QR 65,000</option>
<?php
if ($_GET['price'] == '<=100000')
    {
    $price_selected = "selected = 'selected'";
}
else
    {
    $price_selected = "";
}
?>
                    <option value="<=100000" <?= $price_selected ?>>Below QR 100,000</option>
<?php
if ($_GET['price'] == '<=125000')
    {
    $price_selected = "selected = 'selected'";
}
else
    {
    $price_selected = "";
}
?>
                    <option value="<=125000" <?= $price_selected ?>>Below QR 125,000</option>
<?php
if ($_GET['price'] == '<=150000')
    {
    $price_selected = "selected = 'selected'";
}
else
    {
    $price_selected = "";
}
?>
                    <option value="<=150000" <?= $price_selected ?>>Below QR 150,000</option>
<?php
if ($_GET['price'] == '<=200000')
    {
    $price_selected = "selected = 'selected'";
}
else
    {
    $price_selected = "";
}
?>
                    <option value="<=200000" <?= $price_selected ?>>Below QR 200,000</option>
<?php
if ($_GET['price'] == '<=250000')
    {
    $price_selected = "selected = 'selected'";
}
else
    {
    $price_selected = "";
}
?>
                    <option value="<=250000" <?= $price_selected ?>>Below QR 250,000</option>
<?php
if ($_GET['price'] == '<=350000')
    {
    $price_selected = "selected = 'selected'";
}
else
    {
    $price_selected = "";
}
?>
                    <option value="<=350000" <?= $price_selected ?>>Below QR 350,000</option>
<?php
if ($_GET['price'] == '<=500000')
    {
    $price_selected = "selected = 'selected'";
}
else
    {
    $price_selected = "";
}
?>
                    <option value="<=500000" <?= $price_selected ?>>Below QR 500,000</option>
<?php
if ($_GET['price'] == '>=5000000')
    {
    $price_selected = "selected = 'selected'";
}
else
    {
    $price_selected = "";
}
?>
                    <option value=">=500000" <?= $price_selected ?>>More than QR 500,000</option>
                </select>
                <!--<a id="filter_it" href="#">Filter</a>-->
                <input id="filter_it" type="submit" value="Filter" name="filter_it"/>
            </form>

        </div>

        <div class="search-products clearfix" id="filter">
<?php
if (@$_GET['filter_it'])
    {
    $id = $_GET['id'];
    $body = $_GET['body_type'];
    $price = $_GET['price'];
    $cars_data = $get->get_filtered_cars('maker_id', $id, 'bodyType', $body, 'price', $price);
    //print_r($cars_data);
    if (empty($cars_data))
        {
        ?>
                    <div class="alert alert-danger">
                        <strong>No Cars Available!</strong>
                    </div>
        <?php
        }
    else
        {
        foreach ($cars_data as $filtered_cars)
            {
            ?>
                        <div class="search-main-product">
                            <div class=""> 
                            <!--Code For thumb----->
                            <a href="car-brands.php?id=<?php echo $filtered_cars['id']; ?>"><img src="http://alwakalat.com/timthumb/timthumb.php?w=200&h=121&src=http://alwakalat.com/<?= $filtered_cars['full_path']; ?>" class="" style="width: 200px;height:121px;"><br /></a>
                            </div>
                            <div class="search-product-text">
                                <h2>
                                    <a href="car-brands.php?id=<?= $filtered_cars['id']; ?>">
            <?= $get->get_single_field('model', 'model_name', 'model_id', $filtered_cars['model']); ?>
            <?= $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $filtered_cars['sub_model']); ?> 
            <?= $filtered_cars['bodyType']; ?>
                                    </a>
                                </h2>
                            </div>
                        </div>
            <?php
            }//=============FOREACH END
        }//============ELSE PART END
    }//============ISSET PART END
    else
    {
?>





<?php
foreach ($cars as $car)
    {
//              echo "<pre>" ; 
//              print_r($car);
    ?>
                <div class="search-main-product">
                    <div class=""> <a href="car-brands.php?id=<?php echo $car['id']; ?>"><img src="http://alwakalat.com/timthumb/timthumb.php?w=200&h=121&src=http://alwakalat.com/<?php echo $car['full_path']; ?>" class="" style="width: 200px;height:121px;">
                            </a> </div>
                    <div class="search-product-text">
                        <h2><a href="car-brands.php?id=<?php echo $car['id']; ?>">
    <?php echo $get->get_single_field('model', 'model_name', 'model_id', $car['model']); ?>
    <?php echo $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $car['sub_model']); ?> 
    <?php echo $car['bodyType']; ?></a></h2>
                    </div>
                </div><?php } ?>
    <?php } ?>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
