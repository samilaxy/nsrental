<?php
/**
* database class creation and its properties
*/

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../config/config.php');

class Database{
	public $host     = 	DB_HOST;
	public $username = 	DB_USER;
	public $password = 	DB_PASS;
	public $db_name  = 	DB_NAME;

	public $link;
	public $error;

	/*
	* constructor
	*/
	function __construct(){
		$this->connect(); //call the connect function
	}

	private function connect(){
		$this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);

		if (!$this->link) {
			$this->error = "Connection failed: ".$this->link->connect_error;
			return false;
			exit();
		}else{
			return true;
		}
	}

	/*
	* select statement
	*/
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}else{
			return false;
		}
	}

	/*
 * search records
 */

 public function filterTable($query){
	 $filter_Result = $this->link->query($query) or die($this->link->error.__LINE__);
	 if($filter_Result){
		 return $filter_Result;
	 }else{
		 return false;
	 }
 }

	//Insert data
public function insert($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row){
			return $insert_row;
		}else{
			return false;
		}
	}

	//Updating data
public function update($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($update_row){
			return $update_row;
		}else{
			return false;
		}
	}

	//Deleting data
public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row){
			return $delete_row;
		}else{
			return false;
		}
	}
}

?>
