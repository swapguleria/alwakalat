<?php
include("includes/header.php");
if (@$_GET['id'])
    {
    $id = $_GET['id'];
    $results = $get->get_single_result_for_used_car('tbl_used_car', 'id', $id);
    if (@$results)
        {

//        $results = $get->get_single_result('tbl_used_car', 'id', $id);
        $dealer = $get->get_single_result('tbl_user', 'id', $results['dealer_id']);
        $images = $get->get_all_event_data_all('tbl_used_cars_image', 'id', 'asc', 'car_id', $results['id']);
        $maker = $get->get_single_field('tbl_maker', 'name', 'id', $results['maker_id']);
        $sub_model = $get->get_single_field('tbl_sub_model', 'name', 'id', $results['sub_model_id']);
        $model = $get->get_single_field('tbl_car_model', 'model_name', 'id', $results['model_id']);
        $bodyType = $get->get_single_field('tbl_body_type', 'name', 'id', $results['body_type_id']);
        $camara = ($results['camera'] == '0') ? "NO" : "YES";
        $GPS = ($results['GPS'] == '0') ? "NO" : "YES";
        $roof = ($results['roof'] == '0') ? "NO" : "YES";
        $accident = ($results['accident'] == '0') ? "NO" : $results['accident_desc'];
        $warranty = ($results['warranty'] == '0') ? "NO" : $results['warranty_expire_date'];
        $owners = $get->getOwnersOptions($results['owners']);
        $fuel_type = $get->getFuelOptions($results['fuel_type']);
        $transmission = $get->getTransmissionOptions($results['transmission']);
        $interior_color = $get->getColourOptions($results['interior_color']);
        }
    else
        {
        header('Location: approvedCars.php');
        }
    }
else
    {
    header('Location: approvedCars.php');
    }

$approved_cars = $get->get_all_approved_card();
?>

<section>
    <div id="result">
        <div class="container">
            <div class="row">
                <div class="result">
                    <div class="result_header col-sm-12">
                        <h3><?php echo $maker, " ", $model, " ", $sub_model, " ", $bodyType; ?></h3>
                    </div>
                    <div class="result_main">

                        <img src="http://alwakalat.com/timthumb/timthumb.php?h=800&src=http://www.alwakalat.com/approvedCars/wdir/uploads/<?php echo $images[0]['image']; ?>"/>
                                                      <!--<img src="images/sedan_1.jpg">-->

                    </div>
                    <div class="result_thumbnail">
                        <div class="result_thumbnail_inner">
                            <?php
                            $i = 0;
                            foreach ($images as $image)
                                {
                                ?>
                                <div class="thumb">
                                    <img data-image="<?= $i ?>" data-img="<?php echo $image['image']; ?>" src="http://alwakalat.com/timthumb/timthumb.php?h=255&src=http://www.alwakalat.com/approvedCars/wdir/uploads/<?php echo $image['image']; ?>"/> 
                                </div>
    <?php
    $i++;
    }
