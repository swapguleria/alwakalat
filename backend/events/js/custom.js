$(document).ready(function(){ 
	$('.pay_next_month').click(function() {
		$('#user_payment').show();
		$(this).hide();
	});
	var title = $("title").text();
	var title1 = $(".title").text();
	if(title == 'Index')
	{
		$("title").text(title1);
	}
	$('.sname').click(function(){
		var id = $(this).attr('id');
		$('.sinfo').hide();
		$('.'+id).show();
	});
 /***************** My class data *************/

	$('#student_select').change(function () {
		$('#student_select_form').submit();
	});
	
	 /***************** Add new Stident *************/
	
	$('.add_student').click(function() {
		$("#popup").show();
		$(".add_student_popup.popup").show();
	
	
	});
	$( ".student_birth" ).datepicker({"dateFormat": "m-d-y"});
	$( ".register_date" ).datepicker({"dateFormat": "m-d-y"}); 
	
	/****************   Show hide student information ****************************/
	
	 $('.stdinfo1').css('display','none');
	$('.stdinfo2').css('display','none');
	$('.stdinfo3').css('display','none');
	$('.stdinfo4').css('display','none');
	$('.show_hide1').click(function(){
		if($('.stdinfo1').css('display') == 'none')	{$('.stdinfo1').css('display','block'); }
		else{$('.stdinfo1').css('display','none');}
	});
	$('.show_hide2').click(function(){
		if($('.stdinfo2').css('display') == 'none')	{$('.stdinfo2').css('display','block'); }
		else{$('.stdinfo2').css('display','none');}		
	});
	$('.show_hide3').click(function(){
		if($('.stdinfo3').css('display') == 'none')	{$('.stdinfo3').css('display','block'); }
		else{$('.stdinfo3').css('display','none');}		
	});
	$('.show_hide4').click(function(){
		if($('.stdinfo4').css('display') == 'none')	{$('.stdinfo4').css('display','block'); }
		else{$('.stdinfo4').css('display','none');}		
	}); 
	
	$('.pay_type').change(function() {
		var type = $(this).val();
		
		if(type == 'One_time_payment')
		{
			$('#Reccuring_payment').css('display','none');
			$('#Pay_at_studio').css('display','none');
			$('#One_time_payment').css('display','block');
		}
		if(type == 'Reccuring_payment')
		{
			$('#One_time_payment').css('display','none');
			$('#Pay_at_studio').css('display','none');
			$('#Reccuring_payment').css('display','block');
		}
		if(type == 'Pay_at_studio')
		{
			$('#One_time_payment').css('display','none');
			$('#Reccuring_payment').css('display','none');
			$('#Pay_at_studio').css('display','block');
		}
	
	});
});
/****************  registration form valiudation ****************************/

		// validate signup form on keyup and submit
		      jQuery("#register_form").validate({
			rules: {
				student_firstname: "required",
				student_parent_name: "required",
				student_tshirt_size: "required",
				student_age: {
					required: true,
					digits: true
					},
				student_gender: "required",
				register_phone:{
					required: true,
					digits: true
					},
				attend_month:{
					digits: true,
					min : 1,
					max :12
					},
				student_parent_email: {email: true, required: true, remote: {url: "./inc/checkUnameEmail.php", type : "post"}},
				register_city: "required",
				register_state: "required",
				register_zip: {
						required: true,
						digits: true
						},
				register_authorize_phone: {
						required: true,
						digits: true
						},
				register_address: "required",
				bmonth: "required",
				bdate: "required",
				byear: "required",
				register_gaurdain: "required",
				register_authorize: "required",
				register_parents_signature: "required",
				register_date: "required",
				register_findus: "required"
				
			}
		});   
		    
/****************  payment form validation ****************************/

		// validate signup form on keyup and submit
		  jQuery("#One_time_payment").validate({
			rules: {
				expy: "required",
				expm: "required",
				bfname: "required",
				blname: "required",
				ccnum:{
					required: true,
					digits: true,
					maxlength : 16
					},				
				cvv: "required",
				pay_city: "required",
				pay_state: "required",
				address: "required",
				zipcode: {
						required: true,
						digits: true
						}				
			}
		});

		 jQuery("#user_payment").validate({
			rules: {
				expy: "required",
				expm: "required",
				bfname: "required",
				blname: "required",
				ccnum:{
					required: true,
					digits: true,
					maxlength : 16
					},				
				cvv: "required",
				pay_city: "required",
				pay_state: "required",
				address: "required",
				zipcode: {
						required: true,
						digits: true
						}				
			}
		});

		
		 jQuery("#Reccuring_payment").validate({
			rules: {
				expy: "required",
				expm: "required",
				bfname: "required",
				blname: "required",
				ccnum:{
					required: true,
					digits: true,
					maxlength : 16
					},				
				cvv: "required",
				zipcode: {
						required: true,
						digits: true
						}				
			}
		});  
		
