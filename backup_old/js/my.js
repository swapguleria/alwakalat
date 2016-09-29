

	$(document).ready(function() {


		// validate signup form on keyup and submit
		$("#subscribe").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				name: "Please enter your Name",
				email: "Please enter a valid email address"
			}
		});

		$(".close").click(function(){
			$('.overlay').hide();
			$('.msg').hide();
		});
	});
