$('.ui.dropdown').dropdown();

$('#publish_btn').on('click',function() {
	// body...
	// alert(1);return;
	var flow_name = $('#flow_name_input').val();
	if (flow_name=="") {
		alertify.error("Empty Input");
		return false;
	};
	$.post('/ybpublish/publish_flow_resolve',{
		flow_name:flow_name
	},function(data) {
		alertify.error(data.a);
	});
});