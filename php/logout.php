<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
unset($_SESSION["username"]);
unset($_SESSION["role"]);
unset($_SESSION["testcentre"]);
unset($_SESSION["message"]);
unset($_SESSION["errormessage"]);
header("Location: login.php");
?>
