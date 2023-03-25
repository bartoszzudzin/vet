<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "vet";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$con){
    die("Problem połączenia z bazą danych!");
}