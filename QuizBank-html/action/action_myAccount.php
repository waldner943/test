<?php

// require_once 'assets/classes/crud_myAccount.php';
require_once '../crud/crud_myAccount.php';
$myObj = new MYACCOUNT;

if(isset($_POST['btnSave'])){
  $id = $_POST['editID'];
  $uname = $_POST['userName'];
  $uname = strtolower($uname);
  $email = $_POST['email'];
  $passw = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

  if($passw == $confirmPassword){
    $myObj->updateMyAccount($id, $uname, $email, $passw);
  }else{
    echo "<script> alert('password and confirmPassword do not mach')</script>";
  }
 
}else if(isset($_POST['btnDelete'])){
	$passw = $_POST['password'];
	$new_pass = md5($passw);
	$confirmPassword = $_POST['confirmPassword'];
	$row = $myObj->getMyAccount();

	if($new_pass == $row['password'] && $passw == $confirmPassword){
		$myObj->deleteMyAccount();
	}else{
		echo "<script> alert('password and confirmPassword do not mach')</script>";
	}

}


?>