// $('.ui.dropdown').dropdown({
// 	onChange:function(value,text){
// 		alertify.log(text);
// 	},
// });

// action下拉框,添加action说明
$('.flow_action.selection.dropdown').dropdown({
	onChange:function(value){
		content_value = 'Nothing';
		if (value == 'copy') {
			var content_value = "arg[0]:$input, arg[1]:source dir, arg[2]:destination dir"; 
		};
		if (value == 'echo') {
			var content_value = "arg[0]:showDebug"; 
		};
		$('#ybpublish_action_input').popup({
			on:'focus',
			content:content_value
		});
	},
});


// group下拉框
$('.my_group.selection.dropdown').dropdown();

$('.dir_list.sidebar').sidebar('toggle');


$('#flow_make_rule').on('click',function(){
	var btn_value = $('#yb_mkdir_select_val').val();
	// alertify.log(btn_value);
	var base_input = $('#flow_rule_input').val();
	var yb_bu_input = $('#ybpublish_action_input').val();
	// alertify.log(base_input);
	if (btn_value=="0") {
		alertify.error("Please Choose Action");
		return false;
	};
	if (yb_bu_input=="") {
		alertify.error("Empty Args");
		return false;
	};
	if (base_input=="") {
		$('#flow_rule_input').val(base_input+btn_value+'('+yb_bu_input);
	}else{
		$('#flow_rule_input').val(base_input+'-'+btn_value+'('+yb_bu_input);
	}
	// }

	
});


$('#flow_insert_btn').on('click',function(){
    var flow_name = $('#flow_name_input').val();
    var flow_rule = $('#flow_rule_input').val();
    var share_who = $('#sharewho').val();
    var creater = $('#username').val();
    if (flow_name=="") {
    	alertify.error('Empty Input');
    	return false;
    };
    $.post('/ybpublish/insert_mkflow',{
    	flow_name:flow_name,
    	flow_rule:flow_rule,
    	share_who:share_who,
    	creater:creater
    },function(data){
    	if (data.r) {
    		alertify.log('Insert ok');
    	}else{
    		alertify.error(data.a);
    	};

    });
	// alertify.log('test');
});