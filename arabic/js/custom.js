$().ready(function() {
		$("#advertise").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					phoneUS: true
				},
				content: "required"
			},
			messages: {
				firstname: "الرجاء إدخال اسمك الأول",
				lastname: "يرجى إدخال اسم العائلة",
				email: "رجاء قم بإدخال بريد الكتروني صحيح",
				phone: "يرجى إدخال رقم هاتف صالح",
				content: "الرجاء إدخال المحتوى"
			}
		});
		$("#feedback").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				message: "required"
			},
			messages: {
				name: "من فضلك أدخل إسمك",
				email: "رجاء قم بإدخال بريد الكتروني صحيح",
				message: "يرجى إدخال الرسالة"
			}
		});
		
		$("#guide").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				},
				DOB: "required",
				address: "required",
				id_card: "required",
				phone: {
					required: true,
					phoneUS: true
				},
				availability: "required"
			},
			messages: {
				name: "الرجاء إدخال اسمك الأول",
				email: "رجاء قم بإدخال بريد الكتروني صحيح",
				DOB: "الرجاء ادخال تاريخ ميلادك",
				address: "الرجاء إدخال عنوانك",
				id_card: "الرجاء إدخال رقم بطاقة الهوية الخاصة بك",
				phone: "الرجاء إدخال رقم هاتف صالح",
				availability: "يرجى ذكر ذلك",
			}
		});

	});