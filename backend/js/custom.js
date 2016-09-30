/******** Tinymce for text area *******/
tinyMCE.init({
  // General options
  mode : "exact",
  elements:'ckeditor,ckeditor2',
  theme : "advanced",
  plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

  // Theme options
  theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
  theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
  theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
  theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
  theme_advanced_toolbar_location : "top",
  theme_advanced_toolbar_align : "left",
  theme_advanced_statusbar_location : "bottom",
  theme_advanced_resizing : true,

  // Example content CSS (should be your site CSS)
  content_css : "css/content.css",

  // Drop lists for link/image/media/template dialogs
  template_external_list_url : "lists/template_list.js",
  external_link_list_url : "lists/link_list.js",
  external_image_list_url : "lists/image_list.js",
  media_external_list_url : "lists/media_list.js",

  // Style formats
  style_formats : [
   {title : 'Bold text', inline : 'b'},
   {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
   {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
   {title : 'Example 1', inline : 'span', classes : 'example1'},
   {title : 'Example 2', inline : 'span', classes : 'example2'},
   {title : 'Table styles'},
   {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
  ],

  // Replace values for the template plugin

 });

/*************/

function delete_category(id)
{
	var check	=	confirm('Are you want to Delete this category');
	if(check==true)
	{
		window.location.href="category.php?del_cid="+id;
	}
}

function delete_location(id)
{
	var check	=	confirm('Are you want to Delete this location');
	if(check==true)
	{
		window.location.href="location.php?del_lid="+id;
	}
}
function delete_find(id)
{
	var check	=	confirm('Are you want to Delete this Find');
	if(check==true)
	{
		window.location.href="find.php?del_fid="+id;
	}
}
function delete_video(id)
{
	var check	=	confirm('Are you want to Delete this Video');
	if(check==true)
	{
		window.location.href="video.php?del_yid="+id;
	}
}
function delete_type(id)
{
	var check	=	confirm('Are you want to Delete this Type');
	if(check==true)
	{
		window.location.href="type.php?del_tid="+id;
	}
}
function delete_slider(id)
{
	var check	=	confirm('Are you want to Delete this Banner');
	if(check==true)
	{
		window.location.href="slider.php?del_sid="+id;
	}
}
function delete_events(id)
{
	var check	=	confirm('Are you want to Delete this Events');
	if(check==true)
	{
		window.location.href="events.php?del_eid="+id;
	}
}
function delete_teacher(id)
{
	var check	=	confirm('Are you want to Delete this Teacher');
	if(check==true)
	{
		window.location.href="teacher.php?del_tid="+id;
	}
}

function delete_pages(id)
{
	var check	=	confirm('Are you want to Delete this Pages');
	if(check==true)
	{
		window.location.href="pages.php?del_pid="+id;
	}
}
function delete_genre(id)
{
	var check	=	confirm('Are you want to Delete this Genre');
	if(check==true)
	{
		window.location.href="genre.php?del_gid="+id;
	}
}function delete_session(id)
{
	var check	=	confirm('Are you want to Delete this Session');
	if(check==true)
	{
		window.location.href="session.php?del_gid="+id;
	}
}function delete_program(id)
{
	var check	=	confirm('Are you want to Delete this Program');
	if(check==true)
	{
		window.location.href="program.php?del_gid="+id;
	}
}function delete_day(id)
{
	var check	=	confirm('Are you want to Delete this Day');
	if(check==true)
	{
		window.location.href="day.php?del_gid="+id;
	}
}
function delete_price(id)
{
	var check	=	confirm('Are you want to Delete this Price');
	if(check==true)
	{
		window.location.href="price.php?del_gid="+id;
	}
}
function delete_camp_price(id)
{
	var check	=	confirm('Are you want to Delete this Price');
	if(check==true)
	{
		window.location.href="camp_price.php?del_gid="+id;
	}
}
function delete_new(id)
{
	var check	=	confirm('Are you want to Delete this new data');
	if(check==true)
	{
		window.location.href="new.php?del_gid="+id;
	}
}
function delete_testimonial(id)
{
	var check	=	confirm('Are you want to Delete this testimonial');
	if(check==true)
	{
		window.location.href="testimonial.php?del_gid="+id;
	}
}
function delete_class(id)
{
	var check	=	confirm('Are you want to Delete this Class');
	if(check==true)
	{
		window.location.href="class.php?del_gid="+id;
	}
}
function delete_camp(id)
{
	var check	=	confirm('Are you want to Delete this Camp');
	if(check==true)
	{
		window.location.href="camp.php?del_cid="+id;
	}
}
function delete_private_class(id)
{
	var check	=	confirm('Are you want to Delete this Class Price');
	if(check==true)
	{
		window.location.href="private_class.php?del_gid="+id;
	}
}
function change_status(id)
{
	var check	=	confirm('Are you want to Change the status of this User');
	if(check==true)
	{
		window.location.href="register_user.php?register_id="+id;
	}
}

function insert_pages()
{
	$('.input-group').removeClass('has-error');
	$('.col-md-6').removeClass('has-error');
	$('.error_message').html('');
	var pages_name		=	$('#pages_name').val();
	var pages_module	=	$('#pages_module').val();
	if(pages_name=='')
	{
		$('#pages_name').parent().addClass('has-error');
		$('#pages_name').focus();
		return false;
	}
	if(pages_module=='')
	{
		$('#pages_module').parent().addClass('has-error');
		$('#pages_module').focus();
		return false;
	}
	var datastring	=	'pages_name='+pages_name+'&table=pages&field=pages_name&action=check_already';
	$.ajax({
		type:'POST',
		url:'process.php',
		data:datastring,
		success:function(response)
		{
			if(response=='1')
			{
				$('.error_message').css('color','#e74c3c');
				$('.error_message').html('Page Name Already Exist');	
				$('#pages_name').parent().addClass('has-error');
				$('#pages_name').focus();
			}else{
				$('#formsubmit').submit();
			}
		
		}
	
	});
	return false;
}
function edit_pages()
{
	$('.input-group').removeClass('has-error');
	$('.col-md-6').removeClass('has-error');
	$('.error_message').html('');
	var pages_name		=	$('#pages_name').val();
	var pages_module	=	$('#pages_module').val();
	var pages_id		=	$('#pages_id').val();
	if(pages_name=='')
	{
		$('#pages_name').parent().addClass('has-error');
		$('#pages_name').focus();
		return false;
	}
	if(pages_module=='')
	{
		$('#pages_module').parent().addClass('has-error');
		$('#pages_module').focus();
		return false;
	}
	var datastring	=	'pages_name='+pages_name+'&table=pages&field=pages_name&id='+pages_id+'&id_value=pages_id&action=check_already_this';
	$.ajax({
		type:'POST',
		url:'process.php',
		data:datastring,
		success:function(response)
		{
			if(response=='1')
			{
				$('.error_message').css('color','#e74c3c');
				$('.error_message').html('Page Name Already Exist');	
				$('#pages_name').parent().addClass('has-error');
				$('#pages_name').focus();
				}else{
					$('#formsubmit').submit();
				}
		
		}
	
	});
	return false;
}
$(document).ready(function()
{
	$('#example-datatable').DataTable();
	$(".maker").change(function()
		{
		var id=$(this).val();
		var dataString = 'id='+ id+'&action=model';

		$.ajax
			({
			type: "POST",
			url: "get_model.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			$(".model").html(html);
			} 
			});

	});
	$(".model").on('change', function()
		{
		var id=$(this).val();
		var dataString = 'id='+ id+'&action=sub_model';

		$.ajax
			({
			type: "POST",
			url: "get_model.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			$(".sub_model").html(html);
			} 
			});

	});

});









