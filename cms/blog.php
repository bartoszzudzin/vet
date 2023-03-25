<?php
include("../scripts/connection.php");
include("../scripts/functions.php");

session_start();
$user_data = check_login($con);

$articlesCount = elementsCounter($con, 'news');
if($articlesCount>0){
    $latestArticleID = latestElement($con, 'news');
}

if(!isset($_SESSION['id']) || $user_data['acces'] != '1'){
    echo "Błąd uprawnień";
    header("Location: ../index");
    die;
}else if(isset($_SESSION['id']) && $user_data['acces'] === '1'){

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("cms-head.php"); ?>    
</head>
<body>
    <main class="login-page">
        <p class="cms-title">Panel <span>administracyjny</span></p>
        <p class="cms-date"><?php echo date("d.m.Y"); ?><span><?php echo date("H:i"); ?></span></p>
        <section class="cms-front-page">
            <?php include ("cms-menu.php"); ?>
            <div class="display">
                <h1>Blog i aktualności ze świata weterynarii oraz Naszej przychodni.</h1>
                <p>Tutaj możesz śmiało dodawać i edytować wpisy z sekcji "aktualności".</p>

                <div class="buttons active">
                    <a id="add-article-btn" href="#"><i class="fa-solid fa-plus"></i> Dodaj wpis</a>
                    <a id="edit-article-btn" href="#"><i class="fa-solid fa-pen-to-square"></i> Edytuj wpis</a>
                </div>

                <div id="add-article" class="column disable">
                    <a id="back-btn" href="#"><i class="fa-solid fa-arrow-right"></i> Wróć</a>
                    <form enctype="multipart/form-data" class="update-data col" method="POST" action="../scripts/add_article.php">
                        <label><p>Tytuł:</p></label>
                        <input class="data" type="text" name="title">
                        <label><p>Zdjęcie:</p></label>
                        <input type="file" name="image" accpet="image/png, image/jpeg">
                        <label><p>Treść:</p></label>
                        <textarea name="content"></textarea><br />
                        <input class="submit2" type="submit" value="Dodaj">
                    </form>
                </div>

                <div class="edit-article disable">
                    <a id="back-btn" class="back-btn-second" href="#"><i class="fa-solid fa-arrow-right"></i> Wróć</a>
                    <?php
                    if($articlesCount>0){
                        for($i=$latestArticleID; $i>0; $i--){
                            $article_data = data($con, 'news', $i);
                            if(!$article_data){
                                continue;
                            }else{
                            ?>
                                <article>
                                    <img src="../uploads/<?php echo $article_data['image'];?>">
                                    <p><?php echo $article_data['title']; ?></p>
                                    <p><?php echo $article_data['date']; ?></p>
                                    <?php
                                    $content = substr($article_data['content'],0,60)."...";?>
                                    <p><?php echo $content; ?></p>
                                    <a class="edit" href="edycja_wpisu?id=<?php echo $i; ?>"><i class="fa-solid fa-pen-to-square"></i> Edytuj</a>
                                    <a class="delete" href="usun_wpis?id=<?php echo $i; ?>"><i class="fa-solid fa-delete-left"></i> Usuń</a>
                                </article>

                            <?php
                            }
                        }
                    }
                    ?>

                </div>

            </div>
        </section>
    </main>

    <script type="text/javascript" src="../scripts/dashboard.js"></script>
</body>
</html>

<?php
}