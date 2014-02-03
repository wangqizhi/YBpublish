<?php  

?>
<div class="container">
	<div class="row">
     
    <span><a href="/admin">Admin</a>/Manage Group</span>


  </div>



  <div class="row manage_padding">
      <div class="input-group input-group-sm">
        <span class="input-group-addon">GroupName</span>
        <input id="yb_groupname" type="text" class="form-control" placeholder="Enter Groupname">
      </div>
  </div>
  
  <div class="row">
    <a href="#" id="yb_insertg_btn" class="btn btn-block btn-lg btn-default manage_padding">Insert Group</a>
    
  </div>

  <div class="row manage_padding">
          <!-- <h3 class="demo-panel-title">Tags</h3> -->
          <select id="group_select" class="form-control">
            <?php 
            if (isset($groupname)) {//显示选中的option
              echo '<option value="0">'.$groupname.'</option>';
            }else{
              echo '<option value="0">Choose The Group</option>';
            }
             ?>
            <?php foreach ($groups as $each_group) {
              if ($each_group['groupname'] == $groupname) {//消除option中重复项
                continue;
              }
              echo " <option>".$each_group['groupname']."</option>";
            } ?>
            <!-- <option> <a href="11">1</a></option> -->
            <!-- <option>2</option> -->
            <!-- <option>3</option> -->
            <!-- <option>4</option> -->
            <!-- <option>5</option> -->
            
          </select>
          <?php 
          if (isset($persons)) {
            $all_person = "";
            foreach ($persons as $each_person) {
              $all_person .= ",".$each_person['username'];
            }
            echo '<input name="tagsinput" id="tagsinput" class="tagsinput" value="'.$all_person.'" >';
            echo '<input id="groupname_hidden" type="hidden" value="'.$groupname.'">';

          } 
          ?>
          <!-- <div id="tagsinput_tagsinput" class="tagsinput " style="height: 100%;">
            <span class="tag"><span>10000179&nbsp;&nbsp;</span>
            <a class="tagsinput-remove-link"></a></span>
            <div class="tagsinput-add-container" id="tagsinput_addTag">
              <div class="tagsinput-add"></div>
              <input id="tagsinput_tag" value="" data-default="" style="color: rgb(102, 102, 102); width: 7px;">
            </div>
          </div> -->

  </div>

</div>


 <script type="text/javascript" src='/res/lib/js/jquery.tagsinput.js'></script>
 <script type="text/javascript" src='/res/ybadmin/manage.js'></script>
