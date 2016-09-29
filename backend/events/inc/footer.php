</div>
	  </div>
	</div>
  </div>
  
  <div id="footer_container">
    <div class="container">
	  <div class="row">
	    <div class="footer_navi">
		  <div class="col-md-12 col-sm-12 col-xs-12">
		    <ul class="menu">
			  <?php if($_SERVER['SCRIPT_NAME']=='/events/index.php'){
			  $active1	=	'current';
			  }else{
			  $active1	=	'';
			  }?>
			<?php /*    <li><a href="<?php echo SITEURL; ?>" class="<?php echo $active1; ?>">Home</a></li>	 */ ?>
			  <?php $pages = $obj->get_all_data_active_home('pages','pages_order','asc','pages_active','yes');
			if(is_array($pages))
			{
				foreach($pages as $value)
				{ 
					if($value['pages_slug']==$_GET['page'])
					{
						$active	=	'current';
					}else{
						$active	=	'';
					}
				?>
					 <li><a href="<?php echo $value['pages_slug']; ?>" class="<?php //echo $active; ?>"><?php echo $value['pages_name']; ?></a></li>
					<?php 
				}
			}
			?>
			<li><a href="contact_us" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/contact_us.php'){/* echo 'active';*/}?>">Contact Us</a></li>
			</ul>
		  </div>
		  </div>
		  
		  <div class="col-md-12 col-sm-12 col-xs-12">
		    <div class="blank"></div>
		    <div class="logo logo_footer">
			   <a href="<?php echo SITEURL; ?>"><img src="<?php echo $logo['logo_path']; ?>"  /></a>
			</div>
		  </div>
		  
	  </div>
	</div>
  </div>
  
</div>
<script src="js/jquery.slides.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/custom.js"></script>
<script>
    $(function() {
      $('#slides').slidesjs({
        width: 940,
        height: 528,
		 play: {effect: "fade",auto: true,
		interval: 5000},
        navigation: {
          effect: "fade"
        },
        pagination: {
          effect: "fade"
        },
        effect: {
          fade: {
            speed: 400
          }
        }
      });
    });
  </script>
  
</body>
</html>