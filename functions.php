<?php
session_start();

$db = mysqli_connect('localhost','loginproj','','loginproj');

$username="";
$name = "";
$address = "";
$errors = array();

if(isset($_POST['reg_user'])){
    register();
}

function register(){
    global $db, $username, $name, $address, $errors;

    $username = mysqli_real_escape_string($db, trim($_POST['username']));
    $name = mysqli_real_escape_string($db, trim($_POST['name']));
    $address = mysqli_real_escape_string($db, trim($_POST['address']));
    $password_1 = mysqli_real_escape_string($db, trim($_POST['password_1']));
    $password_2 = mysqli_real_escape_string($db, trim($_POST['password_2']));

    if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($name)) { 
		array_push($errors, "Name is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
    }
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	