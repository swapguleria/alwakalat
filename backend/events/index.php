<?php include 'inc/index_header.php';
	/*****************Give the page title*********************/

?>
<div class="title" style="display:none">Home</div>
	  
		  <div class="banner">
			<div id="slides">
			<?php $results = $obj->get_all_data_active('slider','slider_id','asc','slider_active','yes');
			if(is_array($results))
			{
				foreach($results as $value)
				{ ?>
					 <img src="<?php echo $value['slider_full_path']; ?>" />
					<?php 
				}
			}
			?>
             
             
            </div>
		  </div>
		  
		  <div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php echo $pages_content['pages_text']; 
						
								include('home.php');
						?>
				  </div>
				</div>
			</div>
		</div>
		  <div class="blank"></div>
<?php include 'inc/footer.php'; ?>