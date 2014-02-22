$('.ui.dropdown').dropdown();

$('#publish_btn').on('click',function() {
	// body...
	// alert(1);return;
	var flow_name = $('#flow_name_input').val();
	var flow_input_raw = $('#flow_input_raw').val();
	if (flow_name=="" ) {
		alertify.error("Empty Input");
		return false;
	};
	$('#loading_field').attr("class","ui active inverted dimmer");
	// $.post('/ybpublish/publish_flow_resolve',{},function(data){alert(data)});


	$.post('/api/account/online_or_not',{},function(data){
		// alert(data);return;
		if (data != 1) {
			alertify.error('Please Login');
			return false;
		}else{
			$.post('/ybpublish/publish_flow_resolve',{
				flow_name:flow_name,
				flow_input_raw:flow_input_raw
			},function(data) {
				$("#loading_field").attr("class","ui disable inverted dimmer");
				alertify.alert(data.a);
			});
		}
	});
	
});

