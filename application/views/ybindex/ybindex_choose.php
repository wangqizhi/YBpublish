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
                <li><a href="/">Messages<span class="navbar-unread"></span></a></li>
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
                <li><a href="/ybindex/ybsystem_aboutus">About Us</a></li>




                <li><a id="yb_logout" href="/checkLogin/yblogout">Logout</a></li>
               </ul>
            </div>
        </nav>
    </div>
</div>
<script type="text/javascript" src='/res/ybindex/ybindex.js'></script>
