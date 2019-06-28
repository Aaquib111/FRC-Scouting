<?php

//CONNECT TO DATABASE
    $conn = mysqli_connect('localhost', 'Aaquib', 'aaquib1234', 'frcs');

if(!$conn){
    echo 'Connection failed: ' . mysqli_connect_error();
}

?>