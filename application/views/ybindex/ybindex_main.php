<div class="login">
	<div class="login-screen">
	          <div class="login-icon">
	            <!-- <img src="images/login/icon.png" alt="Welcome to Mail App"> -->
	            <h4>Welcome to <small>Yiban System</small></h4>

	          </div>
			  <form action="">
	          <div class="login-form">
	            <div class="form-group">
	              <input type="text" class="form-control login-field" value="" placeholder="Enter your username" id="input_user">
	              <label class="login-field-icon fui-user" for="input_user"></label>
	            </div>

	            <div class="form-group">
	              <input type="password" class="form-control login-field" value="" placeholder="Password" id="input_pass">
	              <label class="login-field-icon fui-lock" for="linput_pass"></label>
	            </div>

	            <!-- <a class="btn btn-primary btn-lg btn-block" id="ybindex_submit"href="#">Login</a> -->
	            <input type="submit" class="btn btn-primary btn-lg btn-block" id="ybindex_submit"href="#" value="Login"/>
	            <!-- <a class="login-link" href="#">Lost your password?</a> -->
	          </div>
	          </form>
	</div>
</div>
<script>
	<?php 
	if (isset($referrer)) {
		echo "var my_ref='".$referrer."';";
	}else{
		echo "var my_ref='';";
	}

	 ?>
</script>
 <script type="text/javascript" src='/res/ybindex/ybindex.js'></script>





