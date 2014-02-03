
$('#ybindex_submit').on('click',function() {
			// reset();
			var input_user = $('#input_user').val();
			var input_pass = $('#input_pass').val();
			if (input_user == ""){
				alertify.alert("empty input is deny");
				return false;
			};
			if (input_pass == ""){
				alertify.alert("empty input is deny");
				return false;
			};
			$.post('checkLogin/check',{
				input_user:input_user,
				input_pass:input_pass
			},function(data){
				// test =data;
				if(data.result == 0){
					alertify.alert(data.say);
					// return false;
				}else{
					location.href='/ybindex/choose_index';
				}
			});
			return false;


});

$('#yb_logout').on('click',function(){
	alertify.confirm("Do You Want To Exit?",function(e){
		if (e) {
			// alertify.log("ok!");
			location.href="/checkLogin/yblogout";

		} else{
			alertify.error("You Enter The Cancel!");

		};
	});
		return false;

});

