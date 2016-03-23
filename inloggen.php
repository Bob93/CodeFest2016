<?php
session_start(); // sessie starten, moet op elke nieuwe pagina
$gebruikersnaam = $_POST['gebruikersnaam']; // de variable gebruikersnaam is gelijk aan de post variable gebruikersnaam in de postconditie van de form.
$wachtwoord = $_POST['wachtwoord'];

include 'connector.php';

$sth = $dbh->prepare("SELECT * FROM  person WHERE gebruikersnaam=:gebruikersnaam AND wachtwoord=:wachtwoord");
$sth->bindParam(':gebruikersnaam',$gebruikersnaam);
$sth->bindParam(':wachtwoord',$wachtwoord);
$sth->execute();

if ($sth->rowCount() == 1){
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    $_SESSION['voornaam'] = $result['voornaam'];
    $_SESSION['tussenvoegsel'] = $result['tussenvoegsel'];
    $_SESSION['achternaam'] = $result['achternaam'];
    $_SESSION['login'] = 'ingelogd';
    echo 'goedzo';
    header("location: index.php");
}else{
    echo  'jammerdan';
}

?>