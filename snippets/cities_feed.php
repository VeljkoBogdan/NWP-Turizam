<?php
$query = $pdo->query('SELECT * FROM cities ORDER BY RAND() LIMIT 5');

if (isset($row['image']) && $row['image'] != 0){
    $placeholder = $row['image'];
}
else{
    $placeholder = "../uploads/placeholder.jpg";
}


while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo
        '<a class="recommended-cities-a" href="city.php?id='.$row['id_city'].'"><div class="recommended-cities city-card" style="background-size: 100% 150%; background-image: url('.$placeholder.')"> 
        <h2>'.$row['name'].'</h2>
        <p>'.$row['country'].'</p>
        <h3>'.$row['region'].'</h3>
    </div></a><br>'
    ;
}
?>