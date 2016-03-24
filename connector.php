<?php
	try{
		$dbh = new PDO("mysql:host=localhost:3306;dbname=overzicht_test","root","12345678"); // connectie met database
	}catch(PDOException $e){
		echo $e->getMessage();	// Als het niet lukt geeft hij een foutmelding
	}

function checkType($user_role, $check_role){
	if($user_role == $check_role){
		return true;
	}
	return false;
}
?>
















































































