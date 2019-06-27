<?php
//DEFINE VARIABLES BECAUSE APPARENTLY PHP WILL BITCH ABOUT IT IF I DONT
$email = "";
$username = "";
$password = "";
$errors = ['noCheck' => "", 'userRegistered' => ""];

include('config.php');//connect to database

if(isset($_POST['submit'])){ //if submit button is pressed
$email = mysqli_real_escape_string($conn, $_POST['email']); //sets the value of email, username, and password
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password_hash = password_hash($password, PASSWORD_DEFAULT);

//check if they are already registered
$sql = "SELECT email FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql) or die("MySQL error: " . mysqli_error($conn));
$email_registered = mysqli_fetch_assoc($result);

if(empty($email_registered) && isset($_POST['checkbox'])){
include ('addToDatabase.php');//adds to database
$_SESSION['isLoggedIn'] = 'true';
$_SESSION['username'] = "$username";
header('Location: index.php');
}elseif(!isset($_POST['checkbox'])){
    $errors['noCheck'] = 'Please agree to our terms and conditions';
}else{
    $errors['userRegistered'] = 'User already registered';
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galaxy - Login and Register Form Templates</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.3.92/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/galaxy-style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 auth-left">
            <div class="row auth-form mb-4">
                <div class="col-12 col-sm-12">
                    <div class="auth-text-top mb-4">
                        <h1>Create Account</h1>
                        <small>Already have an account? <a href="signin.php">Login to Account</a></small>
                    </div>
                    <div style="font-size:14px; color:red;">
                    <p> <?php if(!empty($errors)){ echo $errors['noCheck'] . $errors['userRegistered'];}?>
                    </div> 
                    <form action="register.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-icon">
                                <i class="mdi mdi-account"></i>
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Enter Your Username" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-icon">
                                <i class="mdi mdi-email"></i>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Enter Your Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-icon">
                                <i class="mdi mdi-lock"></i>
                                <span class="passtoggle mdi mdi-eye toggle-password"></span>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Enter Your Password" required>
                            </div>
                        </div>
                        <div class="d-flex form-check">
                            <input type="checkbox" name="checkbox" class="filter" id="remember" checked>
                            <label for="remember">I Accept <a href="#">Terms and Conditions</a></label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-c mt-4 mb-4">Create an account</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 auth-right d-lg-flex d-none bg-gradient" id="particles">
            <div class="logo">
                <img src="assets/img/logo.png" width="100" alt="logo">
            </div>
            <div class="heading">
                <h3>Welcome to Galaxy</h3>
            </div>
            <div class="shape"></div>
        </div>
    </div>
</div>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/particles.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>