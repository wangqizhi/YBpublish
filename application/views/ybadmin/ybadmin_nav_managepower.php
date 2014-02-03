<?php  
// var_dump($powers);exit;
?>
<div class="container">
	<div class="row">
     
    <span><a href="/admin">Admin</a>/Manage Power</span>


  </div>



  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">PowerName</span>
        <input id="yb_powername" type="text" class="form-control" placeholder="Enter Powername">
      </div>
  </div>

   <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">PowerURL</span>
        <!-- <input id="yb_powerurl" type="text" class="form-control" placeholder="Enter Access URL"> -->
        <select name="" id="powerurls_select" class="form-control">
          <?php foreach ($power_urls as $key => $value) {
            echo '<option value="'.$value.'">'.$value.'</option>';
          } ?>
        </select>
      </div>
  </div>
  

  <div class="row">
    <a href="#" id="yb_insertp_btn" class="btn btn-block btn-lg btn-default manage_padding">Insert Power</a>
    
  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">ChooseGroupName</span>
        <!-- <input id="yb_givepower_inpue" type="text" class="form-control" placeholder="Enter Powername"> -->
      <select name="" id="yb_givepower_input" class="form-control">
        <?php 
        foreach ($groups as $group) {
          # code...
          echo '<option value="'.$group['groupname'].'">'.$group['groupname'].'</option>';
        }

         ?>
         
      </select>
      </div>
  </div>


  <div class="row manage_padding">
    <?php 
    foreach ($powers as $power) {
      echo '<label class="checkbox-inline">';
      echo '<input type="checkbox" name="power_checkbox" id="'.$power['powername'].'" value="'.$power['powername'].'"> '.$power['powername'];
      echo '</label>';
    }


     ?>
<!--     <label class="checkbox-inline">
      <input type="checkbox" name="test" id="inlineCheckbox1" value="option1"> 1
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="test" id="inlineCheckbox2" value="option2"> 2
    </label>
    <label class="checkbox-inline">
      <input type="checkbox" name="test" id="inlineCheckbox3" value="option3"> 3
    </label> -->
  </div>


  <div class="row">
    <a href="#" id="yb_givepower_btn" class="btn btn-block btn-lg btn-default manage_padding">Give Power</a>
  </div>


</div>
 <script type="text/javascript" src='/res/lib/js/jquery.tagsinput.js'></script>
 <script type="text/javascript" src='/res/ybadmin/manage.js'></script>