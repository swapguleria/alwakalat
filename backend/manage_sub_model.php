<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 

	if(isset($_GET['del_id']))
	{
		$obj->delete_data('sub_model','sub_id',$_GET['del_id'],'manage_sub_model.php');
	}
	$results	=	$obj->get_all_data('maker','id','ASC');
	$result_model_data	=	$obj->get_all_data('sub_model','sub_id','ASC');
	
	if(isset($_GET['id']))
	{
		$model	=	$obj->get_single_result('sub_model','sub_id',$_GET['id']);
		$result_model_	=	$obj->get_all_data_active("model","model_id","ASC","maker_id",$model['maker_id']);
		
		$action = 'edit_sub_model';
	}else{
		$action	=	'add_sub_model';
	}
	unset($_SESSION['success']);
?>

<?php $obj->admin_not_login(); ?>

<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Sub-Model<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Manage Sub-Model</a></li>

    </ul>

    <!-- END Blank Header -->
	<div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Add Sub-Model</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="<?php echo $action;?>">
				<input type="hidden" name="sub_id" value="<?php if(isset($_GET['id'])){ echo $_GET['id'];}?>">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red; font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
						
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Maker <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <select name="maker" class="maker form-control">
									<option value="">Select Maker</option>
									<?php foreach($results as $maker){?>
									
									<option value="<?php echo $maker['id'];?>"  <?php if($model['maker_id']==$maker['id']){ echo "selected";} ?>><?php echo $maker['name'];?></option>
									<?}?>
									</select>
								
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Model <span class="text-danger">*</span></label>
                            <div class="col-md-6">
								 <select name="model" class="model form-control">
									
									<?php if(is_array($result_model_)){
										
										foreach($result_model_ as $get){?>
											<option value="<?php echo $get['model_id'];?>"  <?php if($model['model_id']==$get['model_id']){ echo "selected";} ?>><?php echo $get['model_name'];?></option>
										<?php }
										
									}else{?>
										<option selected="selected">--Select model--</option>
										
									<?php }?>
									</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Sub Model <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="sub_model_name" class="form-control" value="<?php if(isset($model['sub_model_name'])){ echo $model['sub_model_name'];}?>">
								
                            </div>
                        </div>
						
                      </fieldset>
               
                   
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                           
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Example Content -->

               
            </div>


    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>List Of Sub-Model</h2>

        </div>

        <!-- END Example Title -->



        <!-- Example Content -->

       <div class="table-responsive">
		
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
            <table id="example-datatable" class="table table-striped table-vcenter">
                <thead>
				<?php if(is_array($results)){ ?>
                    <tr>
						<th>S.No</th>
						<th>Maker</th><th>Model</th>
						<th>Sub-Model</th>
						
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php 
				$i=0;
					foreach($result_model_data as $data)
					{ $i++;
				?>
                    <tr>
						<td><?php echo $i; ?></td>
                        <td><?php echo $obj->get_single_field('maker','name','id',$data['maker_id']) ; ?></td>
                        <td><?php echo $obj->get_single_field('model','model_name','model_id',$data['model_id']) ; ?></td>
                        
                        <td><?php echo $data['sub_model_name']; ?></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="manage_sub_model.php?id=<?php echo $data['sub_id'];?>" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="manage_sub_model.php?del_id=<?php echo $data['sub_id'];?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
					<?php } }else{ ?>
					<tr>No Sub-Model Here</tr>
                    <?php } ?>
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