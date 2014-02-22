$('#check_files_btn').on('click',function(){
	check_files = $('#publish_check_files').val();
	target_dir = $('#publish_check_target_dir').val();
	if (check_files=="" || target_dir=="") {
		alertify.error("Empty Input!");
		return false;
	};
	$.post('/ybpublish/check_files',{
		check_files:check_files,
		target_dir:target_dir
	},function(data){
		if (data.r) {
			alertify.success(data.a);
		} else{
			alertify.alert(data.a);

		};
		// alert(data);
	});
});


