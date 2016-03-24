<?php
	try{
		$dbh = new PDO("mysql:host=localhost:3306;dbname=overzicht_test","root",""); // connectie met database
	}catch(PDOException $e){
		echo $e->getMessage();	// Als het niet lukt geeft hij een foutmelding
	}
	
checkType($_SESSION['type_ID'], 1);
checkType($_SESSION['type_ID'], 2);
checkType($_SESSION['type_ID'], 3);

function checkType($user_role, $check_role){
	if($user_role == $check_role){
		return true;
	}
	return false;
}
?>
















































































