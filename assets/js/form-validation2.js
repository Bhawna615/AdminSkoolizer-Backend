$(function(){
	$("form[name='signin']").validate({
		rules: {
		
			Email: {
				required: true,
				email: true

			},
			Password: {
				required: true,
				minlength:8,

			}
	},
	messages:{
		
		Password: {
			required: "Password required",
			minlength: "Must contain minimum 8 characters"
		},
		
		Email: "Please Enter a valid email address"
	},
	submitHandler: function(form){
		form.submit();
	}
});
});