/****************  change password form valiudation ****************************/

		// validate signup form on keyup and submit
		  jQuery("#login_form").validate({
			rules: {
				username: "required",
				password: "required"
							
			}
		});  
/****************  Add student form valiudation ****************************/

		// validate signup form on keyup and submit
		  jQuery("#addStudent_form").validate({
			rules: {
				student_name: "required",
				bmonth: "required",
				bdate: "required",
				byear: "required",
				student_gender: "required",
				student_age: "required"
							
			}
		});  
		
/****************  Login form valiudation ****************************/

		// validate signup form on keyup and submit
		  jQuery("#change_password_form").validate({
			rules: {
				old_pass: {
					required : true
                },
				new_pass: {
                    minlength : 6,
					required : true
                },
				retype_pass:  {
                     equalTo : "#password",
					required : true
                }
							
			}
		});  
		
/****************  Edit Address form valiudation ****************************/

		// validate signup form on keyup and submit
		  jQuery("#Edit_add").validate({
			rules: {
				register_address: "required",
				register_phone:{
					required: true,
					digits: true
					},
				register_city: "required",
				register_state: "required",
				register_zip: "required"							
			}
		});  
		
/****************  Edit Address form valiudation ****************************/

		// validate feedback form on keyup and submit
		  jQuery("#feedback_form").validate({
			rules: {
				name: "required",
				phone:{
					required: true,
					digits: true
					},
				message: "required",
				email: {email: true, required: true }						
			}
		});  
		

/****************  search  student class ****************************/

function select(aa) 
{
	var iname = $('.'+aa).attr('data-iname');	
//	var bdate = $('.'+aa).attr('data-bdate');	
	var sfn = $('.'+aa).attr('data-sfn');	
	var gender = $('.'+aa).attr('data-gender');	
	//var bd5= $('.'+bdate).datepicker('getDate');
	//var bd1= $('.'+bdate).val();
	var gen=$('.'+gender).val();
	if($('.'+sfn).val() == ''){alert('please Enter student first name '); return false;}
	if($('.'+gender).val() == ''){alert('please Select Student Gender '); return false;}
	//if(bd1 == ''){alert('please Enter student  birthdate'); return false;}
	//var today = new Date();
	//var yyyy = today.getFullYear();
	//var yyyy1 = bd5.getFullYear();
	//var year=yyyy-yyyy1;
	//var url= "select_class.php?age="+year+"&field="+iname+"&gender="+gen;
	var url= "select_class.php?field="+iname+"&gender="+gen;
	
	$.ajax({
		url : url,
		method : 'POST',
		success : function (msg)
		{
			$('.result1').html(msg);
		}		
	});
	$("#popup").show();
	$(".popup").show();
	
}


function class_select(name,class_id,iname,class_name,day,time)
{
	
		var url= "seats_check.php?id="+class_id+"&name="+name;	
		$.ajax({
			url : url,
			method : 'POST',
			success : function (msg)
			{
				if(msg == 'close')
				{
					$("#cross2").trigger('click'); 
					$('.result2').text('');
					$('.result2').html('<h1 class="select_error">Space now limited. Please call the studio.</h1>');
					$("#popup2").show();
					$(".popup1").show();
				}
				else
				{
					$("#cross2").trigger('click'); 
					$("#cross").trigger('click'); 
					$('#'+iname).val(class_name+','+day+' /'+time );
					$('#'+iname).attr("data-class-id",class_id);	
					$('#'+iname).prev().val(class_id);	
					$('#'+iname).prev().prev().val(name);
				}
			}		
		});
	
}

function classinfo(id)
{
	var url= "classinfo.php?id="+id;
	
	$.ajax({
		url : url,
		method : 'POST',
		success : function (msg)
		{
			$('.result2').text('');
			$('.result2').html(msg);
		}		
	});
	$("#popup2").show();
	$(".popup1").show(); 
}

function campinfo(id)
{
	var url= "campinfo.php?id="+id;
	
	$.ajax({
		url : url,
		method : 'POST',
		success : function (msg)
		{
			$('.result2').text('');
			$('.result2').html(msg);
		}		
	});
	$("#popup2").show();
	$(".popup1").show();
}


	