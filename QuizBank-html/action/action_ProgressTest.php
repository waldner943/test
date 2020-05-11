<?php

// require_once 'assets/classes/crud_ProgressTest.php';
require_once '../crud/crud_ProgressTest.php';
$myObj = new TEST;

if(isset($_POST['btnSubmit'])){
	$answer = $_POST['answer'];
	$wordID =  $_POST['id'];

	$myObj->insertToProgress($wordID, $answer);
	header("Location: progressTestResult.php");

	// $id = $_POST['id'];
	// $answer = $_POST['answer'];
	// $wordID =  $_POST['id'];
	// $myObj->replaceProgress($id, $answer, $wordID);

}