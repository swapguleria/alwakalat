<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php';
if(isset($_GET['del_cid']))
{
	$obj->delete_data('category','cat_id',$_GET['del_cid'],'category.php');
}
	$results	=	$obj->get_all_data('category','cat_id','desc');
 ?>

<!-- Page content -->
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Categories<br><small></small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Categories</li>
      
    </ul>
    <!-- END Table Styles Header -->

    <!-- Table Styles Block -->
    <div class="block">
        <!-- Table Styles Title -->
       
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->		<? if(isset($_SESSION["success"])){?>
        <div class="alert alert-success alert-dismissable">                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>                    <h4><i class="fa fa-check-circle"></i> Success</h4> <? echo $_SESSION["success"]; unset($_SESSION["success"]);?></div>			<?}?>
        <div class="table-responsive">
		   <div class="table-options clearfix">
           
            <a href="add_category.php"><div class="btn-group btn-group-sm pull-left">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title="Add Category">
                    Add Category
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
                        
                       
                        <th>Category Name</th>
                        <th>Active</th>
                        
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
					foreach($results as $value)
					{
				?>
                    <tr>
                        
                       
                        <td><?php echo $value['category_name']; ?></td>
                        <td><?php echo $value['category_active']; ?></td>
                        
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="edit_category.php?id=<?php echo $value['cat_id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" onclick="delete_category('<?php echo $value['cat_id'];?>')" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
					<?php } }else{ ?>
					<tr>No Category Here</tr>
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