<div class='container'>

	<div class="ybindex_top"></div>
	<div class="row">
        <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">
              	<li><a>Hi,<?php echo $login_user ?></a></li> 


<!-- 以下内容由系统提供 -->
               <!--  <li><a href="/">Messages<span class="navbar-unread"></span></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Systems <b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="#">Publish_system</a></li>
                    <li><a href="#">Case_system</a></li>
                    <li class="divider"></li>
                    <li><a href="/admin">Admin</a></li>
                  </ul>
                </li>
                <li><a href="/ybindex/ybsystem_aboutus">About Us</a></li> -->
                <?php 
                // var_dump($level1_modules);
                foreach ($level1_modules as $level1_module) {
                  if ($level1_module['has_child'] == '0' and strstr($level1_module['power_group'], $user_group[0]['group'])) {
                    # code...
                    echo '<li><a href="'.$level1_module['href'].'">'.$level1_module['show_name'].'</a></li>';
                    // echo $level1_module['show_name'];
                  }elseif($level1_module['has_child'] == '1' and strstr($level1_module['power_group'], $user_group[0]['group'])){
                    // echo '<li><a href="'.$level1_module['href'].'">'.$level1_module['show_name'].'</a></li>';
                    // echo $user_group[0]['group'];
                    echo '<li class="dropdown">';
                    echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$level1_module['show_name'].'<b class="caret"></b></a>';
                    echo '<span class="dropdown-arrow"></span>';
                    echo '<ul class="dropdown-menu">';
                    // var_dump($level2_modules);exit;
                    foreach ($level2_modules as $level2_module) {
                      // var_dump($level2_module);exit;
                      if ($level2_module['important'] == "0" and strstr($level2_module['power_group'], $user_group[0]['group'])) {
                        echo '<li><a href="'.$level2_module['href'].'">'.$level2_module['show_name'].'</a></li>';
                      }
                    }
                    echo '<li class="divider"></li>';
                    foreach ($level2_modules as $level2_module) {
                      if ($level2_module['important'] == "1" and strstr($level2_module['power_group'], $user_group[0]['group'])) {
                        echo '<li><a href="'.$level2_module['href'].'">'.$level2_module['show_name'].'</a></li>';
                      }
                    }
                    echo '</ul></li>';
                  }
                }


                 ?>




                <li><a id="yb_logout" href="/checkLogin/yblogout">Logout</a></li>
               </ul>
            </div>
        </nav>
    </div>
</div>
<script type="text/javascript" src='/res/ybindex/ybindex.js'></script>
