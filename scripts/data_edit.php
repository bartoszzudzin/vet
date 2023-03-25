<?php
include("connection.php");
include("functions.php");

session_start();
$user_data = check_login($con);

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id']) && $user_data['acces'] == '1'){

    $table = $_GET['table'];
    $var = $_GET['post'];
    $element = $_POST[$var];
    $url = $_GET['url'];

    if(!empty($element)){
        $query = "UPDATE `$table` SET `$var`='$element' WHERE id = 1";
        mysqli_query($con, $query);
        header("Location: ../cms/".$url);
        echo "<div class='succes'>Pomyślnie zaktualizowano dane</div>";
        die;
    }

}