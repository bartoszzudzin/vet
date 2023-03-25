<?php

session_start();

include("../scripts/connection.php");
include("../scripts/functions.php");

$user_data = check_login($con);
$pdata = pageData($con, 'about');

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
                <h1>Tutaj zmienisz informacje wyświetlaną w sekcji "o nas".</h1>
                <p>Możesz napisać kilka zdań o zespole lub przychodni.</p>
                <div class="column">
                    <form class="update-data col" method="post" action="../scripts/data_edit.php?table=about&post=content&url=o-nas">
                        <label>O nas:</label><br />
                        <textarea name="content"><?php echo $pdata['content']; ?></textarea><br />
                        <input class="submit2 second" type="submit" value="Zapisz">
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script type="text/javascript" src="../scripts/dashboard.js"></script>
</body>
</html>

<?php

}