<?php
session_start();
require_once "functions.php";
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
        <h1> Your Favorite Cities </h1>
<?php

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $sql = "SELECT favorites.id_favorite, cities.name as city_name, cities.id_city, cities.country, cities.population, cities.region, cities.timezone
            FROM favorites
            JOIN cities ON favorites.id_city = cities.id_city
            WHERE favorites.id_user = :user_id";

    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    // Check if there are results
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<a class='recommended-cities-a' href='city.php?id=".$row['id_city']."'>";
            echo "<div class='recommended-cities'>";
            echo "<h3>{$row['city_name']} </h3><br> &nbsp; Country: {$row['country']}, Population: {$row['population']}, Region: {$row['region']}, Timezone: {$row['timezone']}";
            echo "</div>";
            echo "</a>";
        }
    } else {
        echo "No favorite cities found.";
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
