<?php  

?>
<div class="container">
	<div class="row">
     
    <span><a href="/admin">Admin</a>/Manage Module</span>


  </div>



  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">ChooseGroup</span>
        <!-- <input id="yb_username" type="text" class="form-control" placeholder="Enter Username"> -->
        <select class="form-control" name="" id="">
        <?php 
        foreach ($groups as $group) {
          # code...
          echo '<option value="'.$group['groupname'].'">'.$group['groupname'].'</option>';
        }

         ?>

        </select>
      </div>
  </div>

</div>
 <script type="text/javascript" src='/res/lib/js/jquery.tagsinput.js'></script>
 <script type="text/javascript" src='/res/ybadmin/manage.js'></script>