<?php
$query = $pdo->query('SELECT name, id_category FROM categories');

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value='.$row["id_category"].'>'.$row['name'].'</option>';
}
?>