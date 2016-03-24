<?php


$result = mysql_query("SELECT verlof, uren, overuren  FROM ziekte en verlof, uren WHERE verlof=:verlof, uren=:uren, overuren=:overuren");

$rows = array();
while($r = mysql_fetch_array($result)) {
    $row[0] = $r[0];
    $row[1] = $r[1];
    array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

?>