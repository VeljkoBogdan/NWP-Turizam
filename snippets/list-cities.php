<?php
$query = $pdo->query('SELECT name, id_city FROM cities');

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value='.$row["id_city"].'>'.$row['name'].'</option>';
}
?>
