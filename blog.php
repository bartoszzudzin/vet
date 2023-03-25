<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("head.php"); ?>    
</head>
<body>
    <?php include ("top_menu.php"); ?>
    <?php include ("side_menu.php"); ?>
    <?php

    $articlesCount = elementsCounter($con, 'news');
    if($articlesCount>0){
        $latestArticleID = latestElement($con, 'news');
    }

    ?>
    <main class="main2">
        <section class="blog">
            <?php
            if($articlesCount>0){
                for($i=$latestArticleID; $i>0; $i--){
                    $article_data = data($con, 'news', $i);
                    if(!$article_data){
                        continue;
                    }else{
                    ?>
                        <div class="news">
                            <img src="../uploads/<?php echo $article_data['image'];?>">
                            <div>
                                <p class="news-date"><?php echo $article_data['date']; ?></p>
                                <p class="news-title"><?php echo $article_data['title']; ?></p>
                                <?php $content = substr($article_data['content'],0,150)."...";?>
                                <p class="news-description"><?php echo $content; ?></p>
                                <a class="readme" href="wpis?id=<?php echo $article_data['id']; ?>">Czytaj więcej</a>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        <section>
    </main>

    <?php include("footer.php"); ?>
    
</body>

<script src="scripts/jquery-3.6.0.min.js"></script>

</html>