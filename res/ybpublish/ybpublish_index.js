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

	$.post('/ybpublish/publish_flow_resolve',{
		flow_name:flow_name,
		flow_input_raw:flow_input_raw
	},function(data) {
		// if (data.goon == 2) {
		// 	alertify.alert(data.a);
		// 	return false;
		// };

		$("#loading_field").attr("class","ui disable inverted dimmer");

		alertify.alert(data.a);
		// alertify.error(data.a);
		// alertify.error(data.a);
	});
});

