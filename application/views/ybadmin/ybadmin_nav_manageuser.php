<?php  

?>
<div class="container">
	<div class="row">
     
    <span><a href="/admin">Admin</a>/Manage User</span>


  </div>



  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">UserName</span>
        <input id="yb_username" type="text" class="form-control" placeholder="Enter Username">
      </div>
  </div>
  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">PassWord</span>
        <input id="yb_passwd" type="password" class="form-control" placeholder="Enter Password">
      </div>
  </div>
  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">PwdCheck</span>
        <input id="yb_passwd_c" type="password" class="form-control" placeholder="Confirm Password">
      </div>
  </div>
  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">Nick</span>
        <input id="yb_nick" type="text" class="form-control" placeholder="Enter Nick">
      </div>
  </div>

  <div class="row">
    <a href="#" id="yb_insert_btn" class="btn btn-block btn-lg btn-default manage_padding">Insert User</a>
    
  </div>
</div>
 <script type="text/javascript" src='/res/lib/js/jquery.tagsinput.js'></script>
 <script type="text/javascript" src='/res/ybadmin/manage.js'></script>