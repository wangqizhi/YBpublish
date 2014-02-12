$('#yb_publish_cd_btn').on('click',function(){
	var dir_name = $('#yb_publish_dir_input').val();
	// alertify.log('mkdir start');
	if (dir_name=="") {
		alertify.error("Empty Input");
		return false;
	};
	$.post('/ybpublish/admin/yb_mkdir',{
		dir_name:dir_name
	},function(data){
		if (data.r) {
			alertify.success('mkdir successful');
		} else{
			alertify.error(data.a);
		};
	});
});

$('#yb_publish_mount_btn').on('click',function(){
	var dir_name = $('#yb_publish_dir_input').val();
	var mount_dir = $('#yb_publish_mount_input').val();
	if (dir_name=="" || mount_dir=="") {
		alertify.error("Empty Input");
		return false;
	};
	$.post('/ybpublish/admin/yb_mount_output',{
		dir_name:dir_name,
		mount_dir:mount_dir
	},function(data){
		alertify.prompt("copy it & run in linux",function(){},data);
	});
});

$('.ui.dropdown').dropdown();

$('#yb_publish_dir_btn').on('click',function(){
	var real_path = $('#yb_publish_dir_input').val();
	var power_group = $('#group_select').val();
	var dir_name = $('#dir_name_input').val();
	if (power_group=="" || dir_name=="" || real_path=="") {
	// if (flow_name=="" || s_dir=="" ) {
		alertify.error("Empty Input");
		return false;
	};
	$.post('/ybpublish/admin/yb_insert_dir',{
		power_group:power_group,
		dir_name:dir_name,
		real_path:real_path
		// s_dir:s_dir,
		// d_dir:d_dir,
		// flow_acl:flow_acl
	},function(data){
		if(data.r){
			alertify.success('Insert ok');
		}else{
			alertify.error(data.a);
		}

	});
});

$('#yb_publish_givepower_btn').on('click',function(){
	var flow_name_select = $('#flow_name_select').val();
	var group_name_select = $('#group_name_select').val();
	if (flow_name_select==""||group_name_select=="") {
		alertify.error('Please Choose!');
		return false;
	};
	$.post('/ybpublish/admin/yb_insert_flow_power',{
		flow_name_select:flow_name_select,
		group_name_select:group_name_select
	},function(data){
		if(data.r){
			alertify.success(data.a);
		}else{
			alertify.error(data.a);
		}
	});
});