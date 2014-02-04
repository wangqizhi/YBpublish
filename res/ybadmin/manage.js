$('#admin_insert_user').on('click',function() {
	var input = $('#admin_input_id').val();
	if (input == '') {
		alertify.alert("empty input is deny");

	};
	// alertify.alert(input);
});


//插入用户
$("#yb_insert_btn").on("click", function () {
	var username=$('#yb_username').val();
	var passwd=$('#yb_passwd').val();
	var passwd_c=$('#yb_passwd_c').val();
	var nick=$('#yb_nick').val();
	if (username=="") {
		alertify.error("Username is empty");
		return false;
	}
	if (passwd=="") {
		alertify.error("Password is empty");
		return false;
	}
	if (nick=="") {
		alertify.error("Nick is empty");
		return false;
	}
	if (passwd != passwd_c) {
		alertify.error("Password not match");
		return false;
	}
	alertify.confirm("Insert?", function (e) {
		if (e) {
			$.post('/admin_user/only_require',{
				username:username,
				passwd:passwd,
				nick:nick
			},function(data){
				// alert(data);return;
				if (data == 1) {
					alertify.alert("Insert ok");
				} else{
					alertify.error("User exists");
				};
			});
		} else {
			alertify.alert("Cancel Insert");
		}
	});
});


//插入组
$("#yb_insertg_btn").on("click", function () {
	var groupname=$('#yb_groupname').val();
	
	if (groupname=="") {
		alertify.error("Groupname is empty");
		return false;
	}
	
	alertify.confirm("Insert?", function (e) {
		if (e) {
			$.post('/admin_group/only_require',{
				groupname:groupname,
			},function(data){
				// alert(data);return;
				if (data == 1) {
					alertify.alert("Insert ok");
					location.reload();//刷新页面为了刷新组
				} else{
					alertify.error("Group exists");
				};
			});
		} else {
			alertify.alert("Cancel Insert");
		}
	});
});

//插入权限
$("#yb_insertp_btn").on("click", function () {
	var powername = $('#yb_powername').val();
	var powerurl = $('#powerurls_select').val();
	if (powername=="") {
		alertify.error("Groupname is empty");
		return false;
	}
	alertify.confirm("Insert?", function (e) {
		if (e) {
			// alert(powerurl);return;

			$.post('/admin_power/only_require',{
				powername:powername,
				powerurl:powerurl
			},function(data){
				// alert(data);return;
				if (data == 1) {
					alertify.alert("Insert ok");
					location.reload();//刷新页面为了刷新权限
				} else{
					alertify.error("ACL exists");
				};
			});
		} else {
			alertify.alert("Cancel Insert");
		}
	});
});


//select-group change事件
$('#group_select').on('change',function() {
	// alertify.log($('#group_select').val());
	location.href='/admin_group/group_add/'+$('#group_select').val();
});


//tag-group
var groupname = $('#groupname_hidden').val(); 
$('#tagsinput').tagsInput({
	// height:'50px',
	// width:'auto',
    onAddTag:function(tag){
        // console.log('增加了'+tag)
        $.post('/admin_user/user_add_group',{
        	username:tag,
        	groupname:groupname
        },function(data){
        	if (data =="1") {
        		alertify.log("ok");

        	} else{
        		// alertify.log("user not exists");
        		$('#tagsinput').removeTag(tag);
        	};
        });
    },
    onRemoveTag:function(tag){
        // console.log('删除了'+tag)
        $.post('/admin_user/user_add_group',{
        	username:tag,
        	groupname:""
        },function(data){
        	if (data =="1") {
        		alertify.log("del successful");

        	} else{
        		alertify.error("user not exists");
        	};
        });
    }
});


//赋予权限
$('#yb_givepower_btn').on('click',function(){
	var groupname = $('#yb_givepower_input').val();
	var powername='';    
	$('input[name="power_checkbox"]:checked').each(function(){    
   		powername += $(this).val()+"-";    
  	});
  	$.post('/admin_group/group_add_power',{
  		groupname:groupname,
  		powername:powername
  	},function(data){
  		if (data =="1") {
        		alertify.log("Set Power successful");

        	} else{
        		alertify.error("Failed");
        	};

  	});

});


//插入模块
$('#yb_insertm_btn').on('click',function(){
	var module_name = $('#module_name').val();
	var show_name = $('#show_name').val();
	var level = $('#level').val();
	var href = $('#href').val();
	var parent = $('#parent').val();
	var important = $('#important').val();
	var power_group = 'Root-'+$('#power_group').val();
	var serial = $('#serial').val();
	var has_child = $('#has_child').val();
	if (module_name=="" || show_name=="" || level=="" || href=="" ||serial=="") {
		alertify.error("Input Empty");
	};
	$.post("/admin_module/add_module",{
		module_name:module_name,
		show_name:show_name,
		level:level,
		href:href,
		parent:parent,
		important:important,
		power_group:power_group,
		serial:serial,
		has_child:has_child
	},function(data){
		alertify.alert(data);
	});



});