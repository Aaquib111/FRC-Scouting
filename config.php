<?php
//$host_name = "sql212.epizy.com";
//$username = "epiz_24107470";
//$password = "rem81y98y9o";
//$db_name = "epiz_24107470_FRCS";

$host_name = "localhost";
<<<<<<< HEAD
$username = "Aaquib";
$password = "aaquib1234";
$db_name = "frcs";
=======
$username = "id9533680_jtyler03";
$password = "jtyler03";
$db_name = "id9533680_frcs";
>>>>>>> 0e8a1af015ec718ac17d813044c06e749cdb75e0
//CONNECT TO DATABASE
    $conn = mysqli_connect("$host_name", "$username", "$password", "$db_name");

if(!$conn){
    echo 'Connection failed: ' . mysqli_connect_error();
}

?>