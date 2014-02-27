$('#mktp_btn').on('click',function(){
	var mktp_textarea = $('#mktp_textarea').val();
	var mktp_input = $('#mktp_input').val();
	if(mktp_input =='' || mktp_textarea=='') {
		alertify.error('Empty Input');
	};
});

$('#mkflow_add_btn').on('click',function(){
	var show_area = $('#mkflow_show_area').val();
	var law_select_val = $('#law_select_val').val();
	var law_input_val = $('#law_input_val').val();
	if (law_select_val=='' || law_input_val == '') {
		alertify.error('Empty Input');
	};
	if (show_area=="") {
		$('#mkflow_show_area').val(law_select_val+'-'+law_input_val);
	}else{
		$('#mkflow_show_area').val(show_area+'+'+law_select_val+'-'+law_input_val);
	}
});