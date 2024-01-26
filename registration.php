<?php
session_start();
require_once "functions.php";

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo '<script> alert("You are already logged in"); </script>';
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>

<div class="col-sm-8 text-left middle">
    <form class="form-horizontal" method="post" action="confirmation.php" id="signUpForm" onsubmit="return validateForm('signup')">
    <div class="form-group">
        <label class="control-label" for="first-name">Your First Name: </label>
        <span id="first-name-error"></span>
        <input class="form-control col-xs-3" type="text" name="first-name" id="first-name">
    </div>
    <div class="form-group">
        <label class="control-label" for="last-name">Your Last Name: </label>
        <span id="last-name-error"></span>
        <input class="form-control col-xs-3" type="text" name="last-name" id="last-name">
    </div>
    <div class="form-group">
        <label class="control-label" for="email">Your Email Address: </label>
        <span id="email-error"></span>
        <input class="form-control col-xs-3" type="email" name="email" id="email">
    </div>
    <div class="form-group">
        <label class="control-label" for="password">Your Password: </label>
        <span id="password-error"></span>
        <div class="input-group">
            <input class="form-control col-xs-3" type="password" name="password" id="password">
            <div class="input-group-btn">
                <button class="btn btn-default" type="button" id="toggle-button"
                        onclick="togglePasswordVisibilitySignUp()">
                    Show
                </button>
            </div>
        </div>
    </div>
    <br>
    <div class="form-group">
        <input class="btn btn-default border" name="signup" type="submit" value="Sign up">
    </div>
    <br>
</form>
</div>

</body>
</html>