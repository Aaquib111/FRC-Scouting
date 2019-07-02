<?php
//$host_name = "sql212.epizy.com";
//$username = "epiz_24107470";
//$password = "rem81y98y9o";
//$db_name = "epiz_24107470_FRCS";

$host_name = "localhost";
$username = "Aaquib";
$password = "aaquib1234";
$db_name = "frcs";
//CONNECT TO DATABASE
    $conn = mysqli_connect("$host_name", "$username", "$password", "$db_name");

if(!$conn){
    echo 'Connection failed: ' . mysqli_connect_error();
}

?>