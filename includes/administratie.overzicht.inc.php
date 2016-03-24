


<?php include "../connector.php";

$sth = $dbh ->prepare("SELECT voornaam, tussenvoegsel, achternaam, afdeling.beschrijving  FROM person INNER JOIN afdeling ON person.afdeling_ID=afdeling.afdeling_ID ");
    $sth->execute();


echo "<table border='1'>
<tr>
<th>Voornaam</th>
<th>Tussenvoegsel</th>
<th>achternaam</th>
<th>afdeling</th>
</tr>";

while($person = $sth->fetch(PDO::FETCH_ASSOC))
{
    echo "<tr>";
    echo "<td>" . $person['voornaam'] . "</td>";
    echo "<td>" . $person['tussenvoegsel'] . "</td>";
    echo "<td>" . $person['achternaam'] . "</td>";
    echo "<td>" . $person['beschrijving'] . "</td>";
    echo "</tr>";
}
echo "</table>";

?>
