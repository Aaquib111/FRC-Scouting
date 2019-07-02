<?php
include ('config.php');//connect to database

// create sql
$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password_hash')"; //adds username, email and hashed password to database

 //honesty an universal function that adds whatever you want to the database wouldve been better but shhhh

// save to db and check
if(mysqli_query($conn, $sql)){                  //checks if values were added
    //header(Location: index.html);             //if they were redirect to index
}else{
    echo 'query error: ' . mysqli_error($conn); //if they weren't then give an error
}

//The code below frees data from the database but we dont need it, although im keeping it here for the future

//$result = mysqli_query($conn, $sql);

//mysqli_free_result($result);

//mysqli_close($conn);
?>