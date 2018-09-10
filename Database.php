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
	//slect data from database
	public function select($query){
		$results = $this->link->query($query) or die($this->link->error.__LINE__);
		if($results->num_rows>0){
			return $results;
		}else{
			return false;
		}

	}
}
?>