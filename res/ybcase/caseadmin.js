$('#mktp_btn').on('click',function(){
	var mktp_textarea = $('#mktp_textarea').val();
	var mktp_input = $('#mktp_input').val();
	if(mktp_input =='' || mktp_textarea=='') {
		alertify.error('Empty Input');
		return false;
	};
	$.post('/ybcase/admin/template_action_insert',{
		sbj_name: mktp_input,
		sbj_content:mktp_textarea
	},function(data){
		if (data.r) {
			alertify.success(data.a);
		} else{
			alertify.error(data.a);
		};
	});
});

$('#mkflow_add_btn').on('click',function(){
	var show_area = $('#mkflow_show_area').val();
	var law_select_val = $('#law_select_val').val();
	var law_input_val = $('#law_input_val').val();
	if (law_select_val=='' || law_input_val == '') {
		alertify.error('Empty Input');
		return false;
	};
	if (show_area=="") {
		$('#mkflow_show_area').val(law_select_val+'-'+law_input_val);
	}else{
		$('#mkflow_show_area').val(show_area+'+'+law_select_val+'-'+law_input_val);
	}
});

// $('#mkflow_a').on('click',function(){
// 	$('.case_template').empty();
// 	$.post('/ybcase/admin/template_action_get_name',{},function(data){
// 		for (var i = 0; i < data.length; i++) {
// 			$('.case_template').append('<div class="item" data-value="'+data[i].sbj_name+'">'+data[i].sbj_name+'</div>');
// 		}
// 	});
// });