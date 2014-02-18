$('#change_pwd_btn').on('click',function(){
	// alertify.log("1");
	$.post("/api/account/change_pwd",{

	},function(data){
		alertify.log(data);
	});
});