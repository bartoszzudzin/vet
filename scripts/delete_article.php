<?php
include("../scripts/connection.php");
include("../scripts/functions.php");

session_start();
$user_data = check_login($con);

$id = $_GET['id'];

if(isset($_SESSION['id']) && $user_data['acces'] == '1'){
    $query = "DELETE FROM `news` WHERE id = '$id'";
    mysqli_query($con, $query);
    header("Location: ../cms/blog");
    die;
}else{
    header("Location: ../index");
    die;
}