<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 

$car_data	=	$obj->get_single_result('car_data','id',$_GET['id']);

?>


<style>
#general-table img {
    float: right;
}
</style>
<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>View Cars<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Car Detail</a></li>

    </ul>


    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>Car Detail</h2>

        </div>

        <!-- END Example Title -->



        <!-- Example Content -->

       <div class="table-responsive">
			<div class="table-options clearfix">
           
            <a href="manage_cars.php"><div class="btn-group btn-group-sm pull-left">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Slider">
                    << Back
			</div>
			</a>
        </div>
            <!--
            Available Table Classes:
                'table'             - basic table
                'table-bordered'    - table with full borders
                'table-borderless'  - table with no borders
                'table-striped'     - striped table
                'table-condensed'   - table with smaller top and bottom cell padding
                'table-hover'       - rows highlighted on mouse hover
                'table-vcenter'     - middle align content vertically
            -->
            <table id="general-table" class="table table-striped table-vcenter">
                
                <tbody>
					 <tr><th></th><td><img src="../<?php echo $car_data['full_path'] ; ?>"></td></tr>
                    <tr><th>Maker</th><td><?php echo $obj->get_single_field('maker','name','id',$car_data['maker_id']) ; ?></td></tr>
                    <tr><th>Model</th><td><?php echo $car_data['model'] ; ?></td></tr>
                    <tr><th>Sub Model</th><td><?php echo $car_data['sub_model'] ; ?></td></tr>
                    <tr><th>BodyType</th><td><?php echo $car_data['bodyType'] ; ?></td></tr>
                    <tr><th>Year</th><td><?php echo $car_data['year'] ; ?></td></tr>
                    <tr><th>Price</th><td><?php echo $car_data['price'] ; ?></td></tr>
                    <tr><th>Colors</th><td><?php echo $car_data['color'] ; ?></td></tr>
                    <tr><th>Warranty</th><td><?php echo $car_data['Warranty'] ; ?></td></tr>
                    <tr><th>Acceleration</th><td><?php echo $car_data['acceleration'] ; ?></td></tr>
                    <tr><th>Top Speed</th><td><?php echo $car_data['top_speed'] ; ?></td></tr>
                    <tr><th>Engine Size</th><td><?php echo $car_data['engineSize'] ; ?></td></tr>
                    <tr><th>Horse Power</th><td><?php echo $car_data['h_power'] ; ?></td></tr>
                    <tr><th>Clyinders</th><td><?php echo $car_data['clyinders'] ; ?></td></tr>
                    <tr><th>Driven Wheels</th><td><?php echo $car_data['drivenWheels'] ; ?></td></tr>
                    <tr><th>Special Features</th><td><?php echo $car_data['specialFeatures'] ; ?></td></tr>
					
                </tbody>
              
            </table>
        </div>
        <!-- END Example Content -->

    </div>

    <!-- END Example Block -->

</div>

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>