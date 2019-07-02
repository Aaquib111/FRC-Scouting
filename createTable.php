<?php
$servername = "localhost";
$username = "id9533680_jtyler03";
$password = "jtyler03";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_close($conn);

?>