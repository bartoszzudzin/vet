<?php
include("../scripts/connection.php");
include("../scripts/functions.php");

session_start();
$user_data = check_login($con);

$date = date("Y/m/d");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id']) && $user_data['acces'] == '1'){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $targetDir = "../uploads/";
    $image = basename($_FILES['image']['name']);
    $targetFilePath = $targetDir . $image;
    $content = $_POST['content'];

    $content = str_replace("'", "\'", $content);
    $content = str_replace('"', '\"', $content);
    $title = str_replace("'", "\'", $title);
    $title = str_replace('"', '\"', $title);

    echo exec('whoami');
    
    if(!empty($title) && !empty($image) && !empty($content)){
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
            $query = "UPDATE `news` SET `title`='$title', `content`='$content', `image`='$image' WHERE id = '$id'";
            mysqli_query($con, $query);
            header("Location: ../cms/blog");
            die;
        }
    }
    if(!empty($title) && empty($image) && !empty($content)){
        $query = "UPDATE `news` SET `title`='$title', `content`='$content' WHERE id = '$id'";
        mysqli_query($con, $query);
        header("Location: ../cms/blog");
        die;
    }
}else{
    header("Location: ../index");
}