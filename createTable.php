<?php
$servername = "localhost";
$username = "Aaquib";
$password = "aaquib1234";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_close($conn);

?>