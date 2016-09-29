<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php';

	$results	=	$obj->get_all_data('slider','slider_id','desc');
	unset($_SESSION['success']);
 ?>

<?php $obj->admin_not_login(); ?>

<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Slider<br><small></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">

		<li>Dashboard</li>

        <li><a href="all_slider.php">Manage Sliders</a></li>
      
    </ul>
    <!-- END Table Styles Header -->
	
    <!-- Table Styles Block -->
    <div class="block">
        <!-- Table Styles Title -->
       
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
        
        <div class="table-responsive">
		   <div class="table-options clearfix">
           
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
                <!--thead>
				
                    <tr>
						<th>Slider Image</th>
                        <th>Active</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead-->
                <tbody>
				
                    <tr>
                        
                       
                        <td>HomePage Slider</td>                       
                        <td class="text-center">
                             <a href="slider.php"><div class="btn-group btn-group-sm pull-left">
								<label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Slider">
									Manage Slider
							</div>
							</a>
                        </td>
                    </tr>
                   <tr>
                        
                       
                        <td>Promotion slider</td>                       
                        <td class="text-center">
                            <a href="promotion_slider.php"><div class="btn-group btn-group-sm pull-left">
								<label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Slider">
									Manage Slider
							</div>
							</a>
                        </td>
                    </tr>
					
                </tbody>
              
            </table>
        </div>
        <!-- END Table Styles Content -->
    </div>
    <!-- END Table Styles Block -->

    <!-- Row Styles Block -->
    
    <!-- END Row Styles Block -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>
<?php include 'inc/template_end.php'; ?>