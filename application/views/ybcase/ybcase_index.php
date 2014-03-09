

<div class="ui grid">
	
	<div class="six wide column">
		<!-- <div class="ui green piled segment">
			<div class="ui blue button">
				Start Case
			</div>
		</div> -->
		<div class="ui green piled segment">
			<h2>
				PLAYing
			</h2>
      <?php 
        foreach ($cases['all_case'] as $key) {
          echo '<p><a href=?case_id='.$key['id'].' >CaseID:'.$key['id'].'</a></p>';
        }
       ?>
			<!-- <p>1</p>
			<p>1</p>
			<p>1</p> -->

		<!-- 	<div class="ui small pagination menu">
  				<a class="icon item">
    				<i class="left arrow icon"></i>
  				</a>
  				<a class="active item">
    				1
  				</a>
  				<div class="disabled item">
    				...
  				</div>
  				<a class="item">
  				  10
  				</a>
  				<a class="item">
  				  11
  				</a>
  				<a class="item">
  				  12
  				</a>
  				<a class="icon item">
  				  <i class="right arrow icon"></i>
  				</a>
			</div>
 -->
		</div>
		<div class="ui green piled segment">
			<h2>
				FINISHED
			</h2>
			<?php 
        foreach ($cases['all_case_finished'] as $key) {
          echo '<p><a href=?case_id='.$key['id'].' >CaseID:'.$key['id'].'</a></p>';
        }
       ?>

		</div>

    <div class="ui green piled segment">
      <h2>
        BREAK
      </h2>
      <?php 
        foreach ($cases['all_case_break'] as $key) {
          echo '<p><a href=?case_id='.$key['id'].' >CaseID:'.$key['id'].'</a></p>';
        }
       ?>

    </div>
	</div>
<!-- 	<div class="four wide column">
		<div class="ui segment">2</div>
	</div> -->

	<div class="ten wide column">
			<?php if (sizeof($case_one)!=0) {
       ?>

		<div class="ui piled small feed segment">
        <h2 class="ui header">
          <input id="case_id_input" type="hidden" value="<?php echo $case_one['id'] ?>">
          <?php 
            $status = array('READY','PLAYING','FINISHED','BREAK');
           ?>
          Case ID-<?php echo $case_one['id'] ?> Status: <?php echo $status[$case_one['status']] ?>
        </h2>
        <div class="event">
          <div class="content">
            <!-- <div class="ui segment"> -->
              <?php 
                $content_array = explode('-&*&-', $case_one['case_content']);
                foreach ($content_array as $content) {
                  if ($content=='') {
                    continue;
                  }
                  $content_part = explode(':', $content);
                  // echo '<div class="ui ribbon label">';
                  // echo $content_part[0];
                  // echo '</div>';
                  // echo '<p>'.$content_part[1].'</p>';
                  echo '<div class="ui list">';
                  echo '<div class="item">';
                  echo '<div class="ui header">'.$content_part[0].'</div>';
                  echo $content_part[1];
                  echo '</div>';
                  echo '</div>';
                }

              ?>
             <!--  <div class="ui ribbon label">
                dogs
              </div>
              <p>hellowl</p>
              <div class="ui ribbon label">
                dogs
              </div>
              <p>hellowl</p> -->

            <!-- </div> -->
          </div>
        </div>
        
        <?php 
          // var_dump($all_chat);exit; 
        if (sizeof($all_chat)==0) {
            echo '';
        } else {
          foreach ($all_chat as $one_chat) {
            echo '<div class="event">
                    <div class="label">
                    <i class="circular pencil icon"></i>
                  </div>';
            echo '<div class="content">
                    <div class="summary">';
            $content_array = explode('-', $one_chat['content']);
            echo '<a>'.$one_chat['from_userid'].'</a>: '.$content_array[0];
            echo '</div>';

            //处理时间，未完成
            $now = date('Y-m-d H:i:s');
            if (explode(' ', $now)[0]!=explode(' ', $one_chat['create_time'])[0]) {
              $show_time  = $one_chat['create_time'];
            } else {
              $show_time  = $one_chat['create_time'];
            }
            
            
            // var_dump($now);exit;
            // echo '<div class="date"> '.$one_chat['create_time'].'</div>';
            echo '<div class="date"> '.$show_time.'</div>';
            echo '<div class="extra text">'.$content_array[1].'</div>';
            echo '</div></div>';
          }
        }
        
        
          

        ?>

        <?php  
        if ($current_user!=$this->session->userdata['uname']) {
          // echo $case_one['current_step'].'<br>';
          // echo $this->session->userdata['uname']; 
        } else {
        ?>


        <div class="ui reply form">
          <div class="field">
            <textarea id="case_textarea"></textarea>
          </div>
          <div id="case_play_btn" class="deal_btn ui button green button labeled icon">
            <i class="icon play"></i> pass
          </div>
          <div id="case_stop_btn" class="deal_btn ui button green button labeled icon">
            <i class="icon stop"></i> stop
          </div>
        </div>
          <?php } ?>



    </div>
    <?php  } else {
        echo "no case";
      } ?>


	</div>
</div>

<script type="text/javascript" src="/res/ybcase/caseindex.js"></script>