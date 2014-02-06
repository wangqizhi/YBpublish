<div class="ui grid">
    <div class="row">
        <div class="16 wide column">
            <h2 class="ui header">Admin <a href="#"><i id="close_open" class="reorder icon"></i></a></h2>
            <div class="ui divider"></div>
            <!-- <div class="ui basic button">test</div> -->
        </div>
            
    </div>
    <div class="row">
        <div class="three wide column">
            <div id="step_one" class="ui segment">
                <p>STEP:One</p>
            </div>
        </div>
        <div class="six wide column">
            <div class="ui action input">
                <input id="yb_publish_dir_input" type="text" placeholder="Enter DIR...">
                <div id="yb_publish_cd_btn" class="ui button">CreateDir</div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="three wide column">
            <div class="ui segment">
                <p>STEP:Two</p>
            </div>
        </div>
        <div class="six wide column">
            <div class="ui action input">
                <input id="yb_publish_mount_input" type="text" placeholder="Enter Mount INFO">
                <div id="yb_publish_mount_btn" class="ui button">Mount</div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="three wide column">
            <div class="ui segment">
                <p>STEP:Three</p>
            </div>
        </div>
        <div class="ten wide column">
            <div class="ui small form segment">
                    

                    <div class="field">
                        <label for="">Name</label>
                        <input id="dir_name_input" type="text" placeholder="Enter Name">
                    </div>
                   
                  
                <div class="inline field">
                    <label>PowerGroup</label>
                    <div class="ui selection dropdown">
                        <input id="group_select" type="hidden" name="gender">
                        <div class="text">...</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <?php 
                            foreach ($groups as $group) {
                                # code...
                                echo '<div class="item" data-value="'.$group['groupname'].'">'.$group['groupname'].'</div>';
                            }
                             ?>
                          
                        </div>
                    </div>
                    
                    
                    <div id="yb_publish_dir_btn" class="ui blue submit button">Submit</div>

                        <!-- <input id="group_select" type="text" placeholder="Group('-'split)"> -->
                </div>
                    
            </div>
                

        </div>
    </div>
    

</div>
<script type="text/javascript" src='/res/ybpublish/ybpublish_admin.js'></script>