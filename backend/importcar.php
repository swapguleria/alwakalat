<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; 
       
?>

<?php
include 'inc/page_head.php';
unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Cars<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Manage Cars</a></li>

    </ul>
<?php  
if ($_FILES[csv][size] > 0) {
    //get the csv file
    $file = $_FILES[csv][tmp_name];
    $handle = fopen($file, "r");
    
    //loop through the csv file and insert into database
    do {
        if ($data[0]) {
            $sql = mysql_query("INSERT INTO car_data (id, maker_id,bodyType, model, sub_model, year, color, price, Warranty, acceleration, top_speed, engineSize, h_power, clyinders, drivenWheels, specialFeatures, image_name, thumb_path, full_path  ) VALUES     
            (
                   '".addslashes($data[0])."',
                   '".addslashes($data[1])."',
                   '".addslashes($data[2])."',
                   '".addslashes($data[3])."',
                   '".addslashes($data[4])."',
                   '".addslashes($data[5])."',
                   '".addslashes($data[6])."',
                   '".addslashes($data[7])."',
                   '".addslashes($data[8])."',
                   '".addslashes($data[9])."',
                   '".addslashes($data[10])."',
                   '".addslashes($data[11])."',
                   '".addslashes($data[12])."',
                   '".addslashes($data[13])."',
                   '".addslashes($data[14])."',
                   '".addslashes($data[15])."',
                   '".addslashes($data[16])."',
                   '".addslashes($data[17])."',
                   '".addslashes($data[18])."'   
                 )
                   
            ");
        }
    }
    while ($data = fgetcsv($handle,1000,",","'"));
    
    //Print auto-generated id
    if($sql != "")
    {
        $lastid = mysql_insert_id($connect);
        echo '<span style="color:green">'."<b>Your File Has been Import . </b><br><br>";  
        echo "New Record Created Successfully. Last Inserted Id is : " . $lastid. '</span>';
    }else 
    {
        echo '<span style="color:red">' . "ERROR: " . $sql . "<br>" . mysql_error($connect) . '</span>';
    }
}
 
?>
    <h3>Import CSV File Into Database</h3>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        Choose your file:
        <input type="file" name="csv" id="csv" />
        <input type="submit" name="submit" value="Submit">
    </form>
 
</div>

<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>