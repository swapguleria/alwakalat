<?php
include("includes/header.php");


if (!empty($_GET["action"]))
    {

    switch ($_GET["action"])
        {
        case "add":
            if (!empty($_POST["qty"]))
                {

                $product_id = $_POST['product_id'];

                $get_single_products = $get->get_single_product_details('product', 'p_id', $product_id);


                $get_single_product_details = $get->get_product_description('product_details', 'p_id', $product_id, 'pd_id', $_POST['product_size']);



                $itemArray = array($get_single_product_details['product_sku'] => array('name' => $get_single_products['product_name'], 'color' => $get_single_product_details['color'], 'size' => $get_single_product_details['size'], 'product_image' => $get_single_products['full_path'], 'code' => $get_single_product_details["product_sku"], 'quantity' => $_POST["qty"], 'price' => $get_single_product_details['price']));



                if (!empty($_SESSION["cart_item"]))
                    {
                    if (in_array($get_single_product_details['product_sku'], $_SESSION["cart_item"]))
                        {
                        foreach ($_SESSION["cart_item"] as $k => $v)
                            {
                            if ($get_single_product_details['product_sku'] == $k) $_SESSION["cart_item"][$k]["quantity"] = $_POST["qty"];
                            }
                        }
                    else
                        {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    }
                else
                    {
                    $_SESSION["cart_item"] = $itemArray;
                    }
                }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"]))
                {

                foreach ($_SESSION["cart_item"] as $k => $v)
                    {
                    if ($_GET["code"] == $k)
                        {

                        unset($_SESSION["cart_item"][$k]);
                        }

                    if (empty($_SESSION["cart_item"])) unset($_SESSION["cart_item"]);
                    }
                }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
        }
    header('Location:cart.php');
    }
if (isset($_POST['update_cart']) && !empty($_POST['update_cart']))
    {
//    echo '<pre>';
//    print_r($_POST);
////    print_r($_SESSION);
//    echo '</pre>';
    $count = count($_POST['code']);
//    echo $count;
    for ($i = 0; $i < $count; $i++)
        {
//        if (in_array($_POST['code'][$i], $_SESSION["cart_item"]))
//            {
//            echo "yes";
//            foreach ($_SESSION["cart_item"] as $k => $v)
//                {
//                if ($_POST['code'][$i] == $k)
//                    {
        $_SESSION["cart_item"][$_POST['code'][$i]]["quantity"] = $_POST["qty_id_"][$i];

//        $_SESSION["cart_item"]["quantity"] = $_POST["qty_id_"][$i];
//                    }
//                }
//            }
        }
    }
//echo '<pre>';
////    print_r($_POST);
//print_r($_SESSION);
//echo '</pre>';
?>
<style type="text/css">
    .cart_empty{ float:left;}
</style>
<div class="overlay"></div>
<div id ="wait" style="position: fixed; padding: 2px;display:none; z-index: 9; top: 25%; width: 270px; left: 40%;"><img src="images/loading-1.gif"></div>
<div class="main product-cart-page">


    <section class="cart-row">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="my-cart">	
                        <h1>Cart</h1>
                        <div class="main-cart">

                            <table class="shop_table shop_table_responsive cart" cellspacing="0">
                                <form action="" method="post" name="cart_form" id="cart_form">
                                    <?php
                                    if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item']))
                                        {
                                        ?>


                                        <thead>
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            $item_total = 0;
                                            foreach ($_SESSION['cart_item'] as $item)
                                                {
                                                $item_total += ($item["price"] * $item["quantity"]);
                                                $sub_total = 0;
                                                $sub_total = $item["price"] * $item["quantity"];
                                                ?>


                                                <tr class="cart_item" id="cart_row_<?= $i ?>">
                                                    <td class="product-remove">
                                                        <a href="cart.php?action=remove&code=<?= $item['code'] ?>" class="remove" title="Remove this item" data-product_id="311" data-product_sku="">x</a>
                                                    </td>
                                                    <td class="product-thumbnail">
                                                        <a href="#"><img src="<?= $item['product_image']; ?>" title="" alt="" height="58" width="58"></a>
                                                    </td>
                                                    <td class="product-name" data-title="Product">
                                                        <a href="#"><?= $item['name'] ?></a>
                                                        <p class="color-row"><span class="product-color">Color: </span><span><?= $item['color'] ?></span></p>
                                                        <p><span class="product-size">Size:</span><Span><?= $item['size'] ?></Span></p>
                                                    </td>
                                                    <td class="product-price" id="product_price_<?= $i ?>" data-price="<?= $item['price'] ?>">
                                                        <span class="amount"><?= cur . " " . $item['price'] ?></span>
                                                    </td>
                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity">
                                                            <input type="number" id="qty_id_<?php echo $i ?>" name="qty_id_[<?php echo $i ?>]" min="1" max="100" title="Qty" class="input-text qty text" value="<?= $item['quantity'] ?>" readonly="">
                                                        </div>
                                                    </td>
                                            <input type="hidden" name="code[<?= $i ?>]" value="<?= $item['code'] ?>"/>

                                            <td class="product-subtotal" id="product_subtotal_<?= $i ?>" data-subtotal="<?= $sub_total ?>">
                                                <span class="subtotal_<?php echo $i ?>"><?= cur . " " . $sub_total; ?></span>
                                            </td>
                                            </tr>
                                            <?php
                                            $i++;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="6" class="actions" id="product_total" data-grandtotal=<?= $item_total ?>>
                                                <span class="amount" id="grand_totals"><?= cur . " " . $item_total ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                           <td colspan="3" class="actions">
                                                <!--<input type="submit" class="button" name="update_cart" value="Update Cart">-->
                                                <div class="wc-proceed-to-checkout"> <a href="shop.php"  class="checkout-button button"> Add More Product</a> </div>
                                            </td>
                                            <td colspan="3" class="actions">
                                                <!--<input type="submit" class="button" name="update_cart" value="Update Cart">-->
                                                <div class="wc-proceed-to-checkout"> <a href="javascript:void(0);" id="checkout_btn" class="checkout-button button"> Proceed to Checkout</a> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                           
                                            
                                        </tr>
                                        
                                        <?php
                                        }
                                    else
                                        {
                                        ?>
                                        <tr>
                                            <td colspan="6" class="cart_empty">
                                                <p>Your cart is empty. <a href="shop.php">Return To Shop</a></p>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                    ?>
                                    </tbody>

                            </table>
                            </form>
                        </div><!--main-cart-->
                       <?php
					     if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item']))
						 {
					   ?>
                    <!--  <div class="cart-collaterals">
                                <div class="cart_totals calculated_shipping">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0" class="shop_table shop_table_responsive">

                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td data-title="Subtotal"><span class="amount sub-total"><?= cur . " " . $item_total ?></span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td data-title="Total"><span class="amount sub-total"><?= cur . " " . $item_total ?></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout"> <a href="javascript:void(0);" id="checkout_btn" class="checkout-button button"> Proceed to Checkout</a> </div>
                                </div>
                            </div>-->
							<?php
							  }
							?>
                            
                    </div><!--my-cart-->
                </div><!--col-sm-12-->
            </div><!--row-->
        </div><!--container-->
    </section><!--cart-row-->


    <!--below-clients-->
</div>
<?php include("includes/footer.php"); ?> 

<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".qty").click(function ()
        {

            var id = $(this).attr('id');
            var split_id = id.split("_");
            var splitid = split_id[2];
            var qty = $(this).val();


            var product_price = $("#product_price_" + splitid).data('price');

            var product_row_id = 'cart_row_' + splitid;


            // var product_total = $('.product-subtotal').data('subtotal');
            var product_total = $("#product_subtotal_" + splitid).data('subtotal');

            var producttotal = (product_price * qty);

            $(".subtotal_" + splitid).text('');
            //alert(producttotal);


            $(".subtotal_" + splitid).text('<?= cur ?>' + " " + producttotal);
            $("#product_subtotal_" + splitid).data('subtotal', producttotal);


            var ggtotal = $('#grand_totals').text(producttotal);

            var total_amount = 0;
            var counter = "<?php echo count($_SESSION["cart_item"]); ?>";
            for (var i = 0; i < counter; i++)
            {
                total_amount += $("#product_subtotal_" + i).data('subtotal');

            }

            $("#grand_totals").text('');
            $("#grand_totals").text('<?php echo cur ?>' + '' + total_amount);
            $(".sub-total").text('<?php echo cur ?>' + '' + total_amount);








        });
        
        $("#checkout_btn").click(function()
        {
              //alert("hello");
              //$("#cart_form").submit();
            window.location.href='http://alwakalat.com/checkout.php';
              
          });
          
         
    });
</script>