<?php
session_start();
require_once "functions.php";


if (isset($_POST['id_sight']) && is_numeric($_POST['id_sight']) && $_POST['id_sight'] >= 0) {
    $id_sight = $_POST['id_sight'];

    $user_id = $_SESSION['id'];

    // Insert into the favorites table
    $check = $pdo->prepare("SELECT * FROM favorite_sights WHERE id_sight = ".$id_sight." AND id_user = ".$user_id." ");
    $check->execute();

    if ($check->rowCount() == 0) {
        $stmt = $pdo->prepare("INSERT INTO favorite_sights (id_user, id_sight) VALUES (?, ?)");
        $stmt->execute([$user_id, $id_sight]);

        echo "Sight added to favorites successfully";
    }
    else {
        echo "You already favorited this sight";
    }
} else {
    echo "Invalid sight ID";
}

?>
