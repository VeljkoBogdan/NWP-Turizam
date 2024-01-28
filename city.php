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
    $query = $pdo->query('SELECT * FROM cities WHERE id_city = ' . $id);

    echo "<div class='container city-info'>";
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo '<h1>'.$row['name'].'</h1><br>';
        echo '<p> Country: '.$row['country'].'</p>';
        echo '<p> Population: '.$row['population'].'</p>';
        echo '<p> Region: '.$row['region'].'</p>';
        echo '<p> Timezone: '.$row['timezone'].'</p><br>';
    }

    $sql = $pdo->query('SELECT * FROM sights WHERE id_city =' . $id);
    echo "<br><h2>Sights in this city</h2>";
    if($sql->rowCount() != 0){
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='city-card'>";
            echo '<h1>'.$row['name'].'</h1><br>';
            echo '<p> Location: '.$row['address'].'</p>';
            echo '<p> Hours: '.$row['hours'].'</p>';
            echo '<p> Fee: '.$row['fee'].'</p>';
            echo '<p> Status: '.$row['status'].'</p><br>';
            echo '<p class="description"> Description: '.$row['description'].'</p><br>';
            echo "</div>";
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
</body>
</html>