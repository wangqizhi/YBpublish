$('#mktp_btn').on('click',function(){
	var mktp_textarea = $('#mktp_textarea').val();
	var mktp_input = $('#mktp_input').val();
	if (mktp_input=='' || mktp_textarea=='') {
		alertify.error('Empty Input');
	};
});