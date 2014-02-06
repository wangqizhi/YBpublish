<div class="ui red vertical mypublish sidebar menu">
    <a href="/" class="item">
        <i class="home icon"></i>
        HomePage
    </a>
    <a href="/ybpublish" class="item">
        <i class="heart icon"></i>
        PublishSystem
    </a>
    <a href="/ybpublish/mkflow" class="item">
        <i class="edit icon"></i>
        MakeFlow
    </a>
    <a href="/ybpublish/admin" class="item">
        <i class="setting icon"></i>
        Admin
    </a>
    <div class="item">
        <b>More</b>
        <div class="menu">
            <a href="/ybindex/ybsystem_aboutus" class="item">About Us</a>
            <a href="/checkLogin/yblogout" class="item">Logout</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    // $('.demo.sidebar').sidebar({useCSS:false});
    $('.mypublish.sidebar').sidebar('toggle');
    
$('.mypublish.sidebar').sidebar('attach events', '#close_open');
$('a').each(function(){
    var rel_href = $(this).attr('href');
    if(rel_href == location.pathname){
        $(this).addClass('active');
    }
});

</script>

