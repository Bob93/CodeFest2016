<?php include "../connector.php";

$sth = $dbh ->prepare("SELECT voornaam, tussenvoegsel, achternaam, afdeling FROM person WHERE
     voornaam=:voornaam, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam, afdeling=:afdeling;");
    $sth->bindParam('voornaam',$voornaam);
    $sth->bindParam('tussenvoegsel',$tussenvoegsel);
    $sth->bindParam('achternaam',$achternaam);
    $sth->bindParam('afdeling',$afdeling);
    $sth->execute();



echo "<table border='1'>
<tr>
<th>Voornaam</th>
<th>Tussenvoegsel</th>
<th>achternaam</th>
<th>afdeling</th>
</tr>";

while($row = mysqli_fetch_array($sth))
{
    echo "<tr>";
    echo "<td>" . $row['voornaam'] . "</td>";
    echo "<td>" . $row['tussenvoegsel'] . "</td>";
    echo "<td>" . $row['achternaam'] . "</td>";
    echo "<td>" . $row['afdeling'] . "</td>";
    echo "</tr>";
}
echo "</table>";


?>
