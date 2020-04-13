<?php
session_start();

$db = mysqli_connect('localhost','loginproj','','loginproj');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

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

    if(count($errors) == 0){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $salt = substr(str_shuffle($permitted_chars), 0, 10);
        $password = md5($password_1.$salt);
        $query = "INSERT INTO users (username, name, address, password, salt) VALUES ('$username','$name','$address','$password','$salt')";
        echo $query;
        mysqli_query($db,$query);

        $_SESSION['user'] = getUser($username);
        $_SESSION['success'] = "You are now logged in!";
        header('location: index.php');	
    }
}

function getUser($username){
    global $db;
    $query = "SELECT * FROM users WHERE username=".$username;
    $result = mysqli_query($db,$query);

    $user = mysqli_fetch_assoc($result);
    echo $user;
    return $user;
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