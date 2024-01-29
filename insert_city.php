<?php
session_start();
require_once "functions.php";
require_once "snippets/ban_check.php";

if(!isset($_SESSION['logged_in'])){
    echo '<script> alert("You are not logged in"); </script>';
    header("Location: login.php");
} else {
    if (!isset($_SESSION['is_admin']) && !$_SESSION['is_admin']) {
        echo '<script> alert("No permission"); </script>';
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sight Form</title>
    <?php include_once('snippets/links.php'); ?>
</head>
<body>
<?php include('snippets/header.php'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Add City</h2>
            <form class="form-horizontal" action="confirmation.php" method="post" enctype="multipart/form-data">

                <!-- Name, Country, Population, Region, Timezone -->
                <div class="form-group">
                    <label class="control-label" for="name">Name:</label>
                    <input class="form-control col-xs-3" type="text" name="name" required>
                    <br>
                </div>

                <div class="form-group">
                    <label class="control-label" for="country">Country:</label>
                    <input class="form-control col-xs-3" type="text" name="country" required>
                    <br>
                </div>

                <div class="form-group">
                    <label class="control-label" for="population">Population:</label>
                    <input class="form-control col-xs-3" type="number" name="population" required>
                    <br>
                </div>

                <div class="form-group">
                    <label class="control-label" for="region">Region:</label>
                    <input class="form-control col-xs-3" type="text" name="region" required>
                    <br>
                </div>

                <div class="form-group">
                    <label class="control-label" for="timezone">Timezone:</label>
                    <input class="form-control col-xs-3" type="text" name="timezone" required>
                    <br>
                </div>

                <!-- Image Upload -->
                <div class="form-group">
                    <label class="control-label" for="image">Image:</label>
                    <input class="form-control col-xs-3" type="file" name="image" id="image" accept="image/*">
                    <br>
                </div>

                <!-- Latitude, Longitude -->
                <div class="form-group">
                    <label class="control-label" for="latitude">Latitude:</label>
                    <input class="form-control col-xs-3" type="text" name="latitude" required>
                    <br>
                </div>

                <div class="form-group">
                    <label class="control-label" for="longitude">Longitude:</label>
                    <input class="form-control col-xs-3" type="text" name="longitude" required>
                    <br>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <input class="form-control col-xs-3 add-city" type="submit" value="Add City" name="add-city">
                </div>

            </form><br>
        </div>
    </div>
</div>

<?php include('snippets/footer.php'); ?>
</body>
</html>
