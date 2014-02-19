$('#change_pwd_btn').on('click',function(){
	// alertify.log("1");
	var username =$('#update_username_label').attr('value');
	var passwd = $('#update_passwd_input').val();
	// alertify.log(username);
	// return;
	$.post("/api/account/change_pwd",{
		username:username,
		passwd:passwd
	},function(data){
		alertify.log(data.a);
	});
});