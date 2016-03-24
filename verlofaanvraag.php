<?php
session_start();
include 'connector.php';
$type_Verlof = $_POST['type_Verlof'];
// echo $type_Verlof;
$van_Datum = $_POST['vandatum'];
$van_Datum = date("Y-m-d", strtotime($van_Datum) );
// echo $van_Datum;
$tot_Datum = $_POST['totdatum'];
$tot_Datum = date("Y-m-d", strtotime($tot_Datum) );
// echo $tot_Datum;
$werknemernummer = $_SESSION['werknemernummer'];
// echo $werknemernummer;



$sth = $dbh->prepare("INSERT INTO ziekte_en_verlof(type_Verlof, van_Datum, tot_Datum, werknemernummer, akkoord, verwijderd)
VALUES (:type_Verlof, :van_Datum, :tot_Datum, :werknemernummer, 0, 0)");
$sth->bindParam(':type_Verlof',$type_Verlof);
$sth->bindParam(':van_Datum',$van_Datum);
$sth->bindParam(':tot_Datum',$tot_Datum);
$sth->bindParam(':werknemernummer',$werknemernummer);
$sth->execute();

header("location: index.php")
?>