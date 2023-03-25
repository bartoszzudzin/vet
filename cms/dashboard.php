<?php

session_start();

include("../scripts/connection.php");
include("../scripts/functions.php");

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
            <?php include("cms-menu.php"); ?>
            <div class="display">
                <h1>Witaj w panelu administracyjnym strony!</h1>
                <p>Tutaj możesz swobodnie zarządzać treścią która się na niej znajduje.<br/> Skorzystaj z menu po lewej stronie, aby przejść do odpowiedniej sekcji</p>
            </div>
        </section>
    </main>
<script type="text/javascript" src="../scripts/dashboard.js"></script>
</body>
</html>

<?php

}