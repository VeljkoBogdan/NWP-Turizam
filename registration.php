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

    <?php include_once('snippets/links.php'); ?>
</head>
<body>
<?php include('snippets/header.php'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Registration</h1>
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
    </div>
</div>
<?php include('snippets/footer.php'); ?>
</body>
</html>