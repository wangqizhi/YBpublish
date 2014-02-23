<div class="ui grid">
  <div class="column">
    <div class="ui small green menu">
      <a href="/" class="item">
        <i class="home icon"></i> HomePage
      </a>
      <?php 
      foreach ($case_level_1 as $each_one) {
        echo '<a href='.$each_one['href'].' class="item">';
        echo '<i class="'.$each_one['other_mark'].' icon"></i> '.$each_one['show_name'];
        echo '</a>';
      }

       ?>
      <!-- <a class="active item">
        <i class="Calendar icon"></i> CaseSystem
      </a>
      <a class="item">
        <i class="setting icon"></i> Admin
      </a> -->
    <div class="right menu">
      <div class="item">
          <div class="ui icon input">
              <input type="text" placeholder="Search...">
              <i class="search link icon"></i>
          </div>
      </div>
    <!--   <div class="ui dropdown item">
        <i class="home icon"></i>
            <input type="hidden">
          choose <i class="dropdown icon"></i>
          <div class="menu">
              <a class="item">1</a>
              <a class="item">2</a>
              <a class="item">3</a>
          </div>
      </div> -->
     <!--  <div class="item">
          <div class="ui teal button">test_end</div>
      </div> -->
  </div>
        </div>

</div>
</div>

<script type="text/javascript">
  $('.dropdown').dropdown({on:'click'});
  $('a').each(function(){
    var rel_href = $(this).attr('href');
    if(rel_href == location.pathname){
        $(this).addClass('active');
    }
});


</script>