?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="description">
                    <div class="description">
                        <div class="description_header clearfix">
                            <h3 class="pull-left">المواصفات</h3>
                            <button class="btn btn default add_to pull-right btn_click" data-get="<?php echo $_REQUEST['id'] ?>" id="<?php echo $_REQUEST['id'] ?>">اضف الى المفضلة</button>
                        </div>
                        <table class="table table-striped">
                            <!--	<thead>
                                      <tr>
                                            <th>description</th>
                                            <th><button class="btn btn default add_to pull-right">Add To Wish List</button></th>
                                      </tr>
                                    </thead>-->
                            <tbody>
                                <tr>
                                    <td>الصنع</td>
                                    <td><?= $maker ?></td>
                                    <td>اللون الخارجي</td>
                                    <td><?= $exterior_color ?></td>

                                </tr>
                                <tr>
                                    <td>الفئة</td>
                                    <td><?= $model ?></td>  
                                    <td>اللون الداخلي</td>
                                    <td><?= $interior_color ?></td>

                                </tr>
                                <tr>
                                    <td>النوع</td>
                                    <td><?= $sub_model ?></td>
                                    <td>فتحة سقف</td>
                                    <td><?= $roof ?></td>
                                </tr>
                                <tr>
                                    <td>الصنف</td>
                                    <td><?= $bodyType ?></td>
                                    <td>الكاميرا</td>
                                    <td><?= $camara ?></td>

                                </tr>
                                <tr>
                                    <td>السعر</td>
                                    <td>QAR <?php echo number_format($results['price']); ?></td>
                                    <td>نظام الملاحة</td>
                                    <td><?= $GPS ?></td>

                                </tr>
                                <tr>
                                    <td>قاطع</td>
                                    <td><?= $results['milage'] ?> km</td>
                                    <td>حوادث</td>
                                    <td><?= $accident ?></td>

                                </tr>
                                <tr>
                                    <td>نوع مغير السرعة</td>
                                    <td><?= $transmission ?></td>
                                    <td>انتهاء الضمان</td>
                                    <td><?php $dif; ?><?= $warranty ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="add">
                            <img src="images/add_3.jpg"/>
                        </div>
                    </div>

                    <div id="messagess" class="contact">
                        <div class="contact_header clearfix text-center">
                            <h3>تواصل معنا</h3>
                            <p>معلومات التواصل </p>
                        </div>
                        <div class="contact_number dealer-logo">
                            <div class="text-center">
                                <?php if ($dealer['logo'])
                                    { ?>
                                    <img src="http://alwakalat.com/timthumb/timthumb.php?w=180&h=80&src=http://www.alwakalat.com/approvedCars/wdir/uploads/<?php echo $dealer['logo']; ?>"/>
    <?php
    }
else
    {
    ?><img width="180px" height="80px" src="<?php echo $main_url; ?>/approvedCars/themes/basic/images/nocarimage.jpg"/>
<?php } ?>
                            </div>
                        </div>
                        <div class="contact_number">
                            <!--	<i class="fa fa-phone" aria-hidden="true"></i>-->
                            <div class="contact_img text-center">
                                <img src="images/number_before.png"/>
                            </div>
                            <h2><?= $dealer['phone_no'] ?></h2>
                        </div> 
                        <div class="contact_mail text-center">
                            <a href="javascript:void(0);"><?= $dealer['email'] ?></a>
                        </div>
                        <?php
                        if (isset($_POST['send']))
                            {
                            $to = "swap.prashantr@gmail.com";
                            $subject = "Contact Information of Car Dealer";
                            $message = "";
                            $message .= ' <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

                            </head>
                            <body style="margin: 0;
                                  font-family: Tahoma, sans-serif;">
                                <table width="100%" id="html"  style="background-color: #eee;
                                       width: 100%;
                                       height: 100%;
                                       margin: 0 auto;" border="0" cellpadding="0"
                                       cellspacing="0">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table width="650px" id="body" style="width: 500px;
                                                   margin: 0 auto;
                                                   font-size: 12px;
                                                   color: #333333;
                                                   background-color: #fff;
                                                   border: 1px solid antiquewhite;
                                                   text-valign: center;" border="0" cellpadding="0"
                                                   cellspacing="20">
                                                <tr>
                                                    <td id="header" style="color: white;
                                                        font-size: 1.2em;
                                                        padding: 15px;
                                                        background: #108c74;
                                                        text-align: center;
                                                        text-valign: center;
                                                        font-weight: bold;
                                                        margin-bottom: 30px;
                                                        border-radius: 4px 4px 4px 4px;">Hello &nbsp;<b> Alwakalat </b></td>
                                                </tr>
                                                <tr>
                                                <div class="mail-box" style="
                                                     width:350px;
                                                     margin:auto;">

                                                    <div class="mail-content" style="
                                                         font-size:14px;
                                                         padding:10px;">
                                                        <p><b>Name</b>: ' . $_POST['username'] . '  ' . $_POST["lastname"] . ' </p>
                                                        <p><b>Email</b>: ' . $_POST["email"] . ' </p>
                                                        <p><b>Phone Number</b>:  ' . $_POST["phone"] . '  </p>
                                                        <p><b>Message</b>:' . $_POST["message"] . ' </br></p>
                                                    </div>
                                                </div><p> Sincerely,<br> Alwakalat. </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="footer" style="background: #108c74;
                                            color: #E2E2E2;
                                            border-radius: 4px 4px 4px 4px;
                                            margin-top: 30px;
                                            padding: 15px;
                                            text-weight: bold;
                                            text-align: center;
                                            text-valign: center;">
                                            <p>
                                                Copyright &copy;
                                                ' . date("Y") . ' 
                                                by
                                                Swap Developers
                                                . All Rights Reserved.<br />
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                        ';

//                            $message .= "Name: "." ".$_POST['username']."<br/>";
//                             
//                            
//                            $message .= "Email : "." ".$_POST['email']."<br/>";
//                            
//                            $message .= "Phone : "." ".$_POST['phone']."<br/>";
//                            
//                            $message .= "Message : "." ".$_POST['message']."<br/>";
                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
                            $headers .= 'From: <info@alwakalat.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

                            $send = mail($to, $subject, $message, $headers);

                            if ($send)
                                {
                                ?>
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong> تم ارسال رسالتك بنجاح</strong>
                                </div>               
                                <?php
                                }
                            else
                                {
                                ?>   
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>خطر!</strong> هناك خطأ في ارسال الايميل.
                                </div>    
        <?php
        }
    }
