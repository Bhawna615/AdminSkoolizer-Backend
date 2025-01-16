$(function(){
	$("form[name='registration']").validate({
		rules: {
			Email: {
				required: true,
				email: true

			},
			Password: {
				required: true,
				minlength:8,

			},
			confirm:{
		
				equalTo: "#pass"
			},
			class:{
				required: true
			},
			roll:{
				required:true
			}
	},
	messages:{
		Password: {
			required: "Password required",
			minlength: "Must contain minimum 8 characters"
		},
		confirm: {
			
			equalTo: "Do not Match"

		},
		Email: "Please Enter a valid email address"
	},
	submitHandler: function(form){
		form.submit();
	}
});
});



