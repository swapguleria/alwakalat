<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';

if(isset($_GET['id']))

{

	$obj->delete_data('products','product_id',$_GET['id'],'products.php');

}

	$results	=	$obj->get_all_data('products','product_id','desc');

 ?>



<!-- Page content -->

<div id="page-content">

    <!-- Table Styles Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-table"></i>Product<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Product</li>

      

    </ul>

    <!-- END Table Styles Header -->



    <!-- Table Styles Block -->

    <div class="block">

        <!-- Table Styles Title -->

       

        <!-- END Table Styles Title -->



        <!-- Table Styles Content -->

        <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
		<? if(isset($_SESSION["success"])){?>
        <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="fa fa-check-circle"></i> Success</h4> <? echo $_SESSION["success"]; unset($_SESSION["success"]);?></div>
			<?}?>
        <div class="table-responsive">

		   <div class="table-options clearfix">

           

            <a href="add_product.php"><div class="btn-group btn-group-sm pull-left">

                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Category">

                    Add Product

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

                <thead>

				<?php if(is_array($results)){ ?>

                    <tr>

                        

                       

                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Specification</th>
                        <th>Product Price </th>
                        <th>Product Featured Image</th>
                        <th>Product Category</th>
                        <th>Banner Images1</th>
                        <th>Banner Images2</th>
                        <th>Banner Images3</th>

                        

                        <th style="width: 150px;" class="text-center">Actions</th>

                    </tr>

                </thead>

                <tbody>

				<?php 

					foreach($results as $value)

					{

				?>

                    <tr>
					
						<td><?php echo $value['product_name']; ?></td>
						<td><?php echo $value['product_description']; ?></td>
                        <td><?php echo $value['product_specification']; ?></td>
                        <td><?php echo $value['product_price']; ?></td>
                        <td><img src="productBanners/<?php echo $value['product_featured_image']; ?>" style="width:100px;"></td>
                        <td><?php echo $value['category']; ?></td>
                        <td><img src="productBanners/<?php echo $value['banner_image1']; ?>" style="width:100px;"></td>
                        <td><img src="productBanners/<?php echo $value['banner_image2']; ?>" style="width:100px;"></td>
                        <td><img src="productBanners/<?php echo $value['banner_image3']; ?>" style="width:100px;"></td>
						<td class="text-center">

                            <div class="btn-group btn-group-xs">

                                <a href="edit_product.php?id=<?php echo $value['product_id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>

                                <a href="products.php?id=<?php echo $value['product_id'];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>

                            </div>

                        </td>

                    </tr>

					<?php } }else{ ?>

					<tr>No Product Here</tr>

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