<!--
  Database.php -> crud.php -> action.php -> register.php, login.php,
-->

<?php
session_start();
require_once 'Database.php';

class ADMINWORD extends Database{

// ------------------------------------<add>------------------------------------

	public function addPartSpeech($partSpeech){
		$sql = "INSERT INTO speech(part_speech) 
				VALUES('$partSpeech')";
		if($this->conn->query($sql)){
			return 1;
	    }else{
		     echo "Insertion failed. " . $this->conn->error;
		     return 0;
	    }
	}
	public function addAdminWord($word, $meaning, $level, $speech_id){
		$sql = "INSERT INTO words(word, meaning, level, speech_id) 
				VALUES('$word', '$meaning', '$level', '$speech_id' )";
		if($this->conn->query($sql)){
			return 1;
	    }else{
		     echo "Insertion failed. " . $this->conn->error;
		     return 0;
	    }
	}

// ------------------------------------<get>------------------------------------

	public function getPartsSpeech(){ 
		$sql = "SELECT * FROM speech";
		$speechResult = $this->conn->query($sql);
		$row = array();
		while($row = $speechResult->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}
	public function getAdminWords(){ 
		$sql = "SELECT * FROM words";
		$wordResult = $this->conn->query($sql);
		$row = array();
		while($row = $wordResult->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}


// ------------------------------------<edit>------------------------------------

	public function editPartSpeech($id, $partSpeech){
		$sql = "UPDATE speech 
		SET speech_id='$id', part_speech='$partSpeech'
		WHERE speech_id=$id ";

		$speechResult = $this->conn->query($sql);
		if($speechResult){
			header('location: a_words.php');
			
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}
	public function editAdminWord($id, $word, $meaning, $level, $speech_id){
		$sql = "UPDATE words 
		SET word='$word', meaning='$meaning', level='$level', speech_id='$speech_id'
		WHERE word_id='$id' ";

		$speechResult = $this->conn->query($sql);
		if($speechResult){
			header('location: a_words.php');
			
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}


// ------------------------------------<delete>------------------------------------

	public function deletePartSpeech($id){ 
		$sql = "SELECT * FROM  words WHERE speech_id='$id'";
		$result = $this->conn->query($sql);

		if($result->num_rows > 0){
			for($ctr = 0; $ctr < $result->num_rows; $ctr++){
				$sql2 = "DELETE FROM words WHERE speech_id='$id'";
				$this->conn->query($sql2);
			}
		}

		$sql = "DELETE FROM speech WHERE speech_id = '$id' ";
		$speechResult = $this->conn->query($sql);

		if($speechResult){
			header("Location: a_words.php");
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}


	public function deleteAdminWord($id){ 
		$sql = "DELETE FROM words WHERE word_id = '$id' ";
		$wordResult = $this->conn->query($sql);

		if($wordResult){
			header("Location: a_words.php");
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}

}


?>
