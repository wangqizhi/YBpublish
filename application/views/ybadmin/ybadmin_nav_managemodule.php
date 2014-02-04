<?php  

?>
<div class="container">
	<div class="row">
     
    <span><a href="/admin">Admin</a>/Manage Module</span>


  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">ModuleName</span>
        <input type="text" id="module_name" class="form-control" placeholder="Enter Module Name">
      </div>
  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">ModuleShowName</span>
        <input type="text" id="show_name" class="form-control" placeholder="Enter Module Name(Easy read)">
      </div>
  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">ModuleLevel</span>
        <input type="text" id="level" class="form-control" placeholder="Enter Level(1->top,2->child,other)">
        <!-- 
        <select class="form-control" name="" id="">
          <option value="1">Top</option>
          <option value="2">Child</option>
        </select> -->
      </div>
  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">ClickAddress</span>
        <input type="text" id="href" class="form-control" placeholder="Enter Address">
      </div>
  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">ParentModuleName</span>
        <select class="form-control" name="" id="parent">
          <option value="0">No</option>
          <?php 
          foreach ($level1_modules as $value) {
            echo '<option value="'.$value['module_name'].'">'.$value['show_name'].'</option>';
          }

           ?>
          
        </select>
      </div>
  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">Important</span>
        <select class="form-control" name="" id="important">
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
      </div>
  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">Power</span>
        <input type="text" id="power_group" class="form-control" placeholder="Enter GroupName(split use'-')">
      </div>
  </div>

  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">Serial</span>
        <input type="text" id="serial" class="form-control" placeholder="Enter Serial">
      </div>
  </div>
  
  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">HasChild</span>
        <select class="form-control" name="" id="has_child">
          <option value="0">No</option>
          <option value="1">Yes</option>
        </select>
      </div>
  </div>

  <div class="row">
    <a href="#" id="yb_insertm_btn" class="btn btn-block btn-lg btn-default manage_padding">Insert Module</a>
  </div>

</div>
 <script type="text/javascript" src='/res/lib/js/jquery.tagsinput.js'></script>
 <script type="text/javascript" src='/res/ybadmin/manage.js'></script>