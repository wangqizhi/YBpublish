<div class="ui grid">
    <div class="row">
        <div class="16 wide column">
            <h2 class="ui header">Make Flow <a href="#"><i id="close_open" class="reorder icon"></i></a></h2>
            <div class="ui divider"></div>
            <!-- <div class="ui basic button">test</div> -->
        </div>
    </div>

    <!-- who are you! -->
    <?php 
    echo '<input id="username" type="hidden" value="'.$my_name.'">';
     ?>




    <!--flow input  -->
    <div class="row">
        <div class="column">
            <div class="ui fluid input">
                <input id="flow_rule_input" type="text" placeholder="Enter Flow">
            </div>
        </div>
    </div>

    <!--action button  -->
    <div class="row">
        <!-- <div class="ui two column grid"> -->
            <div class="four wide column">
                <div class="fluid ui flow_action selection dropdown">
                    <div class="text">Action</div>
                    <i class="icon dropdown"></i>
                    <input id='yb_mkdir_select_val' type="hidden" value='0'>
                    <div class="menu">
                        <div class="item" data-value='backup'>BackUp</div>
                        <div class="item" data-value='copy'>Copy</div>
                    </div>
                    
                </div>
            </div>
            <div class="eight wide column">
                <div class="ui fluid action input">
                    <input id="ybpublish_action_input" type="text" placeholder="Args">
                    <div id="flow_make_rule" class="ui button" value="backup">Insert</div>
                </div>
            </div>

    </div>
    
    <!-- share to others -->
    <div class="row">
        <div class="four wide column">
            <div class="ui fluid my_group selection dropdown">
                <div class="text">Share Group</div>
                <input id="sharewho" type="hidden">
                <i class="icon dropdown"></i>
                <div class="menu">
                    <?php 
                    foreach ($all_groups as $group) {
                        echo '<div class="item" data-value="'.$group['groupname'].'">'.$group['groupname'].'</div>';
                    }
                     ?>
                </div>
            </div>
        </div>
        <div class="four wide column">
            <div class="ui fluid input">
                <input id="flow_name_input" type="text" placeholder="Enter Flow Name">
            </div>
        </div>
        <div class="four wide column">
            <div id="flow_insert_btn" class="ui blue button">Make Flow
            </div>
        </div>
    </div>

     <!-- 目录、实际路径表 -->
    <div class="row">
        <div class="column">
            <table class="ui collapsing table segment">
                <thead>
                    <tr>
                        <th>DIR Name</th>
                        <th>Real Path</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($my_dirs as $dir) {
                            echo '<tr>';
                            echo '<td>'.$dir['dir_name'].'</td>';
                            echo '<td>'.$dir['real_path'].'</td>';
                            echo '</tr>';
                        }

                     ?>

                </tbody>
            </table>
        </div>
    </div>


</div>

<script type="text/javascript" src='/res/ybpublish/ybpublish_mkflow.js'></script>