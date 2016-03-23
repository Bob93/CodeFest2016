<?php
if ($SESSION['login']= 'ingelogd'){
    header("location: overzicht.php");
} else {
    header("location: landing.php");
}
?>

