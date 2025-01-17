<?php
session_start();
require_once "functions.php";

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
    echo '<script> alert("You are already logged in"); </script>';
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <?php include_once('snippets/links.php'); ?>
</head>
<body>
<?php include('snippets/header.php'); ?>
<div class="container">
    <div class="column">
        <div class="col-md-6 row justify-content-center form">
            <div class="">
                <h1 class="text-center">Welcome back!</h1>
                <form class="form-horizontal" method="post" action="confirmation.php" id="loginForm" onsubmit="return validateForm('login')">
                    <div class="form-group">
                        <label class="control-label" for="email">Your Email Address: </label>
                        <input class="form-control col-xs-3" type="email" name="email" id="email">
                        <div class="red" id="email-error"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Your Password: </label>
                        <div class="input-group">
                            <input class="form-control col-xs-3" type="password" name="password" id="password">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button" id="toggle-button" onclick="togglePasswordVisibilityLogin()">
                                    Show
                                </button>
                            </div>

                        </div>
                        <div class="red" id="password-error"></div>
                        <a href="change-password-form.php"> Forgotten Password? </a>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-default border" name="login" type="submit">Login</button><br>
                    </div>
                    <p>Don't have an account? <a href="registration.php"> Sign up here! </a></p>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div> <br>
        <div class="col-md-5 signup navbar-right">
        </div>
    </div>
    <br>
</div>
<br><br><br><br><br><br>
<?php include('snippets/footer.php'); ?>
</body>
</html>