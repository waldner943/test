<!--
  Database.php -> crud.php -> action.php -> register.php, login.php,
-->

<?php
session_start();
require_once 'Database.php';

class USER extends Database{

	public function insertUser($uname, $email, $pass){
		$new_pass = md5($pass);

		$sql = "INSERT INTO users(username, email, password) 
				VALUES('$uname', '$email', '$new_pass')";

		if($this->conn->query($sql)){
			// header("login.php");
			return 1;
	    }else{
		     echo "Insertion failed. " . $this->conn->error;
		    return 0;
	    }
	}

	public function login($email, $pass){
		$new_pass = md5($pass);

		$sql = "SELECT * FROM users WHERE email ='$email' AND password = '$new_pass' ";
		$result = $this->conn->query($sql);

		if($result->num_rows == 1){
			$row = $result->fetch_assoc();

			session_start();

			$_SESSION["id"] = $row["id"];
			$_SESSION["username"] = $row["username"];
			if($row["status"] == "U"){
				header("Location: index.php");
			}else{
				header("Location: a_users.php");
			}
		}else{
			echo "Error. ". $this->conn->error;
		}
	}

	public function getUsers(){
		$sql = "SELECT * FROM users";
		$result = $this->conn->query($sql);
		$row = array();
		while($row = $result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}

	public function deleteUser($id){
		$sql = "DELETE FROM users WHERE id = '$id' ";
		$result = $this->conn->query($sql);

		if($result){
			header("Location: a_users.php");
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}
	
	public function updateUser($id, $email, $uname){
		$sql = "UPDATE users 
		SET email='$email', username='$uname'
		WHERE id=$id ";

		$result = $this->conn->query($sql);
		if($result){
			header('location: dashboard.php');
			
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}


}


?>
