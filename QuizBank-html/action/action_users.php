<!--
  Database.php -> crud.php -> action.php -> register.php, login.php,
-->

<?php

// require_once 'assets/classes/crud_users.php';
require_once '../crud/crud_users.php';
$myObj = new USER;

if(isset($_POST["uRegister"])){
	$uname = $_POST["uname"];
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$ans = $myObj->insertUser($uname, $email, $pass);
	if($ans == 1){
		header("Location: login.php");
	}else{
		echo "Error.";
	}

}else if(isset($_POST["btnLogin"])){
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$myObj->login($email, $pass);

}else if(isset($_POST["update"])){
	$id = $_POST['id'];
	$email = $_POST['email'];
	$uname = $_POST['uname'];
	$myObj->updateUser($id, $email, $uname);

}else if($_GET['userActiontype'] == 'delete'){
	$id = $_GET['id'];
	$myObj->deleteUser($id);

}


?>