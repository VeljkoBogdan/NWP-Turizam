<?php
session_start();
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
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<?php include_once "snippets/header.php"; ?>
<div class="col-sm-8 text-left middle">
    <div class="container col-sm-12">
        <form class="form-horizontal" method="post" id="recovery-email-form" action="confirmation.php" onsubmit="return validatePasswordRecoveryEmail()">
            <div class="text-center">
                <h3>Account recovery</h3>
            </div>
            <div class="form-group">
                <label class="control-label" for="forgot-password-email">Enter your email: </label>
                <input type="email" class="form-control" id="forgot-password-email" name="forgot-password-email">
            </div>
            <div class="form-group">
                <button class="btn btn-default border" type="submit" name="forgot-password" id="forgot-password-button">
                    <span>Send email</span>
                </button>
            </div>
        </form>
    </div>
</div>
<?php include_once "snippets/footer.php"; ?>
</body>
</html>