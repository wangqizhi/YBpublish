<div class="ui grid">
	<div class="two wide column">
	</div>
	<div class="eight wide column">
		<div class="header">
			<h2>Flow - <?php echo $flow_info[0]['flow_name'] ?></h2>
			<?php echo '<input type="hidden" id=flow_name_val value='.$flow_info[0]['flow_name'].'></input>'; ?>
		</div>
		<div class="ui form">
			<?php 
				$template_array = explode('-', $template_info[0]['sbj_content']);
				$template_size = sizeof($template_array);
				echo '<input type="hidden" id=size_val value='.$template_size.'></input>';
				foreach ($template_array as $template) {
					echo '<div class="field">';
					echo '<label for="">'.$template.':</label>';
					echo '<div class="input">';
					echo '<input class="temp_value" id="tp_value_'.$template.'" type="text">';
					echo '</div>';
					echo '</div>';
				}
			 ?>
			<!-- <div class="field">
				<label for="">test</label>
				<div class="input">
					<input type="text">
				</div>
			</div> -->
			<div class="field">
				<label>Email:</label>
				<input id="temp_val_email" type="text" placeholder="send to who?(split by ;)">
			</div>
			<div id="start_flow_btn" class="ui green button">
				start flow
			</div>
		</div>
	</div>
</div>
<script src="/res/ybcase/start_detail.js"></script>