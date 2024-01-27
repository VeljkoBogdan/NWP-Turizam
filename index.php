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

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">

            <ul class="nav nav-pills nav-stacked">
            </ul><br>

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for a city or place">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>

        <div class="col-sm-9">
            <br>
            <div id="map"></div>
        </div>
    </div>
</div>


<?php include('snippets/footer.php'); ?>
<script type="text/javascript" src="leaflet.js"></script>
</body>
</html>