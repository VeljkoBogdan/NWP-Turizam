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
                <li class="active"><a href="#section1">Home</a></li>
                <li><a href="#section2">Friends</a></li>
                <li><a href="#section3">Family</a></li>
                <li><a href="#section3">Photos</a></li>
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
            <span>MAIN</span>
        </div>
    </div>
</div>


<?php include('snippets/footer.php'); ?>
</body>
</html>