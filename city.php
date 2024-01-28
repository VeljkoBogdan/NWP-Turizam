<?php
session_start();
require_once "functions.php";
require_once "snippets/ban_check.php";

if(!isset($_SESSION['logged_in'])){
    echo '<script> alert("You are not logged in, please log in to see cities"); </script>';
    header("Location: login.php");
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

<?php

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 0) {
    $id = $_GET['id'];
    $query = $pdo->query('SELECT * FROM cities WHERE id_city = ' . $id);

    echo "<div class='container city-info'>";

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            if (!isset($_SESSION['is_agency']) || !$_SESSION['is_agency']) {
                echo "<br><button style='display: inline-block' class='btn btn-danger border navbar-right' onclick='favoriteCity(" . $row["id_city"] . ")'> Favorite this city </button>";
            }
        }
        echo '<h1 style="display: inline-block">'.$row['name'].'</h1><br>';
        echo '<p> Country: '.$row['country'].'</p>';
        echo '<p> Population: '.$row['population'].'</p>';
        echo '<p> Region: '.$row['region'].'</p>';
        echo '<p> Timezone: '.$row['timezone'].'</p><br>';
    }

    $sql = $pdo->query('SELECT * FROM sights WHERE id_city =' . $id);
    echo "<br><h2>Sights in this city</h2>";
    if($sql->rowCount() != 0){
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo '<a class="recommended-cities-a" href="sight.php?id='.$row["id_sight"].'">';
            echo "<div class='recommended-cities city-card'>";
            echo '<h1>'.$row['name'].'</h1><br>';
            echo '<p> Location: '.$row['address'].'</p>';
            echo '<p> Hours: '.$row['hours'].'</p>';
            echo '<p> Fee: '.$row['fee'].'</p>';
            echo '<p> Status: '.$row['status'].'</p><br>';
            echo '<p class="description"> Description: '.$row['description'].'</p><br>';
            echo "</div></a>";
        }
    }
    else{
        echo "<h3>&emsp; There are no sights in this city</h3>";
    }
    echo "</div>";

}
else header("Location: index.php");

?>

<?php include('snippets/footer.php'); ?>
<script>
    function favoriteCity(id_city) {
        // Make an AJAX request to favoriteCity.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "favoriteCity.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Display the response (you can customize this based on your needs)
                alert(xhr.responseText);
            }
        };
        xhr.send("id_city=" + id_city);
    }
</script>
</body>
</html>