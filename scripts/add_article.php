<?php
include("../scripts/connection.php");
include("../scripts/functions.php");

session_start();
$user_data = check_login($con);

$date = date("Y/m/d");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id']) && $user_data['acces'] == '1'){
    $title = $_POST['title'];
    $targetDir = "../uploads/";
    $image = basename($_FILES['image']['name']);
    $targetFilePath = $targetDir . $image;
    $content = $_POST['content'];

    $content = str_replace("'", "\'", $content);
    $content = str_replace('"', '\"', $content);
    $title = str_replace("'", "\'", $title);
    $title = str_replace('"', '\"', $title);

    if(!empty($title) && !empty($image) && !empty($content)){
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
            $query = "INSERT INTO `news` (date,title,content,image) VALUES ('$date','$title','$content','$image')";
            mysqli_query($con, $query);
            header("Location: ../cms/blog");
            die;
        }
    }
}else{
    header("Location: ../index");
}