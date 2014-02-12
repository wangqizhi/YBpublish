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
	$.post('/ybpublish/publish_flow_resolve',{
		flow_name:flow_name,
		flow_input_raw:flow_input_raw
	},function(data) {
		alertify.error(data.a);
		// alertify.error(data.a);
	});
});