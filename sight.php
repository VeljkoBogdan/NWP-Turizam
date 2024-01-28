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

<?php

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 0) {
    $id = $_GET['id'];
    $query = $pdo->query('SELECT * FROM sights WHERE id_sight = ' . $id);

    echo "<div class='container city-info'>";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            if (!isset($_SESSION['is_agency']) || !$_SESSION['is_agency']) {
                echo "<br><button style='display: inline-block' class='btn btn-danger border navbar-right' onclick='favoriteSight(" . $row["id_sight"] . ")'> Favorite this sight </button>";
            } else {
                echo "<br><button style='display: inline-block' class='btn btn-danger border navbar-right' onclick='deleteSight(" . $row["id_sight"] . ")'> Delete this sight </button>";
            }
        }
        echo '<h1>'.$row['name'].'</h1><br>';
        echo '<p> Address: '.$row['address'].'</p>';
        echo '<p> Hours: '.$row['hours'].'</p>';
        echo '<p> Fee: '.$row['fee'] == 0 ? "No Fee": $row['fee'] .' EUR </p>';
        echo '<p> Status: '.$row['status'].'</p>';
        echo '<p> Indoors/Outdoors: '.$row['indoors_outdoors'].'</p>';
        echo '<p> Wifi: '.$row['wifi'].'</p>';
        echo '<p class="city-card"> Description: '.$row['description'].'</p>';
        echo "<br>";
        echo '<p> Contact Info: '.$row['contact_info'].'</p><br>';
    }

    echo "</div>";

}
else header("Location: index.php");

?>

<script>
    function favoriteSight(id_sight) {
        // Make an AJAX request to favoriteCity.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "favoriteSight.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display the response (you can customize this based on your needs)
                alert(xhr.responseText);
            }
        };
        xhr.send("id_sight=" + id_sight);
    }

    function deleteSight(id_sight) {
        // Make an AJAX request to favoriteCity.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "deleteSight.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display the response (you can customize this based on your needs)
                alert(xhr.responseText);
                window.location.href = "your_sights.php";
            }
        };
        xhr.send("id_sight=" + id_sight);
    }
</script>

<?php include('snippets/footer.php'); ?>
</body>
</html>