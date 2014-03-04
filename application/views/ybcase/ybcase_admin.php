<div class="ui inline grid">
	<!-- <div class="eight  wide column"> -->
		<div class="ui secondary vertical menu four wide column">
			<a mark="mktp" class="case active teal item">
    			Make Template
  			</a>

  			<a id="mkflow_a"  mark="mkflow" class="case  teal item">
    			Make Flow
  			</a>
  			
  			<a mark="power" class="case teal item">
    			Power
 			 </a>
  
		</div>
		<div  id="mktp" class="case twelve wide column">
			<div class="ui form segment">
				<div class="field">
					<label></label>
					<textarea id="mktp_textarea" placeholder="Enter Template，split by enter(\n)"></textarea>
				</div>
				<div class="field">
					<div class="input">
						<input id="mktp_input" type="text" placeholder="Enter Template Name">
					</div>
				</div>

				<div class="field">
					<div id="mktp_btn" class="ui green button">
						Make Template
					</div>
				</div>
			</div>
		</div>
		<div id="mkflow" class="case twelve wide column" style="display: none;">
			<div class="ui segment">
				<div class="ui form">
					<div class="field">
						<div class="ui input">
							<input id="flow_name_val" type="text" placeholder="flow name">
						</div>
					</div>
					<div class="field">
						<div class="ui selection dropdown">
							<input id="template_name_val" type="hidden">
							<div id="template_drop" class="text">Choose Template Name</div>
							<i class="dropdown icon"></i>
							<div class="case_template menu">
					<!-- 			<div class="item" data-value="1">1</div>
								<div class="item" data-value="123412">123412</div>
								<div class="item" data-value="2">2</div> -->
									<?php 
									// var_dump($template_name);exit;
										foreach ($template_name as $one_template) {
											echo '<div class="item" data-value="'.$one_template['sbj_name'].'">'.$one_template['sbj_name'].'</div>';
											// echo $one_template['sbj_name'];
											// echo '<div class="item" data-value="'+$one_template['sbj_name']+'">'+$one_template['sbj_name']+'</div>';
										}

									 ?>
							</div>
						</div>
					</div>
					<div class="field">
						<div class="ui input">
							<input id="mkflow_show_area" type="text" readonly="readonly" placeholder="Show Area">
						</div>
						<!-- <div id="mkflow_show_area" class="Show Area text">
							Show Area
						</div> -->
					</div>
					<div class="three fields">
						<div class="field">
							<div class="ui selection dropdown">
								<input id="law_select_val" type="hidden">
								<div class="text">Choose Set</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item" data-value="set_who">set_who</div>
									<div class="item" data-value="set_group">set_group</div>
									<div class="item" data-value="set_leader">set_leader</div>
	
								</div>
							</div>
						</div>
						<div class="field">
							<div class="ui small input">
								<input id="law_input_val" type="text" placeholder="Enter Arg">
							</div>
						</div>
						<div class="field">
							<div id="mkflow_add_btn" class="ui small green button">
								<i class="add icon"></i>
									add
							</div>
						</div>

						
					</div>

					<div class="field">
						<div id="save_flow_btn" class="ui small green button">
							<i class="save icon"></i>
								save
						</div>
					</div>
				</div>
				
				


			</div>
		</div>
		<div id="power" class="case twelve wide column" style="display: none;">
			<div class="ui segment">
				<div class="ui form">
					<div class="field">
						<div class="ui input">
							<input id="flowpow_group_val" type="text" placeholder='groupname'>
						</div>
						<div id="give_flowpow_btn" class="ui button">
							give power
						</div>
					</div>
					<div class="field">
								<div class="ui horizontal divider">
  						below not finish
					</div>

					</div>
			
					<div class="two fields">
						<div class="field">
							<div class="ui selection dropdown">
								<input id="law_select_val" type="hidden">
								<div class="text">Choose Flow</div>
								<i class="dropdown icon"></i>
								<div class="menu">
									<div class="item" data-value="1">flow_1</div>
									<div class="item" data-value="2">flow_2</div>
									<div class="item" data-value="2">flow_3</div>
								</div>
							</div>
						</div>
						<div class="field">
							<div class="ui green button">
								insert power
							</div>
						</div>
						
					</div>
					<div class="field">
						<div class="ui checkbox">
  							<input value="test_val" id="test" type="checkbox" name="fun">
  							<label>I enjoy having fun</label>
						</div>
						<div class="ui checkbox">
  							<input value="test_val1" type="checkbox" name="fun">
  							<label>I enjoy having fun</label>
						</div>
						<div class="ui checkbox">
  							<input value="test_val2" type="checkbox" name="fun">
  							<label>I enjoy having fun</label>
						</div>
						<div class="ui checkbox">
  							<input value="test_val3" type="checkbox" name="fun">
  							<label>I enjoy having fun</label>
						</div>
						<div class="ui checkbox">
  							<input value="test_val4" type="checkbox" name="fun">
  							<label>I enjoy having fun</label>
						</div>
					</div>
<!-- <div class="ui checkbox">
    <input type="checkbox" id="unique-id">
    <label for="unique-id">贵宾犬</label>
</div> -->
					<!-- <div class="field">
						<div class="ui checkbox">
  							<input type="checkbox" name="fun">
  							<label>I enjoy having fun</label>
						</div>
					</div> -->
				</div>

			</div>
		</div>

	</div>

	<!-- <div id="mktp" class="case eight wide column" >
		<div class="case ui segment">
			<p>template</p>
		</div>
	</div>
	<div id="mkflow" class="case eight wide column" style="display: none;">
		<div class="ui segment">
			<p>mkflow</p>
		</div>
	</div>
	<div id="power" class="case eight wide column" style="display: none;">
		<div class="ui segment">
			<p>power</p>
		</div>
	</div> -->

<!-- </div> -->

<script type="text/javascript">
	$('a.case').on('click',function(){
		$('a.case').removeClass('active');
		$(this).addClass('active');
		$('div.case').hide();
		var which_id = $(this).attr('mark');
		// alertify.log(which_id);
		$('#'+which_id).show();
		// alertify.log($(this).attr('my_href'));
	});
	$('.dropdown').dropdown();

	$('.ui.checkbox').checkbox({
		onEnable:function(){
			// var test = $(this).children.
			alertify.log("enable:"+$(this).val());
	},
	onDisable:function(){
			alertify.log("disable:"+$(this).val());

	}
});


</script>
<script type="text/javascript" src="/res/ybcase/caseadmin.js"></script>