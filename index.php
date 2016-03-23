<?php
session_start();
if (isset($_SESSION['login'])){
    header("location:" . $_SESSION['login'] .  ".php");
} else {
    header("location: landing.php");
}
?>

