<div class="container">
	<div class="list-group">
	  <?php 
	  foreach ($level_admin_modules as $value) {
	  	if (strstr($value['power_group'], $user_group[0]['group'])) {
	  		echo '<a href="'.$value['href'].'" class="list-group-item">'.$value['show_name'].'</a>';
	  	}
	  	
	  }


	   ?>
	 <!--  <a href="/admin/manage/manageuser" class="list-group-item">manageuser</a>
	  <a href="/admin/manage/managegroup" class="list-group-item">managegroup</a>
	  <a href="/admin/manage/managepower" class="list-group-item">managepower</a>
	  <a href="/admin/manage/managemodule" class="list-group-item">managemodule</a>
	  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
	  <a href="#" class="list-group-item">Vestibulum at eros</a> -->
</div>
</div>

