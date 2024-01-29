<?php
session_start();
require_once "functions.php";
require_once "snippets/ban_check.php";
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
            <h4>Search for a place, or select it on the map!</h4>
            <ul class="nav nav-pills nav-stacked">
                <button class="btn btn-primary border" id="toggleFormBtn"> Filters </button>
                <button class="btn btn-primary border" id="clearNav"> Clear </button>
                <button style="display: none" class="btn btn-danger border " id="saveRoute" onclick="saveRoute()"> Save Route </button>
                <form style="display: none;" id="searchForm" class="form-horizontal" method="GET" action="index.php">
                    <br>
                    <div class="form-group container-fluid" id="search-container">
                        <input type="text" class="form-control" id="search-input" name="search-input" placeholder="Search for a place">
                    </div>
                    <div class="form-group container-fluid">
                        <label class="control-label" for="categories">Category:</label>
                        <?php
                        // Query to fetch data from the "categories" table
                        $query = "SELECT * FROM categories";
                        $statement = $pdo->query($query);

                        if ($statement) {
                            // Start generating the HTML code
                            echo '<select class="form-control col-xs-3" id="categories" name="categories" tabindex="-1">';
                            echo '<option value="">All</option>'; // Option to select all categories

                            // Fetch the query results
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                $id = $row['id_category'];
                                $category = $row['name'];
                                echo '<option value="' . $id . '">' . $category . '</option>';
                            }

                            echo '</select>';
                        } else {
                            // Handle query error
                            $errorInfo = $pdo->errorInfo();
                            echo "Error: " . $errorInfo[2];
                        }
                        ?>
                    </div>
                    <div class="form-group container-fluid">
                        <label class="control-label" for="locations">Location:</label>
                        <?php
                        // Query to fetch data from the cities table
                        $query2 = "SELECT * FROM cities ORDER BY name";
                        $statement2 = $pdo->query($query2);

                        if ($statement2) {
                            // Start generating the HTML code
                            echo '<select class="form-control col-xs-3" id="locations" name="locations" tabindex="-1">';
                            echo '<option value="">All</option>'; // Option to select all locations

                            // Fetch the query results
                            while ($row = $statement2->fetch(PDO::FETCH_ASSOC)) {
                                $id2 = $row['id_city'];
                                $city = $row['name'];
                                echo '<option value="' . $id2 . '">' . $city . '</option>';
                            }

                            echo '</select>';
                        } else {
                            // Handle query error
                            $errorInfo = $pdo->errorInfo();
                            echo "Error: " . $errorInfo[2];
                        }
                        ?>
                    </div>
                    <div class="form-group container-fluid">
                        <label class="control-label" for="fee">Fee:</label>
                        <select class="form-control col-xs-3" id="fee" name="fee">
                            <option value="-1">All</option>
                            <option value="0">Free</option>
                            <option value="1">Below 10 EUR</option>
                            <option value="2">Below 50 EUR</option>
                            <option value="3">Over 50 EUR</option>
                        </select>
                    </div><br>
                    <button class="btn btn-success border" type="submit" name="search">Search</button>
                </form>
                <script>
                    $(document).ready(function() {
                        $('#toggleFormBtn').click(function() {
                            $('#searchForm').slideToggle('slow');
                        });
                    });

                    $(document).ready(function() {
                        $('#clearNav').click(function() {
                            clearMap();
                            $('#searchForm').slideUp('slow');
                        });
                    });
                </script>

                <div id="cityCardsContainer">
                    <?php include_once "snippets/filter-sights.php"; ?>
                </div>
            </ul>
            <br>
        </div>

        <div class="col-sm-9">
            <br>
            <div id="map"></div> <br>
            <h1> Cities that might interest you</h1>
            <?php include('snippets/cities_feed.php'); ?>
        </div>
    </div>
</div>


<?php include('snippets/footer.php'); ?>
<script type="text/javascript" src="leaflet.js"></script>
</body>
</html>