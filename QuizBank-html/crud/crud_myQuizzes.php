<!--
  Database.php -> crud.php -> action.php -> register.php, login.php,
-->

<?php
session_start();
require_once 'Database.php';

class MYQUIZ extends Database{

	public function addMyQuiz($myWord, $myMeaning){
		$sql = "INSERT INTO myquiz(my_word, my_meaning) 
				VALUES('$myWord', '$myMeaning' )";
		if($this->conn->query($sql)){
			return 1;
	    }else{
		     echo "Insertion failed. " . $this->conn->error;
		     return 0;
	    }
	}

	public function getMyQuizzes(){
		$sql = "SELECT * FROM myquiz";
		$result = $this->conn->query($sql);
		$row = array();
		while($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}

	public function editMyQuiz($id, $myWord, $myMeaning){
		$sql = "UPDATE myquiz 
		SET my_word='$myWord', my_meaning='$myMeaning'
		WHERE my_quiz_id='$id' ";

		$speechResult = $this->conn->query($sql);
		if($speechResult){
			header('location: u_myQuiz.php');
			
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}

	public function deleteMyQuiz($id){
		$sql = "DELETE FROM myquiz WHERE my_quiz_id = '$id' ";
		$result = $this->conn->query($sql);

		if($result){
			header("Location: u_myQuiz.php");
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}


}


?>
