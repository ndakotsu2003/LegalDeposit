<?php
    $dbhost ="localhost";
    $dbuser = "root";
    $dbpw = "";
    $dbname ="legaldeposit";
  $config = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname) or die("Can not connect to DB");
?>