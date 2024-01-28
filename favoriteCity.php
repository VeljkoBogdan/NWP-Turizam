<?php
session_start();
require_once "functions.php";


if (isset($_POST['id_city']) && is_numeric($_POST['id_city']) && $_POST['id_city'] >= 0) {
    $id_city = $_POST['id_city'];

    $user_id = $_SESSION['id'];

    // Insert into the favorites table
    $check = $pdo->prepare("SELECT * FROM favorites WHERE id_city = ".$id_city." AND id_user = ".$user_id." ");
    $check->execute();

    if ($check->rowCount() == 0) {
        $stmt = $pdo->prepare("INSERT INTO favorites (id_user, id_city) VALUES (?, ?)");
        $stmt->execute([$user_id, $id_city]);

        echo "City added to favorites successfully";
    }
    else {
        echo "You already favorited this city";
    }
} else {
    echo "Invalid city ID";
}

?>
