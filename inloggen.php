<?php
session_start(); // sessie starten, moet op elke nieuwe pagina
$gebruikersnaam = $_POST['gebruikersnaam']; // de variable gebruikersnaam is gelijk aan de post variable gebruikersnaam in de postconditie van de form.
$wachtwoord = $_POST['wachtwoord'];

include 'connector.php';

function generateHash($wachtwoord) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt =  '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($wachtwoord, $salt);
    }
}

function verify($wachtwoord, $hashedWachtwoord) {
    return crypt($wachtwoord, $hashedWachtwoord) == $hashedWachtwoord;
}

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