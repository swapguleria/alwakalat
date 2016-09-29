$(document).ready(function()
{
   
   $("#update_profile").click(function (e) 
   {
        e.preventDefault();
     
    	 
    var password = $("#user-settings-password").val();
	
	 var cpassword = $("#user-settings-repassword").val();
	if(password == '')
	{
	   alert("Please enter your password");
	   $("#user-settings-password").focus();
	   return false;
	}
	if(cpassword == '')
	{
	   alert("Please reenter your password");
	   $("#user-settings-repassword").focus();
	   return false;
	}
	if(cpassword != password)
	{
	   alert("Please enter same password");
	   $("#user-settings-repassword").focus();
	   return false;
	}
	
	
	var dataString = $("#update_profileform").serialize();
	
	
	
	
          
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "update_profile.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:dataString, //Form variables
            success:function(response){
			
			alert(response);
                

            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#FormSubmit").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image
                alert(thrownError);
            }
            });
    });
});