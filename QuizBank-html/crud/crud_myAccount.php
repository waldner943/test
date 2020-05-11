
<?php
session_start();
require_once 'Database.php';

class MYACCOUNT extends Database{

	public function getMyAccount(){
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
			if($result){
				return $row;
			}else{
				die("Error retrieving user.");
			}
	}

	public function updateMyAccount($id, $uname, $email, $passw){
		$new_pass = md5($passw);
		$sql = "UPDATE users 
		SET email='$email', username='$uname', password='$new_pass'
		WHERE id=$id ";

		$result = $this->conn->query($sql);
		if($result){
			session_destroy();
			header('location: login.php');
		}else{
			echo "Connection error.". $this->conn->error;
		}

	}

	public function deleteMyAccount(){
		$id = $_SESSION['id'];
		$sql = "DELETE FROM users WHERE id = '$id' ";
		$result = $this->conn->query($sql);

		if($result){
			header("Location: delete_myAccount02.html");
		}else{
			echo "Connection error.". $this->conn->error;
		}
	}


}