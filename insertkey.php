<?php 
//include the constants 
include_once "constants.php";

//create a class Stripe
class Stripe{

	public $stripekey;
	public $dbcon;

	//create a function to connect the database
	public function __construct(){
		$this->dbcon = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASENAME);

		if ($this->dbcon->connect_error) {
			die("Failed".$this->dbcon->connect_error);
		}
	}


	//insert the stripkey into the database
	public function insertKey($stripekey){

		//prepare the statement 
		$statement = $this->dbcon->prepare("INSERT INTO stripe(stripe_key) VALUES(?)");

		//bind the parameters
		$statement->bind_param("s",$stripekey);

		//execute the statement 
		$statement->execute();


		if ($statement->affected_rows == 1) {
		 	return true;
		 }else{
		 	return false; 
		 	// $stmt->error;
		 }





	}







} //end the class Stripe






 ?>