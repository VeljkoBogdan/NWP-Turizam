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
        <h1> Your Sights </h1>
        <?php

        if (isset($_SESSION['id'])) {
            $user_id = $_SESSION['id'];

            // Query to retrieve information from favorite_sights table and join with sights table
            $sql = "SELECT * FROM sights s JOIN agencies a on s.id_agency = a.id_agency WHERE s.id_agency = :user_id";

            // Prepare and execute the query
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();

            // Check if there are results
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<a class='recommended-cities-a' href='sight.php?id=".$row['id_sight']."'>";
                    echo "<div class='recommended-cities'>";
                    echo "<h3> {$row['name']}</h3> &nbsp; Address: {$row['address']}, Hours: {$row['hours']}, Fee: {$row['fee']}, Status: {$row['status']} <br> &nbsp; Description: {$row['description']}";
                    echo "</div>";
                    echo "</a>";
                }
            } else {
                echo "No sights found.";
            }
        } else {
            echo "Agency not logged in.";
        }

        ?>

    </div>
</div>

<?php include('snippets/footer.php'); ?>
<script type="text/javascript" src="leaflet.js"></script>
</body>
</html>
