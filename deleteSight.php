<?php
session_start();
require_once "functions.php";

if (isset($_SESSION['is_agency']) && $_SESSION['is_agency']) {
    if (isset($_POST['id_sight']) && is_numeric($_POST['id_sight']) && $_POST['id_sight'] >= 0) {
        $id_sight = $_POST['id_sight'];

        $user_id = $_SESSION['id'];

        // Insert into the favorites table
        $check = $pdo->prepare("SELECT * FROM sights WHERE id_sight = " . $id_sight . " AND id_agency = " . $user_id . " ");
        $check->execute();

        if ($check->rowCount() > 0) {
            $stmt = $pdo->prepare("DELETE FROM sights WHERE id_sight = " . $id_sight . " AND id_agency = " . $user_id . " ");
            $stmt->execute();

            echo "Sight deleted successfully.";
        } else {
            echo "Sight not found.";
        }
    } else {
        echo "Invalid sight ID";
    }
} else {
    echo "Insufficient permission";
}

?>
