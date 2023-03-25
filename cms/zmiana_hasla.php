<?php
include("../scripts/connection.php");
include("../scripts/functions.php");


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
                <h1>Zmiana hasła panelu administracyjnego.</h1>
                <p>Pamiętaj o silnym haśle.</p>

                <div id="add-article" class="column">
                    <form class="update-data col" method="POST" action="zmiana_hasla.php">
                        <label><p>Aktualne hasło:</p></label>
                        <input class="data" type="password" name="old_pass">
                        <label><p>Nowe hasło:</p></label>
                        <input class="data" type="password" name="new_pass">
                        <label><p>Powtórz nowe hasło:</p></label>
                        <input class="data" type="password" name="repeat_new_pass">
                        <input class="submit2" type="submit" value="Zapisz">
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

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id']) && $user_data['acces'] == '1'){

    $oldPass = $_POST['old_pass'];
    $newPass = $_POST['new_pass'];
    $newPassRepeat = $_POST['repeat_new_pass'];

    if(!empty($oldPass) && !empty($newPass) && !empty($newPassRepeat)){
        if($oldPass === $user_data['password']){
            if($newPass === $newPassRepeat){
                $query = "UPDATE `users_vet` SET `password`='$newPass' WHERE id = 1";
                mysqli_query($con, $query);
                echo "<div class='succes'>Pomyślnie zaktualizowano hasło</div>";
                die;
            }else{
                echo "<div class='error'>Hasła różnią się od siebie</div>";
            }
        }else{
            echo "<div class='error'>Wprowadzone hasło jest nieprawidłowe</div>";
        }    
    }else{
        echo "<div class='error'>Uzupełnij wszystkie pola</div>";
    }
}

?>