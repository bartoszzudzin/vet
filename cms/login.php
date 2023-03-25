<?php

session_start();
include("../scripts/connection.php");
include("../scripts/functions.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    if(!empty($login) && !empty($pass)){
        $query = "SELECT * FROM users_vet WHERE name = '$login' limit 1";
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] === $pass){
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: dashboard");
                    die;
                }else{
                    echo "<div class='error'>Nie prawidłowa nazwa użytkownika lub hasło</div>";
                    header("Location: login");
                    die;
                }
            }else{
                echo "<div class='error'>Nie prawidłowa nazwa użytkownika lub hasło</div>";
                header("Location: login");
                die;
            }
        }
    }
}

if(!isset($_SESSION['id'])){

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include("cms-head.php"); ?>    
</head>
<body>
    <main class="login-page">
        <form method="post" class="login-form" action="login">
            <label>Panel <span>logowania</span></label>
            <input type="text" name="login" placeholder="Nazwa użytkownika" required>
            <input type="password" name="pass" placeholder="Hasło" required>
            <input class="submit1" type="submit" value="Zaloguj">
            <a class="back" href="../index">Wróć na stronę główną</a>
        </form>
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <img class="dog-bg" src="../css/images/doggo.png">    
    </main>

</body>
</html>

<?php
}else{
    header("Location: dashboard");
}