<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("head.php"); ?>    
</head>
<body>
    <?php 
    include ("top_menu.php");
    include ("side_menu.php");

    $id = $_GET['id'];

    $articleData = data($con, 'news', $id);

    ?>
    
    <main class="main2">
        <section class="blog">
            <?php if($articleData){?>
            <article class="blog-read">
                <div>
                    <img src="uploads/<?php echo $articleData['image']; ?>">
                </div>
                <p><?php echo $articleData['date'];?></p>
                <h1><?php echo $articleData['title'];?></h1>
                <p><?php echo $articleData['content']; ?></p>
            </article>
            <?php
            }else{?>
                <h1>Nie znaleziono strony :(</h1>
            <?php
            }?>
        <section>
    </main>

    <?php include("footer.php"); ?>
    
</body>

<script src="scripts/jquery-3.6.0.min.js"></script>

</html>