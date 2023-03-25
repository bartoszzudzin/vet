<?php

include("connection.php");
include("functions.php");

session_start();
$user_data = check_login($con);

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id']) && $user_data['acces'] == '1'){
    $open = $_POST['open-time'];
    $close = $_POST['close-time'];

    $openDay = $_GET['od'];
    $closeDay = $_GET['cd'];

    if(!empty($open) && !empty($close)){
        $query = "UPDATE `week` SET `$openDay`='$open', `$closeDay`='$close' WHERE id = 1";

        mysqli_query($con, $query);
        header("Location: ../cms/dyzury");
        echo "<div class='succes'>Pomyślnie zaktualizowano dane</div>";
        die;
    }
}