


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
            (voornaam,tussenvoegsel,achternaam,gebruikersnaam,wachtwoord,geslacht,geboortedatum, deeltijdfactor, afdeling_ID, type_ID, datum_in_dienst)
            VALUES (:voornaam,:tussenvoegsel,:achternaam,:gebruikersnaam,:wachtwoord,:geslacht,:geboortedatum, :deeltijdfactor, :afdeling_ID, :type_ID, :datum_in_dienst)
            ";
            $sth = $dbh->prepare($sql);
            $sth->bindParam(':voornaam',$voornaam);
            $sth->bindParam(':tussenvoegsel', $tussenvoegsel);
            $sth->bindParam(':achternaam', $achternaam);
            $sth->bindParam(':gebruikersnaam', $gebruikersnaam);
            $sth->bindParam(':wachtwoord', $wachtwoord);
            $sth->bindParam(':geslacht', $geslacht);
            $sth->bindParam(':geboortedatum', $geboortedatum);
            $sth->bindParam(':deeltijdfactor', $deeltijdfactor = 1);
            $sth->bindParam(':afdeling_ID', $afdeling_ID = 1);
            $sth->bindParam(':type_ID', $type_ID = 1);
            $sth->bindParam(':datum_in_dienst', $datum_in_dienst = date('Y-m-d '));
            $sth->execute();
        if($sth){
            echo "Succesvol geregistreerd";
        }
    }
}

include 'includes/header.inc.php';
?>
    <body>
    <div class="menu-info">
        <div class="row">
        <form name="registratie" method="POST" action="registratie.php">
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
                        <input type="text" name="voornaam" class="inp_box" value="<?php if(isset($_POST['voornaam'])) echo $_POST['voornaam'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td><p>Tussenvoegsel</p></td>
                    <td>
                        <input type="text" name="tussenvoegsel" class="inp_box" value="<?php if(isset($_POST['tussenvoegsel'])) echo $_POST['tussenvoegsel'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td><p>Achternaam</p></td>
                    <td>
                        <input type="text" name="achternaam" class="inp_box" value="<?php if(isset($_POST['achternaam'])) echo $_POST['achternaam'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td><p>Gebruikersnaam</p></td>
                    <td>
                        <input type="gebruikersnaam"  name="gebruikersnaam" class="inp_box" value="<?php if(isset($_POST['gebruikersnaam'])) echo $_POST['gebruikersnaam'];?>" required>
                </tr>
                <tr>
                    <td><p>Wachtwoord</p></td>
                    <td>
                        <input type="password" name="wachtwoord" class="inp_box" value="<?php if(isset($_POST['gebruikersnaam'])) echo $_POST['gebruikersnaam'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td><p>Wachtwoord herhalen</p></td>
                    <td>
                        <input type="password" name="wachtwoord_herhaling" class="inp_box" value="<?php if(isset($_POST['wachtwoord_herhaling'])) echo $_POST['wachtwoord_herhaling'];?>" required>
                    </td>
                </tr>
                <tr>
                    <td><p>Geboortedatum</p></td>
                    <td>
                        <input type="date" name="geboortedatum" class="inp_box" value="<?php if(isset($_POST['geboortedatum'])) echo $_POST['geboortedatum'];?>"required>
                    </td>
                </tr>
                <tr>
                    <td><p>Geslacht</p></td>
                    <td>
                        <input type="radio" name="geslacht" value="m"
                               <?php if(isset($_POST['geslacht']) && $_POST['geslacht']=='m'):?>checked<?php endif ?> >M
                        <input type="radio" name="geslacht" value="v"
                               <?php if(isset($_POST['geslacht']) && $_POST['geslacht']=='v'):?>checked<?php endif ?>>V
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="registreren" name="submit" class="sub_btn">
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </div>
    </body>
</html>

