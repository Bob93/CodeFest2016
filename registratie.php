<?php
include 'connector.php';

if(count($_POST)>0){
    foreach($_POST as $key=>$values){
        if(empty($_POST[$key])){
                $error = ucfirst($key)." veld moet worden ingevuld!";
                break;
            }
        }

        // Validatie wachtwoord veld
        if($_POST['wachtwoord']!=$_POST['wachtwoord_herhaling']){
            $error= "Wachtwoord moet hetzelfde zijn!";
        }

        // Validatie voor checkbox
        if(!isset($error) && !isset($_POST['geslacht'])){
            $error = "Selecteer een geslacht";
        }

        if(!isset($error)){
            $voornaam = $_POST['voornaam'];
            $tussenvoegsel = $_POST['tussenvoegsel'];
            $achternaam = $_POST['achternaam'];
            $gebruikersnaam = $_POST['gebruikersnaam'];
            $wachtwoord = $_POST['wachtwoord'];
            $geslacht = $_POST['geslacht'];
            $geboortedatum = $_POST['geboortedatum'];
            $sql = "INSERT INTO person
            (voornaam,tussenvoegsel,achternaam,gebruikersnaam,wachtwoord,geslacht,geboortedatum)
            VALUES (:voornaam,:tussenvoegsel,:achternaam,:gebruikersnaam,:wachtwoord,:geslacht,:geboortedatum)
            ";
            $query = $dbh->prepare($sql);
            $query->execute(array(
                ':voornaam'=>$voornaam,
                ':tussenvoegsel'=>$tussenvoegsel,
                ':achternaam'=>$achternaam,
                ':gebruikersnaam'=>$gebruikersnaam,
                ':wachtwoord'=>$wachtwoord,
                ':geslacht'=>$geslacht,
                ':geboortedatum'=>$geboortedatum
        ));
        if($query){
            echo "Succesvol geregistreerd";
        }
    }
}

include 'includes/header.inc.php';
?>
    <body>
        <form name="registratie" method="POST" action="">
            <table border="0" cellspacing="15px">
                <tr>
                    <td colspan="2"><?php if(isset($error))echo $error; ?></td>
                </tr>
                <tr>
                    <td>
                        <h1>
                            Registratie medewerker
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td><p>Voornaam</p></td>
                    <td>
                        <input type="text" name="voornaam" class="inp_box" value="<?php if(isset($_POST['voornaam'])) echo $_POST['voornaam'];?>">
                    </td>
                </tr>
                <tr>
                    <td><p>Tussenvoegsel</p></td>
                    <td>
                        <input type="text" name="tussenvoegsel" class="inp_box" value="<?php if(isset($_POST['tussenvoegsel'])) echo $_POST['tussenvoegsel'];?>">
                    </td>
                </tr>
                <tr>
                    <td><p>Achternaam</p></td>
                    <td>
                        <input type="text" name="achternaam" class="inp_box" value="<?php if(isset($_POST['achternaam'])) echo $_POST['achternaam'];?>">
                    </td>
                </tr>
                <tr>
                    <td><p>Gebruikersnaam</p></td>
                    <td>
                        <input type="gebruikersnaam"  name="gebruikersnaam" class="inp_box" value="<?php if(isset($_POST['gebruikersnaam'])) echo $_POST['gebruikersnaam'];?>">
                </tr>
                <tr>
                    <td><p>Wachtwoord</p></td>
                    <td>
                        <input type="password" name="wachtwoord" class="inp_box" value="<?php if(isset($_POST['gebruikersnaam'])) echo $_POST['gebruikersnaam'];?>">
                    </td>
                </tr>
                <tr>
                    <td><p>Wachtwoord herhalen</p></td>
                    <td>
                        <input type="password" name="wachtwoord_herhaling" class="inp_box" value="<?php if(isset($_POST['wachtwoord_herhaling'])) echo $_POST['wachtwoord_herhaling'];?>">
                    </td>
                </tr>
                <tr>
                    <td><p>Geboortedatum</p></td>
                    <td>
                        <input type="geboortedatum" name="email" class="inp_box" value="<?php if(isset($_POST['geboortedatum'])) echo $_POST['geboortedatum'];?>">
                    </td>
                </tr>
                <tr>
                    <td><p>Geslacht</p></td>
                    <td>
                        <input type="radio" name="geslacht" value="M"
                               <?php if(isset($_POST['geslacht']) && $_POST['geslacht']=='M'):?>checked<?php endif ?> >M
                        <input type="radio" name="geslacht" value="V"
                               <?php if(isset($_POST['geslacht']) && $_POST['geslacht']=='V'):?>checked<?php endif ?>>V
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="registreren" name="submit" class="sub_btn">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

