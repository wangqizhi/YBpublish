<div class="ui grid">
    <div class="row">
        <div class="16 wide column">
            <h2 class="ui header">Publish_System <a href="#"><i id="close_open" class="reorder icon"></i></a></h2>
            <div class="ui divider"></div>
            <!-- <div class="ui basic button">test</div> -->
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui selection dropdown">
                <div class="text">Choose Publish Flow</div>
                <i class="icon dropdown"></i>
                <input id="flow_name_input" type="hidden"></input>
                <div class="menu">
                    <!-- <div class="item" data-value="2">2</div> -->
                    <?php 
                    foreach ($flow_array as $flow) {
                        echo '<div class="item" data-value="'.$flow['flow_name'].'">'.$flow['flow_name'].'</div>';
                    }

                     ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <div class="ui form">
                <div class="field">
                    <!-- <label>Input Files</label> -->
                    <textarea></textarea>
                </div>
                <div class="field">
                    <a id="publish_btn" class="ui blue  submit button">Publish</a>
                </div>
            </div>
        </div>
       
    </div>
</div>

<script type="text/javascript" src='/res/ybpublish/ybpublish_index.js'></script>