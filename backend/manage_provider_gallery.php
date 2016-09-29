<?php
include 'inc/config.php';
include 'inc/template_start.php';
?>
<?php
include 'inc/page_head.php';
if (isset($_GET['id']))
    {
    $obj->delete_data('provider_gallery', 'id', $_GET['id'], 'manage_provider_gallery.php');
    }
$results_provider = $obj->get_all_data('providers', 'id', 'desc');
$results = $obj->get_all_data('provider_gallery', 'id', 'desc');
unset($_SESSION['success']);
?>
<?php $obj->admin_not_login(); ?>
<div id="page-content">
    <div class="content-header">	<div class="header-section">                <h1>				
                <i class="gi gi-brush"></i>Service Provider Gallery<br><small></small>
            </h1>			</div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Dashboard</li>
        <li>Homepage</li>
        <li><a href="">Service Provider Gallery</a></li>
    </ul>
    <div class="block">
        <div class="block-title">
            <h2><strong>Add Gallery Images</strong></h2>
        </div>

        <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
            <input type="hidden" name="action" value="service_provider_gallery">
            <div class="form-group">
                <label class="col-md-3 control-label" for="logo">Maker <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <select name="service_provider" class="maker form-control">
                        <option value="">Select Provider name</option>                        
                        <?php
                        foreach ($results_provider as $providers)
                            {
                            ?><option value="<?php echo $providers['id']; ?>"><?php echo $providers['provider_name']; ?></option>	
                        <?php } ?>


                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="logo">Image <span class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="file" id="gallary_image" name="gallery_image">
                    </div>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                </div>
            </div>
        </form>				<table id="example-datatable" class="table table-striped table-vcenter">                <thead>				<?php
                if (is_array($results))
                    {
                    ?>                    
                    <tr>					
                        <th>Image</th>						                        
                        <th style="width: 150px;" class="text-center">Actions</th>                    </tr>                </thead>                
                <tbody>				
                    <?php
                    foreach ($results as $value)
                        {
                        ?>                    
                        <tr>                                                                       
                            <td><?php
                        if ($value['image_name'] != '')
                            {
                            ?>							
                                    <img width='200px' height='200px' src="../<?php echo $value['full_path']; ?>">						
        <?php } ?>
                            </td>                        
                            <td class="text-center">                            
                                <div class="btn-group btn-group-xs">                                
                                    <a href="manage_provider_gallery.php?id=<?php echo $value['id']; ?>" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>                            </div>                        </td>                    </tr>					
                                        <?php
                                        }
                                    }
                                else
                                    {
                                    ?>					
                    <tr>No Provider Here</tr>                    
<?php } ?>                
            </tbody>                          
        </table>
    </div>


</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include "inc/template_end.php" ?>