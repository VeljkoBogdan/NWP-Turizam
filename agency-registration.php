<?php
session_start();
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agency Registration</title>

    <?php include_once('snippets/links.php'); ?>
</head>
<body>
<?php include('snippets/header.php'); ?>
<div class="container">
    <div class="column">
        <div class="col-md-6 row justify-content-center form">
            <div class="">
                <h1>Agency Registration Form</h1>
                <form class="form-horizontal form" action="confirmation.php" method="post">
                    <div class="form-group">
                        <label class="control-label" for="name">Name:</label>
                        <input class="form-control col-xs-3" type="text" name="name" required><br>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="address">Address:</label>
                        <input class="form-control col-xs-3" type="text" name="address" required><br>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="contact_information">Contact Information:</label>
                        <input class="form-control col-xs-3" type="text" name="contact_information" required><br>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="website">Website:</label>
                        <input class="form-control col-xs-3" type="text" name="website"><br>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="operating_hours">Operating Hours:</label>
                        <input class="form-control col-xs-3" type="text" name="operating_hours"><br>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="establishment_date">Establishment Date:</label>
                        <input class="form-control col-xs-3" type="date" name="establishment_date" required><br>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email:</label>
                        <input class="form-control col-xs-3" type="email" name="email" required><br>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password:</label>
                        <input class="form-control col-xs-3" type="password" name="password" required><br>
                    </div>
                    <div class="form-group">
                        <button class="form-control col-xs-3" type="submit" id="agency-signup" name="agency-signup">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div> <br>
        <div class="col-md-5 agency-signup navbar-right">
        </div>
    </div>
</div>
<?php include('snippets/footer.php'); ?>
</body>
</html>
