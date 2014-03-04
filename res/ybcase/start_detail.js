$('#start_flow_btn').on('click',function(){
	var all_temp_val = '';
	// var all_temp_val = {};
	var all_temp_size = $('#size_val').val();
	var email_who = $('#temp_val_email').val();
	var flow_name = $('#flow_name_val').val();
	if ($('.temp_value').val() =='') {
		alertify.error('Emptp Input');
		return false;
	};
	$('.temp_value').each(function(){
		all_temp_val += $(this).attr('id')+':'+$(this).val()+'-&*&-';
		// all_temp_val.$(this).attr('id') = $(this).val();
	});
	if (all_temp_val=='') {
		alertify.error('Emptp Input');
		return false;
	};
	// alertify.log(all_temp_val);
	$.post('/ybcase/insert_flow',{
		all_temp_size:all_temp_size,
		email_who:email_who,
		flow_name:flow_name,
		all_temp_val:all_temp_val
	},function(data){
		if (data.r) {
			alertify.success(data.a);
			location.href='/ybcase';
		} else{
			alertify.error(data.a);

		};
	});
});