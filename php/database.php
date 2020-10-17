<?php
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="MyCovidTrail";
    $con = new mysqli($servername, $username, $password, $dbname);
    if(!$con){
        die('Could not Connect My Sql:' .mysql_error());
    }

?>