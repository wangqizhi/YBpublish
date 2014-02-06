<div class="ui grid">
    <div class="row">
        <div class="16 wide column">
            <h2 class="ui header">Make Flow <a href="#"><i id="close_open" class="reorder icon"></i></a></h2>
            <div class="ui divider"></div>
            <!-- <div class="ui basic button">test</div> -->
        </div>
    </div>

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


    <!--flow input  -->
    <div class="row">
        <div class="column">
            <div class="ui fluid input">
                <input type="text" placeholder="Enter Flow">
            </div>
        </div>
    </div>

    <!--button  -->
    <div class="row">
        <!-- <div class="ui two column grid"> -->
            <div class="eight wide column">
                <div class="ui fluid action input">
                    <input type="text" placeholder="arg:Which DIR">
                    <div class="ui button">BackUp</div>
                </div>
            </div>

            <div class="eight wide column">
                <div class="ui fluid action input">
                    <input type="text" placeholder="arg:Which DIR">
                    <div class="ui button">BackUp</div>
                </div>
            </div>
        <!-- </div> -->
    </div>


    <div class="ui right dir_list sidebar">
        <p>1</p>
    </div>
</div>

<script type="text/javascript" src='/res/ybpublish/ybpublish_mkflow.js'></script>