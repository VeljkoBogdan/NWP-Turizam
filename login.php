<?php
session_start()
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
    <link href="style.css" rel="stylesheet">
</head>
<body>

<div class="col-sm-8 text-left middle" id="topOfPage">
    <h1 class="text-center">Welcome back!</h1>
    <div class="container col-sm-12">
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
        </form>
    </div>
    <h3></h3>
    <p>Don't have an account? <a href="registration.php"> Sign up here! </a></p>
</div>

</body>
</html>