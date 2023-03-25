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
                <h1>Czy na pewno chcesz usunąć wpis - <?php echo $articleData['title'];?> ?</h1>

                <div class="edit-article">
                    <a class="no-button" href="blog">Nie</a>
                    <a class="yes-button" href="../scripts/delete_article?id=<?php echo $_GET['id']; ?>">Tak</a>
                </div>

            </div>
        </section>
    </main>

</body>
</html>

<?php
}