?>
                        <form role="form" method="post" action="<?php echo $_SERVER['SELF'] ?>#messagess" class="text-center">
                            <div class="form-group">
                                <input type="text" placeholder="اسمك" name="username" required="required" class="form-control">
                                <input type="email" required="required" name="email" placeholder="الايميل" class="form-control">
                                <input type="tel" pattern="[0-9]{10,10}" required="required" placeholder="رقم الهاتف" name="phone" class="form-control">
                                <textarea type="text" placeholder="الرسالة" required="required" name="message" class="form-message"></textarea>
                                <input type="submit" name="send" class="btn btn-default form_submit" value="ارسل الرسالة"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="related">
        <div class="container">
            <div class="row">
                <div class="related col-sm-12">
                    <div class="related_header">
                        <h3>ذات صلة <span>نتائج </span></h3>
                    </div>
                                <?php
                                foreach ($approved_cars as $key => $val)
                                    {
//                                echo '<pre>';
//                                print_r($val);
                                    ?>  <div class="related_cars col-sm-3">
                            <div class="related_inner">
                                <div class="related_img">
    <?php
    if ($val['banner_image'])
        {
        ?>
                                        <img src="http://alwakalat.com/timthumb/timthumb.php?w=275&h=255&src=http://www.alwakalat.com/approvedCars/wdir/uploads/<?php echo $val['banner_image']; ?>"/>
        <?php
        }
    else
        {
        ?><img src="<?php echo $main_url; ?>/approvedCars/themes/basic/images/nocarimage.jpg"/>

                                    <?php } ?>
                                    <div class="related_hover">
                                        <div class="related_hover_inner  text-center">
                                            <!--<button class="btn btn-default hover_btn">View Details</button>-->
                                            <a href="approvedCar.php?id=<?php echo $val['id']; ?>"  class="btn btn-default hover_btn" style="background: rgba(49, 39, 131, 0.8) none repeat scroll 0 0;    border: medium none;  border-radius: 0;    color: #fff;    margin-top: 37%;    padding: 14px;    text-transform: uppercase;">شاهد التفاصيل</a>

                                        </div>
                                    </div>
                                </div>
                                <div class="related_text">
                                    <h3><?php echo $get->get_single_field('tbl_maker', 'name', 'id', $val['maker_id']), ' ', $get->get_single_field('tbl_car_model', 'model_name', 'id', $val['model_id']), ' ', $get->get_single_field('tbl_sub_model', 'name', 'id', $val['sub_model_id']); ?></h3>
                                    <h4>QAR <?php echo number_format($val['price']); ?></h4> <?php
//                                              <----------  get the year of worranty Start------------->
                                    $date_parts1 = date('Y');
                                    $date_parts2 = explode("-", $val['warranty_expire_date']);
                                    $year = $date_parts2[0] - $date_parts1;

                                    $datetime1 = new DateTime($val['warranty_expire_date']);

                                    $datetime2 = new DateTime(date('Y-m-d'));

                                    $difference = $datetime1->diff($datetime2);


                                    //echo $val['warranty_expire_date'];

                                    if (@$year)
                                        {
                                        if ($year > '1')
                                            {

                                            $year = $difference->y . ' years, '
                                                    . $difference->m . ' months, '
                                                    . $difference->d . ' days';

                                            //  $year = $year . " Years";
                                            }
                                        else
                                            {
                                            // $year = $year . " Year";

                                            $year = $difference->y . ' years, '
                                                    . $difference->m . ' months, '
                                                    . $difference->d . ' days';
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

                                    <div class="related_text_2 clearfix">
                                        <p>الضمان</p>
                                        <span class="pull-right"><?php echo $year; ?></span>
                                    </div>
                                    <div class="related_text_2 clearfix">
                                        <p>قاطع</p>
                                        <span class="pull-right"><?php echo $val['milage'], ' km'; ?></span>
                                    </div>
                                    <div class="related_text_2 clearfix">
                                        <p>السرعة</p>
                                        <span class="pull-right"><?php echo (@$val['speed']) ? $val['speed'] . " Ma" : "N/A"; ?></span>
                                    </div>
                                    <div class="related_text_2 clearfix">
                                        <p>التسارع 0-100</p>
                                        <span class="pull-right"><?php echo (@$val['acceleration'] != '0.0') ? $val['acceleration'] . " Seconds" : "N/A"; ?></span>
                                    </div>
                                    <div class="related_text_2 clearfix">
                                        <p>سعة المحرك</p>
                                        <span class="pull-right"><?php echo (@$val['engine_size']) ? $val['engine_size'] . " L" : "N/A"; ?></span>
                                    </div>
                                    <div class="related_text_2 clearfix">
                                        <p>حصان</p>
                                        <span class="pull-right"><?php echo (@$val['horse_power']) ? $val['horse_power'] . " HP" : "N/A"; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
    <?php
    }
?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
//echo '<pre>';
//print_r($dealer);
//echo '</pre>';
?>
<?php include("includes/footer.php"); ?>
<script type="text/javascript">
    $(document).ready(function ()
    {
        $(document).on('click', '.thumb img', function ()
        {
            var id = $(this).attr('data-image');

            //alert(id);

            var data_img = $(this).attr('data-img');



            $(".result_main").html('');

            $(".result_main").html("<img src='http://alwakalat.com/timthumb/timthumb.php?h=800&src=http://www.alwakalat.com/approvedCars/wdir/uploads/" + data_img + "'/>");



        });


        $(document).on('click', '.btn_click', function ()
        {
            var current_id = $(this).attr('id');

            var data_get = $(this).attr('data-get');


            var myData = '&current_id=' + current_id + '&data_get=' + data_get;
            var url = 'get.php';
            $.ajax({
                type: "POST", // HTTP method POST or GET
                url: url, //Where to make Ajax calls
                dataType: "text", // Data type, HTML, json etc.
                data: myData, //Form variables
                success: function (response) {


//                    alert(response);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    $("#error").html(thrownError);
                }
            });


        });




    });
</script>