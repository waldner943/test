
<?php
session_start();
require_once 'Database.php';

class TEST extends Database{

	public function getQuestions(){

		$sql = "SELECT * FROM myquiz ORDER BY RAND() LIMIT 10;";
		$result = $this->conn->query($sql);

		$row = array();
		while($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}

	public function insertToProgress($wordID, $answer){
		$len = count($answer);
		$user_id = $_SESSION['id'];

		$this->deletePreviousQuiz($user_id, $len);

		for($i=0; $i<$len; $i++){
			$ans = $answer[$i];
			$word_id = $wordID[$i];
			$sql = "INSERT INTO progressTestResult (answer, word_id, user_id)
					VALUES ('$ans', '$word_id', '$user_id')";
			$result = $this->conn->query($sql);
		}

	}

	public function deletePreviousQuiz($user_id, $len){
		echo $user_id;
		for($i=0; $i<$len; $i++){

			$sql = "DELETE FROM progressTestResult WHERE user_id = '$user_id'";
			$this->conn->query($sql);
		}
	}

	// public function replaceProgress($id, $answer, $wordID){ //

	// 	$len = count($answer);
	// 	for($i=0; $i<$len; $i++){
	// 		$ans = $answer[$i];
	// 		$word_id = $wordID[$i];
	// 		$sql = "UPDATE  progressTestResult 
	// 				SET answer='$ans', word_id='$word_id' WHERE id=$id ;";
	// 		$result = $this->conn->query($sql);
	// 	}
		// if($result){
		// 	header('location: ProgressTestResult.php');
			
		// }else{
		// 	echo "Connection error.". $this->conn->error;
		// }
	// }

	public function getCorrectAnswers(){
		$user_id = $_SESSION['id'];

		$sql = "SELECT * FROM progressTestResult INNER JOIN myquiz
		 ON progressTestResult.word_id = myquiz.my_quiz_id 
		 Where user_id = '$user_id' LIMIT 10 ;";
		$result = $this->conn->query($sql);
		$row = array();
		while($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}





}