<?php
session_start();
require_once "functions.php";
require_once "snippets/ban_check.php";

if(!isset($_SESSION['logged_in'])){
    echo '<script> alert("You are not logged in"); </script>';
    header("Location: login.php");
} else {
    if (!isset($_SESSION['is_agency']) && !$_SESSION['is_agency']) {
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
            <h2>Add Sight</h2>
            <form class="form-horizontal" action="confirmation.php" method="post" enctype="multipart/form-data">

                <!-- City Dropdown -->
                <div class="form-group">
                    <label class="control-label" for="id_city">City:</label>
                    <select class="form-control col-xs-3" name="id_city" id="id_city">
                        <?php include "snippets/list-cities.php"; ?>
                    </select>
                    <br>
                </div>

                <!-- Agency Dropdown -->
                <div class="form-group">
                    <label class="control-label" for="id_agency">Agency:</label>
                    <select class="form-control col-xs-3" name="id_agency" id="id_agency">
                        <?php include "snippets/list-agencies.php"; ?>
                    </select>
                    <br>
                </div>
                <!-- Name, Address, Hours, Fee, Image Upload -->
                <div class="form-group">
                    <label class="control-label" for="name">Name:</label>
                    <input class="form-control col-xs-3" type="text" name="name" required>
                    <br>
                </div>

                <div class="form-group">
                    <label class="control-label" for="address">Address:</label>
                    <input class="form-control col-xs-3" type="text" name="address" required>
                    <br>
                </div>

                <div class="form-group">
                    <label class="control-label" for="hours">Hours:</label>
                    <input class="form-control col-xs-3" type="text" name="hours">
                    <br>
                </div>
                <div class="form-group">
                    <label class="control-label" for="fee">Fee:</label>
                    <input class="form-control col-xs-3" type="text" name="fee">
                    <br>
                </div>
                <div class="form-group">
                    <label class="control-label" for="image">Image:</label>
                    <input class="form-control col-xs-3" type="file" name="image" id="image" accept="image/*">
                    <br>
                </div>

                    <!-- Contact Information, Status, Latitude, Longitude -->
                <div class="form-group">
                    <label class="control-label" for="contact_info">Contact Information:</label>
                    <input class="form-control col-xs-3" type="text" name="contact_info">
                    <br>
                </div>
                <div class="form-group">
                    <label class="control-label" for="status">Status:</label>
                    <select class="form-control col-xs-3" name="status">
                        <option value="open">Open</option>
                        <option value="closed">Closed</option>
                    </select>
                    <br>
                </div>
                <div class="form-group">
                    <label class="control-label" for="latitude">Latitude:</label>
                    <input class="form-control col-xs-3" type="text" name="latitude">
                    <br>
                </div>
                <div class="form-group">
                    <label class="control-label" for="longitude">Longitude:</label>
                    <input class="form-control col-xs-3" type="text" name="longitude">
                    <br>
                </div>

                    <!-- Category Dropdown -->
                <div class="form-group">
                    <label class="control-label" for="id_category">Category:</label>
                    <select class="form-control col-xs-3" name="id_category" id="id_category">
                        <?php include "snippets/list-categories.php"; ?>
                    </select>
                    <br>
                </div>

                    <!-- Indoors-Outdoors, Wifi, Description -->
                <div class="form-group">
                    <label class="control-label" for="indoors_outdoors">Indoors/Outdoors:</label>
                    <select class="form-control col-xs-3" name="indoors_outdoors">
                        <option value="Outdoors">Outdoors</option>
                        <option value="Indoors">Indoors</option>
                    </select>
                    <br>
                </div>
                <div class="form-group">
                    <label class="control-label" for="wifi">Wifi:</label>
                    <select class="form-control col-xs-3" name="wifi">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <br>
                </div>
                <div class="form-group">
                    <label class="control-label" for="description">Description:</label>
                    <textarea class="form-control col-xs-3" name="description" rows="4"></textarea>
                    <br>
                </div>
                <div class="form-group">
                    <!-- Submit Button -->
                    <input class="form-control col-xs-3 add-sight" type="submit" value="Add Sight" name="add-sight">
                </div>
            </form><br>
        </div>
    </div>
</div>
<?php include('snippets/footer.php'); ?>
</body>
</html>
