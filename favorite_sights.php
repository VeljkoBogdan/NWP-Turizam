<?php
session_start();
require_once "functions.php";
require_once "snippets/ban_check.php";

if(!isset($_SESSION['logged_in'])){
    echo '<script> alert("You are not logged in"); </script>';
    header("Location: login.php");
} else {
    if (isset($_SESSION['is_agency'])){
        echo '<script> alert("No permission"); </script>';
        header("Location: index.php");
    }
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
    <div class="row content">
        <h1> Your Favorite Sights </h1>
        <?php

        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];

            // Query to retrieve information from favorite_sights table and join with sights table
            $sql = "SELECT favorite_sights.id_favorite, sights.name as sight_name, sights.id_sight, sights.address, sights.hours, sights.fee, sights.status, sights.description
            FROM favorite_sights
            JOIN sights ON favorite_sights.id_sight = sights.id_sight
            WHERE favorite_sights.id_user = :user_id";

            // Prepare and execute the query
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            // Check if there are results
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<a class='recommended-cities-a' href='sight.php?id=".$row['id_sight']."'>";
                    echo "<div class='recommended-cities'>";
                    echo "<h3> {$row['sight_name']}</h3> &nbsp; Address: {$row['address']}, Hours: {$row['hours']}, Fee: {$row['fee']}, Status: {$row['status']} <br> &nbsp; Description: {$row['description']}";
                    echo "</div>";
                    echo "</a>";
                }
            } else {
                echo "No favorite sights found.";
            }
        } else {
            echo "User not logged in.";
        }

        ?>

    </div>
</div>

<?php include('snippets/footer.php'); ?>
<script type="text/javascript" src="leaflet.js"></script>
</body>
</html>
