<?php
include("../scripts/connection.php");
include("../scripts/functions.php");


$articlesCount = elementsCounter($con, 'news');
$latestArticleID = latestElement($con, 'news');
$articleData = data($con, 'news', $_GET['id']);

session_start();
$user_data = check_login($con);

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
                <h1>Edycja wpisu</h1>
                <div class="edit-article">
                    <a class="back-button" href="blog"><i class="fa-solid fa-arrow-right"></i>Wróć</a>
                    <div class="border">
                    <?php
                    if($articleData){?>
                        <form enctype="multipart/form-data" class="update-data col" method="POST" action="../scripts/edit_article?id=<?php echo $articleData['id']; ?>.php">
                            <label><p>Tytuł:</p></label>
                            <input class="data second" type="text" name="title" value="<?php echo $articleData['title']; ?>">
                            <label><p>Zdjęcie:</p></label>
                            <img style="width: 500px; margin: 0 auto;" src="../uploads/<?php echo $articleData['image']; ?>">
                            <input style="height: 40px; margin: 20px auto;" type="file" name="image" accpet="image/png, image/jpeg">
                            <label><p>Treść:</p></label>
                            <textarea style="margin: 0 auto;" name="content"><?php echo $articleData['content']; ?></textarea><br />
                            <input style="margin: 0 auto;" class="submit2 second" type="submit" value="Zapisz">
                        </form>
                    <?php
                    }else{?>
                        <h1>Nie znaleziono strony :(</h1>
                    <?php
                    }?>
                    </div>
                </div>

            </div>
        </section>
    </main>

</body>
</html>

<?php
}