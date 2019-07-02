<?php 
include ('config.php'); //connects to database


//get the inputs from user - email and password
$email = "";
$password = "";
$errors = ['noUser' => "", 'loginIncorrect' => ""];

if(isset($_POST['submit'])){
    $email = strval(mysqli_real_escape_string($conn, $_POST['email']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);


//check inputs against server values

$sql = "SELECT * FROM users WHERE email = '$email'"; //   FIX THESE TWO QUERYS

$result = mysqli_query($conn, $sql) or die("MySQL error: " . mysqli_error($conn));

$login_check = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);

$password_hash = $login_check['password'];


$password_hash = substr($password_hash, 0, 60);


//confirm/deny entry based on if the inputs were successful (AKA login was succesful so they get redirected)

if($login_check['email'] == $email && password_verify($password, $password_hash)){
    $_SESSION['isLoggedIn'] = 'true';
    $_SESSION['username'] = "$username";
    header('Location: index.php');
}elseif(empty($login_check)){
    $errors['noUser'] = "No User Found.";
}else{
    $errors['loginIncorrect'] = "Username/Password is wrong";
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
    <title>Sign In</title>
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
                        <h1>Welcome Back</h1>
                        <small>Please login to your account or <a href="register.php">Create Account</a></small>
                    </div>
                    <div style="font-size:14px; color:red;">
                    <?php if(!empty($errors)){ echo $errors['noUser']; echo $errors['loginIncorrect'];} ?>
                    </div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <div class="input-icon">
                                <i class="mdi mdi-email"></i>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-icon">
                                <i class="mdi mdi-lock"></i>
                                <span class="passtoggle mdi mdi-eye toggle-password"></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
                            </div>
                        </div>
                        <div class="d-flex form-check">
                            <input type="checkbox" class="filter" id="remember" checked>
                            <label for="remember">Remember me</label>
                            <a href="reset_password.php" class="ml-auto font-s">Forgot Password?</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-c mt-4 mb-4">Login</button>
                        
                    </form>
                    
                    <div>
                    <a href="Home.html"><button class="btn btn-block btn-dark">Guest</button></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8 auth-right d-lg-flex d-none bg-gradient" id="particles">
            <div class="logo">
                <img src="assets/img/Droid-Robot-512.png" width="100" alt="logo">
            </div>
            <div class="heading">
                <h3>FRCS</h3>
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