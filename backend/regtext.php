<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';



	$results	=	$obj->get_all_data('regtext','id','desc');

 ?>



<!-- Page content -->

<div id="page-content">

    <!-- Table Styles Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-table"></i>Text<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Text</li>

      

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

                <thead>

				<?php if(is_array($results)){ ?>

                    <tr>

                        

                       

                        <th>Paragraph 1</th>
                        <th>Paragraph 1</th>
                        <th>Paragraph 1</th>
                        <th style="width: 150px;" class="text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

				<?php 

					foreach($results as $value)
					{
				?>
                    <tr>
                        <td><?php echo $value['p1']; ?></td>
                        <td><?php echo $value['p2']; ?></td>
                        <td><?php echo $value['p3']; ?></td>
                        <td class="text-center">

                            <div class="btn-group btn-group-xs">

                                <a href="edit_regtext.php?id=<?php echo $value['id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>                        

                            </div>

                        </td>

                    </tr>

					<?php } }else{ ?> 

					<tr>No Text
                    <?php } ?>

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