<?php

/**
 * 
 */
class Database{
	
	public $host = HOST;
	public $user = USER;
	public $pass = PASS;
	public $db   = DB;
	

	public $link;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->db);
		if(!$this->link){
			$this->error = "connection failed". $this->link->connect_error;
		}
	}
	//slect or read data from database
	public function select($query){
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows>0){
			return $results;
		}else{
			return false;
		}

	}
	// Create Data in database
	public function insert($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row){
			header("location: index.php?msg=".urldecode('Data saved sucessfully.'));
			exit();
		}else{
			die("error:(".$this->link->errno.")");
		}
	}
	// Update Data in database
	public function update($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($update_row){
			header("location: index.php?msg=".urldecode('Data Updated sucessfully.'));
			exit();
		}else{
			die("error:(".$this->link->errno.")");
		}
	}
	// Delete Data in database
	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row){
			header("location: index.php?msg=".urldecode('Data delete sucessfully.'));
			exit();
		}else{
			die("error:(".$this->link->errno.")");
		}
	}
}
?>