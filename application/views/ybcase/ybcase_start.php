<div class="ui grid">
	<div class="fifteen wide column">
		<div class="ui form">
			<div class="ui list">
				<div class="item">
					<div class="header">
						Choose Flow
					</div>
				</div>
				<?php foreach ($flows as $flow) {
					// $href = 'test';
					echo '<div class="item">';
					echo '<a href="id_search?id='.$flow['id'].'">'.$flow['flow_name'].'</a>';
					echo '</div>';
				} ?>
				<!-- <div class="item">
					<a href="">111</a>
				</div> -->
			</div>
			<!-- <div class="inline field">
				<label>and so on</label>
				<input type="text">
			</div>
			<div class="inline field">
				<label>and so on</label>
				<input type="text">
			</div>
			<div class="inline field">
				<label>and so on</label>
				<input type="text">
			</div>
			<div class="inline field">
				<label>and so on</label>
				<input type="text">
			</div>
			<div class="inline field">
				<label>and so on</label>
				<input type="text">
			</div>
			<div class="inline field">
				<label>CC</label>
				<input type="text">
			</div>
			<div class="field">
				<div class="ui green  button">
					<i class="play icon"></i>
					start case
				</div>
			</div> -->
		</div>
	</div>

</div>