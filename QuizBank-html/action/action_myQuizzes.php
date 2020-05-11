<!--
  Database.php -> crud.php -> action.php -> register.php, login.php,
-->

<?php

// require_once 'assets/classes/crud_myQuizzes.php';
require_once '../crud/crud_myQuizzes.php';
$myObj = new MYQUIZ;

if(isset($_POST["myWordAddRegister"])){
	$myWord = $_POST["myWord"];
	$myMeaning = $_POST["myMeaning"];
	
	$ans = $myObj->addMyQuiz($myWord, $myMeaning);
	if($ans == 1){
		header("Location: u_myQuiz.php");
	}else{
		echo "Error.";
	}

}else if(isset($_POST["myWordEditRegister"])){
	$id = $_POST['my_quiz_id'];
	$myWord = $_POST['e_myWord'];
	$myMeaning = $_POST['e_myMeaning'];
	$myObj->editMyQuiz($id, $myWord, $myMeaning);

}else if($_GET['actiontype'] == 'delete'){
	$id = $_GET['my_quiz_id'];
	$myObj->deleteMyQuiz($id);
}


