<?php
session_start()
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
                </form>
            <h3></h3>
            <p>Don't have an account? <a href="registration.php"> Sign up here! </a></p>
        </div>
    </div>
</div>
<br><br><br><br><br>
<?php include('snippets/footer.php'); ?>
</body>
</html>