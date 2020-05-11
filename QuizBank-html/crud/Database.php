<!--
  Database.php -> crud.php -> action.php -> register.php, login.php,
-->
<?php

class Database{
	private $servername = "localhost";
	private $username = "root";
	private $password = "root";
	private $database = "quiz_bank";
	public $conn;

	//constructor ~~ is a method that is automatically sreated when as object is created

	public function __construct(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

		if($this->conn->connect_error){
			die("Connection error: ". $this->conn->connect_error);
		}
		return $this->conn;
	}
	

}


?>