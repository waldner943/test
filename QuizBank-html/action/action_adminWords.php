<!--
  Database.php -> crud.php -> action.php -> register.php, login.php,
-->

<?php

// require_once 'assets/classes/crud_adminWords.php';
require_once '../crud/crud_adminWords.php';
$myObj = new ADMINWORD;

if(isset($_POST["speechAddRegister"])){
	$partSpeech = $_POST["partSpeech"];
	$ans = $myObj->addPartSpeech($partSpeech);
	if($ans == 1){
		header("Location: a_words.php");
	}else{
		echo "Error.";
	}
}else if(isset($_POST["adminWordRegister"])){
	$word = $_POST['word'];
	$meaning = $_POST['meaning'];
	$level = $_POST['level'];
	$speech_id = $_POST['speech_id'];
	
	$ans = $myObj->addAdminWord($word, $meaning, $level, $speech_id);
	if($ans == 1){
		header("Location: a_words.php");
	}else{
		echo "Error.";
	}

}else if(isset($_POST["speechEditRegister"])){
	$id = $_POST['speech_id'];
	$partSpeech = $_POST['e_partSpeech'];
	$myObj->editPartSpeech($id, $partSpeech);
}else if(isset($_POST["adminWordEditRegister"])){
	$id = $_POST['word_id'];
	$word = $_POST['e_word'];
	$meaning = $_POST['e_meaning'];
	$level = $_POST['e_level'];
	$speech_id = $_POST['e_speech_id'];
	$myObj->editAdminWord($id, $word, $meaning, $level, $speech_id);

}else if($_GET['speechActiontype'] == 'delete'){
	$id = $_GET['speech_id'];
	$myObj->deletePartSpeech($id);
}else if($_GET['adminWordActiontype'] == 'delete'){
	$id = $_GET['word_id'];
	$myObj->deleteAdminWord($id);

}


?>