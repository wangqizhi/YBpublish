<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title'] ?></h2>
    <div id="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href="http://192.168.56.100/index.php/news/<?php echo $news_item['slug'] ?>">View article</a></p>

<?php endforeach ?>
