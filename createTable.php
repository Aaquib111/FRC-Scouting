<?php
$servername = "localhost";
<<<<<<< HEAD
$username = "Aaquib";
$password = "aaquib1234";
=======
$username = "id9533680_jtyler03";
$password = "jtyler03";
>>>>>>> 0e8a1af015ec718ac17d813044c06e749cdb75e0

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_close($conn);

?>