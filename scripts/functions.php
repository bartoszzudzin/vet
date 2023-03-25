<?php

function check_login($con)
{

	if(isset($_SESSION['id']))
	{

		$id = $_SESSION['id'];
		$query = "select * from users_vet where id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

}

function pageData($con, $table){
    $query = "SELECT * FROM $table WHERE id = '1'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
    return $data;
}

function articleData($con, $id){
    $query = "SELECT * FROM news WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result);
    return $data;
}
function elementsCounter($con, $table){
	$query = "SELECT * FROM `$table`";
	$result = mysqli_query($con, $query);
	$elements = mysqli_num_rows($result);	
	return $elements;
}
function latestElement($con, $table){
	$query = "SELECT * FROM `$table` ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($con, $query);
	$data = mysqli_fetch_assoc($result);
	return $data['id'];
}
function data($con, $table, $id){
	$query = "SELECT * FROM `$table` WHERE id = '$id'";
	$result = mysqli_query($con, $query);
	$photos_data = mysqli_fetch_assoc($result);

	return $photos_data;
}