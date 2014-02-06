<div class="ui grid">
    <div class="row">
        <div class="16 wide column">
            <h2 class="ui header">Make Flow <a href="#"><i id="close_open" class="reorder icon"></i></a></h2>
            <div class="ui divider"></div>
            <!-- <div class="ui basic button">test</div> -->
        </div>
    </div>
    <div class="row">
        <div class="16 wide column">
            <table class="ui table segment">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DIR_Name</th>
                        <th>Real_path</th>
                    </tr>
                </thead>
                <tbody>
                  
                
        <?php 
        foreach ($my_dirs as $dir) {
            echo "<tr>";
            echo '<td>'.$dir['id'].'</td>';
            echo '<td>'.$dir['dir_name'].'</td>';
            echo '<td>'.$dir['real_path'].'</td>';
            echo "</tr>";
        }

         ?>
                </tbody>
            </table>
        </div>
    </div>

    
</div>

<script type="text/javascript" src='/res/ybpublish/ybpublish_mkflow.js'></script>