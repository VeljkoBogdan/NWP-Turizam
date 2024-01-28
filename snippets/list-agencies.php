<?php
$query = $pdo->query('SELECT name, id_agency FROM agencies');

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value='.$row["id_agency"].'>'.$row['name'].'</option>';
}
?>