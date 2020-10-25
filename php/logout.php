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
unset($_SESSION["secondPage"]);
unset($_SESSION["currentPage"]);
unset($_SESSION["currentPageFileName"]);
header("Location: login.php");
?>
